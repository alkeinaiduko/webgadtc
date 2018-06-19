<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulletin;

class AdminBulletinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-layouts.show-bulletin');
    }

    public function getBulletins()
    {
        return Bulletin::latest()->get();
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
        //
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
        $edit = [
            'title' => request('title'),
            'who' => request('who'),
            'what' => request('what'),
            'where' => request('where'),
            'when' => request('when'),
            'description' => request('description')
        ];

        $res = [
            'success' => 'Announcement Updated Successfully!',
        ];

        Bulletin::findOrFail($id)->update($edit);

        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bulletin = Bulletin::findOrFail($id);
        $bulletin->delete();
        return '';
    }
}
