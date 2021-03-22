<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'users_profile';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'telepon',
        'thumbnail',
        'bio',
        'status',
        'facebook_name',
        'facebook_url',
        'instagram_name',
        'instagram_url',
        'linkedin_name',
        'linkedin_url',
        'twitter_name',
        'twitter_url',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
}
