import {Component} from '@angular/core';
import { NavController } from 'ionic-angular';
import { SucessoPage } from '../sucesso/sucesso';

@Component({
    selector: 'page-confirm',
    templateUrl: 'confirm.html'
})
export class ConfirmPage {
    constructor(
        private _navController: NavController
    ) {}

    goConfirm() {
        this._navController.setRoot(SucessoPage);
    }

    back() {
        this._navController.pop();
    }
}
