<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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

    public function category()
    {
        return $this->belongsTo(Product::class, 'idCategory', 'idCategory');
    }
}
