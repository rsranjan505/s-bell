<?php

namespace App\Http\Controllers;

use App\Models\QrProfile;
use Illuminate\Http\Request;

class QrProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->generateQrCode();
    }

    /**
     * Display the specified resource.
     */
    public function show(QrProfile $qrProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QrProfile $qrProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrProfile $qrProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QrProfile $qrProfile)
    {
        //
    }

    public function generateQrCode()
    {
         $image = \QrCode::format('png')
            ->merge('assets/img/qr-logo.png', 0.5, true)
                         ->size(500)->errorCorrection('H')
            ->backgroundColor(255,55,0)
            ->generate('https://sortieservices.in');

            return response($image)->header('Content-type','image/png');
    }
}
