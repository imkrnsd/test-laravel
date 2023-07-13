<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MenuHasRole extends Pivot
{
    protected $table = 'menu_has_role';

    protected $fillable = ['menu_id', 'role_id'];
}
