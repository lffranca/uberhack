import {Component} from '@angular/core';
import { ViewController } from 'ionic-angular';

@Component({
    selector: 'page-search-bus',
    templateUrl: 'search-bus.html'
})
export class SearchBusPage {
    public items = [{
        id: 1,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 01'
    }, {
        id: 2,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 02'
    }, {
        id: 3,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 03'
    },{
        id: 4,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 04'
    }, {
        id: 5,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 05'
    },{
        id: 6,
        number: 201,
        description: 'Antônio Bezerra/ Papicu 06'
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