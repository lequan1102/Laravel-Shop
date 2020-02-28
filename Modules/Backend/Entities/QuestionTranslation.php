<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'body', 'excerpt'];
}