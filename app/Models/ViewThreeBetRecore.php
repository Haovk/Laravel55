<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewThreeBetRecore extends Model
{
    protected $table='View_three_bet_record';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name','session_id','user_id','bet_pattern','bet_gold','bet_date',
    ];

}
