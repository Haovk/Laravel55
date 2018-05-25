<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumeDetail extends Model
{
    protected $table='consume_detail';
    protected $primaryKey = 'log_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','oper_date','balance_gold','gold','room_id','tax_gold','score_type','ticket_count',
    ];


}
