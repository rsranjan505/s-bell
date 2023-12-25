<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::with('creator','leader','manager')->paginate(5);
        return view('admin.pages.team.list',compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.pages.team.add',compact('users'));
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
            'team_lead_id' => 'required',
        ]);
        $data = $request->except('_token');
        $data['created_by'] = auth()->user()->id;
        $team = new Team();
        $team->create($data);
        if($team){
            return redirect()->route('team.index')->with('success','Team created Successfully');
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
        $team = Team::with('creator','leader','manager')->findOrFail($id);
        $users = User::all();
        return view('admin.pages.team.edit',compact('team','users'));
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
            'team_lead_id' => 'required',
        ]);

        $team = Team::findOrFail($id);
        $team->update($request->all());
        if($team){
            return redirect()->route('team.index')->with('success','Team updated Successfully');
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
        $team = Team::findOrFail($id);
        if($team){
            $team->delete();
            return ok($team,'team Deleted successfully');
        }
    }

    public function changeStatus($id)
    {
        $team = Team::findOrFail($id);
        $value = !$team->is_active;
        $team->update([
            'is_active' => (int) $value,
        ]);

        return ok($team,'Status Changed successfully');
    }
}
