import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { ProblemasPage } from '../problemas/problemas';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  public items = [{
    id: 1,
    description: 'Ônibus',
    icon: 'bus'
  }, {
    id: 2,
    description: 'Taxi',
    icon: 'car'
  }, {
    id: 3,
    description: 'App',
    icon: 'car'
  }]

  constructor(
    private _navController: NavController
  ) {}

  goItem(item) {
    this._navController.push(ProblemasPage, {
      item
    });
  }
}
