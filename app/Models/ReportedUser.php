<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedUser extends Model
{
    use HasFactory;

    protected $table = 'reported_users';

    protected $fillable = [
        'reported_user_id',
        'reporter_user_id',
        'reason',
        'additional_notes',
    ];

    // Relationship with the reported user
    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    // Relationship with the reporter
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_user_id');
    }
}
