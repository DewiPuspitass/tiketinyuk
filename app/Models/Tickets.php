<?php

namespace App\Models;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory;
    protected $table = "tickets";
    protected $guarded = ['id'];
    protected $with = ['author'];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(Staff::class, 'user_id', 'user_id');
    }
}
