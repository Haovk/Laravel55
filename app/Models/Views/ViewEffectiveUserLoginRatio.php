<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewEffectiveUserLoginRatio extends Model
{
    protected $table='ViewEffectiveUserLoginRatio';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 有效用户登录比
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','RegisterCount','TRegisterCount','TRegisterLoginCount',
    ];


}
