<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::select('title')->get();
        // dd($categories);
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:255','unique:categories,title']
        ]);

        $category = Category::create(['title' => $request->title ]);

        if ($category->title) {
            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'msg' => 'Category added successfully'
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
        $category = Category::where('title',$title)->first();
        if (!$category) {
            abort(404);
        }
        $snippets = $category->snippets->where('status',1);
        // dd($snippets->first());
        return view('categories.show',compact('category','snippets'));
    }

    public function edit($title)
    {
        $category = Category::where('title',$title)->first();
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request,$title)
    {

        $request->validate([
            'title' => ['required','max:255','unique:categories,title']
        ]);
        $category = Category::where('title',$title)->first();

        $category = $category->update(['title' => $request->title ]);

        // dd($category);
        if ($category) {
            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'msg' => 'Category updated successfully'
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
        $category = Category::where('title',$title)->first();

        $category = $category->delete();

        if ($category) {
            return redirect()->route('categories.index')->with([
                'status' => 'success',
                'msg' => 'Category deleted successfully'
            ]);
        }else {
            return redirect()->back()->withInput()->with([
                'status' => 'danger',
                'msg' => 'something wrong happened'
            ]);
        }
    }
}
