<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;

class controladorrelacions extends Controller
{
    public function f_consultartaules()
    {
      $dades = Usuario::whereHas('rols')->get(); //usuaris amb rols, taula rol_usuario
      $dades2 = Usuario::doesntHave('rols')->get(); //usuaris sense rols, taula rol_usuario       
 
      return view('consultartaules', compact('dades'),compact('dades2'));     
    }
}
