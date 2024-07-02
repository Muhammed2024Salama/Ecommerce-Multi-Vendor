<?php

namespace Ecommerce\Backend\Controllers\Admin\FooterInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInfo extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'logo',
        'phone',
        'email',
        'address',
        'copyright'
    ];
}
