import {InjectionToken} from "@angular/core";

export interface AppConfig {
    API: {
        ENDPOINT: string,
        CLIENT_ID: number,
        CLIENT_SECRET: string,
    }
}

export const APP_CONFIG_VALUE: AppConfig = {
    API: {
        ENDPOINT: 'http://kritk.iget.com.br/api',
        CLIENT_ID: 3,
        CLIENT_SECRET: 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    }
};

export const APP_CONFIG = new InjectionToken<AppConfig>('app.config');