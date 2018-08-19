import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,App } from 'ionic-angular';
import { MainPage } from '../main/main';
import { ContactsPage } from '../contacts/contacts';
import { HomePage } from '../home/home';


/**
 * Generated class for the MenuPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-menu',
  templateUrl: 'menu.html',
})
export class MenuPage {

  tab1Root: any = 'MainPage';
  tab2Root: any = 'ContactsPage';
  myIndex: number;
  rootPage:any;

  constructor(public navCtrl: NavController, public navParams: NavParams,public app: App) {

    this.myIndex = navParams.data.tabIndex || 0;
  

    
  }


  

  ionViewDidLoad() {
    console.log('ionViewDidLoad MenuPage');
  }

  
}