<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;
// Sử dụng Translatable
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Question extends Model
{
    //Sử dụng Translatable
    use Translatable;
    //Khai báo các trường được dịch
    public $translatedAttributes = ['name', 'slug', 'body', 'excerpt'];

    protected $table = 'question';
    protected $fillable = ['name', 'slug', 'body', 'excerpt', 'author_id'];

    /**
     * Relationships [category_id] Posts -> [id] Category
     * 1. hasOne Category.
     * 2.
     */
    public function category()
    {
        return $this->hasOne('Modules\Backend\Entities\Category');
    }
    public function author(){
        return $this->hasOne('Modules\Backend\Entities\Admin','id','author_id');
    }
}
