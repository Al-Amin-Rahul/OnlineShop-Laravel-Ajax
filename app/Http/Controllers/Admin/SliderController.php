<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('publication_status',1)->get();
        return view('admin.slider.manage-slider', ['sliders' =>  $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider =   new Slider();
        $validator = Validator::make($request->all(), [
            "title"              => "required|max:100",
            "short_description"  => "required|max:200",
            "slider_image"       => "required|max:10000",
            "location"           => "required",
            "publication_status" => "required",
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        else
        {
            $slider->insertSlider($request);
            return redirect()->back()->with('message', 'Slider Added Successfully !');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider =   Slider::find($id);
        return view('admin.slider.edit-slider', [
            'slider'   =>  $slider
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
        $validator   =   Validator::make($request->all(), [
            'title'             =>   'required|max:100',
            'short_description' =>   'required|max:200',
        ]);

        if($validator->fails())
        {
            return  redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $slider = new Slider();
            $slider->updateSlider($request, $id);
            return redirect()->back()->with('message', 'Slider Updated Successfully !');
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
        $slider =   Slider::find($id);
        File::delete($slider->slider_image);

        $slider->delete($id);
        return redirect()->back()->with('message', 'Slider Deleted Succesfully');
    }
}
