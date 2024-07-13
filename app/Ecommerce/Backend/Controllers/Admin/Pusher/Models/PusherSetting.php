<?php

namespace Ecommerce\Backend\Controllers\Admin\Pusher\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusherSetting extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'pusher_app_id',
        'pusher_key',
        'pusher_secret',
        'pusher_cluster'
    ];
}
