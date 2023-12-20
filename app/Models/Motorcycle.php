<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Motorcycle extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;

    protected $guarded = ['created_at', 'updated_at'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function specification(): HasOne
    {
        return $this->hasOne(MotorcycleSpecification::class);
    }

    public function picture(): HasOne
    {
        return $this->hasOne(MotorcyclePicture::class);
    }

    function modelWithBrand(): Attribute
    {
        return Attribute::get(fn () => $this->brand->name . " " . $this->model);
    }
}
