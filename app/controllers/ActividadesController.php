<?php

class ActividadesController extends BaseController {

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
    
    public function getIndex()
    {
        return View::make('actividades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function getActividades()
    {
        $servicios = DB::table('actividades as a')
                    ->join('subactividades as sa','a.sub_actividad','=','sa.id')
                    ->select('a.id','a.fecha_actividad','a.descripcion','sa.descripcion as tip','a.precio as costo')
                    ->where('a.estado','1')
                    ->orderBy('a.id','DESC')
                    ->get();
        return $servicios;
    }   

    public function getEditar()
    {
        $id = Input::get('id');
        $servicios = Actividades::select('*')
                    ->where('id', $id)
                    ->get();
        return $servicios;
    }

    public function getSub_actividad()
    {
        $servicios = subactividades::select('id','descripcion')
                    ->where('estado','1')
                    ->get();
        return $servicios;
    }

    public function action() {

        $servicio = new Actividades();

        $operacion = Input::get('oper');

        switch ($operacion) {

            case 'add':
                $servicio->descripcion = Input::get('descripcion');
                $servicio->sub_actividad = Input::get('subactividad');
                $servicio->fecha_actividad = Input::get('fecha_actividad');
                $servicio->cantidad = Input::get('cantidad');
                $servicio->precio   = Input::get('precio');
                $servicio->estado = 1;
                $servicio->save();
                $servicio =DB::table('actividades as a')
                    ->join('subactividades as sa','a.sub_actividad','=','sa.id')
                    ->select('a.id','a.fecha_actividad','a.descripcion','sa.descripcion as tip','a.precio as costo')
                    ->where('a.estado','1')
                    ->orderBy('a.id','DESC')->take(1)->get();
                return $servicio;
                break;

            case 'edit':
                $id = Input::get('id');
                $servicio = Actividades::find($id);
               $servicio->descripcion = Input::get('descripcion');
                $servicio->sub_actividad = Input::get('subactividad');
                $servicio->fecha_actividad = Input::get('fecha_actividad');
                $servicio->cantidad = Input::get('cantidad');
                $servicio->precio   = Input::get('precio');
                
                $servicio->save();
                $servicio =DB::table('actividades as a')
                    ->join('subactividades as sa','a.sub_actividad','=','sa.id')
                    ->select('a.id','a.fecha_actividad','a.descripcion','sa.descripcion as tip','a.precio as costo')
       
                        ->where('a.id',$id)
                   ->get();
                return $servicio;
                break;

            case 'del':
                $id = Input::get('id');
                $servicio = Actividades::find($id);
                $servicio->estado = 0;
                $servicio->save();
                break;
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}