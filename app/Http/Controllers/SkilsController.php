<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skils;

class SkilsController extends Controller
{
    public function skils_view(){
        $skils = Skils::where('status', 'active')->get();
        return view('backend.pages.skils_view', ['skils' => $skils]);
    }
    

    public function skils_master(Request $request){
        $edit_id = $request->input('custom_id');
        $mode = $request->input('mode');
        $skils = '';
        if ($mode === 'edit_skils' && $edit_id) {
            $skils = Skils::where('id', $edit_id)->first();
        }

        // Return the view with the $skils variable
        return view('backend.pages.skils_master', ['skils' => $skils]);
    }


    public function create_update(Request $request){
        $edit_id = $request->input('edit_id');
        if ($edit_id == '') {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $skils = new Skils;
            $skils->name = $request->name;
            $skils->description = $request->description;

            $skils->save();

            return back()->withSuccess('Skils saved successfully');
        }else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $skill = Skils::where('id', $edit_id)->first();

            $skill->name = $request->name;
            $skill->description = $request->description;

            $skill->save();

            return back()->withSuccess('Skils Update successfully');
        }
    }


    public function skils_remove(Request $request){

        $remove_id = $request->input('custom_id');
        $mode = $request->input('mode');
        if ($mode === 'remove_skils' && $remove_id) {
            Skils::where('id', $remove_id)->update(['status' => 'INACTIVE']);
        }

        return back()->withSuccess('Skill remove successfully');

    }
    public function show(){
        $skills = Skils::where('status', 'active')->get();
        return view('frontend.pages.index',['skills' => $skills]);
    }
    
}
