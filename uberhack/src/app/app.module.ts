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
    Ionic2RatingModule
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
    CounterActions
  ]
})
export class AppModule {}
