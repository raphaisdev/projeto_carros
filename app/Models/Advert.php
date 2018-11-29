<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adverts';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function model(){
        return $this->belongsTo(CarModel::class, 'car_model_id', 'id');
    }

    public function buy(){
        return $this->hasOne(Buy::class, 'advert_id', 'id');
    }
}
