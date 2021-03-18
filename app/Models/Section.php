<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'section';
    protected $fillable = ['name', 'comments', 'status', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->get()[0];
    }
}
