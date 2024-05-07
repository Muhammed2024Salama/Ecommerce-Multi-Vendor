<?php

namespace Ecommerce\Backend\Controllers\Admin\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productVariantItems()
    {
        return $this->hasMany(ProductVariantItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
