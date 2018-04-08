export class User {
  id: number;
  name: string;
  email?: string;
  cpf?: string;

  constructor(attributes?: any) {
    if (attributes) {
      Object.assign(this, attributes);
    }
  }

  toString(): string {
    return `${this.name}`;
  }

  /**
   * @param {UserResponse} response
   * @returns {User}
   */
  public static createFromResponse(response: UserResponse): User {
    return Object.assign(new User(), response);
  }
}