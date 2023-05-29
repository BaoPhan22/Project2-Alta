<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queuing extends Model
{
    use HasFactory;
    protected $primaryKey = 'queuing_id';
    protected $guarded = [];
}
