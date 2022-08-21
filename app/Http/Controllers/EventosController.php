<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use RealRashid\SweetAlert\Facades\Alert;


class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Event::with('user')->get();
        return view('Eventos.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Eventos.crear');
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
           'name' => 'required|max:255',
           'description' => 'nullable|max:255',
           //'location' => 'required|max:255',
           'total_cost'    =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
           
        ]);

        $eventos = Event::create([
            'name'         => $request['name'],
            'description'   => $request['description'],
            //'location'   => $request['location'],
            'total_cost'    => $request['total_cost'],
            'user_id'       =>  $request['user_id'],
            //'start_date'     => $request['start_date'],
        ]);

        Alert::success('Éxito', 'Evento guardado con éxito');
        return redirect()->route('registro7.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos= Event::findOrFail($id);
        return view('Eventos.ver',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventos = Event::findOrFail($id);
        return view('Eventos.editar',get_defined_vars());
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
            'name'         => 'required|max:255',
            'description'   => 'required|max:255',
            //'location'   => $request['location'],
            'total_cost'       =>  ['required', 'regex:/^(?:[1-9]\d+|\d)(?:\.\d?\d)?$/m'],
            //'start_date'     => $request['start_date'],
            //'user_id'           =>  $request['user_id'],
        ]);

        $eventos = Event::findOrFail($id);

        $eventos->update([
            'name'              =>  $request['name'],
            'description'       =>  $request['description'],
            //'location'          =>  $request['location'],
            'total_cost'        =>  $request['total_cost'],
            //'views_counter'     =>  $request['views_counter'],
            'user_id'           =>  $request['user_id'],
        ]);

        Alert::success('Éxito', 'Evento actualizado con éxito');
        return redirect()->route('registro7.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventos = Event::findOrFail($id);
        $eventos->delete();
        Alert::success('Éxito', 'Evento eliminado con éxito');
        return redirect()->route('registro7.index');
    }
}
