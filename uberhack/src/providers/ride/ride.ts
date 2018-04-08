import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import "rxjs/add/operator/switchMap";
import {Observable} from "rxjs/Observable";
import {Modal} from "../../models/modal";
import {Ride} from "../../models/ride";

@Injectable()
export class RideProvider extends ApiProvider {
    /**
     * List Events with given includes, filters and pageSize
     *
     * @param {Array<String>} include
     * @param filters
     * @param {number} pageSize
     * @returns {Observable<Array<Event>>}
     */
    public list_my_rides(include: Array<String> = [], filters: any = [], pageSize: number = null): Observable<Collection<Modal>> {

        let url = new URL(`${this.config.API.ENDPOINT}/ride/my`);

        if (include.length) {
            url.searchParams.set('include', include.join(','));
        }

        if (pageSize) {
            url.searchParams.set('page_size', pageSize.toString());
        }

        for (let key in filters) {
            url.searchParams.set(key, filters[key])
        }

        return this.http.get<CollectionResponse<RideResponse>>(url.toString())
            .map((response) => {
                return {
                    data: Ride.collectionFromResponse(response.data),
                    meta: response.meta
                };
            })
    }
}
