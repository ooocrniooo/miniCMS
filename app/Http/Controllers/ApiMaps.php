<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\TransferCityExtend;
use App\Models\TransferStartCity;
use Illuminate\Http\Request;

class ApiMaps extends Controller {

	public function getStartkoord($id, $fromto){
		if($fromto == 'from_tbl'){
			return TransferCityExtend::find($id);
		}else{
			return TransferCityExtend::find($id);
		}

	}
public function getTokoord($id){

	}

}
