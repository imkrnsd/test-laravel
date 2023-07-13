<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $table = 'permissions';

    public $incrementing = false;

    protected $fillable = ['id', 'name'];

    protected $guard_name = 'web';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['name'] ?? false, function ($query, $name) {
            return $query->where('name', 'ILIKE', '%' . $name . '%');
        });
    }
}
