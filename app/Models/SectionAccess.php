<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionAccess extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'access_user_section';
    protected $fillable = ['user_id', 'section_id', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];
}
