import {Component} from '@angular/core';
import { ViewController } from 'ionic-angular';

@Component({
    selector: 'page-search-app',
    templateUrl: 'search-app.html'
})
export class SearchAppPage {
    public items = [{
        id: 1,
        description: 'Uber'
    }, {
        id: 2,
        description: 'Cabify'
    }, {
        id: 3,
        description: '99 POP'
    }];

    constructor(
        private _viewController: ViewController
    ) {}

    selectItem(item) {
        this._viewController.dismiss(item);
    }

    getItems(ev: any) {
        console.log(ev);
    }
}