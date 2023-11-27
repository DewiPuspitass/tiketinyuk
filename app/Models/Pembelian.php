<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Tickets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = "pembelian";
    protected $guarded = ['id'];
    protected $with = ['staff'];
    
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'staff_id');
    }

    public function ticket()
{
    return $this->belongsTo(Tickets::class, 'ticket_id');
}

}
