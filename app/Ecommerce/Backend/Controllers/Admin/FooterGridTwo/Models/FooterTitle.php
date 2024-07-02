<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterTitle extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'footer_grid_two_title',
        'footer_grid_three_title'
    ];
}
