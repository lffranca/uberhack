import { Component, ViewChild } from '@angular/core';
import { Platform, NavController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

import { LoginPage } from '../pages/login/login';
import { STORAGE_TOKEN_AUTH } from '../constants/storage-constant';
import { HomePage } from '../pages/home/home';

@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild('content') private _navController: NavController;

  public rootPage: any = this._verifyAuth();

  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen) {
    platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      statusBar.styleDefault();
      splashScreen.hide();
    });
  }

  goHome() {
    this._navController.setRoot(HomePage);
  }

  logout() {
    localStorage.clear();

    this._navController.setRoot(LoginPage);
  }

  private _verifyAuth() {
    if(localStorage.getItem(STORAGE_TOKEN_AUTH)) {
      return HomePage;
    } else {
      return LoginPage;
    }
  }
}

