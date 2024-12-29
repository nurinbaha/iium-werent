<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'user_id', 'reason'];

    // Relationship to the Item model
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}


