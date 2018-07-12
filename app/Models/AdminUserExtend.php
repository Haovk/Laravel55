<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserExtend extends Model
{
    protected $table='admin_users_extend';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'AdminUserId','GoldSetting','Gold',
    ];

}
