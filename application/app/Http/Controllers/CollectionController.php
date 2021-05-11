<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Collection;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Collection::where('owner', $request->input('owner'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('collection.addCollection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->expectsJson()) {
            return Collection::create($request->all());
        } else {
            Collection::create($request->all());
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->expectsJson()) {
            return Collection::find($id);
        } else {
            $collection =  Collection::find($id);
            return view('collection.showCollection', ['collection' => $collection, 'user' => $request->user()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        return view('collection.editCollection', ['collection' => $collection]);
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
        $collection = Collection::findOrFail($id);
        $collection->update($request->all());

        if ($request->expectsJson()) {
            return $collection;
        } else {
            return $collection;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();
        return 204;
    }


    public function getRecords(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);
        if ($request->expectsJson()) {
            return $collection->records;
        } else {
            return $collection->records;
        }
    }
}
