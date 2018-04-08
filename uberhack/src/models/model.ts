export class Model {
  /**
   * Construct a model from attributes
   * @param attributes
   */
  constructor(attributes?: any) {
    if (attributes) {
      Object.assign(this, attributes)
    }
  }

  /**
   * Create a collection of models from array with attributes
   * @param {Array<any>} items
   * @returns {Array}
   */
  public static collectionFromResponse(items: Array<any>) {
    let collection = [];

    items.forEach((attributes) => {
      collection.push(this.createFromResponse(attributes));
    });

    return collection;
  }

  /**
   *
   * @param items
   * @returns {Model}
   */
  public static createFromResponse(items: any): any {
    return new this(items);
  }
}