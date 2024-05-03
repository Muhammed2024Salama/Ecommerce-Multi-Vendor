<?php

namespace Ecommerce\Backend\Controllers\Admin\Category\Models;

use Ecommerce\Backend\Controllers\Admin\SubCategory\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
