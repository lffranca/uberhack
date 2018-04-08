import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import {Observable} from "rxjs/Observable";
import {User} from "../../models/user";
import "rxjs/add/operator/switchMap";
import {ModalLine} from "../../models/modal-line";

/*
  Generated class for the UserProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ModalLineProvider extends ApiProvider {
    /**
     * Do a full-text search for ModalLine
     * @returns {Observable<Array<ModalLine>>}
     */
    public search(
        query: string,
        include: Array<String> = [],
        filters: any = [],
    ): Observable<any> {
        let url = new URL(`${this.config.API.ENDPOINT}/city/search/${encodeURIComponent(query)}`);

        if (include.length) {
            url.searchParams.set('include', include.join(','));
        }

        for (let key in filters) {
            // noinspection JSUnfilteredForInLoop
            url.searchParams.set(key, filters[key])
        }

        return this.http.get<CollectionResponse<ModalLineResponse>>(url.toString())
            .map((response) => {
                return ModalLine.collectionFromResponse(response.data);
            }).catch(this.handleError.bind(this));
    }
}
