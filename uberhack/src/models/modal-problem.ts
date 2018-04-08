import {User} from "./user";
import {Model} from "./model";
import {Modal} from "./modal";

export class ModalProblem extends Model {
    id: number;
    modal_id: number;
    label: string;
    modal?: Modal;

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: ModalProblemResponse): ModalProblem {
    let model = new ModalProblem(response);

    if (response.modal) {
        model.modal = Modal.createFromResponse(response.modal);
    }

    return model;
  }
}