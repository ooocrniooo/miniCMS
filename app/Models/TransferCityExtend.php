<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferCityExtend extends Model {
    public $timestamps=false;
    protected $table='transfercityextend';
    protected $primaryKey='ID';
    protected $fillable = array(
        'Grad',
        'Drzava',
        'Duzina',
        'Sirina',
        'Popust',
        'Fix',
        'Aktivno'
    );

}
