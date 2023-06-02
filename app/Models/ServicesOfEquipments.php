<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesOfEquipments extends Model
{
    use HasFactory;
    protected $primaryKey = 'services_of_equipments_id';
    protected $guarded = [];
    public $timestamps = false;
}
