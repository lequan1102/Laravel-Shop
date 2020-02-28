<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords', 'seo_name'];
}