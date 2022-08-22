<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use RealRashid\SweetAlert\Facades\Alert;
// use RealRashid\SweetAlert\Facade\Alert;
use PDF;

class RiesgosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riesgos = Risk::with('user')->get();
        return view('riesgos.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Riesgos.crear');
    }

    /**
     * Store a newly created resource in storage.
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
        
                $riesgo = Risk::create([
                    'name'              =>  $request['name'],
                    'description'       =>  $request['description'],
                    //'location'          =>  $request['location'],
                    'total_cost'        =>  $request['total_cost'],
                    //'views_counter'     =>  $request['views_counter'],
                    'user_id'           =>  $request['user_id'],
                ]);
        
                Alert::success('Éxito', 'Registro creado con éxito');
                return redirect()->route('registro10.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riesgo = Risk::findOrFail($id);
        return view('Riesgos.ver',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riesgo = Risk::findOrFail($id);
        return view('Riesgos.editar',get_defined_vars());
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

        $riesgo = Risk::findOrFail($id);

        $riesgo->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro10.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riesgo = Risk::findOrFail($id);
        $riesgo->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro10.index');
    }

    public function generatePDF()
    {
        $variables = Risk::with('user')->get();
        //especificar area en variable title
        $title= "AREA 10";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }
}
