import {Component} from '@angular/core';
import { NavParams, NavController, ModalController } from 'ionic-angular';
import {SearchBusPage} from '../search-bus/search-bus';
import { ConfirmPage } from '../confirm/confirm';
import {Modal} from "../../models/modal";

@Component({
    selector: 'page-problemas',
    templateUrl: 'problemas.html'
})
export class ProblemasPage {
    public modal: Modal;
    public title: 'Ônibus' | 'Taxi' | 'Applicativos';
    public bus;
    public app;
    public rate = 0;
    public appMotorista = '';
    public appPlacaVeiculo = '';
    public taxiNumero = '';


    public ride_at = new Date;
    public observations = '';
    public modal_problem_id: number;

    constructor(
        private _navParams: NavParams,
        private _navController: NavController,
        private _modalController: ModalController
    ) {
        const modal = this._navParams.get('modal');
        switch (modal.id) {
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

        this.modal = modal;

        console.log('modal recebido é ', modal);
    }

    onRatingChange(event) {
        console.log(event);
    }

    search() {
        const modal = this._modalController.create(SearchBusPage, {'modal_id': this.modal.id});

        modal.onDidDismiss((data) => {
            if (data) {
                this.bus = data;
            }
        });

        modal.present();
    }

    goConfirm() {
        this._navController.push(ConfirmPage, {data: {
            modal: this.modal,
            rate: this.rate,
            bus: this.bus,
            appMotorista: this.appMotorista,
            appPlacaVeiculo: this.appPlacaVeiculo,
            taxiNumero: this.taxiNumero,
            ride_at: this.ride_at,
            observations: this.observations,
            modal_problem_id: this.modal_problem_id,
        }});
    }

    back() {
        this._navController.pop();
    }
}