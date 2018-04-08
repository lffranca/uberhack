import {Inject, Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';

import { Storage } from '@ionic/storage';

import {ApiProvider} from '../api/api';
import {APP_CONFIG, AppConfig} from '../../app/app.config';
import {Observable} from "rxjs/Observable";
import "rxjs/add/operator/first";
import "rxjs/add/observable/fromPromise";
import "rxjs/add/operator/toPromise";
import "rxjs/add/operator/catch";
import "rxjs/add/observable/of";
import "rxjs/add/operator/publish";
import "rxjs/add/operator/share";
import {AlertController} from "ionic-angular";
import {ReplaySubject} from "rxjs/ReplaySubject";
import {User} from "../../models/user";
import {UserProvider} from "../user/user";


@Injectable()
export class AuthProvider extends ApiProvider {
  private tokenSubject: ReplaySubject<AuthToken> = new ReplaySubject(1);
  private fetchTokenObservable: Observable<AuthToken>;

  private userSubject: ReplaySubject<User> = new ReplaySubject(1);
  private fetchingUser: boolean = false;

  readonly TOKEN_STORAGE_KEY = 'auth.token';

  constructor(
    public http: HttpClient,
    public alertController: AlertController,
    public storage: Storage,
    public userProvider: UserProvider,
    @Inject(APP_CONFIG) public config: AppConfig,
  ) {
    super(http, alertController, config);

    this.fetchToken().subscribe((token) => {
      if (token) {
        this.fetchUser();
      } else {
        this.userSubject.next(null);
      }
    })
  }

  /**
   * @returns {Observable<AuthToken>}
   */
  observeToken(): Observable<AuthToken> {
    return this.tokenSubject.asObservable();
  }

  /**
   * Return an observable that resolves when authProvider
   * is ready (token loaded from storage).
   * @returns {Observable<AuthToken>}
   */
  observeReady(): Observable<AuthToken> {
    return this.fetchTokenObservable;
  }

  /**
   * @param {AuthToken} token
   */
  private setToken(token: AuthToken) {
    this.storage.set(this.TOKEN_STORAGE_KEY, token);
    this.tokenSubject.next(token);
  }

  /**
   * Fetch token from storage if available
   */
  private fetchToken(): Observable<AuthToken> {
    // This avoids multiple unnecessary storage calls
    if (!this.fetchTokenObservable) {

      this.fetchTokenObservable = Observable.fromPromise(this.storage.get(this.TOKEN_STORAGE_KEY).then((token) => {
        this.tokenSubject.next(token);

        return token;
      }));

      return this.fetchTokenObservable;
    }
  }

  /**
   * @returns {Observable<User>}
   */
  public observeUser(): Observable<User> {
    return this.userSubject.asObservable();
  }

  /**
   * Fetch user from API if token is available
   */
  private fetchUser() {
    if (!this.fetchingUser) {
      return this.userProvider.getCurrentUser().subscribe((user: User) => {
        this.userSubject.next(user);
        this.fetchingUser = false;
      }, (error) => {
        this.userSubject.next(null);
        // If the token isn't valid, forget it.
        if (error.status === 401) {
          this.logout();
        }
      });
    }
  }

  /**
   * Attempt to login using email and password credentials
   *
   * @param email
   * @param password
   * @returns {Promise<Boolean>}
   */
  public login(email, password): Observable<Boolean> {
    return this.http.post<AuthToken>(`${this.config.API.ENDPOINT}/oauth/token`, {
      grant_type: 'password',
      client_id: this.config.API.CLIENT_ID,
      client_secret: this.config.API.CLIENT_SECRET,
      username: email,
      password: password,
      scope: '',
    }).map((token: AuthToken) => {
      this.setToken(token);
      this.fetchUser();
      return true;
    }).catch((error) => {
      switch(error.status) {
        case 401:
          return Observable.of(false);
        default:
          throw error;
      }
    });
  }

  /**
   * Login using Facebook
   * @returns {Promise<boolean>}
   */
  public loginWithFacebook() {
    // @todo: Implement it!
    return false;
  }

  /**
   * Logout
   * @returns {Promise<any>}
   */
  logout() {
    this.tokenSubject.next(null);
    this.userSubject.next(null);
    return this.storage.remove(this.TOKEN_STORAGE_KEY);
  }

  /**
   * Send forgot password email to given address
   *
   * @param {string} email
   * @returns {Observable<Object>}
   */
  forgotPassword(email: string) {
    return this.http.post<void>(`${this.config.API.ENDPOINT}/auth/password/forgot`, {
      email: email
    }).catch(this.handleError.bind(this));;
  }
}
