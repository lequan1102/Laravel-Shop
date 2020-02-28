<?php

namespace Modules\Backend\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'title', 'slug', 'order', 'parent_id', 'response',
    ];
}
