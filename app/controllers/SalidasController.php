<?php

class SalidasController extends \BaseController {

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
        return View::make('salidas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    public function getSalidas() {
        $bajas = DB::table('Salidas as s')
                    ->join('tipo_salida as tp','tp.id','=','s.tipo_salida')
                    ->select('s.id','s.fecha_salida','s.total_venta', 'tp.tipo_salida')
        			->where('s.estado', '1')
        			->orderBy('s.id', 'DESC')
        			->get();
        return $bajas;
    }

    public function getGanado()
    {
        $bajas = DB::table('vista_ganado as vg')
                    ->select('vg.*')
                    //->whereNotIn('n.id', DB::table('bajas as b')->where('b.estado',1)->lists('b.idanimal')->get('b.idanimal'))
                    //->where('vg.estado', 1)
                    ->get();
        return $bajas;
    }
        public function getTipo()
    {
        $bajas = DB::table('tipo_salida')
                    ->select('*')
                    //->whereNotIn('n.id', DB::table('bajas as b')->where('b.estado',1)->lists('b.idanimal')->get('b.idanimal'))
                    //->where('vg.estado', 1)
                    ->get();
        return $bajas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function action() {

        $obj = new salidas();

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $obj->descripcion = Input::get('descripcion');
                $obj->tipo_salida = Input::get('tipo');
                $obj->fecha_salida = Input::get('fecha_salida');
                $obj->total_venta = Input::get('total');
                $obj->estado = 1;
                $obj->save();
                $obj = DB::table('salidas as s')
                           ->join('tipo_salida as tp','tp.id','=','s.tipo_salida')
                    ->select('s.id','s.fecha_salida','s.total_venta', 'tp.tipo_salida')
                            ->orderBy('id','desc')->take(1)->get();
            require_once '../app/models/detalle_salidas.php';
            require_once '../app/models/entradas.php';
                $obj_d=new detalle_salidas();
                $obj_e=new entradas();
                   $obj_d->id_salida=$obj[0]->id;
            foreach (input::get('idanimal') as $g)
            {
                $obj_d->id_ganado=$g;
                $obj_d->precio_venta=  Input::get("pv".$g);
                $obj_d->peso_salida=  Input::get("pf".$g);
                $obj_d->save();
                //deshabilitar el registro del ganado
               
                $id = Input::get('id');
                $ganado = $obj_e::find($id);
                $ganado->estado=0;
                $ganado->save();
                
            }
                
        return $obj;
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