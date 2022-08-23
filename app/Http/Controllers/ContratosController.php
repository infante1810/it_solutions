<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\TypeContract;
use App\Models\Status;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contract::with('user')->get();
        return view('Contratos.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Contratos.crear');
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

        $contrato = Contract::create([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro guardado con éxito');
        return redirect()->route('registro6.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contract::findOrFail($id);
        
        return view('Contratos.ver',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contract::findOrFail($id);
        
        return view('Contratos.editar', get_defined_vars());
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
        // dd($request->all());
        $request->validate([
            'name'          =>  'required|max:255',
            'description'   =>  'required|max:255',
            //'location'      =>  'required|max:255',
            'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
            //'views_counter'  =>  'required|numeric|gt:0',
        ]);

        $contrato = Contract::findOrFail($id);
        $contrato->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro6.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contract::findOrFail($id);
        $contrato->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro6.index');
    }
    //copiar este metodo en todos pero con su respectivo Modelo
    public function generatePDF()
    {
        $variables = Contract::with('user')->get();
        //especificar area en variable title
        if(empty($variables)){
            Alert::error('Error', 'No hay registros para mostrar');
            return redirect()->route('registro6.index');
        }
        $title= "AREA 6";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }
}
