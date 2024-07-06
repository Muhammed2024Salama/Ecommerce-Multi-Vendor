<?php

namespace Ecommerce\Backend\Controllers\Admin\About\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'content'
    ];

}
