<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmenuAccess extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'access_user_submenu';
    protected $fillable = ['user_id', 'submenu_id', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];
}
