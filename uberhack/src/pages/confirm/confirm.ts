import {Component} from '@angular/core';
import {NavController, NavParams} from 'ionic-angular';
import { SucessoPage } from '../sucesso/sucesso';
import {UserProvider} from "../../providers/user/user";
import {User} from "../../models/user";

@Component({
    selector: 'page-confirm',
    templateUrl: 'confirm.html'
})
export class ConfirmPage {
    private data: any;
    private user?: User;
    constructor(
        private _navParams: NavParams,
        private _navController: NavController,
        private userProvider: UserProvider,
    ) {
        this.data =  this._navParams.get('data');
    }

    ionViewWillEnter() {
        this.userProvider.getCurrentUser().subscribe((user) => {
            this.user = user;
        })
    }

    goConfirm() {
        this._navController.setRoot(SucessoPage);
    }

    back() {
        this._navController.pop();
    }
}
