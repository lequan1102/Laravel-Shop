<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
// Sử dụng Translatable
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Posts extends Model
{
    //Sử dụng Translatable
    use Translatable;
    //Khai báo các trường được dịch
    public $translatedAttributes = ['title', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords' ,'seo_title'];

    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'author_id', 'excerpt', 'meta_description', 'meta_keywords', 'seo_title'];

    /**
     * Relationships [category_id] Posts -> [id] Category
     * 1. hasOne Category.
     * 2.
     */
    public function category()
    {
        return $this->hasOne('Modules\Backend\Entities\Category','id','category_id');
    }
    public function author(){
        return $this->hasOne('Modules\Backend\Entities\Admin','id','author_id');
    }
}
