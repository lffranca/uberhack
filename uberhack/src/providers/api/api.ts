import {Inject, Injectable} from '@angular/core';
import 'rxjs/add/operator/map';
import {APP_CONFIG, AppConfig} from "../../app/app.config";
import {HttpClient, HttpErrorResponse} from "@angular/common/http";
import {AlertController} from "ionic-angular";
import "rxjs/add/observable/empty";

@Injectable()
export class ApiProvider {

  constructor(
    public http: HttpClient,
    public alertController: AlertController,
    @Inject(APP_CONFIG) public config: AppConfig,
  ) {

  }

  /**
   * Handle all HttpErrorResponse errors
   *
   * @param {HttpErrorResponse} error
   * @returns {Observable<any>}
   */
  handleError(error: HttpErrorResponse) {
    switch (error.status) {
      case 0:
        this.handleOfflineError(error);
        break;
      case 403:
        this.handleForbiddenError(error);
        break;
      case 422:
        this.handleFormError(error);
        break;
      case 500:
        this.handleInternalError(error);
        break;
    }

    throw error;

    // return Observable.empty();
  }

  /**
   * Handle internal errors (uncaught errors)
   * @param {HttpErrorResponse} error
   */
  handleInternalError(error: HttpErrorResponse) {
    this.presentErrorAlert('Ocorreu um erro interno, tente novamente.');
  }

  /**
   * Handle form validation errors
   * @param {HttpErrorResponse} error
   */
  handleFormError(error: HttpErrorResponse) {
    let errors = [];
    let failedFields = JSON.parse(error.error).errors;
    for (let field in failedFields) {
      errors.push(failedFields[field]);
    }
    let message = errors.join(' ');

    this.presentErrorAlert(message);
  }

  /**
   * Handle Offline Errors
   * @param {HttpErrorResponse} error
   */
  handleOfflineError(error: HttpErrorResponse) {
    this.presentErrorAlert('Parece que você está sem internet!');
  }

  /**
   * Handle Offline Errors
   * @param {HttpErrorResponse} error
   */
  handleForbiddenError(error: HttpErrorResponse) {
    this.presentErrorAlert('Você não tem autorização para isso!');
  }

  /**
   * Present an error alert containing given message
   * @param {string} message
   */
  private presentErrorAlert(message: string) {
    this.alertController.create({
      title: 'Ooops!',
      message,
      buttons: ['Ok']
    }).present();
  }
}
