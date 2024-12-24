<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Message;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     *
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number', // Matches database field
        'location',     // Matches database field
        'gender',       // Matches database field
        'status',       // Matches database field
        'is_suspended',
    ];

    /**
     * The relationship with the Item model
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlistItems()
    {
        
        return $this->hasMany(Wishlist::class, 'user_id', 'id')->with('item');
    }
    
    // Relationship for messages sent by this user
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Relationship for messages received by this user
    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function renterReviews()
    {
        return $this->hasMany(RentHistory::class, 'renter_id');
    }


}
