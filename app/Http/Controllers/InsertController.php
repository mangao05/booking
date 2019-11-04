<?php

namespace App\Http\Controllers;

use App\Insert;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insert.index');
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
        // $array = ['x', 'y','z'];
        $array[] = [
            'names' => ['Jeric','Estrope', 'Mangao'],
            'address' =>['Comembo', 'Makati', 'City'],
            'email'=> ['mangao_jeric@yahoo.com', 'mangaojeric0505@gmail.com']
        ];
        $serializedArr = serialize($array);

        $insert = new Insert();
        $insert->options = $serializedArr;
        $insert->save();
        return $insert;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insert  $insert
     * @return \Illuminate\Http\Response
     */
    public function show(Insert $insert)
    {
        $insert = Insert::find(3);
        $options = unserialize($insert->options);
        foreach($options as $option){
            return $option['names'][2];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insert  $insert
     * @return \Illuminate\Http\Response
     */
    public function edit(Insert $insert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insert  $insert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insert $insert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insert  $insert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insert $insert)
    {
        //
    }
}
