<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function searchProducts(Request $request)
    {
        // $seperate           =   explode(' ', $request->search_field);
        $data['key']        =   $request->search_field;
        $data['products']   =   Product::where("name", "Like", "%".$request->search_field."%")->get();
        $data['length']     =   count($data['products']);
        return view('front.search.search', $data);
    }

    function Products(Request $request)
    {
        $products = Product::where("name", "LIKE", "%".$request->search_field."%")->orderBy("name", "ASC")->get();
        if (count($products)) {
            foreach ($products as $product) {
                $availableProducts[] = $product->name;
            }
        } else {
            $availableProducts[] = "Not Found";
        }
        return $availableProducts;
    }
}
