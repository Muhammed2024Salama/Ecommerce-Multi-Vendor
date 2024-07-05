<?php

namespace Ecommerce\Backend\Controllers\Admin\Reviews\Models;

use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Frontend\Models\ProductReviewGallery;
use Ecommerce\Frontend\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productReviewGalleries()
    {
        return $this->hasMany(ProductReviewGallery::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
