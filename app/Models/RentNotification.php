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

    // Relationship with the Item model
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relationship with the User model for the renter
    public function renter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
