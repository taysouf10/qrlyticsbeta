<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;
use App\Models\Compaign;
use App\Models\Visit;


use Auth;
use DB;
use Illuminate\Support\Facades\Route;

class LinkController extends Controller
{
    public function index(Request $request, Compaign $compaign){

        $links = Auth::user()->compaigns->find($compaign->id)->links()
                ->withCount('visits')
                ->with('latest_visit')
                ->get();

        // dd(Route::currentRouteName());

        return view('links.index', [
            'links' => $links,
            'compaign' => $compaign
        ]);
    }
    public function create(Compaign $compaign){
        // return 'hello';
        return view('links.create', [
            'compaign' => $compaign
        ]);
    }
    public function store(Request $request, Compaign $compaign){
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|url'
        ]);
    
        $link = Auth::user()->compaigns->find($compaign->id)->links()->create([
            'name' => request('name'),
            'link' => request('link'),
            'user_id' => Auth::user()->id
        ]);;
        //  $link = Auth::user()->compaigns->find($compaign->id)->links()->create($request->only(['name', 'link']));
        //  dd($link);
        if($link) {
            return redirect()->to('/dashboard/compaigns/'.$compaign->id.'/links');
        }

        // return redirect()->back();

        //  return Auth::user()->compaigns()->find(1)->links()->create($request->only(['name', 'link']));;

        // return 'hello';
    }
    public function show(Compaign $compaign, Link $link){
        $device_array = $link->visits->groupBy('device')->toArray();
        $date_array = Visit::select(DB::raw('DATE_FORMAT(`created_at`,"%Y-%m-%d") as formatted'), DB::raw('count(*) as value'))->where('link_id', '=', $link->id)->groupBy('formatted')->get()->toArray();
        $city_array = Visit::select('city', DB::raw('count(*) as value'))->where('link_id', '=', $link->id)->groupBy('city')->get()->toArray();

        // dd($city_array);

        $devices_keys = array_keys($device_array);
        $devices_values = array();

        $date_labels = array();
        $date_values = array();

        $city_keyvalues = array();

        $totalscans = array_sum($date_values);

        foreach (array_values($device_array) as $devicekey){
            $size = sizeof($devicekey);
            array_push($devices_values,$size);
        }

        foreach(array_values($date_array) as $keey){
            array_push($date_labels,$keey["formatted"]);
            array_push($date_values,$keey["value"]);
        }

        $totalscans = array_sum($date_values);

        foreach(array_values($city_array) as $ky){
            $city_keyvalues[$ky["city"]] = round(100 * ($ky["value"]/$totalscans));
        }

        arsort($city_keyvalues);

        // dd($city_keyvalues);

        // dd(array_sum(array_values($city_keyvalues)));

        return view('links.details', [
            'compaign' => $compaign,
            'link' => $link,
            'devices_keys' => $devices_keys,
            'devices_values' => $devices_values,
            'date_labels' => $date_labels,
            'date_values' => $date_values,
            'total_scans' => $totalscans,
            'cities_array' => $city_keyvalues


            // 'browser_keys' => ,
            // 'browser_values' => ,
            // 'platform_keys' => ,
            // 'platform_values' => ,
        ]);
    }
    
    public function edit(Link $link){
        
    }
    public function update(Request $request, Link $link){
        
    }
    public function destroy(Request $request, Link $link){
        
    }

    public function showall(){
        $links = Auth::user()->links()
        ->withCount('visits')
        ->with('latest_visit')
        ->get();;
        
        return view('links.showall', [
            'links' => $links,
        ]);
    }
}
