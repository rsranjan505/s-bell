<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','team_lead_id','team_manager_id','is_active','created_by'];
	protected $dates = ['created_at', 'updated_at'];

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function leader(){
        return $this->belongsTo(User::class,'team_lead_id');
    }

    public function manager(){
        return $this->belongsTo(User::class,'team_manager_id');
    }
}
