<?php

namespace App\Http\Controllers;

use App\Models\Database;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class BasesDatosController extends Controller
{
    /**
     * Index para las bases de datos
     * 
     * Despliega una lista de las bases de datos 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databases = Database::with('user')->get();
        return view('BasesDatos.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BasesDatos.crear');
    }

    /**
     * Store a newly created resource in storage.
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

        //TODO: CHANGE USER_ID TO auth()->id

        $database = Database::create([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro creado con éxito');
        return redirect()->route('registro3.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $database = Database::findOrFail($id);
        return view('BasesDatos.ver',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $database = Database::findOrFail($id);
//        dd($anuncio);
        return view('BasesDatos.editar', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
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

        $database = Database::findOrFail($id);

        $database->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro3.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $database = Database::findOrFail($id);
        $database->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro3.index');
    }

    //copiar este metodo en todos pero con su respectivo Modelo
    public function generatePDF()
    {
        $variables = Database::with('user')->get();
        //especificar area en variable title
        if(empty($variables)){
            Alert::error('Error', 'No hay registros para mostrar');
            return redirect()->route('registro3.index');
        }
        $title= "AREA 3";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }
}
