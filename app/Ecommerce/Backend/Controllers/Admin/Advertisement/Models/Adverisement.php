<?php

namespace Ecommerce\Backend\Controllers\Admin\Advertisement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adverisement extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'key',
        'value'
    ];
}
