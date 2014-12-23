<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntradaController
 *
 * @author Investigación13
 */

class EntradasController extends \BaseController
{
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
        return View::make('entradas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getEntradas() 
    {
        $nacimientos = entradas::select('id','codigo_ganado','nombre_ganado','fecha_ingreso','color','precio_compra')
                    ->where('estado', '1')
                    ->orderBy('id', 'DESC')
                    ->get();
        return $nacimientos;
    }
    public function getProveedor() 
    {
        $nacimientos = proveedores::select('id','razon_social')
                    ->where('estado', '1')
                    ->orderBy('id', 'DESC')
                    ->get();
        return $nacimientos;
    } 
    public function getRaza() 
    {
        $nacimientos = Raza::select('id','descripcion')
                    ->where('estado', '1')
                    ->orderBy('id', 'DESC')
                    ->get();
        return $nacimientos;
    } 
    public function getEditar()
    {
        $id = Input::get('id');
        $entradas = entradas::select('*')
                    ->where('id', $id)
                    ->get();
        return $entradas;
    }
    public function upload()
    {
        set_time_limit(0);
        include_once('upload/class.upload.php');
        $dir_dest = './assets/img/upload/';
        $handle = new Upload($_FILES['file'], 'es_ES');
        if ($handle->uploaded) {
            $handle->file_new_name_body = 'upl_' . uniqid();
            $handle->image_resize = true;
            //$handle->image_convert = jpg;
            $handle->image_ratio = true;
            $handle->image_x = 500;
            $handle->image_y = 500;
            $handle->Process($dir_dest);
            if ($handle->processed) {
                $imagen = $handle->file_dst_name;
                echo $imagen;
                exit;
            }
        }
    }
    public function action() {
    $obj = new entradas();
        $operacion = Input::get('oper');
        switch ($operacion) {
            case 'add':
                
                $obj->nombre_ganado = Input::get('nombre');
                $obj->codigo_ganado = Input::get('codigo_ganado');
                $obj->sexo = Input::get('sexo');
                $obj->fecha_ingreso = Input::get('fecha_ingreso');
                $obj->idproveedor = Input::get('idproveedor');
                $obj->idraza = Input::get('idraza');
                $obj->caracteristicas = Input::get('caracteristicas');
                $obj->observaciones = Input::get('observaciones');
                $obj->procedencia = Input::get('procedencia');
                $obj->color  = Input::get('color');
                $obj->peso_ingreso  = Input::get('peso_ingreso');
                $obj->edad = Input::get('edad');
                $obj->precio_compra = Input::get('precio_compra');
                $obj->costo_transporte = Input::get('costo_transporte');
                $obj->costo_vaquero = Input::get('costo_vaquero');
                $obj->estado = 1;
                $obj->save();
                $obj_datos = entradas::select('id','codigo_ganado','nombre_ganado','fecha_ingreso','color','precio_compra')->orderBy('id','desc')->take(1)->get();
                return $obj_datos;
                break;
            case 'edit':
                $id = Input::get('id');
                $obj = entradas::find($id);
                   $obj->nombre_ganado = Input::get('nombre');
                $obj->codigo_ganado = Input::get('codigo_ganado');
                $obj->sexo = Input::get('sexo');
                $obj->fecha_ingreso = Input::get('fecha_ingreso');
                $obj->idproveedor = Input::get('idproveedor');
                $obj->idraza = Input::get('idraza');
                $obj->caracteristicas = Input::get('caracteristicas');
                $obj->observaciones = Input::get('observaciones');
                $obj->procedencia = Input::get('procedencia');
                $obj->color  = Input::get('color');
                $obj->peso_ingreso  = Input::get('peso_ingreso');
                $obj->edad = Input::get('edad');
                $obj->precio_compra = Input::get('precio_compra');
                $obj->costo_transporte = Input::get('costo_transporte');
                $obj->costo_vaquero = Input::get('costo_vaquero');
                $obj->save();
                //$nacimiento = Nacimiento::select('id','nombre','pedigree','fecha_nac')->where('id',$id)->get();
               $obj_datos = entradas::select('id','codigo_ganado','nombre_ganado','fecha_ingreso','color','precio_compra')->where('id',$id)->get();
                return $obj_datos;
                break;
            case 'del':
                $id = Input::get('id');
                $nacimiento = entradas::find($id);
                $nacimiento->estado = 0;
                $nacimiento->save();
                break;
        }
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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}