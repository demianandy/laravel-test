<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Category;
use App\Models\Quote;
use App\Models\Episode;
use Illuminate\Support\Facades\Storage;


class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::with('quotes')->paginate(5); 
        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $character = Character::pluck('name', 'id')->all();
        $episodes = Episode::pluck('title', 'id')->all();

        return view('admin.characters.create', compact('character', 'episodes'));
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
            'name' => 'required',
            'birthday' => 'required',
            'img' => 'required||image',
            'nickname' => 'required',
            'portrayed' => 'nullable',
        ]);
 

        $data = $request->all();



        $data['occupations'] = [
            "Главная роль" => $data['occupations'],
            "Каскадерская роль" => $data['occupations2'],
        ];




        $Character = Character::create($data);

        $Character->episodes()->sync($request->episodes);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store("images");
        }

    

        return redirect()->route('characters.index')->with('success', 'Персонаж добавлен');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $character = Character::find($id);
        $episodes = Episode::pluck('title', 'id')->all();

        return view('admin.characters.edit', compact('episodes', 'character'));
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
            'name' => 'required',
            'birthday' => 'required',
            'img' => 'required||image',
            'nickname' => 'required',
            'portrayed' => 'nullable',
        ]);


        
        $Character = Character::find($id);
        $data = $request->all();

        $data['occupations'] = [
            "Главная роль" => $data['occupations'],
            "Каскадерская роль" => $data['occupations2'],
        ];


        $Character->update($data);
        
        $Character->episodes()->sync($request->episodes);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store("images");
        }


        return redirect()->route('characters.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Character = Character::find($id);
        $Character->episodes()->sync([]);
        Storage::delete($Character->img);

        $Character->delete();


        return redirect()->route('characters.index')->with('success', 'Персонаж удален');
    }
}
