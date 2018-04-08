import {Component} from '@angular/core';
import { NavController } from 'ionic-angular';
import { HomePage } from '../home/home';

@Component({
    selector: 'page-sucesso',
    templateUrl: 'sucesso.html'
})
export class SucessoPage {
    constructor(
        private _navController: NavController
    ) {}

    confirm() {
        this._navController.setRoot(HomePage);
    }

    back() {
        this._navController.pop();
    }
}