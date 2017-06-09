import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/map';

import { ModelVisite } from '../../models/ModelVisite';
/*
  Generated class for the VisiteProvider provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class VisiteProvider {

	jsonApiUrl='http://172.29.56.5/~cdervieux/testjson/visite.php';
  constructor(public http: Http) {  }

  load(): Observable<ModelVisite[]>{
  return this.http.get(`${this.jsonApiUrl}?idControleur=2`).map(res=> <ModelVisite[]>res.json());
  }

}
