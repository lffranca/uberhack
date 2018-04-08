import {Component} from '@angular/core';
import { Person } from '../../models/person';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { NavController } from 'ionic-angular';

@Component({
    selector: 'page-register',
    templateUrl: 'register.html'
})
export class RegisterPage {
    public person: Person;
    public personForm: FormGroup;

    constructor(
        private _navController: NavController,
        private _formBuilder: FormBuilder
    ) {
        this.personForm = this._formBuilder.group({
            name: ['', [Validators.required]],
            email: ['', [Validators.email, Validators.required]],
            cpf: ['', [Validators.required]],
            password: ['', Validators.required],
            passwordConfirm: ['', [Validators.required]]
        });
    }

    goRegister() {
        if (this.personForm.valid && this.personForm.touched) {
            console.log('[Login Page] go Login', this.personForm.value);
        } else {
            console.log('[Login Page] go Login Error', this.personForm.value);
        }
    }

    returnToLogin() {
        this._navController.pop();
    }
}