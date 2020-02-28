<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
// Sử dụng Translatable
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Products extends Model
{
    //Sử dụng Translatable
    use Translatable;
    //Khai báo các trường được dịch
    public $translatedAttributes = ['name', 'slug', 'body', 'excerpt', 'meta_description', 'meta_keywords' ,'seo_title'];

    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'body', 'category_id', 'author_id', 'thumbnail', 'excerpt', 'meta_description', 'meta_keywords', 'seo_title'];

    public function author(){
        return $this->hasOne('Modules\Backend\Entities\Admin','id','author_id');
    }
}
