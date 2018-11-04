<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buys';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function advert(){
        return $this->belongsTo(Advert::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
