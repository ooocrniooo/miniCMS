<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightArrival extends Model {

    public $timestamps=false;
    protected $table='flight_arrival';
    protected $primaryKey='id';
    protected $fillable = array(
        'event_id',
        'date',
        'time',
        'from',
        'to'
    );

}
