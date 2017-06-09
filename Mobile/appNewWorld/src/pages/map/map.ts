import { Component,ViewChild,ElementRef } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ModelVisite } from '../../models/ModelVisite';
import { VisiteProvider } from '../../providers/visite/visite';

/**
 * Generated class for the MapPage page.
 *
 * See http://ionicframework.com/docs/components/#navigation for more info
 * on Ionic pages and navigation.
 */
 declare var google;

@IonicPage()
@Component({
  selector: 'page-map',
  templateUrl: 'map.html',
})
export class MapPage {

  @ViewChild('map') mapElement: ElementRef;
  map: any;
  start = 'gap, france';
  end = 'briançon, france';
  directionsService = new google.maps.DirectionsService;
  directionsDisplay = new google.maps.DirectionsRenderer;

  constructor(public navCtrl: NavController, public navParams: NavParams, private controleVisite : VisiteProvider) {
  controleVisite.load().subscribe(waypts=>{
  this.waypts=waypts;
  console.log("dans le constructeur");
  console.log(this.waypts);
  this.calculateAndDisplayRoute();
  });
  }

  ionViewDidLoad(){
    this.initMap();
    // this.calculateAndDisplayRoute();
  }

  initMap() {
    this.map = new google.maps.Map(this.mapElement.nativeElement, {
      zoom: 12,
      center: {lat: 44.556, lng: 6.079}
    });

    this.directionsDisplay.setMap(this.map);
}
//tableau des points de passage
  waypts = [];
calculateAndDisplayRoute() {
    this.directionsService.route({
      origin: this.start,
      destination: this.end,
      waypoints: this.waypts,
      optimizeWaypoints: true,
      travelMode: 'DRIVING',
      drivingOptions: {departureTime: new Date(Date.now() + 1000*60*60),trafficModel: 'optimistic'}
    }, (response, status) => {
      if (status === 'OK') {
        this.directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
 }




