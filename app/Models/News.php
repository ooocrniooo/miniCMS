<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    public $timestamps=true;
    protected $table='news';
    protected $primaryKey='id';

}
