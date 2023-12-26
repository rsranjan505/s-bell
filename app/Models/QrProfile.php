<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrProfile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'house_number','full_address','qr_code','is_generated','is_paid','is_active','agent_id'];
	protected $dates = ['created_at', 'updated_at'];

    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function agent(){
        return $this->belongsTo(User::class,'agent_id');
    }
}
