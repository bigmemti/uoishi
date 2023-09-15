<?php

namespace App\Http\Controllers;

use App\Models\Prefix;
use App\Http\Requests\StorePrefixRequest;
use App\Http\Requests\UpdatePrefixRequest;

class PrefixController extends Controller
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
     * @param  \App\Http\Requests\StorePrefixRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefixRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function show(Prefix $prefix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function edit(Prefix $prefix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrefixRequest  $request
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrefixRequest $request, Prefix $prefix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prefix $prefix)
    {
        //
    }
}
