<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;


class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::orderBy('premiere_date')->get();

        return view('seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        $view = view('seasons.show', compact('season'));
        
        return request()->ajax() ? $view->fragment('modal') : $view;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        $season->delete();

        return redirect()->route('seasons.index')->with('success', 'Сезон удалён');
    }
}
