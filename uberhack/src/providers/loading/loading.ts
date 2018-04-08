import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {Loading, LoadingController} from "ionic-angular";
import {Observable} from "rxjs/Observable";

/*
  Generated class for the LoadingProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class LoadingProvider {

  private loading: Loading;
  private loadingCount: number = 0;

  constructor(
    private loadingCtrl: LoadingController
  ) {
  }

  /**
   * Create a loading or update the existing
   * @param {string} content
   * @param {number} weight
   */
  public load(content: string, weight: number = 1) {
    if (this.loading) {
      this.update(content);
    } else {
      this.create(content);
    }

    this.loadingCount += weight;
  }

  /**
   * Dismiss the loading
   */
  public dismiss() {
    const observable = new Observable((observer) => {
      if (!this.loadingCount || !this.loading) {
        observer.next();
      }

      this.loadingCount--;

      if (!this.loadingCount) {
        this.loading.dismiss().then(() => {
          delete this.loading;
          observer.next();
        });
      }
    });

    observable.subscribe(() => {});

    return observable;
  }

  /**
   * Create a new loading
   * @param {string} content
   */
  private create(content: string) {
    this.loading = this.loadingCtrl.create({
      content,
      dismissOnPageChange: false,
    });

    this.loading.present();
  }

  /**
   * Update the existing loading
   * @param {string} content
   */
  private update(content: string) {
    this.loading.setContent(content);
  }
}
