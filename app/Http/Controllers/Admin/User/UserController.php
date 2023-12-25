<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Role;
use App\Models\State;
use App\Models\Team;
use App\Models\User;
use App\Rules\UserRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data['state'] = State::all();
        $data['roles']  = Role::all();
        $data['departments']  = Department::all();
        $data['designations']  = Designation::all();
        return view('admin.pages.users.add',['data'=>$data]);
    }

     /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        if(!$request->has('checkcustomer')){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile'=>['required','min:10','numeric',new UserRule($request->input('user_type'))],
                // 'mobile'=>['required',Rule::unique('users', 'user_type')->where('mobile', $request->input('mobile'))->where('user_type', $request->input('user_type'))],
                'roles' => 'required',
                'user_type' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
        }else{
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'mobile'=>['required','min:10','numeric',new UserRule($request->input('user_type'))],
            ]);
        }


        $request['password'] = Hash::make($request->password);
        $request['user_type'] = $request->has('checkcustomer') ? 'users' : $request->user_type;
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'role_id' => $request->role_id,
                'user_type' => $request->user_type,
                'address' => $request->address,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
                'pincode' => $request->pincode,
                'is_active' => 1,
                'email' => $request->email,
                'password' => $request['password'],

            ]);

            if(!$request->has('checkcustomer')){
                $user->assignRole($request->input('roles'));

                if($request->avatar !=null){
                    $image = $this->fileUpload($request->avatar,$user,'local');
                    $image['document_type']='avatar';
                    $user->image()->create($image);
                }
            }


            return redirect()->route('admin-user-list')->with('success','User created Successfully');
    }

    public function userList(Request $request)
    {
        $users = User::with('image','state','city','image','team','department','designation')->latest()->paginate(5);
        $teams = Team::with('leader')->latest()->get();
        $departments  = Department::all();
        $designations  = Designation::all();
        $roles  = Role::all();
        // $cities  = City::all();
        if($request->ajax()){
            $users = User::with('image','state','city','image','team','department','designation')
                        ->where( function($q)use($request){
                            if($request->seach_term !='' && $request->seach_term){
                                $q->where('first_name', 'like', '%'.$request->seach_term.'%')
                                ->orWhere('email', 'like', '%'.$request->seach_term.'%')
                                ->orWhere('mobile', 'like', '%'.$request->seach_term.'%')
                                ->orWhere('pincode', 'like', '%'.$request->seach_term.'%');
                            }
                            else if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                                if($request->type == 'team'){
                                    $q->where('team_id',$request->filter_item);
                                }else if($request->type == 'department'){
                                    $q->where('department_id',$request->filter_item);
                                }else if($request->type == 'designation'){
                                    $q->where('designation_id',$request->filter_item);
                                }else if($request->type == 'joining_date'){
                                    $q->whereDate('joining_date','>',$request->filter_item);
                                }
                            }


                        })
                        ->paginate(5);
            return view('admin.pages.users.filter-user',compact('users','teams','departments','designations','roles'))->render();
        }
        return view('admin.pages.users.list', compact('users','teams','departments','designations','roles'));
    }

    public function show($id){
        if($id!=null){
            $user = User::find($id);
            $data['state'] = State::all();
            $data['city'] = City::where('state_id',$user->state_id)->get();
            $data['user'] = $user;
            $data['roles']  = Role::all();
            $data['departments']  = Department::all();
            $data['designations']  = Designation::all();
            return view('admin.pages.users.show',['data'=>$data]);
        }
    }

    public function edit($id){
        if($id!=null){
            $user = User::find($id);
            $data['state'] = State::all();
            $data['city'] = City::where('state_id',$user->state_id)->get();
            $data['user'] = $user;
            $data['roles']  = Role::all();
            $data['departments']  = Department::all();
            $data['designations']  = Designation::all();
            return view('admin.pages.users.edit',['data'=>$data]);
        }
    }

    public function update(Request $request){
        if($request->id !=null){
            //Validated
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'mobile' => 'required|min:10',
                'state_id' => 'numeric',
                'city_id' => 'numeric',
                'roles' => 'required',
            ]);
            $data = $request->except(['avatar','roles']);
            $user = User::findOrFail($request->id);
            $user->update($data);

            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            $user->assignRole($request->input('roles'));

            if($request->avatar !=null){
                $image = $this->fileUpload($request->avatar,$user,'local');
                $image['document_type']='avatar';
                $user->image()->create($image);
            }

            return redirect()->route('admin-user-list')->with('success','Record updated Successfully');
        }
    }

    public function changeStatus($id)
    {
        $user = User::find($id);
        $value = !$user->is_active;
        $user->update([
            'is_active' => (int) $value,
        ]);

        return ok($user,'Status Changed successfully');
    }

    public function settingView()
    {
        return view('admin.pages.users.change-password');
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth('web')->user()->id);
        //Validated
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success','Password updated Successfully');
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);
        $user->delete();
        return ok($user,'User Deleted successfully');
    }

    public function profile()
    {
        if(Auth::check()){
            $data['state'] = State::all();
            $data['city'] = City::all();
            $data['roles']  = Role::all();
            $data['user'] = auth()->user();
            $data['departments']  = Department::all();
            $data['designations']  = Designation::all();
            return view('admin.pages.users.profile',['data'=>$data]);
        }
    }

    public function assigendTeam(Request $request){

        if($this->assignedTeam($request->all())){
            return redirect()->route('admin-user-list')->with('success','Team Assigned Successfully');
        }
        return redirect()->route('admin-user-list')->with('warning','Something Error!!');
    }

    //Team Assigned
    public function assignedTeam($data)
    {
        $user = User::findOrFail($data['id']);
        $user->team_id = $data['team_id'];
        if($user->save()){
            return true;
        }
        return false;
    }
}
