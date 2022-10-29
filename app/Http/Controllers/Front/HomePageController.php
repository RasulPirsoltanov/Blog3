<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomePageController extends Controller
{
    public function __construct()
    {
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        $data['categories'] = Category::all();
        View::share($data);
    }
    public function Index()
    {

        $data['articles'] = Article::orderBy('created_at', 'DESC')->paginate(2);
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        return view('front.index', $data);
    }
    public function single($category, $slug)
    {
        $category2 = Category::where('slug', $category)->first() ?? abort(403, 'not found as this slug!');
        $count = Article::where('slug', $slug)->where('category_id', $category2->id)->first() ?? abort(403, 'not found as this slug!');
        $count->hit = $count->hit + 1;
        $count->save();
        $data['article'] = Article::where('slug', $slug)->first() ?? abort(403, 'not found as this slug!');
        return view('front.post', $data);
    }
    public function categoryList($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = Article::where('category_id', $category->id)->paginate(1);

        return view('front.category', compact('articles', 'category'));
    }

    public function page($slug)
    {
        $data['page'] = Page::where('slug', $slug)->first() ?? abort(403, 'Not found this page!');
        return view('front.page', $data);
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function contactpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->message = $request->message;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->save();
        return redirect()->back()->with('success', 'proccess finished succesfully!');
    }
}
