<?php

namespace Ecoflow\Media\Models\Image;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'desc', 'path', 'path_thumb', 'imageable_id', 'imageable_type'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
