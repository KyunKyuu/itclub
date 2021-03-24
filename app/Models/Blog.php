<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    use SoftDeletes;

    protected $table = 'blogs';
    protected $fillable = ['user_id', 'title', 'content', 'image', 'slug', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
