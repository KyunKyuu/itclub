<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'categories';
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withTrashed();
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    
     public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
