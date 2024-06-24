<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
class Product extends Model
{
    protected $fillable=['title','slug','summary','description','cat_id','child_cat_id','price','dis_price','brand_id','discount','status','photo','size','stock','is_featured','condition'];

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','desc')->paginate(10);
    }
    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }
    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function creditHistories()
    {
        return $this->hasMany(CreditHistory::class);
    }



    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id')->where('status', 'active');
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rate');
    }

    public function averageRatingPercent()
    {
        return $this->averageRating() * 20; // Assuming 1 star = 20%
    }

    public function totalReviews()
    {
        return $this->reviews()->count();
    }

    public function recommendationPercentage()
    {
        if ($this->totalReviews() > 0) {
            return number_format(($this->recommendationCount() / $this->totalReviews()) * 100, 1);
        }
        return 0;
    }

    public function recommendationCount()
    {
        return 0;
        return $this->reviews()->where('recommendation', true)?->count() ?? 0;
    }

    public function ratingPercentages()
    {
        $ratings = [];

        for ($i = 5; $i >= 1; $i--) {
            $percentage = $this->reviews()->where('rate', $i)->count() / $this->totalReviews() * 100;
            $ratings[$i] = round($percentage, 1);
        }

        return $ratings;
    }

}
