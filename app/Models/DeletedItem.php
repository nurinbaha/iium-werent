<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedItem extends Model
{
    use HasFactory;

    protected $table = 'deleted_items';

    // Define the fillable fields
    protected $fillable = [
        'item_id',
        'item_name',
        'item_description',
        'category',
        'price',
        'location',
        'pickup_method',
        'item_image',
        'deleted_by',
        'reason',
    ];

    // Define relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function originalItem()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
