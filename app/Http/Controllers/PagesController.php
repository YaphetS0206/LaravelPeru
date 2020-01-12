<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Usar obligatoriamente App
use App;

class PagesController extends Controller
{
    public function inicio(){
        //Codigo para traer toda nuestros datos 
        //insertados
        //$notas = App\Nota::all();
        $notas = App\Nota::paginate(2);
        return view('welcome', compact('notas'));
    }

     public function detalle($id)
     {
         //Aqui valida si existe sino redirije al 404
        $nota= App\Nota::findOrFail($id);

        return view('detalle', compact('nota'));
     }
     public function crear(Request $request)
     {
      //se envia los datos en json , respaldo
        //return $request->all();

        //validacion
            $request->validate([
                'nombre' =>'required',
                'descripcion'=>'required'
            ]);


        $notaNueva = new App\Nota;
        $notaNueva->nombre= $request->nombre;
        $notaNueva->descripcion= $request->descripcion;

        //guardar en la base de datos
        $notaNueva->save();

        //retornamos como mensaje en el back para el redireccionamiento
        return back()->with('mensaje','Nota Agregada!');
        }
        public function editar($id)
        {
            $nota = App\Nota::findOrFail($id);
            return view('notas.editar',compact('nota'));
        }

        public function actualizar(Request $request, $id)
        {
            $notaActualizar = App\Nota::findOrFail($id);
            $notaActualizar->nombre = $request->nombre;
            $notaActualizar->descripcion = $request->descripcion;

            //guardamos los campos seleccionados
            $notaActualizar->save();

            return back()->with('mensaje','Nota Actualizada');
        }

        public function eliminar($id){
            $notaEliminar = App\Nota::findOrFail($id);
            //ejecutamos el delete
            $notaEliminar->delete();
            //ejecutamos el with para mandar mensaje
            return back()->with('mensaje','Nota Eliminada');
        }

        public function fotos(){
            return view('fotos');
        }

        public function blog()
        {
            return view('blog');
        }
        public function nosotros($nombre = null){
            $equipo =['Ignacio', 'Juanito', 'Pedrito'];

            //return view('nosotros',['equipo'=>$equipo]);
        
            return view('nosotros', compact('equipo','nombre'));
        }
}
