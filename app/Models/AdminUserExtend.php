<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserExtend extends Model
{
    protected $table='admin_users_extend';
    protected $primaryKey = 'AdminUserId';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'GoldSetting','Gold',
    ];

    public function adminuser()
    {
        return $this->belongsTo(Administrator::class,'AdminUserId');
    }
}
