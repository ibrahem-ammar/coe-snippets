<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::select('title')->get();
        // dd($tags);
        return view('tags.index',compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:255','unique:tags,title']
        ]);

        $tag = Tag::create(['title' => $request->title ]);

        if ($tag->title) {
            return redirect()->route('tags.index')->with([
                'status' => 'success',
                'msg' => 'tag added successfully'
            ]);
        }else {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'msg' => 'something wrong happened'
            ]);
        }
    }

    public function show($title)
    {
        $tag = Tag::where('title',$title)->first();
        if (!$tag) {
            abort(404);
        }
        $snippets = $tag->snippets->where('status',1);
        // dd($snippets->first());
        return view('tags.show',compact('tag','snippets'));
    }

    public function edit($title)
    {
        $tag = Tag::where('title',$title)->first();
        return view('tags.edit',compact('tag'));
    }

    public function update(Request $request,$title)
    {

        $request->validate([
            'title' => ['required','max:255','unique:tags,title']
        ]);
        $tag = Tag::where('title',$title)->first();

        $tag = $tag->update(['title' => $request->title ]);

        // dd($tag);
        if ($tag) {
            return redirect()->route('tags.index')->with([
                'status' => 'success',
                'msg' => 'tag updated successfully'
            ]);
        }else {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'msg' => 'something wrong happened'
            ]);
        }
    }

    public function destroy($title)
    {
        $tag = Tag::where('title',$title)->first();

        $tag = $tag->delete();

        if ($tag) {
            return redirect()->route('tags.index')->with([
                'status' => 'success',
                'msg' => 'tag deleted successfully'
            ]);
        }else {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'msg' => 'something wrong happened'
            ]);
        }
    }
}
