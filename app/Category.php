<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Category extends Model
{
    public function insertCategory($request){

        $category = new Category();

        if ($request->hasFile("category_image"))
        {
            $image      = $request->file("category_image");
            $directory  = "images/";
            $name       = "IMG_" . date("Ymd_his") . "." . $image->getClientOriginalExtension();
            $image->move($directory, $name);
            $imageURL   = $directory.$name;

            $category->category_name  = $request->category_name;
            $category->slug  = Str::slug($request->category_name);
            $category->category_image = $imageURL;
            $category->parent_id = $request->parent_id;
            $category->publication_status = $request->publication_status;
            
            $category->save();
            
            return;
        }
    }

    public function updateCategory($request, $id)
    {
        
        $category   = Category::find($id);

        if ($request->hasFile("category_image"))
        {
            File::delete($category->category_image);

            $image      = $request->file("category_image");
            $directory  = "images/";
            $name       = "IMG_" . date("Ymd_his") . "." . $image->getClientOriginalExtension();
            $image->move($directory, $name);
            $imageURL   = $directory.$name;      
        }
        else
        {
            $imageURL   =   $category->category_image;            
        }
        
        $category->category_name  = $request->category_name;
        $category->slug  = Str::slug($request->category_name);
        $category->category_image  = $imageURL;
        $category->parent_id = $request->parent_id;
        $category->publication_status = $request->publication_status;
        $category->update();

        return;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
