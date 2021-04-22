<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideDesc extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_guides_decs';
    protected $fillable = ['guide_id', 'description', 'thumbnail', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];
}
