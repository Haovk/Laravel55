<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewThreeTotal extends Model
{
    protected $table='View_three_total';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name','session_id','user_id','award_pattern','award_gold','award_date',
        'bet_goldtotal','bet_datelast','bet_pattern',
    ];


}
