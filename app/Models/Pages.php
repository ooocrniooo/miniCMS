<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {

    public $timestamps=true;
    protected $table='pages';
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
        'forms'
    );

    public function images(){
        return $this->hasMany('App\Models\Images','pid');
    }
}
