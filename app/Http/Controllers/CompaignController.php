<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Compaign;
use Auth;
class CompaignController extends Controller
{
    public function index(){

        $compaigns = Auth::user()->compaigns()->get();
        
        return view('compaigns.index', [
            'compaigns' => $compaigns,
        ]);
    }
    public function create(){
        return view('compaigns.create');
    }
    public function store(Request $request){
         $compaign = Auth::user()->compaigns()->create($request->only(['name', 'objective']));

        if($compaign) {
            return redirect()->to('/dashboard/compaigns');
        }

        return redirect()->back();

        //  return Auth::user()->compaigns()->find(1)->compaigns()->create($request->only(['name', 'compaign']));;

        // return 'hello';
    }
    public function edit(Compaign $compaign){
        
    }
    public function update(Request $request, Compaign $compaign){
        
    }
    public function destroy(Request $request, Compaign $compaign){
        
    }
}
