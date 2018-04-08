import {Component} from '@angular/core';
import { Person } from '../../models/person';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import {AlertController, NavController} from 'ionic-angular';
import { RegisterPage } from '../register/register';
import { HomePage } from '../home/home';
import { STORAGE_TOKEN_AUTH } from '../../constants/storage-constant';
import {LoadingProvider} from "../../providers/loading/loading";
import {AuthProvider} from "../../providers/auth/auth";
import {User} from "../../models/user";
import {Subscription} from "rxjs/Subscription";

@Component({
    selector: 'page-login',
    templateUrl: 'login.html'
})
export class LoginPage {
    public person: Person;
    public personForm: FormGroup;
    private userSubscription: Subscription;

    constructor(
        private _navController: NavController,
        private _formBuilder: FormBuilder,
        private loading: LoadingProvider,
        private authProvider: AuthProvider,
        private alertController: AlertController,
    ) {
        this.personForm = this._formBuilder.group({
            email: ['', [Validators.email, Validators.required]],
            password: ['', Validators.required]
        });
    }

    ionViewWillEnter() {
        console.log('will enter');
        this.userSubscription = this.authProvider.observeUser().subscribe((user: User) => {
            if (user) {
                console.log('está autenticado');
                if (this._navController.canGoBack()) {
                    this._navController.pop();
                    console.log('fazendo pop');
                } else {
                    this._navController.setRoot(HomePage);
                    console.log('indo para home');
                }
            }
        })
    }

    goLogin() {
        // localStorage.setItem(STORAGE_TOKEN_AUTH, 'kljhlksjdhfljsdhflkjsdfh');
        //
        // this._navController.setRoot(HomePage);
        // // if (this.personForm.valid && this.personForm.touched) {
        // //     console.log('[Login Page] go Login', this.personForm.value);
        //
        // //     localStorage.setItem(STORAGE_TOKEN_AUTH, 'kljhlksjdhfljsdhflkjsdfh');
        //
        // //     this._navController.setRoot(HomePage);
        // // } else {
        // //     console.log('[Login Page] go Login Error', this.personForm.value);
        // // }

      this.loading.load('Entrando...');
      this.authProvider.login(
        this.personForm.value.email,
        this.personForm.value.password,
      ).subscribe(
        (success) => {
          this.loading.dismiss();
          if (success) {
            this._navController.setRoot(HomePage)
          } else {
            this.personForm.patchValue({
              password: ''
            });

            this.showWrongCredentialsAlert();
          }
        },
        (error) =>
        {
          this.loading.dismiss();
          this.showLoginFailedAlert(error);
        }
      );

    }

    private showLoginFailedAlert(error) {
        this.alertController.create({
            title: 'Ops!',
            subTitle: 'Ocorreu um erro em nossos servidores, tente novamente!',
            buttons: ['OK']
        }).present();
    }

    private showWrongCredentialsAlert() {
        this.alertController.create({
            title: 'Ops!',
            subTitle: 'Email e senha não conferem!',
            buttons: ['Tentar novamente']
        }).present();
    }

    goRegister() {
        this._navController.push(RegisterPage);
    }
}