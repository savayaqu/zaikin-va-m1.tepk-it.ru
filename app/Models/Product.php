<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'product_type_id',
        'name',
        'article',
        'min_price',
        'width',
    ];

    // Отключение timestamps полей
    public $timestamps = false;

    public function productType() : BelongsTo {
        return $this->belongsTo(ProductType::class);
    }

    public function productMaterials() : HasMany
    {
        return $this->hasMany(ProductMaterial::class);
    }
}
