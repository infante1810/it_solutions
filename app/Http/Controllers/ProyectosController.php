<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('user')->get();   
        return view('Proyectos.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proyectos.crear');
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
            'description'   =>  'max:255',
            'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],

        ]);
        

        // dd($request->all());

        //Crear  proyecto
        $project = Project::create([
            'name'          =>  $request['name'],
            'description'   =>  $request['description'],
            'total_cost'    =>  $request['total_cost'],
            'user_id'   =>  $request['user_id'],
        ]);
        // $project->save();


        Alert::success('Éxito', 'Registro guardado con éxito');
        return redirect()->route('registro9.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        setlocale(LC_MONETARY, 'es_MX');

        $project = Project::findOrFail($id);
        return view('Proyectos.ver', get_defined_vars());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
//        dd($project);
        return view('Proyectos.editar', get_defined_vars());
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

        $project = Project::findOrFail($id);

        // Actualizar  proyecto
        $project->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('registro9.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('registro9.index');
    }

    //copiar este metodo en todos pero con su respectivo Modelo
    public function generatePDF()
    {
        $variables = Project::with('user')->get();
        //especificar area en variable title
        if(empty($variables)){
            Alert::error('Error', 'No hay registros para mostrar');
            return redirect()->route('registro9.index');
        }
        $title= "AREA 9";
        $total=0;
        foreach ($variables as $variable) {
            $total+=$variable->total_cost;
        }
        $pdf = PDF::loadView('testPDF', get_defined_vars());
     
        return $pdf->download('ReporteDeArea.pdf');
    }

}
