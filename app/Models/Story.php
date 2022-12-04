<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'stories';
    protected $primarykey  = 'stories.id';
    protected $guarded =  [];

    public function category() {
        return $this->hasMany('\App\Models\Category','id','cat_id');
    }
}
