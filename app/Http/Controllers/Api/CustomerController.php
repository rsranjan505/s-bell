<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\UserRule;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public CustomerService $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
     /**
     * Create User
     * @param Request $request
     * @return User
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile'=>['required','min:10','numeric',new UserRule($request->input('user_type'))],
        ]);
        $user = $this->customerService->createCustomer($request);
        if(!$user){
            return bad('invalid',[]);
        }
        return ok('customer created',$user);
    }
}
