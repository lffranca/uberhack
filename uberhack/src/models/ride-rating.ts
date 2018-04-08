import {User} from "./user";
import {Model} from "./model";
import {ModalLine} from "./modal-line";
import {ModalProblem} from "./modal-problem";
import {RideResponse} from "../providers/ride/ride-response";
import {RideRatingResponse} from "../providers/ride-rating/ride-rating-response";
import {Ride} from "./ride";

export class RideRating extends Model {
    id: number;
    ride_id: number;
    modal_problem_id: number;
    overall_rating: number;
    observations: string;
    ride: Ride;
    modal_problem: ModalProblem;

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: RideRatingResponse): RideRating {
    let model = new RideRating(response);

    if (response.ride) {
        model.ride = Ride.createFromResponse(response.ride);
    }

    if (response.modal_problem) {
        model.modal_problem = ModalProblem.createFromResponse(response.modal_problem);
    }

    return model;
  }
}