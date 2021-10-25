<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Officer;

use DataTables;

class OfficerController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $officer = Officer::all();
        return view('index', compact('officer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $storeOfficerData = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'role' => 'required|max:255',
            //'password' => 'required|confirmed|min:6|regex:/[A-Z]/|regex:/[0-9]/',
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);
        $officer = Officer::create($storeOfficerData);

        return redirect('/officers')->with('completed', 'A new officer has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $officer = Officer::findOrFail($id);
        return view('edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $updateOfficerData = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'role' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        Officer::whereId($id)->update($updateOfficerData);
        return redirect('/officers')->with('completed', 'Officer has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $officer = Officer::findOrFail($id);
        $officer->delete();

        return redirect('/officers')->with('completed', 'Officer has been deleted');
    }
}
