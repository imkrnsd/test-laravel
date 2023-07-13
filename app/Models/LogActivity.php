<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $table = 'users_log_activities';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['user'] ?? false, function ($query, $user) {
            return $query->where('user_id', $user);
        })->when($filters['role'] ?? false, function ($query, $role) {
            return $query->with('user', 'user.roles')->whereHas('user.roles', function (Builder $q) use ($role) {
                $q->where('name', $role);
            });
        });
    }
}
