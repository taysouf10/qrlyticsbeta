<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Visit;
use App\Models\Compaign;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location; // <<<< Using the Façade here


class VisitController extends Controller
{
    public function store(Request $request, Compaign $compaign, Link $link){
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());
        $agent->setHttpHeaders($request->header());
        // dd($request->header());
        $agent->is('Windows');
        $device = $agent->device();
        $platform = $agent->platform();
        $browser = $agent->browser();
        $agent->isDesktop();
        $agent->isPhone();
        $agent->isRobot();

        // dd($browser);
        
        // return redirect()->to($link->link);

        $location = Location::get(request()->getClientIp());

        $link = $link->visits()
            ->create([
                'user_agent' => $request->userAgent(),
                'device' => $device,
                'platform' => $platform,
                'browser' => $browser,
                'ip' => $location->ip ,
                'city' => $location->cityName ,
                'region' => $location->regionName ,
                'country' => $location->countryName ,
                'long' => $location->longitude ,
                'lat' => $location->latitude ,
                'timezone' => $location->timezone ,
            ]);


        return redirect()->to($link->link->link);
        // dd();
        
    }
}
