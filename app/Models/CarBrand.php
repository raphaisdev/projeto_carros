<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'car_brands';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function models(){
        return $this->HasMany(CarModel::class, 'car_brand_id', 'id');
    }
}
