<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
// Sử dụng Translatable
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;

class Settings extends Model
{
    //Sử dụng Translatable
    // use Translatable;
    //Khai báo các trường được dịch
    // public $translatedAttributes = ['title', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords' ,'seo_title'];

    protected $table = 'settings';
    // protected $fillable = ['title', 'body', 'slug', 'category_id', 'excerpt', 'meta_description', 'meta_keywords', 'seo_title', 'author_id'];

    /**
     * Relationships [category_id] Posts -> [id] Category
     * 1. hasOne Category.
     * 2.
     */
    
}
