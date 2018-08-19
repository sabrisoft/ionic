import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams,Nav } from 'ionic-angular';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

@IonicPage()
@Component({
  selector: 'page-profile',
  templateUrl: 'profile.html',
})
export class ProfilePage {
  profileList:any;
  userNames:any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http:Http, public nav:Nav) {
    this.nav=nav;
    this.userNames=localStorage.getItem('username');
    //const data = JSON.parse(localStorage.getItem('username'));
    //this.userDetails = data.userLogin;
  
  }

  ionViewDidLoad() {
    var id='10';
    this.getProfile(id);    
    console.log('ionViewDidLoad ProfilePage');
  }

  getProfile(id)
  {
        var url = "http://localhost/ionic_api/umpgo/profile.php?id="+id;
            
        this.http.get(url).subscribe( data => {
        this.profileList = JSON.parse(data["_body"]);
        }, err =>{
        console.log(err);
        });
  }

}
