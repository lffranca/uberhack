import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { LoginPage } from '../pages/login/login';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { NgReduxModule } from '@angular-redux/store';
import { CounterActions } from '../actions';
import { MapPage } from '../pages/map/map';
import { RegisterPage } from '../pages/register/register';
import { ProblemasPage } from '../pages/problemas/problemas';
import { SearchBusPage } from '../pages/search-bus/search-bus';
import { Ionic2RatingModule } from "ionic2-rating";
import { ConfirmPage } from '../pages/confirm/confirm';
import { SucessoPage } from '../pages/sucesso/sucesso';
import {APP_CONFIG, APP_CONFIG_VALUE} from "./app.config";
import { HTTP_INTERCEPTORS } from "@angular/common/http";
import { HttpClientModule } from '@angular/common/http';
import {AuthInterceptor} from "../providers/auth/auth.interceptor";
import {AuthProvider} from "../providers/auth/auth";
import {ApiProvider} from "../providers/api/api";
import {UserProvider} from "../providers/user/user";
import {LoadingProvider} from "../providers/loading/loading";
import {IonicStorageModule} from "@ionic/storage";
import { SearchAppPage } from '../pages/search-app/search-app';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    LoginPage,
    MapPage,
    RegisterPage,
    ProblemasPage,
    SearchBusPage,
    ConfirmPage,
    SucessoPage,
    SearchAppPage,
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp, {
      monthNames: ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'],
      monthShortNames: ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez' ],
      dayNames: ['domingo', 'segunda-feira', 'terça-feira', 'quarta-feita', 'quinta-feita', 'sexta-feira', 'sábado' ],
      dayShortNames: ['dom', 'seg', 'ter', 'quar', 'qui', 'sex', 'sab' ],
    }),
    NgReduxModule,
    FormsModule,
    ReactiveFormsModule,
    Ionic2RatingModule,
    HttpClientModule,
    IonicStorageModule.forRoot(),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    LoginPage,
    MapPage,
    RegisterPage,
    ProblemasPage,
    SearchBusPage,
    ConfirmPage,
    SucessoPage,
    SearchAppPage,
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    {provide: APP_CONFIG, useValue: APP_CONFIG_VALUE},
    {provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true},
    CounterActions,

    // API Providers

    AuthProvider,
    ApiProvider,
    UserProvider,
    LoadingProvider,
  ]
})
export class AppModule {}
