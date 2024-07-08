<?php

namespace Ecommerce\Backend\Controllers\Admin\LogoSetting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoSetting extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'logo',
        'favicon'
    ];
}
