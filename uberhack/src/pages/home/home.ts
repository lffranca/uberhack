import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ProblemasPage } from '../problemas/problemas';
import {ModalProvider} from "../../providers/modal/modal";
import {Modal} from "../../models/modal";

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  public modals: Array<Modal> = []

  constructor(
    private _navController: NavController,
    private modalProvider: ModalProvider,
  ) {}

  ionViewWillEnter() {
    this.modalProvider.list(['modal_problems']).subscribe((modals) => {
      this.modals = modals.data;
      console.log('modals', this.modals);
    })
  }

  goItem(modal) {
    this._navController.push(ProblemasPage, {
      modal
    });
  }
}
