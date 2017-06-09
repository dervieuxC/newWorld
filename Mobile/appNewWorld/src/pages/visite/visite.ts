import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ModelVisiteProducteur } from '../../models/ModelVisiteProducteur';
import { VisiteProducteurProvider } from '../../providers/visite-producteur/visite-producteur';
/**
 * Generated class for the VisitePage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
@IonicPage()
@Component({
  selector: 'page-visite',
  templateUrl: 'visite.html',
})
export class VisitePage {

	producteurs: ModelVisiteProducteur[];
  constructor(public navCtrl: NavController, public navParams: NavParams,private producteur: VisiteProducteurProvider ) {
	producteur.load().subscribe(producteurs => {
		this.producteurs = producteurs;
     })  
   }
}
