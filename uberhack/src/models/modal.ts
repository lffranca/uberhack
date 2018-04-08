import {User} from "./user";
import {Model} from "./model";
import {ModalLine} from "./modal-line";
import {ModalProblem} from "./modal-problem";

export class Modal extends Model {
    id: number;
    label: string;
    modal_lines?: Array<ModalLine>;
    modal_problems?: Array<ModalProblem>;

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: ModalResponse): Modal {
    let model = new Modal(response);

    if (response.modal_lines) {
        model.modal_lines = ModalLine.collectionFromResponse(response.modal_lines);
    }

    if (response.modal_problems) {
        model.modal_problems = ModalProblem.collectionFromResponse(response.modal_problems);
    }

    return model;
  }
}