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
        $nacimientos = entradas::select('idingreso','codigo_ganado','nombre_ganado','fecha_ingreso','color','precio_compra')
                    ->where('estado', '1')
                    ->orderBy('idingreso', 'DESC')
                    ->get();
        return $nacimientos;
    }
    public function getProveedor() 
    {
        $nacimientos = proveedores::select('idproveedor','descripcion')
                    ->where('estado', '1')
                    ->orderBy('idproveedor', 'DESC')
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
        $nacimiento = Nacimiento::select()
                    ->where('id', $id)
                    ->get();
        return $nacimiento;
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
        $nacimiento = new Nacimiento;
        $operacion = Input::get('oper');
        switch ($operacion) {
            case 'add':
                $nacimiento->idservicio = Input::get('servicio');
                $nacimiento->nombre = Input::get('nombre');
                $nacimiento->pedigree = Input::get('pedigree');
                $nacimiento->sexo = Input::get('sexo');
                $nacimiento->fecha_nac = Input::get('fecha_nac');
                $nacimiento->npadre = Input::get('npadre');
                $nacimiento->nmadre = Input::get('nmadre');
                $nacimiento->caracteristicas = Input::get('caracteristicas');
                $nacimiento->observaciones = Input::get('observaciones');
                $nacimiento->idcategoria = Input::get('categoria');
                $nacimiento->idespecie = Input::get('especie');
                $nacimiento->idetapa = Input::get('etapa');
                $nacimiento->idlote = Input::get('lote');
                $nacimiento->idestado = Input::get('estado');
                $nacimiento->idraza = Input::get('raza');
                $nacimiento->estado = 1;
                $nacimiento->save();
                $nacimiento = Nacimiento::select('id','nombre','pedigree','fecha_nac')->orderBy('id','desc')->take(1)->get();
                return $nacimiento;
                break;
            case 'edit':
                $id = Input::get('id');
                $nacimiento = Nacimiento::find($id);
                $nacimiento->idservicio = Input::get('servicio');
                $nacimiento->nombre = Input::get('nombre');
                $nacimiento->pedigree = Input::get('pedigree');
                $nacimiento->sexo = Input::get('sexo');
                $nacimiento->fecha_nac = Input::get('fecha_nac');
                $nacimiento->npadre = Input::get('npadre');
                $nacimiento->nmadre = Input::get('nmadre');
                $nacimiento->caracteristicas = Input::get('caracteristicas');
                $nacimiento->observaciones = Input::get('observaciones');
                $nacimiento->idcategoria = Input::get('categoria');
                $nacimiento->idespecie = Input::get('especie');
                $nacimiento->idetapa = Input::get('etapa');
                $nacimiento->idlote = Input::get('lote');
                $nacimiento->idestado = Input::get('estado');
                $nacimiento->idraza = Input::get('raza');
                $nacimiento->save();
                $nacimiento = Nacimiento::select('id','nombre','pedigree','fecha_nac')->where('id',$id)->get();
                return $nacimiento;
                break;
            case 'del':
                $id = Input::get('id');
                $nacimiento = Nacimiento::find($id);
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