<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items'; // Add this if the table is not named "items"

    protected $fillable = [
        'item_name',
        'item_description',
        'category',
        'price',
        'location',
        'pickup_method',
        'item_image',
        'user_id', // add this field
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsInWishlistAttribute()
    {
        return $this->wishlists()->where('user_id', auth()->id())->exists();
    }

    public function usersWhoWishlist()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'item_id', 'user_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
 
     public function owner()
     {
         return $this->belongsTo(User::class, 'user_id'); // 'user_id' represents the owner
     }
     
     public function reviews()
    {
        return $this->hasMany(RentHistory::class, 'item_id');
    }

    public function reports()
{
    return $this->hasMany(Report::class, 'item_id');
}

}



