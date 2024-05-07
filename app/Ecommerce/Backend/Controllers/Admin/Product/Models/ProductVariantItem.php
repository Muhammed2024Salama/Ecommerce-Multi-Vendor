<?php

namespace Ecommerce\Backend\Controllers\Admin\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantItem extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
