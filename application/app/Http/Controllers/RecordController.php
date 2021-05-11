<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Record;
use Illuminate\Support\Facades\Log;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->input('metadata') = json_decode($request->input('metadata'));
        //$request->input('data') = json_decode($request->input('data'));

        if (is_array($request->input('metadata'))) {
            $metadata = $request->input('metadata');
        } elseif (is_string($request->input('metadata'))) {
            $metadata = json_decode(trim($request->input('metadata')), true);
        } else {
            throw new \Exception('Metadata format is unreadable');
        }

        if (is_array($request->input('data'))) {
            $data = $request->input('data');
        } elseif (is_string($request->input('data'))) {
            $data = json_decode(trim($request->input('data')), true);
        } else {
            throw new \Exception('Data format is unreadable');
        }

        $record_array = [
            'owner' => $request->input('owner'),
            'collection_id' => $request->input('collection'),
            'metadata' => $metadata,
            'data' => $data,
        ];

        if ($request->expectsJson()) {
            return Record::create($record_array);
        } else {
            Record::create($record_array);
            return redirect("/collections/" . $request->input('collection'));
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
        $record = Record::findOrFail($id);

        if ($request->expectsJson()) {
            return $record;
        } else {
            return $record;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {


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
        Log::debug('got in the right function');
        $record = Record::findOrFail($id);

        $updated = $request->input('record');

        if (is_array($updated['metadata'])) {
            $new_metadata = $updated['metadata'];
        } elseif (is_string($updated['metadata'])) {
            $new_metadata = json_decode(trim($updated['metadata']), true);
        } else {
            throw new \Exception('Metadata format is unreadable');
        }

        if (is_array($updated['data'])) {
            $new_data = $updated['data'];
        } elseif (is_string($updated['data'])) {
            $new_data = json_decode(trim($updated['data']), true);
        } else {
            throw new \Exception('Data format is unreadable');
        }

        $record->data = $new_data;
        $record->metadata = $new_metadata;
        Log::debug($record);
        $record->save();

        if ($request->expectsJson()) {
            return $record;
        } else {
            return redirect("/collections/" . $record->collection);
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
        //
    }
}
