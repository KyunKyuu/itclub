<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'members';
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class)->withTrashed();
    }

    public function alumni()
    {
        return $this->hasOne(Alumni::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

}
