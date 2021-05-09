<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];
    protected $dates = ['deleted_at'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withPivot('category_id', 'blog_id');
    }


    public function created_by()
    {
        return $this->belongsTo(User::class, 'id', 'user_id')->withTrashed();
    }
}
