<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products   =   Product::where('publication_status', 1)->get();
        return view('admin.product.manage-product',[
            'products' =>  $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product    =   new Product();
        $validator = Validator::make($request->all(), [

            'name'                        =>   'required|unique:products',
            'category_id'                 =>   'required',
            'code'                        =>   'required|unique:products',
            'stock'                       =>   'required',
            'price'                       =>   'required',
            'description'                 =>   'required',
            'product_feature'             =>   'required',
            'top_sale'                    =>   'required',
            'flash_sale'                  =>   'required',
            'flash_sale_ratio'            =>   'required',
            'occational_offer'            =>   'required',
            'occational_offer_ratio'      =>   'required',
            'daily_offer'                 =>   'required',
            'daily_offer_ratio'           =>   'required',
            'publication_status'          =>   'required',
            'image'                       =>   'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else
        {
            $product->insertProduct($request);
            return redirect()->back()->with('message', 'Product Added Successfully !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    =   Product::find($id);
        $pid        =   $product->category_id;
        return view('admin.product.edit-product', [
            'product'   =>  $product,
            'pid'   =>  $pid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product    =   new Product();
        $validator = Validator::make($request->all(), [

            'name'                        =>   "required|unique:products,name,$id",
            'category_id'                 =>   'required',
            'code'                        =>   "required|unique:products,code,$id",
            'stock'                       =>   'required',
            'price'                       =>   'required',
            'description'                 =>   'required',
            'product_feature'             =>   'required',
            'top_sale'                    =>   'required',
            'flash_sale'                  =>   'required',
            'flash_sale_ratio'            =>   'required',
            'occational_offer'            =>   'required',
            'occational_offer_ratio'      =>   'required',
            'daily_offer'                 =>   'required',
            'daily_offer_ratio'           =>   'required',
            'publication_status'          =>   'required',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else
        {
            $product->updateProduct($request, $id);
            return redirect()->back()->with('message', 'Product Updated Successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product    =   product::find($id);
        File::delete($product->image);
        $product->delete($id);
        return redirect()->back()->with('message', 'Product Deleted Successfully !');

    }
}
