<?php

namespace App\Services;

use App\Models\PackingSize;
use App\Models\Product;
use App\Models\StatusLog;
use App\Models\Team;
use App\Models\User;
use App\Models\Visit;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    protected $defaultPage = 5;
    protected $orderBy = 'DESC';

    public function getAllcustomers()
    {
        $customers = User::where('user_type','users')->with('state','city','creator','image');
        if(auth()->user()->hasRole('Employee')){
            $customers = $customers->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $customers = $customers->whereIn('created_by',$users);
        }elseif(auth()->user()->hasRole('Admin')){
            $customers = $customers;
        }

        return $customers->orderBy('id',$this->orderBy)->paginate($this->defaultPage);

    }

    public function getcustomersByFilter($request)
    {
        $customers = User::where('user_type','users')->with('state','city','creator','image');
        if(auth()->user()->hasRole('Employee')){
            $customers = $customers->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $customers = $customers->whereIn('created_by',$users);
        }elseif(auth()->user()->hasRole('Admin')){
            $customers = $customers;
        }

        return  $customers
        ->where( function($q)use($request){
            if($request->seach_term !='' && $request->seach_term ){
                $q->where('first_name', 'like', '%'.$request->seach_term.'%')
                ->orWhere('last_name', 'like', '%'.$request->seach_term.'%')
                ->orWhere('mobile', 'like', '%'.$request->seach_term.'%')
                ->orWhere('email', 'like', '%'.$request->seach_term.'%');
            }else if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                $filter = $request->filter_item;
                if(getType( $filter) != 'array'){
                    if($request->type == 'city'){
                        $q->where('city_id', $filter);
                    }else if($request->type == 'status'){
                        $q->where('status', $filter);
                    }
                }else{
                    $q->whereDate('created_at','>=',$filter['startDate'])->whereDate('created_at','<=',$filter['endDate']);
                }

            }

        })
        ->orderBy('id',$this->orderBy)
        ->paginate($this->defaultPage);
    }

    public function createStatusLog($visit,$data,$action=null)
    {
        try{
            $statusdata = [
                'action' => $action ? $action : 'update',
                'logs' => json_encode($visit->toArray()),
                'changes' => $this->getStatusById($data['status']),
                'created_by' => auth()->user()->id,
            ];
            $visit->statuslog()->create($statusdata);
        }catch(Exception $e){
            return [];
        }

    }

    public function getStatusById($id){
        if($id == 1){
            return 'Open - Not Contacted';
        }elseif($id ==2){
            return 'Working - Contacted';
        }elseif($id ==3){
            return 'Closed - Converted';
        }elseif($id ==4){
            return 'Closed - Not Converted';
        }
    }

    // Get exported Data

    public function visitExportData($request)
    {
        $customers =  User::where('user_type','users')->with('state','city','creator','image')
        ->where( function($q)use($request){
            if($request->seach_term !='' && $request->seach_term ){
                $q->where('first_name', 'like', '%'.$request->seach_term.'%')
                ->orWhere('last_name', 'like', '%'.$request->seach_term.'%')
                ->orWhere('mobile', 'like', '%'.$request->seach_term.'%')
                ->orWhere('email', 'like', '%'.$request->seach_term.'%');
            }else if($request->filter_item !='' && $request->filter_item && $request->type !=null ){
                $filter = $request->filter_item;
                if(getType( $filter) != 'array'){
                    if($request->type == 'city'){
                        $q->where('city_id', $filter);
                    }else if($request->type == 'status'){
                        $q->where('status', $filter);
                    }else if($request->type == 'craeted_date'){
                        $q->whereDate('craeted_at', $filter);
                    }
                }else{
                    $q->whereDate('created_at','>=',$filter['startDate'])->whereDate('created_at','<=',$filter['endDate']);
                }

            }

        });

        if(auth()->user()->hasRole('Employee')){
            $customers = $customers->where('created_by',auth()->user()->id);
        }elseif(auth()->user()->hasRole('Supervisor')){
            $teams = Team::where('team_lead_id',auth()->user()->id)->pluck('id');
            $users = User::whereIn('id',$teams)->pluck('id');
            $customers = $customers->whereIn('created_by',$users);
        }elseif(auth()->user()->hasRole('Admin')){
            $customers = $customers;
        }

        return $customers->latest()->get();
    }
}
