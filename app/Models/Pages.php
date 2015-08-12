<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {

    public $timestamps=true;
    protected $table='pages';
    protected $primaryKey='id';

    public function images(){
        return $this->hasMany('App\Models\Images','pid');
    }
}
