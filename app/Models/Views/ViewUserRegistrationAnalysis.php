<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewUserRegistrationAnalysis extends Model
{
    protected $table='ViewUserRegistrationAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 用户注册分析
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','D1FirstloginCount','D1_7FirstloginCount','D1_30FirstloginCount','AllFirstloginCount',
    ];


}
