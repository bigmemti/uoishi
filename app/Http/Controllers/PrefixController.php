<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prefix;
use App\Http\Requests\StorePrefixRequest;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('viewAny', [Prefix::class,$user]);

        $prefixes = $user->prefixes;

        return view('prefix.index', ['prefixes' => $prefixes, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePrefixRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefixRequest $request, User $user)
    {
        $user->prefixes()->create($request->validated());

        return to_route('user.prefix.index', ['user' => $user])->with('success', __("Prefix Successfully created."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prefix $prefix)
    {
        $this->authorize('delete', $prefix);

        $user = $prefix->user_id;
        $prefix->delete();

        return to_route('user.prefix.index', ['user' => $user])->with('success', __("Prefix Successfully deleted."));
    }
}
