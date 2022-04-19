<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $casts = [
        'customer_id' => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function conversations()
    {
        return $this->hasMany(SupportTicketConv::class);
    }

    public function getStatusAttribute($value){
        if($value == "open"){
            return 0;
        }else{
            return 1;
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'customer_id');
    }
}
