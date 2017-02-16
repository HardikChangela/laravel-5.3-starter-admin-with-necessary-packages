<?php

namespace App\Model;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable =['name','status'];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::addGlobalScope(new StatusScope);
//    }

    public function scopeStatus($query)
    {
        return $query->where('status', '=', 'Active');
    }

    
}
