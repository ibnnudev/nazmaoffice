<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogCategoryInterface;
use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    private $blog;
    private $blogCategory;

    public function __construct(BlogInterface $blog, BlogCategoryInterface $blogCategory)
    {
        $this->blog         = $blog;
        $this->blogCategory = $blogCategory;
    }
    public function index()
    {
        $featuredBlog = Blog::withCount('views')->get();
        $featuredBlog = $featuredBlog->sortByDesc('views_count');

        return view('user.blog.index', [
            'blogs'          => $this->blog->getAll(),
            'featuredBlogs' => $featuredBlog,
            'blogCategories' => $this->blogCategory->getAllWithoutPagination()
        ]);
    }

    public function detail($slug)
    {
        views($this->blog->getBySlug($slug))->record();

        return view('user.blog.detail', [
            'blog'           => $this->blog->getBySlug($slug),
            'blogs'          => $this->blog->getRelatedBlogs($slug),
            'viewCount'      => views($this->blog->getBySlug($slug))->count(),
        ]);
    }

    public function search(Request $request)
    {
        return view('user.blog.list', [
            'blogs'          => $this->blog->search($request),
            'blogCategories' => $this->blogCategory->getAllWithoutPagination()
        ])->render();
    }

    public function filter($category_id)
    {
        return view('user.blog.list', [
            'blogs'          => $this->blog->filter($category_id),
            'blogCategories' => $this->blogCategory->getAllWithoutPagination()
        ])->render();
    }
}
