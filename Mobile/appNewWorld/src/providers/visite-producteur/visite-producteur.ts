import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/map';
import { ModelVisiteProducteur } from '../../models/ModelVisiteProducteur';
/*
  Generated class for the VisiteProducteurProvider provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class VisiteProducteurProvider {
	
	jsonApiUrl='http://172.29.56.5/~cdervieux/testjson/visiteProducteur.php';
  constructor(public http: Http) {
    console.log('Hello VisiteProducteurProvider Provider');
  }

  load(): Observable<ModelVisiteProducteur[]>{
  return this.http.get(`${this.jsonApiUrl}?idControleur=2`).map(res=> <ModelVisiteProducteur[]>res.json());

	}
}
