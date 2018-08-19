import { Component,ViewChild } from '@angular/core';
import { Nav,Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { HomePage } from '../pages/home/home';
import {ProfilePage } from '../pages/profile/profile';
import {LogoutPage } from '../pages/logout/logout';
import {MenuPage } from '../pages/menu/menu';


@Component({
  templateUrl: 'app.html'
})
export class MyApp {
  @ViewChild(Nav) nav: Nav;
  rootPage:any = HomePage;
  //rootPage:any
  pages: Array<{title: string, component: any}>;

  constructor(public platform: Platform, public statusBar: StatusBar, public splashScreen: SplashScreen) {

    platform.ready().then(() => {
      //statusBar.styleDefault();
      //splashScreen.hide();
      this.checkPreviousAuthorization();
      this.initializeApp();
    
      this.pages = [
        { title: 'Profile', component: ProfilePage },
        { title: 'Logout', component: LogoutPage }
      
      ];

    });

    
  }

  checkPreviousAuthorization(): void { 
    if((localStorage.getItem('username') === "undefined" || localStorage.getItem('username') === null || localStorage.getItem('username') === "")) 
    {
      this.rootPage = HomePage;
     

    } else {
      this.rootPage = MenuPage;
    }
  }  

  initializeApp() {
    this.platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      this.statusBar.styleDefault();
      this.splashScreen.hide();
    });
  }

  openPage(page) {
    // Reset the content nav to have just this page
    // we wouldn't want the back button to show in this scenario
    this.nav.setRoot(page.component);
  }

}

