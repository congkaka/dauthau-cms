<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class PermissionRepository extends EloquentRepository
{
    public function getModel(): Model
    {
        return new Permission();
    }
}
