import {Component} from '@angular/core';
import { NavController, AlertController } from 'ionic-angular';
import { HomePage } from '../home/home';
import { SocialSharing } from '@ionic-native/social-sharing';

@Component({
    selector: 'page-sucesso',
    templateUrl: 'sucesso.html'
})
export class SucessoPage {
    constructor(
        private _navController: NavController,
        private _alertController: AlertController,
        private _socialSharing: SocialSharing
    ) {}

    confirm() {
        const alert = this._alertController.create({
            title: 'Deseja compartilhar sua experiencia?',
            message: 'Compartilhando sua experiencia existirá mais chances de sua reclamação ser reconhecida.',
            buttons: [{
                text: 'Não',
                    handler: () => {
                        this._navController.setRoot(HomePage);
                    }
                }, {
                    text: 'Sim',
                    handler: () => {
                        this._shareFacebook();
                    }
                }
            ]
        });

        alert.present();
    }

    private _shareFacebook() {
        this._socialSharing.share('TESTE MESSAGE', 'TESTE SUBJECT')
        .then(data => {
            console.log('RESULT SHARE', data);

            this._navController.setRoot(HomePage);
        })
        .catch(error => console.error(error));
    }

    back() {
        this._navController.pop();
    }
}