<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Character;


class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::with('character')->paginate(10);  
        return view('admin.quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $characters = Character::pluck('name', 'id')->all();
        return view('admin.quotes.create', compact('characters'));
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
            'quote' => 'required',
            'character_id' => 'required',
        ]);

        Quote::create($request->all());


        return redirect()->route('quotes.index')->with('success', 'Фраза добавлена');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quote::find($id);
        $characters = Character::pluck('name', 'id')->all();
        return view('admin.quotes.edit', compact('characters', 'quote'));
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
            'quote' => 'required',
        ]);

        $quote = Quote::find($id);

        $quote->update($request->all());

        return redirect()->route('quotes.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $Quote = Quote::find($id);

        // $Quote->delete();

        Quote::destroy($id);

        return redirect()->route('quotes.index')->with('success', 'Фраза удалена');
    }
}
