<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewThreeAwardRecord extends Model
{
    protected $table='View_three_award_record';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name','id','session_id','user_id','award_pattern','award_gold','award_date',
    ];

}
