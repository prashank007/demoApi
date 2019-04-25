<?php

namespace App\Model;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table ="products";

    protected $fillable = [
        'name','detail','price','stock','discount','created_at','updated_at'
      ];
  
    public function reviews(){
        return $this->hasMany(Review::class);
    }
   /*  public static function addProduct($product){
      //  return $product;
        $productInsertData = Product::create($product);
        return $productInsertData;
    } */
}
