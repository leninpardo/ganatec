<?php

class ProveedoresController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function __construct()
    {        
        $this->beforeFilter(function(){
            if(!Auth::check()) {
                return View::make('error');
            }
        });
    }

    public function getIndex() {
        return View::make('proveedor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getProveedor() {
        $proveedor = DB::table('proveedores as p')
                    ->select('p.id','p.razon_social','p.ruc','p.direccion')
        			->where('p.estado', '1')
        			->orderBy('p.id', 'DESC')
        			->get();
        return $proveedor;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $proveedor = proveedores::select('id','nombre','razon_social','ruc','direccion')
                    ->where('id', $id)
                    ->get();
        return $proveedor;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $obj = new proveedores;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $obj->nombre = Input::get('nombre');
                $obj->razon_social = Input::get('razon_social');
                $obj->ruc = Input::get('ruc');
                $obj->direccion = Input::get('direccion');
                $obj->estado = 1;
                $obj->save();
                $obj_proveedores = DB::table('proveedores as p')
                        ->select('p.id', 'p.razon_social', 'p.ruc', 'p.direccion')
                        ->where('p.estado', '1')
                        ->orderBy('p.id', 'DESC')
                        ->take(1)
                        ->get();
                return $obj_proveedores;
                break;

            case 'edit':
                $id = Input::get('id');
                $obj = proveedores::find($id);
                $obj->nombre = Input::get('nombre');
                $obj->razon_social = Input::get('razon_social');
                $obj->ruc = Input::get('ruc');
                $obj->direccion = Input::get('direccion');
                $obj->save();
                $obj_proveedores =
                DB::table('proveedores as p')
                        ->select('p.id', 'p.razon_social', 'p.ruc', 'p.direccion')
                        ->where('p.id', $id)               
                        ->get();
                return $obj_proveedores;
                break;

            case 'del':
                $id = Input::get('id');
                $enfermedad = proveedores::find($id);
                $enfermedad->estado = 0;
                $enfermedad->save();
                break;
        }
    }

    public function store() {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}