<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequset;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequset $request)
    {
        $name = $request->validated('name');
        Tag::create([
            'name' => $name
        ]);

        return redirect()->route('tag.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequset $request, Tag $tag)
    {
        $name = $request->validated('name');
        $tag->update([
            'name' => $name
        ]);

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        if(!$tag->articles()->exists()){
            $tag->delete();
        }

        return redirect()->route('tag.index');
    }
}
