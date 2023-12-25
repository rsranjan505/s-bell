<?php

namespace App\Http\Controllers\Admin\location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::with('state')->orderBy('name','ASC')->paginate(10);
        $states = State::all();
        if($request->ajax()){
            $cities = City::with('state')
                        ->where( function($q)use($request){
                            if($request->seach_term !='' && $request->seach_term){
                                $q->where('name', 'like', '%'.$request->seach_term.'%');
                            }
                            if($request->state_id !='' && $request->state_id ){
                                $q->where('state_id',$request->state_id);
                            }

                        })
                        ->paginate(10);
            return view('admin.pages.city.filter-city', compact('cities','states'))->render();
        }
        return view('admin.pages.city.list',['cities'=>$cities,'states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.pages.city.add', compact('states'));
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
            'state_id' => 'required|numeric',
            'name' => 'required|unique:cities,name,'.$request->state_id.',id',
        ]);
        $data = $request->all();
        $city = new City();
        $city->create($data);
        return redirect()->route('city.index')->with(['success'=>'City Has been successfully added']);
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
        $states = State::all();
        $city = City::findOrFail($id);
        return view('admin.pages.city.edit',compact('city','states'));
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
            'state_id' => 'required|numeric',
            'name' => 'required|unique:cities,name,'.$request->state_id.',id',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());
        if($city){
            return redirect()->route('city.index')->with(['success'=>'City Has been successfully updated']);
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
        $city = City::findOrFail($id);
        if($city){
            $city->delete();
            return ok($city,'City Deleted successfully');
        }
    }

    public function getCity($state_id)
    {
        $cities = City::where('state_id',$state_id)->get();
        return $cities;
    }
}
