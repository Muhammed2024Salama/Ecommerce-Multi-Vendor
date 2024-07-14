<?php

namespace Ecommerce\Backend\Controllers\Admin\Pusher\Models;

use Ecommerce\Frontend\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'seen'
    ];

    /**
     * @return BelongsTo
     */
    function receiverProfile(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')
            ->select(['id', 'image', 'name']);
    }

    /**
     * @return BelongsTo
     */
    function senderProfile(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id', 'id')
            ->select(['id', 'image', 'name']);
    }
}
