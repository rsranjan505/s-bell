<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation = Designation::with('creator')->paginate(5);
        return view('admin.pages.designation.list',compact('designation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.designation.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $data['created_by'] = auth()->user()->id;
        $designation = new Designation();
        $designation->create($data);
        if($designation){
            return redirect()->route('designation.index')->with('success','Designation created Successfully');
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
        $designation = Designation::findOrFail($id);
        return view('admin.pages.designation.edit',compact('designation'));
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

        $designation = Designation::findOrFail($id);
        $designation->update($request->all());
        if($designation){
            return redirect()->route('designation.index')->with('success','Designation updated Successfully');
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
        $designation = Designation::findOrFail($id);
        if($designation){
            $designation->delete();
            return ok($designation,'Designation Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $designation = Designation::findOrFail($id);
        $value = !$designation->is_active;
        $designation->update([
            'is_active' => (int) $value,
        ]);

        return ok($designation,'Status Changed successfully');
    }
}
