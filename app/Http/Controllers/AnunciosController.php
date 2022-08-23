<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use RealRashid\SweetAlert\Facades\Alert;
//AGREGAR use PDF para que jale el pdf
use PDF;

class AnunciosController extends Controller
{
    /**
     * Index para los anuncios
     *
     * Despliega una lista de los anuncios
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Announcement::with('user')->get();
        return view('Anuncios.index',get_defined_vars());
    }

    /**
     * Crear anuncio
     *
     * Despliega la vista para crear el anuncio
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Anuncios.crear');
    }

    /**
     * Guardar anuncio
     *
     * Guarda el anuncio en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'          =>  'required|max:255',
            'description'   =>  'required|max:255',
            //'location'      =>  'required|max:255',
            'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
            //'views_counter'  =>  'required|numeric|gt:0',
        ]);

        //TODO: CHANGE USER_ID TO auth()->id

        $anuncio = Announcement::create([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro creado con éxito');
        return redirect()->route('registro1.index');
    }

    /**
     * Mostrar Anuncio
     *
     * Muestra el anuncio especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anuncio = Announcement::findOrFail($id);
        return view('Anuncios.ver',get_defined_vars());
    }

    /**
     * Editar anuncio
     *
     * Muetra el formulario de edicion del anuncio
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anuncio = Announcement::findOrFail($id);
//        dd($anuncio);
        return view('Anuncios.editar', get_defined_vars());
    }

    /**
     * Actualizacion del anuncio
     *
     * Actualiza el anuncio especificado
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

        $anuncio = Announcement::findOrFail($id);

        $anuncio->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro1.index');
    }

    /**
     * Eliminar anuncio
     *
     * Elimina el anuncio especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anuncio = Announcement::findOrFail($id);
        $anuncio->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro1.index');
    }
    //copiar este metodo en todos pero con su respectivo Modelo
    public function generatePDF()
    {
        $variables = Announcement::with('user')->get();
        //especificar area en variable title
        if(empty($variables)){
            Alert::error('Error', 'No hay registros para mostrar');
            return redirect()->route('registro1.index');
        }
        $title= "AREA 1";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }
}
