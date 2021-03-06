<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menu';
    protected $fillable = ['section_id', 'name', 'url', 'icon', 'type', 'created_by', 'status', 'comments', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->get()[0];
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id')->get()[0];
    }
}
