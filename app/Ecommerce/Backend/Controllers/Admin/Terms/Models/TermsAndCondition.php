<?php

namespace Ecommerce\Backend\Controllers\Admin\Terms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsAndCondition extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'content'
    ];
}
