<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\File;
use Illuminate\Support\Str;
use App\Category;

class Product extends Model
{
    function insertProduct($request)
    {
        $product    =   new Product();

        if($request->hasFile('image'))
        {
            $image      =   $request->file('image');
            $directory  =   "images/";
            $name       =   "IMG_" . date("Ymd_his") .".".$image->getClientOriginalExtension();
            $imageUrl   =   $directory.$name;

            $image->move($directory, $name);


            $product->name                      =  $request->name;
            $product->slug                      =  Str::slug($request->name);
            $product->category_id               =  $request->category_id;
            $product->code                      =  $request->code;
            $product->stock                     =  $request->stock;
            $product->price                     =  $request->price;
            $product->description               =  $request->description;
            $product->product_feature           =  $request->product_feature;
            $product->top_sale                  =  $request->top_sale;
            $product->flash_sale                =  $request->flash_sale;
            $product->flash_sale_ratio          =  $request->flash_sale_ratio;
            $product->occational_offer          =  $request->occational_offer;
            $product->occational_offer_ratio    =  $request->occational_offer_ratio;
            $product->daily_offer               =  $request->daily_offer;
            $product->daily_offer_ratio         =  $request->daily_offer_ratio;
            $product->publication_status        =  $request->publication_status;
            $product->image                     =  $imageUrl;

            $product->save();

            return;
        }
    }

    function updateProduct($request, $id)
    {
        $product    =   Product::find($id);

        if($request->hasFile('image'))
        {
            File::delete($product->image);

            $image      =   $request->file('image');
            $directory  =   "images/";
            $name       =   "IMG_" . date("Ymd_his") .".".$image->getClientOriginalExtension();
            $imageUrl   =   $directory.$name;

            $image->move($directory, $name);   
        }
        else
        {
            $imageUrl   =   $product->image;
        }

            $product->name                      =  $request->name;
            $product->slug                      =  Str::slug($request->name);
            $product->category_id               =  $request->category_id;
            $product->code                      =  $request->code;
            $product->stock                     =  $request->stock;
            $product->price                     =  $request->price;
            $product->description               =  $request->description;
            $product->product_feature           =  $request->product_feature;
            $product->top_sale                  =  $request->top_sale;
            $product->flash_sale                =  $request->flash_sale;
            $product->flash_sale_ratio          =  $request->flash_sale_ratio;
            $product->occational_offer          =  $request->occational_offer;
            $product->occational_offer_ratio    =  $request->occational_offer_ratio;
            $product->daily_offer               =  $request->daily_offer;
            $product->daily_offer_ratio         =  $request->daily_offer_ratio;
            $product->publication_status        =  $request->publication_status;
            $product->image                     =  $imageUrl;

            $product->update();

            return;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
