<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberReg extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'member_reg';
    protected $fillable = ['user_id', 'division_id', 'email', 'name', 'class', 'majors', 'position', 'status', 'imgae', 'entry_year', 'deleted_at'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
