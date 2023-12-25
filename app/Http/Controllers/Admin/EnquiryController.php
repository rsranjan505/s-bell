<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enquiry = Enquiry::orderBy('id','DESC')->paginate(5);
        if($request->ajax()){
            $enquiry =  Enquiry::
                where( function($q)use($request){
                if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                    $filter = $request->filter_item;
                    if(getType( $filter) != 'array'){
                        if($request->type == 'status'){
                            $q->where('status', $filter);
                        }
                    }else{
                        $q->whereDate('created_at','>=',$filter['startDate'])->whereDate('created_at','<=',$filter['endDate']);
                    }
                }

            })
            ->orderBy('id','DESC')
            ->paginate(5);
            return view('admin.pages.enquiry.filter-enquiry',compact('enquiry'))->render();
        }
        return view('admin.pages.enquiry.list',compact('enquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        $data = $request->all();
        $enquiry = Enquiry::create($data);

        return ok($enquiry,'Your message has been sent. Thank you!');
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
        //
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
        $request->validate([
            'name' => 'required',
        ]);

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->update($request->all());
        if($enquiry){
            return redirect()->route('enquiry.index')->with('success','Enquiry updated Successfully');
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
        $enquiry = Enquiry::findOrFail($id);
        if($enquiry){
            $enquiry->delete();
            return ok($enquiry,'Enquiry Deleted successfully');
        }
    }

    //Export data
    public function exportVisit(Request $request){
        // return Json(new { Result = "true", Message = "Success", FileName = fname,Entity=entityvalue });
        if(Auth::check()){
            // return Excel::download(new ExportVisits($request,$this->visitService), 'visits.csv');
        }
        return redirect()->route('visit.index')->with('danger','Unauthorized access');
    }
}
