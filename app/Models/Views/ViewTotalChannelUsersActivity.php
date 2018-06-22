<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewTotalChannelUsersActivity extends Model
{
    protected $table='ViewTotalChannelUsersActivity';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     * 总况 / 各渠道用户总况
     * @var array
     */
    protected $fillable = [
        'StatisticsDate','ChannelId','RegisterCount','D1PlayGameCount','PayUserCount',
        'ConsumeUserCount','channel_name',
    ];


}
