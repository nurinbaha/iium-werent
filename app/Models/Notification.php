<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id', 
        'item_id', 
        'message', 
        'status'
    ];


        public function item()
        {
            return $this->belongsTo(Item::class);
        }

        public function renter()
        {
            return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' represents the renter
        }

        public function owner()
        {
            return $this->belongsTo(User::class, 'owner_id'); // If there's an owner_id column
        }


}
