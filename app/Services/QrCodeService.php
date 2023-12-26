<?php

namespace App\Services;

use App\Models\Team;
use App\Models\User;


class QrCodeService
{
    protected $defaultPage = 5;
    protected $orderBy = 'DESC';

    public function createQrProfile($request){

        $this->QrCodeGenerator();
        // $user = User::create([
        //     'user_id' => $request->customer_id,
        //     'house_number' => $request->house_number,
        //     'full_address' => $request->full_address,
        //     'qr_code' => $request->address,
        //     'is_generated' => $request->state_id,
        //     'agent_id' => $request->agent_id,
        // ]);

        // return $user;
    }

    public function QrCodeGenerator(){

        return \QrCode::size(300)
        ->backgroundColor(255,55,0)
        ->generate('A simple example of QR code');
    }
}
