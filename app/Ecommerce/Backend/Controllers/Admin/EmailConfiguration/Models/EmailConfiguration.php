<?php

namespace Ecommerce\Backend\Controllers\Admin\EmailConfiguration\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfiguration extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'host',
        'username',
        'password',
        'port',
        'encryption'
    ];
}
