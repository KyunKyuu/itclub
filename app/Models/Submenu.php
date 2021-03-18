<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submenu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'submenu';
    protected $fillable = ['menu_id', 'name', 'url', 'status', 'created_by', 'deleted_at', 'comments'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'created_by')->get()[0];
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')->get()[0];
    }
}
