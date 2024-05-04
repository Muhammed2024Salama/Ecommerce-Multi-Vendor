<?php

namespace Ecommerce\Backend\Controllers\Admin\SubCategory\Models;

use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Models\ChildCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childCategories()
    {
        return $this->hasMany(ChildCategory::class);
    }
}
