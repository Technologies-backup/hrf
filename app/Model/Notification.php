<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $casts = [
        'status'     => 'integer',
        'is_push'     => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
    
    public function scopePushed($query)
    {
        return $query->where('is_push', '=', 1);
    }
    
    public function scopeNotPushed($query)
    {
        return $query->where('is_push', '=', 0);
    }

    public function notifiable(){
        return $this->morphTo();
    }
}
