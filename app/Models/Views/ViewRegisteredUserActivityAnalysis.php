<?php

namespace App\Models\Views;

use Illuminate\Database\Eloquent\Model;

class ViewRegisteredUserActivityAnalysis extends Model
{
    protected $table='ViewRegisteredUserActivityAnalysis';
    protected $primaryKey = '';
    /**
     * The attributes that are mass assignable.
     *  注册用户分析 / 注册用户活跃度分析
     * @var array
     */
    protected $fillable = [
        'ObservationDate','RegisterCount','D1_7_gt_1_PlayGameCount','D1_7_gt_2_PlayGameCount','D1_7_gt_3_PlayGameCount',
        'D1_7_gt_4_PlayGameCount','D1_7_gt_5_PlayGameCount','D1_7_gt_6_PlayGameCount','D1_7_gt_7_PlayGameCount',
    ];


}
