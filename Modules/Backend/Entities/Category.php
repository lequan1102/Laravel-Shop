<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
// Sử dụng Translatable
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Category extends Model
{
    //Sử dụng Translatable
    use Translatable;
    //Khai báo các trường được dịch
    public $translatedAttributes = ['name', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords' ,'seo_title'];

    protected $table = 'category';
    protected $fillable = ['name', 'body', 'slug', 'category_id', 'excerpt', 'meta_description', 'meta_keywords', 'seo_name', 'author_id'];

    /**
     * Relationships [category_id] Posts -> [id] Category
     * 1. belongsTo Category.
     * 2.
     */
    public function author(){
        return $this->hasOne('Modules\Backend\Entities\Admin','id','author_id');
    }
}
