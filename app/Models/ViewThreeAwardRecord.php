<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewThreeAwardRecord extends Model
{
    protected $table='View_three_award_record';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name','session_id','user_id','award_pattern','award_gold','award_date',
    ];

}
