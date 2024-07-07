<?php

namespace Ecommerce\Backend\Controllers\Admin\Blog\Models;

use Ecommerce\Backend\Controllers\Admin\BlogCategory\Models\BlogCategory;
use Ecommerce\Backend\Controllers\Admin\BlogComment\Models\BlogComment;
use Ecommerce\Frontend\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

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
    public function comments(){
        return $this->hasMany(BlogComment::class);
    }
}
