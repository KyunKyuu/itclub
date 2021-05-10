<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'list_score';
    protected $fillable = ['test_id', 'user_id', 'score', 'created_by', 'deleted_at'];

     protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function test()
    {
        return $this->hasOne(TestList::class, 'id', 'test_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
