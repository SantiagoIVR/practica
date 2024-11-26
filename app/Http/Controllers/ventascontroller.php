<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\ventas;
use Session;

class ventascontroller extends Controller
{
    public function crearventa()
    {
        $ventas = \DB::select("SELECT * FROM ventas ORDER BY idv DESC LIMIT 1");
        $cuantos = count($ventas);
        if($cuantos == 0)
        {
            $iddventa = 1;
        }
        else
        {
            $iddventa =  ($ventas[0]->idv) + 1;
        }

        $fecha = date('Y-m-j');

        $idu = Session::get('sesionidu');
        $nombreusuario = Session::get('sesionname');

        $clientes = \DB::select("SELECT * FROM clientes ORDER BY nombre ASC");

        return view('ventas.ventanueva')
        ->with('iddventa',$iddventa)
        ->with('fecha',$fecha)
        ->with('idu',$idu)
        ->with('nombreusuario',$nombreusuario)
        ->with('clientes',$clientes);
    }

    public function infocliente(request $request)
    {

        $cliente = \DB::select("SELECT * FROM clientes WHERE idcli = $request->idcli");
        
        return view('ventas.infocliente')
            ->with('cliente',$cliente[0]);

    }

    public function infoeleccion(request $request)
    {
        $eleccion = $request->categoria;
        return view('ventas.detallecategoria')
                ->with('eleccion',$eleccion);
    }

    public function infogenero(request $request)
    {
        $tipoventa = $request->tipoven;

        $genero = \DB::select("SELECT * FROM generos ORDER BY tipo ASC");

        return view('ventas.detallegenero')
                ->with('tipoventa',$tipoventa)
                ->with('genero',$genero);
    }

    public function infopelicula(request $request)
    {
        $idge = $request->idge;

        $pelicula = \DB::select("SELECT * FROM peliculas WHERE idg = $idge ORDER BY nombre ASC");

        return view('ventas.detallepelicula')
                ->with('idge',$idge)
                ->with('pelicula',$pelicula);
    }

    public function datospeli(request $request)
    {
        $tipov = $request->tipov;
        $pelir = \DB::select("SELECT * FROM pelicularestas WHERE idp = $request->idpe");

        $peli = \DB::select("SELECT * FROM peliculas WHERE idp = $request->idpe");
        return view('ventas.datospelicula')
                ->with('peli',$peli[0])
                ->with('pelir',$pelir)
                ->with('tipov',$tipov);

    }

}
