<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    protected $fillable = [
        'name',
        'material_type_id',
        'price',
        'quantity',
        'min_quantity',
        'package_quantity',
    ];

    public function materialType() : BelongsTo {
        return $this->belongsTo(MaterialType::class);
    }

    public function productMaterials() : HasMany {
        return $this->hasMany(ProductMaterial::class);
    }
}
