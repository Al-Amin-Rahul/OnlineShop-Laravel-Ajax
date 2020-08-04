<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DailyOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dailyOffer'] =   DailyOffer::find(1);
        return view('admin.promotion.manage-promotion', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion.add-promotion');
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

            'promotion_title'                        =>   "required",
            'publication_status'                     =>   'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dailyOffer =   new DailyOffer();
        $dailyOffer->promotion_title    =   $request->promotion_title;
        $dailyOffer->publication_status    =   $request->publication_status;
        $dailyOffer->save();
        return redirect()->back()->with('message', 'Added Successfully !');
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
        $data['dailyOffer'] =   DailyOffer::find($id);
        return view('admin.promotion.edit-promotion', $data);
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
        $dailyOffer = DailyOffer::find($id);

        $dailyOffer->update([
            "promotion_title" => $request->promotion_title,
            "publication_status" => $request->publication_status,
        ]);

        return redirect()->route("admin.promotion.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
