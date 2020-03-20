<?php

namespace App\Http\Controllers;

use App\Receipe;
use App\Category;
use App\Mail\ReceipeStored;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReceipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {

        $data = Receipe::where('author_id',auth()->id())->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*$validatedData = $request->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category' => 'required'
        ]);

        $receipe = new Receipe();
        $receipe->name = $request->name;
        $receipe->ingredients = $request->ingredients;
        $receipe->category = $request->category;
        $receipe->save();

        return redirect("receipe");*/
        /*dd(request()->all());*/
        $validatedData = request()->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category' => 'required'
        ]);

        /*$receipe = new Receipe();
        $receipe->name = request()->name;
        $receipe->ingredients = request()->ingredients;
        $receipe->category = request()->category;
        $receipe->save();*/

        $receipe = Receipe::create($validatedData+['author_id'=>auth()->id()]);
        
        return redirect("receipe");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function show(Receipe $receipe)
    {
        /*if($receipe->author_id !=auth()->id()){
            abort(403);
        }*/
    
        $this->authorize('view',$receipe);
        return view('show',compact('receipe'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipe $receipe)
    {
        $this->authorize('view',$receipe);
        $category = Category::all();
        return view('edit',compact('receipe','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function update(Receipe $receipe)
    {
        $this->authorize('view',$receipe);
        $validatedData = request()->validate([
        'name' => 'required',
        'ingredients' => 'required',
        'category' => 'required'
        ]);

        /*$receipe = Receipe::find($receipe->id);
        $receipe->name = request()->name;
        $receipe->ingredients = request()->ingredients;
        $receipe->category = request()->category;
        $receipe->save();*/

        $receipe->update($validatedData);
        session()->flash("message",'Recipe has updated successfully!');

        return redirect("receipe");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipe  $receipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipe $receipe)
    {
        $this->authorize('view',$receipe);
        $receipe->delete();
        session()->flash("message",'Recipe has deleted successfully!');
        return redirect("receipe");
    }
}
