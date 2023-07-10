<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSystem extends Model
{
    protected $guarded =[];
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    use HasFactory;
}
