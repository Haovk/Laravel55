<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThreeTotalRecord extends Model
{
    protected $table='three_total_record';
    protected $primaryKey = 'session_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'award_pattern','totol_bet_num','totol_bet_gold','totol_award_num','totol_award_gold','award_date',
    ];

}
