<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcycleSpecification extends Model
{
    use HasFactory;

    protected $primaryKey = 'motorcycle_id';
    protected $guarded = ['created_at', 'updated_at'];
}
