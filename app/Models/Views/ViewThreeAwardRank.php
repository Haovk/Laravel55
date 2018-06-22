<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewThreeAwardRank extends Model
{
    protected $table='View_three_award_rank';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name','user_id','award_gold',
    ];

}
