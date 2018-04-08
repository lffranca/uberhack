import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {ApiProvider} from "../api/api";
import {Observable} from "rxjs/Observable";
import {User} from "../../models/user";
import "rxjs/add/operator/switchMap";

/*
  Generated class for the UserProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class UserProvider extends ApiProvider {
  /**
   * Get currently authenticated user
   * @returns {Observable<User>}
   */
  public getCurrentUser(): Observable<User> {

    return this.http.get<SingleResponse<UserResponse>>(`${this.config.API.ENDPOINT}/auth/user`)
      .map((response) => {
        return User.createFromResponse(response.data);
      })
  }
}
