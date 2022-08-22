<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use RealRashid\SweetAlert\Facades\Alert;

class DepartamentosController extends Controller
{
    /**
     * Index para los departamentos
     * 
     * Despliega una lista de los departamentos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Department::with('user')->get();
        return view('Departamentos.index',get_defined_vars());
    }

    /**
     * Crear departamento
     * 
     * Despliega la vista para crear el departamento
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Departamentos.crear');
    }

    /**
     * Guardar departamento
     * 
     * Guarda el departamento en la base de datos
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
        ]);

        $departamento = Department::create([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro creado con éxito');
        return redirect()->route('departamentos.index');
    }

    /**
     * Mostrar departamento
     * 
     * Muestra el departamento especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Department::findOrFail($id);
        
        return view('Departamentos.ver',get_defined_vars());
    }

    /**
     * Editar departamento
     * 
     * Muetra el formulario de edicion del departamento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Department::findOrFail($id);
        return view('Departamentos.editar', get_defined_vars());
    }

    /**
     * Actualizacion del departamento
     * 
     * Actualiza el departamento especificado
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
        ]);

        $departamento = Department::findOrFail($id);

        $departamento->update([
            'name'              =>  $request['body'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Registro actualizado con éxito');
        return redirect()->route('departamentos.index');
    }

    /**
     * Eliminar departamento
     * 
     * Elimina el departamento especificado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Department::findOrFail($id);
        $departamento->delete();
        Alert::success('Éxito', 'Registro eliminado con éxito');
        return redirect()->route('departamentos.index');
    }
}
