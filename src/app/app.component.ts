import { Component } from '@angular/core';

@Component({
  selector: 'file-manager',
  templateUrl: './app.component.html'
})
export class AppComponent {
  private works = [
    {
      title: 'Work 1',
      description: 'A description'
    },
    {
      title: 'Work 2',
      description: 'A description again'
    }
  ]
}
