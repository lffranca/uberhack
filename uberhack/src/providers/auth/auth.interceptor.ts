import {Injectable, Injector} from '@angular/core';
import {
  HttpInterceptor, HttpHandler, HttpRequest, HttpEvent
}
  from '@angular/common/http';

import { Observable } from 'rxjs/Observable';
import {AuthProvider} from "./auth";
import 'rxjs/add/operator/do';
import "rxjs/add/operator/mergeMap";
import "rxjs/add/operator/last";

@Injectable()
export class AuthInterceptor implements HttpInterceptor {
  constructor(
    private injector: Injector
  ) {
  }

  /**
   * Intercept requests adding the AuthToken if available
   * @param {HttpRequest<any>} request
   * @param {HttpHandler} next
   * @returns {Observable<HttpEvent<any>>}
   */
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    return this.injector.get(AuthProvider).observeToken().first().flatMap((token) => {
      if (token) {
        request = request.clone({setHeaders: {
          authorization: `${token.token_type} ${token.access_token}`
        }});
      }

      return next.handle(request);
    });
  }
}