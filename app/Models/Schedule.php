<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'schedule';
    protected $fillable = ['division', 'date', 'come_in', 'come_out', 'desc', 'created_by', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function divisions()
    {
        return $this->hasOne(Division::class, 'id', 'division');
    }
}
