<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Traits\Scope;

    protected $guarded = ['idCategory'];
    protected $table = 'category';
    protected $primaryKey = 'idCategory';

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         "nameCategory",
         "statusCategory",
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'idCategory');
    }
}
