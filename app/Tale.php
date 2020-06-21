<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tales';

    
    /**
     * Hidden columns.
     *
     * @var array
     */
    protected $hidden = ['id'];
}
