<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferStartCity extends Model {

    public $timestamps=false;
    protected $table='transferstartcity';
    protected $primaryKey='ID';
    protected $fillable = array(
        'Grad',
        'Duzina',
        'Sirina',
        'Aktivno'
    );

}
