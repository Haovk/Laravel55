<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewTotalUserActivity extends Model
{
    protected $table='ViewTotalUserActivity';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     * 总况 / 用户活跃总况
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','RegisterCount','D2LoginCount','D1PlayGameCount','D1_7PlayGameCount',
        'D1_7_in_1_PlayGameRatio','D1_7_in_7_PlayGameRatio','D_Old7RegisterCount','D_Old30RegisterCount','D_OldAllRegisterCount',
    ];


}
