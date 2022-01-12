<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budgeting extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
    protected $fillable = ['month', 'year', 'user_id', 'remaining_budget', 'total expenses', 'total_budget'];
}
