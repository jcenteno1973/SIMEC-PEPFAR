<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\color_request;
use App\Http\Controllers\Controller;
use App\Models\lista_color;

class coloresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $color= lista_color::_nombre($request->get('nombre'))->orderBy('id_lista_color', 'Asc')->paginate(10);
        return view('catalogos/lista_colores/buscar_color',compact('color'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalogos/lista_colores/nuevo_color');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(color_request $request)
    {
        //
        $color= new lista_color();       
        $color->desc_color=$request->desc_color;
        $color->estado_registro=$request->estado_registro;
        $color->save();
        return redirect()->route('administracion.color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $color= lista_color::find($id);
         //dd($ubicacion);
         return view('catalogos/lista_colores/editar_color')->with('color',$color);        
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
        //
        $color= lista_color::find($id);      
        $color->desc_color=$request->desc_color;
        $color->estado_registro=$request->estado_registro;
        $color->save();
        return redirect()->route('administracion.color.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
