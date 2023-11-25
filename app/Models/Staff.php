<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tickets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Staff extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = "staffAcc";
    protected $guarded = ['id'];
    protected $with = ['author'];

    public function nama()
    {   
        return $this->nama;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function tickets() {
        return $this->hasManyThrough(Tickets::class, User::class);
    }
}
