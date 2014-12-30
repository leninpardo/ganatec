<?php

class ReportesController extends \BaseController {

    public function __construct()
    {        
        $this->beforeFilter(function(){
            if(!Auth::check()) {
                return View::make('error');
            }
        });
    }

    public function rep_ganado() {
        $data = DB::table('vista_ganado_reporte')->select('*')->get();
                    /*->join('categorias as c','c.id','=','n.idcategoria')
                    ->join('especies as e','e.id','=','n.idespecie')
                    ->join('servicios as s','s.id','=','n.idservicio')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->join('razas as r','r.id','=','n.idraza')
                    ->select('n.nombre','n.pedigree','n.sexo','n.fecha_nac','n.caracteristicas','n.observaciones','c.descripcion as etapa','e.descripcion as especie','s.descripcion as servicio','l.descripcion as lote','r.descripcion as raza')
                    ->where('n.estado',1)
                    ->orderBy('n.nombre','ASC')
                    ->get();*/

        return View::make('reportes.rep1')->with('animals',$data);
    }

    public function rep_actividades() {
        $data = DB::table('vista_actividades_reporte')->select('*')->get();/*
                    ->join('produccions as p','p.idanimal','=','n.id')
                    ->join('categorias as c','n.idcategoria','=','c.id')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->join('parcelas as pa','pa.id','=','l.idparcela')
                    ->select('p.descripcion','p.cantidad','n.nombre','c.descripcion as etapa','l.descripcion as lote','pa.descripcion as parcela')
                    ->where('p.estado',1)
                    ->orderBy('p.descripcion','ASC')
                    ->get();*/

        return View::make('reportes.rep2')->with('prods',$data);
    }
      public function rep_salidas() {
        $data = DB::table('vista_salidas_reportes')->select('*')->get();/*
                    ->join('produccions as p','p.idanimal','=','n.id')
                    ->join('categorias as c','n.idcategoria','=','c.id')
                    ->join('lotes as l','l.id','=','n.idlote')
                    ->join('parcelas as pa','pa.id','=','l.idparcela')
                    ->select('p.descripcion','p.cantidad','n.nombre','c.descripcion as etapa','l.descripcion as lote','pa.descripcion as parcela')
                    ->where('p.estado',1)
                    ->orderBy('p.descripcion','ASC')
                    ->get();*/

        return View::make('reportes.rep3')->with('prods',$data);
    }

}