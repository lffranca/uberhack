import {User} from "./user";
import {Model} from "./model";
import {Modal} from "./modal";

export class ModalLine extends Model {
    id: number;
    modal_id: number;
    label: string;
    modal?: Modal;

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: ModalLineResponse): ModalLine {
    let model = new ModalLine(response);

    if (response.modal) {
        model.modal = Modal.createFromResponse(response.modal);
    }

    return model;
  }


    /**
     * Create a collection of models from array with attributes
     * @param {Array<any>} items
     * @returns {Array}
     */
    public static collectionFromResponse(items: Array<any>): Array<ModalLine> {
        let collection = [];

        items.forEach((attributes) => {
            collection.push(this.createFromResponse(attributes));
        });

        return collection;
    }
}