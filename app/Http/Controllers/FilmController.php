<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Film::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $film = new Film;
        $film->fill($request->validated());
        $film->poster = $request->poster->store('posters');
        return $film->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Film::findOfFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
        if ($request->has('poster')) {
            Storage::delete($film->poster);
            $film->poster = $request->poster->store('posters');
        }
        $film->fill($request->safe()->except('poster'));
        return $film->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if ($film->delete()) {
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return null;
    }
}
