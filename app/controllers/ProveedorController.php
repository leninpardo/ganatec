<?php

class ProveedorController extends \BaseController {

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
                    ->select('p.idproveedor','p.razon_social','p.ruc','p.direccion')
        			->where('p.estado', '1')
        			->orderBy('p.idproveedor', 'DESC')
        			->get();
        return $proveedor;
    }

    public function getEditar()
    {
        $id = Input::get('id');
        $proveedor = proveedores::select('idproveedor','nombre','razon_social','ruc','direccion')
                    ->where('idproveedor', $id)
                    ->get();
        return $proveedor;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $enfermedad = new Enfermedad;

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $enfermedad->descripcion = Input::get('descripcion');
                $enfermedad->idanimal = Input::get('animal');
                $enfermedad->idlote = Input::get('loted');
                $enfermedad->estado = 1;
                $enfermedad->save();
                $animal = Nacimiento::find(Input::get('animal'));
                $animal->idlote = Input::get('loted');
                $animal->save();
                $enfermedad = DB::table('enfermedads as e')
                    ->join('nacimientos as n','e.idanimal','=','n.id')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->select('e.id','e.descripcion','n.nombre','l.descripcion as lote')
                    ->orderBy('e.id','desc')->take(1)->get();
                return $enfermedad;
                break;

            case 'edit':
                $id = Input::get('id');
                $enfermedad = Enfermedad::find($id);
                $enfermedad->descripcion = Input::get('descripcion');
                $enfermedad->idanimal = Input::get('animal');
                $enfermedad->idlote = Input::get('loted');
                $enfermedad->save();
                $enfermedad = DB::table('enfermedads as e')
                    ->join('nacimientos as n','e.idanimal','=','n.id')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->select('e.id','e.descripcion','n.nombre','l.descripcion as lote')
                    ->where('e.id',$id)->get();
                return $enfermedad;
                break;

            case 'del':
                $id = Input::get('id');
                $enfermedad = Enfermedad::find($id);
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