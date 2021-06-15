<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Quote;
use App\Models\Character;


class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::with(['characters', 'quotes'])->paginate(10);  

        return view('admin.episodes.index', compact('episodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characters = Character::pluck('name', 'id')->all();

        return view('admin.episodes.create', compact('characters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'air_date' => 'required',
        ]);




        $data = $request->all();

        $episode = Episode::create($data);

        $episode->characters()->sync($request->characters);

        // Category::create($request->all());

        return redirect()->route('episodes.index')->with('success', 'Эпизод добавлен');

        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episode::find($id);
        $characters = Character::pluck('name', 'id')->all();

        return view('admin.episodes.edit', compact('episode', 'characters'));
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
        $request->validate([
            'title' => 'required',
        ]);


        $episode = Episode::find($id);




        


        $data = $request->all();

        $episode->update($data);

        $episode->characters()->sync($request->characters);



        return redirect()->route('episodes.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Episode::destroy($id);

        return redirect()->route('episodes.index')->with('success', 'Эпизод удалён');
    }
}
