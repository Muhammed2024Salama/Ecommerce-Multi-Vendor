<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridThree\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FooterGridThree extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Perform any actions required after the model boots.
     */
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget('footer_grid_three');
        });

        static::deleted(function ($model) {
            Cache::forget('footer_grid_three');
        });
    }
}
