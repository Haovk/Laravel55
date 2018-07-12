<?php

namespace App\Models;

trait OneAdminUserExtend
{
    public function adminuserextend()
    {
        return $this->hasOne(AdminUserExtend::class, 'AdminUserId','id');
    }
}
