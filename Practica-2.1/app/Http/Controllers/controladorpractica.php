<?php

namespace App\Http\Controllers;

use App\Models\tpracticamarcos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class controladorpractica extends Controller
{
    public function f_formulari() 
    {   
        $dades=tpracticamarcos:: all();
        return view('insertar', compact("dades"));        
    }

    function f_insert(Request $request) 
    {
        $request->validate(
        [
        'matricula'=>"required|min: 7| max: 7",
        'marca'=>"required|min: 1| max: 20",
        'modelo'=>"required|min: 1| max: 30"
        ],
        [
        'matricula.required'=> "la matricula es obligatoria",
        'matricula.min'=>"caracters mínim de la matricula son: 7",
        'matricula.max'=>"caracters máxims de la matricula son: 7",

        'marca.required'=> "la marca es obligatoria",
        'marca.min'=>"caracters mínim de la marca son: 1",
        'marca.max'=>"caracters máxims de la marca son: 20",

        'modelo.required'=> "El modelo es obligatorio",
        'modelo.min'=>"caracters mínim del model son: 1",
        'modelo.max'=>"caracters máxims del model son: 30",

        'año.required'=> "El año es obligatorio",
        'año.int'=> "El año debe ser un número",
        'año.min'=> "El año debe tener 4 digitos",
        'año.max'=> "El año debe tener 4 dígitos"
        ]
        );
if(tpracticamarcos::where('matricula',$request->matricula)->doesntExist())
        {    
        $todo=new tpracticamarcos();
        $todo->marca=$request->marca;
        $todo->modelo=$request->modelo;  
        $todo->matricula=$request->matricula;   
        $todo->año=$request->año;   
        $todo->save();
        return redirect()->route('dades-insertar')->with('success','creat correctament');
        }
        else 
        {
        return redirect()->route('dades-insertar')->with('messagematriculaerror','matricula ja existeix');
    }
}
    
    public function f_consultar()
        {
        $dades=tpracticamarcos::all();
        //return $dades; //Tornarà JSON
        return view('consultar', compact('dades'));            
        }
    public function f_consultardetalle(string $matricula)
    {
        $fila = tpracticamarcos::query();    
        $fila->where('matricula','like',"$matricula");        
        $dades = $fila->get();     
        //dd($dades);    //per a mirar les dades
        return view('consultardetalle',compact('dades'));
        //return $dades;        
 
    }
      public function f_formulari_buscar()
    {
        $dades=tpracticamarcos::all();
        return view('buscar',$dades);
    }
 
public function f_buscar (Request $request)
    {
        $request->validate(
            [
                'matricula'=>'required'
            ],
            [
            'matricula.required'=>'La matricula es obligatoria'            
            ]            
        );
 
        $matricula=$request->matricula;
        //dd($nombre); //comprova el valor que li està arribant del formulari
 
 
        $fila = tpracticamarcos::query();    
        $fila->where('matricula','like',"$matricula");  //tots els noms que contidran la paraula nom
        //$fila->where('nom','like',"$nombre");  //tots els noms que coincideixen amb la paraula nom
 
        $fila->orderBy('matricula', 'desc'); //ordenar descendenment, asc o res per ascedentment
 
        $dades = $fila->get();             
        //$dades = $fila->paginate(5); //mostra màxim 5 files
        //dd($dades); //comprovem les dades calculades
        return view('buscarresultado', compact('dades'));  

        dd($matricula); //comprova el valor que li està arribant del formulari 
        dd($dades); //comprovem les dades calculades
    }
     public function f_borrar()
    {
        $dades=tpracticamarcos::all();
        //return $dades; //Tornarà JSON
        return view('borrar', compact('dades'));          
    }
 
    public function f_borrarfila(string $matricula)
    {
        $fila = tpracticamarcos::query();    
        $fila->where('matricula','like',"$matricula");        
        $fila->delete();
        return redirect()->route('dades-borrar')->with('success','eliminat correctament');      
    }   
 
    public function f_modificar()
    {
        $dades=tpracticamarcos::all();
        //return $dades; //Tornarà JSON
        return view('modificar', compact('dades'));            
 
    }
 
    public function f_modificarfila (string $matricula)
    {
        $fila = tpracticamarcos::query();    
        $fila->where('matricula','like',"$matricula");        
        $fila = $fila->get(); 
        //dd($fila);     
        return view('modificarfila',compact('fila'));                     
    }
 
    public function f_actualitzarfila (Request $request, tpracticamarcos $fila)
    {
        $request->validate(
            [
                'matricula'=> 'required|min: 7|max: 7'
            ],
            [
                'matricula.required'=>"La matricula es obligatoria",
                'matricula.min'=>"7 caracters mínim",
                'matricula.max'=>"7 caracters maxim"
            ]
            );
 
 
        $fila->matricula=$request->matricula;
        $fila->marca=$request->marca;
        $fila->modelo=$request->modelo;
        $fila->año=$request->año;
        //dd($fila);
        $fila->update();
        return redirect()->route('dades-actualitzarfila',$fila)->with('success','actualitzat correctament');
 
    }
}
