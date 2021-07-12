<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\Models\inscripcion;

class consumoController extends Controller
{	

	 public function getHome()
    {	

    	$this->getDireccionamientoXFecha();
    	$inscripcion=inscripcion::all();
    	return view('home',compact('inscripcion'));
    }

   
     public function getToken()
    {
    	$response = Http::get('https://tablas.sispro.gov.co/WSSUMMIPRESNOPBS/api/GenerarToken/555555001/TOKEN_PROV');
     return $response->body();
    }

    public function getDireccionamientoXFecha()
    {
    	

    	$response = Http::withOptions(['verify' => false])->get('https://tablas.sispro.gov.co/WSSUMMIPRESNOPBS/api/DireccionamientoXFecha/555555001/'.str_replace('"','',$this->getToken()).'/2019-07-30');

    	//dd(json_decode($response->body()));
        $response = json_decode($response);

        foreach ($response as $value) {

        	$inser = new inscripcion();
        	$inser->id= $value->ID;
        	$inser->NoPrescripcion= $value->NoPrescripcion;
        	$inser->TipoTec= $value->TipoTec;
        	$inser->ConTec= $value->ConTec;
        	$inser->NoEntrega= $value->NoEntrega;
        	$inser->FecDireccionamiento= $value->FecDireccionamiento;
        	$inser->EstDireccionamiento= $value->EstDireccionamiento;

			$inser->save();        	


        }


    }

}
