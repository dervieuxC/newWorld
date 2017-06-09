import { Component } from '@angular/core';

import { VisitePage } from '../visite/visite';
import { MapPage } from '../map/map';

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab1Root = VisitePage;
  tab2Root = MapPage;


  constructor() {

  }
}
