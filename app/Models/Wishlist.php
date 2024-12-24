<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_id'];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Item
    public function item()
    {
        return $this->belongsTo(Item::class); // Assuming you have an Item model
    }
}