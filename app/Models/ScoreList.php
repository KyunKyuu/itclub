<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreList extends Model
{
    use HasFactory;

    protected $table = 'list_score';
    protected $fillable = ['test_id', 'user_id', 'score', 'created_by', 'deleted_at'];
}
