<?php

namespace App\Http\Controllers;

use App\Models\Tdlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TdlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Todo/Show', [
            'tdlists'=>auth()->user()->tdlist //nak dapatkan current user punya todolist, 'tdlists' ialah variable akan passkan kepada show.vue file iaitu props
        ]);
        //'tdlists from user models, sebab array so dia jadi tdlists
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $validated = $request->validate([
            'name' => 'required|min:2',
        ]); 

       $user = auth()->user();

       $tdlist = new Tdlist();
       $tdlist->name = $validated['name'];
       $user->tdlist()->save($tdlist);

       return redirect()->back();
    }

    public function show(Tdlist $tdlist)
    {
        //
    }

    public function edit(Tdlist $tdlist)
    {
       // dd($tdlist);
        return inertia('Todo/Todoedit', [
            'tdlist'=>$tdlist
        ]);
        
    }

    public function update(Request $request, Tdlist $tdlist)
    {
       //dd($request->all(), $tdlist);
       $tdlist-> name = $request -> tdlist;
       $tdlist->save();

       return Redirect::route('tdlists.index');

    }

    public function destroy(Tdlist $tdlist)
    {
        $tdlist->delete();

        return Redirect::route('tdlists.index');

    }
}
