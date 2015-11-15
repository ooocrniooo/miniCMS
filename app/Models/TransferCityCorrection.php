<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferCityCorrection extends Model {

    public $timestamps=false;
    protected $table='transfercitycorrection';
    protected $primaryKey='ID';
    protected $fillable = array(
        'AutoID',
        'Od_GradID',
        'Do_GradID',
        'korektura',
        'PlusMinus',
        'Cestarina'
    );

}
