<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('password.confirm')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entries.index', [
            'entries' => auth()->user()->entries()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry = auth()->user()->entries()->create($request->validate([
            'body' => 'required',
        ]));

        return redirect(route('entries.show', $entry))->with('success', 'Entry saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        $this->authorize('update', $entry);
        
        return view('entries.show', compact('entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        $this->authorize('update', $entry);
        return view('entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $this->authorize('update', $entry);
        $entry->body = $request->body;
        $entry->save();
        
        return redirect(route('entries.show', $entry))
            ->with('success', 'Entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        $this->authorize('update', $entry);
        
        $entry->delete();
        
        return redirect(route('entries.index'))
            ->with('success', 'Entry updated successfully');
    }
}
