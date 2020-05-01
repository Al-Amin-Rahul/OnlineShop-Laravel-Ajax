<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['m_categories'] = Category::all();
        return view('admin.category.manage-category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "category_name"      => "required|unique:categories,category_name",
            "parent_id"          => "required",
            "publication_status" => "required",
            "category_image"     => "required|max:10024"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $category = new Category();
            $category->insertCategory($request);
            return redirect()->back()->with('message', 'Category Added Successfully !');
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
        $category   =   Category::find($id);
        $pid    =   $category->parent_id;
        return view('admin.category.edit-category',[
            'category'   => $category,
            'pid'   => $pid
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
        $validator = Validator::make($request->all(), [
            "category_name" => "required|unique:categories,category_name,$id",
            "parent_id"          => "required",
            "publication_status" => "required"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $category = new Category();
            $category->updateCategory($request, $id);
            return redirect()->back()->with('message', 'Category Updated Successfully !');
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
        $category = Category::find($id);

        File::delete($category->category_image);
        $category->delete($id);
        return redirect()->back()->with('message', 'Category Deleted Successfully !');
    }
}
