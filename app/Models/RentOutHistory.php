<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentOutHistory extends Model
{
    use HasFactory;

    protected $table = 'rent_out_history';

   
    protected $fillable = [
        'renter_id', 
        'item_id', 
        'start_date', 
        'end_date', 
        'status', 
        'total_days', 
        'total_price', 
        'final_price', 
        'item_review'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}


