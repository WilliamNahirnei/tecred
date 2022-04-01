<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Traits\Scope;

    protected $guarded = ['idProduct'];
    protected $table = 'product';
    protected $primaryKey = 'idProduct';

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "nameProduct",
        "quantityProduct",
        "statusProduct",
        "idCategory"
    ];
}
