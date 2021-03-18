<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'divisions';
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function images()
    {
        return $this->hasMany(ImageDivision::class);
    }

     public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
