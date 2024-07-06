<?php

namespace Ecommerce\Backend\Controllers\Admin\VendorCondition\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCondition extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'content'
    ];
}
