<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferCars extends Model {

    public $timestamps=false;
    protected $table='cars';
    protected $primaryKey='ID';
    protected $fillable = array(
        'Auto',
        'BrMjesta',
        'Cijena',
        'Popust',
        'Aktivno',
        'rez2',
        'rez3'
    );

}
