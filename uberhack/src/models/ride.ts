import {User} from "./user";
import {Model} from "./model";
import {ModalLine} from "./modal-line";
import {ModalProblem} from "./modal-problem";
import {RideResponse} from "../providers/ride/ride-response";
import {RideRating} from "./ride-rating";

export class Ride extends Model {
    id: number;
    modal_line_id: number;
    modal_line: ModalLine;
    ride_at: Date;
    ride_rating: RideRating;

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: RideResponse): Ride {
    let model = new Ride(response);

    if (response.modal_line) {
        model.modal_line = ModalLine.createFromResponse(response.modal_line);
    }

    if (response.ride_rating) {
        model.ride_rating = RideRating.createFromResponse(response.ride_rating);
    }

    return model;
  }
}