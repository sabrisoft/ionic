import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,App } from 'ionic-angular';
import { HomePage } from '../home/home';

/**
 * Generated class for the LogoutPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-logout',
  templateUrl: 'logout.html',
})
export class LogoutPage {

  constructor(public navCtrl: NavController, public navParams: NavParams,public app:App) {
  }

  ionViewDidLoad() {
  //  localStorage.clear();
    localStorage.removeItem('username');
    //const root = this.app.getRootNav();
    //root.popToRoot();
    this.navCtrl.setRoot(HomePage);
    this.navCtrl.popToRoot();
    this.navCtrl.push(HomePage); 

    console.log('ionViewDidLoad LogoutPage');
  }

}
