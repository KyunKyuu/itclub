<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuAccess extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'access_user_menu';
    protected $fillable = ['user_id', 'menu_id', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];
}
