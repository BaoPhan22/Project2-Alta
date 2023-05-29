<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategories extends Model
{
    use HasFactory;
    protected $primaryKey = 'equipments_categories_id';
    protected $guarded = [];
}
