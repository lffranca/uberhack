import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import "rxjs/add/operator/switchMap";
import {Observable} from "rxjs/Observable";
import {RideRating} from "../../models/ride-rating";
import {RideRatingResponse} from './ride-rating-response';

interface RideRatingStoreData {
    modal_line_id: number,
    overall_rating: number,
    modal_problem_id?: number,
    ride_at?: Date,
    observations: string
}

@Injectable()
export class RideRatingProvider extends ApiProvider {
    /**
     * Store the given EventTicket
     * @returns {Observable<EventTicket>}
     * @param data
     */
    public store(data: RideRatingStoreData): Observable<{} | RideRating>
    {
        let body = {
            modal_line_id: data.modal_line_id,
            overall_rating: data.overall_rating,
            modal_problem_id: data.modal_problem_id,
            ride_at: data.ride_at,
            observations: data.observations,
        };

        return this.http.post<SingleResponse<RideRatingResponse>>(
            `${this.config.API.ENDPOINT}/ride/rating`,
            body
        ).map((response) => {
            return RideRating.createFromResponse(response.data);
        }).catch(this.handleError.bind(this));
    }
}
