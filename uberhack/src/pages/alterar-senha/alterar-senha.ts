import {Component} from '@angular/core';
import { NavController, AlertController, AlertOptions } from 'ionic-angular';

@Component({
    selector: 'page-alterar-senha',
    templateUrl: 'alterar-senha.html'
})
export class AlterarSenhaPage {
    constructor(
        private _navController: NavController,
        private _alertController: AlertController
    ) {}

    goSalvarSenha() {
        const alertOptions: AlertOptions = {
            title: 'Sucesso!',
            subTitle: 'Alteração de senha foi alterada com sucesso!',
            buttons: ['OK']
        }

        const alert = this._alertController.create(alertOptions);

        alert.onDidDismiss(() => {
            this._navController.pop();
        });

        alert.present();
    }
}