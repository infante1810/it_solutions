<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Arr;
use App\Models\Comment;
//se App\Models\Department;
// use App\Models\User;
// use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ComentariosController extends Controller
{
    /**
     * Index para los comentarios
     *
     * Despliega una lista de los comentarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentario = Comment::with('user')->get();
        return view('comentarios.index',get_defined_vars());
    }

    /**
     * Crear comentario
     *
     * Despliega la vista para crear el comentario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comentarios.crear');
    }

   /**
     * Guardar comentario
     *
     * Guarda el comentario en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required|max:255',
            'description'   =>  'required|max:255',
            //'location'      =>  'required|max:255',
            'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
            //'views_counter'  =>  'required|numeric|gt:0',
        ]);
        //TODO: fix user_id to auth()->id
        $comentario = Comment::create([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);



        Alert::success('Éxito', 'Registro agregado con éxito');
        return redirect()->route('registro4.index');
    }

    /**
     * Mostrar comentario
     *
     * Muestra el comentario especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comment::findOrFail($id);
        return view('comentarios.ver',get_defined_vars());
    }

    /**
     * Editar comentario
     *
     * Muetra el formulario de edicion del comentario
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       // dd($comentario);
        $comentario = Comment::findOrFail($id);
        return view('comentarios.editar', get_defined_vars());
    }

    /**
     * Actualizacion del comentario
     *
     * Actualiza el comentario especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>  'required|max:255',
            'description'   =>  'required|max:255',
            //'location'      =>  'required|max:255',
            'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
            //'views_counter'  =>  'required|numeric|gt:0',
        ]);

        $comentario = Comment::findOrFail($id);

        $comentario->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
         //   'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
         //   'views_counter'     =>  $request['views_counter']
         'user_id'           =>  $request['user_id'],
            
            
        ]);
        //TODO: fix user_id to auth()->id
        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro4.index');
    }

    /**
     * Eliminar comentario
     *
     * Elimina el comentario especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comment::findOrFail($id);
        $comentario->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro4.index');
    }

    //copiar este metodo en todos pero con su respectivo Modelo
    public function generatePDF()
    {
        $variables = Comment::with('user')->get();
        //especificar area en variable title
        $title= "AREA 4";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }
}
