<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tickets;
use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Staff extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $table = "staffAcc";
    protected $guarded = ['id'];
    protected $with = ['author'];


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'staff_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id');
    }
    
}
