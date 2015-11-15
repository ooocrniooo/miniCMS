<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventClients extends Model {
    public $timestamps=true;
    protected $table='event_clients';
    protected $primaryKey='ID';
    protected $fillable = array(
        'Ime',
        'Prezime',
        'Email',
        'Mobil',
        'Dolazak',
        'Odlazak',
        'FlightNr',
        'Arrival',
        'Osoba',
        'Beba',
        'Poruka',
        'Od',
        'Do',
        'Auto',
        'Distanca',
        'Smjer',
        'Cijena',
        'AutoTablica',
        'gotovo',
        'DateS',
        'Prikazano',
        'NacinPlacanja',
        'bilo_prikazano',
        'ArrivalBack',
        'coacharrt',
        'coachdept',
        'FlightNrDept'
    );

}
