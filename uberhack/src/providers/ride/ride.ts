import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import "rxjs/add/operator/switchMap";

@Injectable()
export class RideProvider extends ApiProvider {

}
