import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import {Observable} from "rxjs/Observable";
import {User} from "../../models/user";
import "rxjs/add/operator/switchMap";
import {Modal} from "../../models/modal";

/*
  Generated class for the UserProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ModalProvider extends ApiProvider {
    /**
     * List Events with given includes, filters and pageSize
     *
     * @param {Array<String>} include
     * @param filters
     * @param {number} pageSize
     * @returns {Observable<Array<Event>>}
     */
    public list(include: Array<String> = [], filters: any = [], pageSize: number = null): Observable<Collection<Modal>> {

        let url = new URL(`${this.config.API.ENDPOINT}/modal`);

        if (include.length) {
            url.searchParams.set('include', include.join(','));
        }

        if (pageSize) {
            url.searchParams.set('page_size', pageSize.toString());
        }

        for (let key in filters) {
            url.searchParams.set(key, filters[key])
        }

        return this.http.get<CollectionResponse<ModalResponse>>(url.toString())
            .map((response) => {
                return {
                    data: Modal.collectionFromResponse(response.data),
                    meta: response.meta
                };
            })
    }
}
