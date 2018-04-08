import {Component} from '@angular/core';
import {NavParams, ViewController} from 'ionic-angular';
import {ModalLineProvider} from "../../providers/modal-line/modal-line";
import {ModalLine} from "../../models/modal-line";

@Component({
    selector: 'page-search-bus',
    templateUrl: 'search-bus.html'
})
export class SearchBusPage {
    public items: Array<ModalLine> = [];
    private modal_id: any;

    constructor(
        private _viewController: ViewController,
        private modalLineProvider: ModalLineProvider,
        private _navParams: NavParams
    ) {
        this.modal_id = this._navParams.get('modal_id');
        console.log('modal_id');
    }

    selectItem(item) {
        this._viewController.dismiss(item);
    }

    getItems(event: any) {
        let query = event.target.value;

        if (!query.length) {
            this.items = [];
            return;
        }

        this.modalLineProvider.search(this.modal_id, query).subscribe((modalLines) => {
           console.log('resultados da busca', modalLines);
           this.items = modalLines
        });
    }
}