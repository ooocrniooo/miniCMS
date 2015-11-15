<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightDeparture extends Model {


    public $timestamps=false;
    protected $table='flight_departure';
    protected $primaryKey='id';
    protected $fillable = array(
        'event_id',
        'date',
        'time',
        'from',
        'to'
    );

}
