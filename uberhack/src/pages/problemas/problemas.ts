import {Component} from '@angular/core';
import { NavParams, NavController, ModalController } from 'ionic-angular';
import {SearchBusPage} from '../search-bus/search-bus';
import { ConfirmPage } from '../confirm/confirm';
import { SearchAppPage } from '../search-app/search-app';

@Component({
    selector: 'page-problemas',
    templateUrl: 'problemas.html'
})
export class ProblemasPage {
    public item = {};
    public title: 'Ônibus' | 'Taxi' | 'Applicativos';
    public bus;
    public app;
    public rate = 0;
    public date = new Date;
    public observacoes = '';
    public appMotorista = '';
    public appPlacaVeiculo = '';
    public taxiNumero = '';

    constructor(
        private _navParams: NavParams,
        private _navController: NavController,
        private _modalController: ModalController
    ) {
        const item = this._navParams.get('item');
        switch (item.id) {
            case 1:
                this.title = 'Ônibus';
                break;
            case 2:
                this.title = 'Taxi';
                break;
            case 3:
                this.title = 'Applicativos';
                break;
        }

        this.item = item;
    }

    onRatingChange(event) {
        console.log(event);
    }

    searchLinhas() {
        const modal = this._modalController.create(SearchBusPage);

        modal.onDidDismiss((data) => {
            if (data) {
                this.bus = data;
            }
        });

        modal.present();
    }

    searchApp() {
        const modal = this._modalController.create(SearchAppPage);

        modal.onDidDismiss((data) => {
            if (data) {
                this.app = data;
            }
        });

        modal.present();
    }

    goConfirm() {
        this._navController.push(ConfirmPage);
    }

    back() {
        this._navController.pop();
    }
}