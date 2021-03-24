<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $appends = ['category_name'];

    /**
     * Get category name for the product
     *
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        $this->attributes['category_name'] = Category::find($this->category_id)->name;
        return $this->attributes['category_name'];
    }

    /**
     * Get the category for the product
     * 
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}