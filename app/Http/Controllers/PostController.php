<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "Posts" . $title,
            "posts" => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }

    public function category(Category $category) {
        return view('posts', [
            "title" => "Post By Category : $category->name",
            "posts" => $category->posts->load('category', 'author')
        ]);
    }
}
