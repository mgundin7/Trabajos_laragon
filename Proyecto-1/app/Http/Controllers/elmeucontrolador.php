<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class elmeucontrolador extends Controller
{
    if(tprofessor::where('dni',$request->dni)->doesntExist())
        {    
        $todo=new tprofessor();
        $todo->nom=$request->nombre;
        $todo->cognom=$request->apellido;  
        $todo->dni=$request->dni;      
        $todo->save();
        return redirect()->route('dades-insertar')->with('success','creat correctament');
        }
        else 
        {
        return redirect()->route('dades-insertar')->with('messagednierror','dni ja existeix');
        }
}
