import {Component, ViewChild, ElementRef} from '@angular/core';
import * as Chart from 'chart.js';

@Component({
    selector: 'page-estatisticas',
    templateUrl: 'estatisticas.html'
})
export class EstatisticasPage {
    @ViewChild('myChart') private _ctx: ElementRef;

    constructor() {}

    ionViewDidLoad() {
        const data = {
            datasets: [{
                data: [10, 20, 30]
            }],
        
            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Red',
                'Yellow',
                'Blue'
            ]
        };

        const chart = new Chart(this._ctx.nativeElement, {
            data,
            type: 'polarArea',
            options: {}
        })
    }
}