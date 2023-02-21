<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table="schools";
    protected $primaryKey="id";

    public function city(){
        return $this->belongsTo(City::class ,"city_id");
    }

    public function area(){
        return $this->belongsTo(Area::class ,"area_id");
    }
}

