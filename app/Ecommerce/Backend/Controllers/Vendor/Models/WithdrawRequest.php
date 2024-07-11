<?php

namespace Ecommerce\Backend\Controllers\Vendor\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
