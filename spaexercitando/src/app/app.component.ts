
import { Component } from '@angular/core';

@Component({
  selector: 'spa-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'spaexercitando';
  nome: String = '';
  sobrenome: String = '';
  rg: String = '';
  cpf: String = ''; 
}


