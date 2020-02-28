<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'display_name'];

    /**
     * Relationships [category_id] Posts -> [id] Category
     * 1. belongsTo Category.
     * 2.
     */
    
}     