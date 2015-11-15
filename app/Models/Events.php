<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model {

    public $timestamps=true;
    protected $table='events';
    protected $primaryKey='id';
    protected $fillable = array(
        'title',
        'slug',
        'description',
        'content',
        'keywords',
        'visible',
        'featured',
        'category',
        'startdate',
        'enddate',
        'festival',
        'location',
        'forms'
    );

}