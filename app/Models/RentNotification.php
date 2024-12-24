<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'message',
        'status',
        'start_date',
        'end_date',
        'total_days',
        'total_price',
        'final_price',
    ];

    // Define relationships if needed

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

        public function renter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

