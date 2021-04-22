<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGuides extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_guides';
    protected $fillable = ['title', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
