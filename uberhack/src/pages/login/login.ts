import {Component} from '@angular/core';
import { Person } from '../../models/person';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { NavController } from 'ionic-angular';
import { RegisterPage } from '../register/register';
import { HomePage } from '../home/home';
import { STORAGE_TOKEN_AUTH } from '../../constants/storage-constant';

@Component({
    selector: 'page-login',
    templateUrl: 'login.html'
})
export class LoginPage {
    public person: Person;
    public personForm: FormGroup;

    constructor(
        private _navController: NavController,
        private _formBuilder: FormBuilder
    ) {
        this.personForm = this._formBuilder.group({
            email: ['', [Validators.email, Validators.required]],
            password: ['', Validators.required]
        });
    }

    goLogin() {
        localStorage.setItem(STORAGE_TOKEN_AUTH, 'kljhlksjdhfljsdhflkjsdfh');

        this._navController.setRoot(HomePage);
        // if (this.personForm.valid && this.personForm.touched) {
        //     console.log('[Login Page] go Login', this.personForm.value);

        //     localStorage.setItem(STORAGE_TOKEN_AUTH, 'kljhlksjdhfljsdhflkjsdfh');

        //     this._navController.setRoot(HomePage);
        // } else {
        //     console.log('[Login Page] go Login Error', this.personForm.value);
        // }
    }

    goRegister() {
        this._navController.push(RegisterPage);
    }
}