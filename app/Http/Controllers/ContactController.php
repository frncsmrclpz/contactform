<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPost as Post;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Post::orderBy('id', 'desc')->paginate(5);

        return view('list', compact('contacts', $contacts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required','min:6','max:30'],
            'email'  => ['required','email'],
            'contactno'  => ['required', 'digits:11'],
            'description' => 'min:60'
        ]);

        $post = new Post;
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->contactno = $request->input('contactno');
        $post->description = $request->input('description');
        $post->save();
        

        return redirect('/contactposts')->with('success', 'Sent');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('list', compact('list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contacts = Post::findOrFail($id);

        return view('edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => ['required','min:6','max:36'],
            'email'  => ['required','email'],
            'contactno'  => ['required', 'digits:11'],
            'description' => 'min:10'
        ]);

        $contacts = Post::findOrFail($id);

        $contacts->name = $request->input('name');
        $contacts->email = $request->input('email');
        $contacts->contactno = $request->input('contactno');
        $contacts->description = $request->input('description');
        $contacts->save();
        

        return redirect('/contactposts')->with('success', 'Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contacts = Post::findOrFail($id);
        $contacts->delete();

        return redirect('/contactposts')->with('success', 'Contact has been Deleted!');
    }
}
