<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_history_file';

    protected $guarded = ['id'];

    // status_upload
    // 0 = sedang upload
    // 1 = berhasil upload
    // 99 = gagal upload
}
