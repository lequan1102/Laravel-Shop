<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class PostsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords', 'seo_title'];
}