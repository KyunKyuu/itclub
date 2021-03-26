<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageGallery extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'image_gallery';
    protected $guarded = ['id','created_at','updated_at'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'deleted_at' => 'datetime:Y-m-d H:m:s'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class)->withTrashed();
    }

   

    public function image()
    {
        return !$this->image ? asset('no-image.jpg') : asset("storage/" . $this->image);
    }
}
