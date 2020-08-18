<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OccationalOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OccationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['occation']   =   OccationalOffer::first();
        return view('admin.offer.manage-occational', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offer.add-occational-offer-title');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $validator = Validator::make($request->all(), [

            'occational_offer_title'                        =>   "required",
            'publication_status'                            =>   'required'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $occational =   new OccationalOffer();

        $occational->occational_offer_title    =   $request->occational_offer_title;
        $occational->publication_status        =   $request->publication_status;
        $occational->save();
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
        $data['occation'] =   OccationalOffer::find($id);
        return view('admin.offer.edit-occational', $data);
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
        $occation = OccationalOffer::find($id);

        $occation->update([
            "occational_offer_title" => $request->occational_offer_title,
            "publication_status" => $request->publication_status,
        ]);

        return redirect()->route("admin.occation.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $occation = OccationalOffer::find($id);

        // $occation->delete($id);
        // return redirect()->back()->with('message', 'Deleted Successfully !');
    }
}
