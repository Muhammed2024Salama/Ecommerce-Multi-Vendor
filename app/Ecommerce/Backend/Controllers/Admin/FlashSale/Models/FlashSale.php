<?php

namespace Ecommerce\Backend\Controllers\Admin\FlashSale\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'end_date'
    ];
}
