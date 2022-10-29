<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::orderBy('created_at', 'ASC')->get();
        return view('back.articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('back.articles.create', $data);
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
            'title'=>'required|min:3',
            'editordata'=>'required|image',
            'image'=>'required',
            'category'=>'required',
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->editordata;
        $article->slug = Str::slug($request->slug);
        $article->title = $request->title;
        $article->category_id = $request->category;
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = $request->file('image')->getClientOriginalExtension();
            $directory = "uploads/articles/";
            $image_name = $request->title . rand(1, 10) . "." . $image_name;
            $image->move($directory, $image_name);
            $image_name = $directory . $image_name;
            $article->image = $image_name;
        }
        $article->save();
        return redirect()->back()->with('success',"process finished successfuly!");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
