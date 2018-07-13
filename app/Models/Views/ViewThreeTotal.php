<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewThreeTotal extends Model
{
    protected $table='View_three_total';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     * 时时乐押注/中奖记录
     * @var array
     */
    protected $fillable = [
        'nick_name','session_id','user_id','award_pattern','award_gold','award_date',
        'bet_goldtotal','bet_datelast','bet_pattern',
    ];


}
