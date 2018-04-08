import {Component} from '@angular/core';
import { NavController } from 'ionic-angular';
import { AlterarSenhaPage } from '../alterar-senha/alterar-senha';

@Component({
    selector: 'page-dados-usuario',
    templateUrl: 'dados-usuario.html'
})
export class DadosUsuarioPage {
    constructor(
        private _navController: NavController
    ) {}

    goAlterarSenha() {
        this._navController.push(AlterarSenhaPage);
    }
}