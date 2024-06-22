<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function error() {
        $categories = Category::all();
        $arr = [
            'id' => [],
            'name' => []
        ];
        foreach($categories as $cate) {
            array_push($arr['id'], $cate->id);
            array_push($arr['name'], $cate->name);
        }
        var_dump($arr);die;
        return view('theme.404');
    }
    public function loginClient() {
        return view('theme.auth.login');
    }

    public function registerClient() {
        return view('theme.auth.register');
    }

    public function account(Request $request) {
        $user = $request->user();
        return view('theme.auth.account', compact('user'));
    }

    public function home() {
        $categories = Category::all();
        $latestProducts = Product::where('is_active', true)->orderBy('created_at', 'DESC')->get()->take(6);
        $bestSellerProducts = Product::where('is_active', true)->get()->take(6);
        $featuredProducts = Product::where('is_active', true)->where('is_featured', true)->orderBy('created_at', 'DESC')->get()->take(6);
        $productCategories = Category::where('slug', 'san-pham')->first()->children()->get();
        $brands = Brand::orderBy('id', 'ASC')->get();
        $categoryProject = Category::where('slug', 'du-an-hoan-thanh')->first();
        $projects = Post::where('category_id', $categoryProject->id)->orderBy('id', 'DESC')->take(4)->get();
        $categoryNews = Category::where('slug', 'bai-viet-mac-dinh')->first();
        $news = Post::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(4)->get();
        return view('theme.home', compact('categories', 'latestProducts', 'bestSellerProducts', 'featuredProducts', 'productCategories', 'brands', 'projects', 'news'));
    }

    public function about() {
        $brands = Brand::get();
        return view('theme.about', compact('brands'));
    }

    public function contact() {
        return view('theme.contact');
    }

    public function shop() {
        return view('theme.shop.shop');
    }
    public function category($category_slug, Request $request) {
        $paginate = 9;
        $category = Category::where('slug', $category_slug)->first();
        $isChildCate = isset($category->children) ? count($category->children) : 0;

        $products = (object)[];

        $page = $request->has('page') ? $request->page : 1;
        $soft = ($request->has('soft') && $request->soft != "all") ? $request->soft : 'all';
        $filterBrand = ($request->has('filter_brand') && $request->filter_brand != "all") ? $request->filter_brand : "all";
        if($filterBrand != "all") {
            $brandIds = [];
            $brandSlugs = explode(',', $filterBrand);
            foreach($brandSlugs as $slug) {
                $brandIds[] = Brand::where('slug', $slug)->first()->id;
            }
        }

        if(isset($soft) && $soft == 'name_asc') {
            if($filterBrand != "all") {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->whereIn('brand_id', $brandIds)->orderBy('name', 'ASC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->orderBy('name', 'ASC')->paginate($paginate);
            }
            
        }
        elseif(isset($soft) && $soft == 'name_desc') {
            if($filterBrand != "all") {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->whereIn('brand_id', $brandIds)->orderBy('name', 'DESC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->orderBy('name', 'DESC')->paginate($paginate);
            }
            
        }
        elseif(isset($soft) && $soft == 'price_asc') {
            if($filterBrand != "all") {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->whereIn('brand_id', $brandIds)->orderBy('odd_price', 'ASC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->orderBy('odd_price', 'ASC')->paginate($paginate);
            }
        }
        elseif(isset($soft) && $soft == 'price_desc') {
            if($filterBrand != "all") {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->whereIn('brand_id', $brandIds)->orderBy('odd_price', 'DESC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->orderBy('odd_price', 'DESC')->paginate($paginate);
            }
        }
        else {
            if($filterBrand != "all") {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->whereIn('brand_id', $brandIds)->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('category_id', $category->id)->paginate($paginate);
            }  
        }
        
        if($isChildCate != 0) {
            $idChildCates = [];
            foreach($category->children as $key => $childCate) {
                array_push($idChildCates, $childCate->id);
            }  
            $products =  Product::where('is_active', true)->whereIn('category_id', $idChildCates)->paginate($paginate);
        } else {
            $products = $productByCates;
        }

        return view('theme.shop.category', compact('category', 'products', 'page', 'soft', 'filterBrand'));
    }

    public function productDetail($product_slug) {
        $product = Product::where('slug', $product_slug)->first();
        $specs =  explode(";", json_decode($product->specifications));
        $category = Category::where('id', $product->category_id)->first();
        $relatedProducts = Product::where('category_id', $category->id)->where('is_active', true)->get();
        return view('theme.shop.product-detail', compact('product', 'specs', 'category', 'relatedProducts'));
    }

    public function blog() {
        $posts  = Post::where('is_visible', true)->paginate(12);
        $recentPosts = Post::where('is_visible', true)->orderBy('created_at', 'DESC')->take(4)->get();
        $tags = Tag::where('is_visible', true)->get();
        return view('theme.blog.blog', compact('posts', 'recentPosts', 'tags'));
    }

    public function blogByTag($slug_tag) {
        $tag = Tag::where('slug', $slug_tag)->first();
        $posts  = $tag->posts()->where('is_visible', true)->paginate(12);
        $recentPosts = $tag->posts()->where('is_visible', true)->orderBy('created_at', 'DESC')->take(4)->get();
        $tags = Tag::where('is_visible', true)->get();
        return view('theme.blog.blog-by-tag', compact('posts', 'recentPosts', 'tags'));
    }

    public function blogDetail($slug_post) {
        $post = Post::where('slug', $slug_post)->first();
        $recentPosts = Post::where('is_visible', true)->orderBy('created_at', 'DESC')->take(4)->get();
        $tagByPosts  = $post->tags()->where('is_visible', true)->get();
        $tags = Tag::where('is_visible', true)->get();
        return view('theme.blog.blog-detail', compact('post', 'recentPosts', 'tagByPosts', 'tags'));
    }

    public function project() {
        $arrayIdProjects = [];
        $idProject = Category::where('slug', 'du-an')->first()->id;
        $arrayIdProjects[] =  $idProject;
        foreach(Category::where('is_visible', true)->get() as $cate) {
            if($cate->parent_id == $idProject) {
                $arrayIdProjects[] = $cate->id;
            }
        }

        $projects  = Post::where('is_visible', true)->whereIn('category_id', $arrayIdProjects)->paginate(12);
        $recentProjects = Post::where('is_visible', true)->whereIn('category_id', $arrayIdProjects)->orderBy('created_at', 'DESC')->take(4)->get();
        $tags = Tag::where('is_visible', true)->get();

        return view('theme.project.project', compact('projects', 'recentProjects', 'tags'));
    }

    public function projectByTag($slug_tag) {
        $tag = Tag::where('slug', $slug_tag)->first();

        $arrayIdProjects = [];
        $idProject = Category::where('slug', 'du-an')->first()->id;
        $arrayIdProjects[] =  $idProject;
        foreach(Category::where('is_visible', true)->get() as $cate) {
            if($cate->parent_id == $idProject) {
                $arrayIdProjects[] = $cate->id;
            }
        }

        $projects  = $tag->posts()->where('is_visible', true)->whereIn('category_id', $arrayIdProjects)->paginate(12);
        $recentProjects = $tag->posts()->where('is_visible', true)->whereIn('category_id', $arrayIdProjects)->orderBy('created_at', 'DESC')->take(4)->get();
        $tags = Tag::where('is_visible', true)->get();

        return view('theme.project.project-by-tag', compact('projects', 'recentProjects', 'tags'));
    }

    public function projectDetail($slug_project) {
        $project = Post::where('slug', $slug_project)->first();
        $tagByProjects  = $project->tags()->where('is_visible', true)->get();
        $tags = Tag::where('is_visible', true)->get();

        $arrayIdProjects = [];
        $idProject = Category::where('slug', 'du-an')->first()->id;
        $arrayIdProjects[] =  $idProject;
        foreach(Category::where('is_visible', true)->get() as $cate) {
            if($cate->parent_id == $idProject) {
                $arrayIdProjects[] = $cate->id;
            }
        }

        $recentProjects = Post::where('is_visible', true)->whereIn('category_id', $arrayIdProjects)->orderBy('created_at', 'DESC')->take(4)->get();

        return view('theme.project.project-detail', compact('project', 'tagByProjects', 'tags', 'recentProjects'));
    }

    public function checkout() {
        return view('theme.shop.checkout');
    }

    public function faq() {
        return view('theme.faq');
    }

    public function wishlist() {
        return view('theme.wishlist');
    }

    public function search(Request $request) {
        $keyword = ($request->input('keyword')) ? $request->query('keyword') : "";
        $keyword = trim(strip_tags($keyword));

        if($request->select != "all"){
            $category = Category::where('id', $request->select)->first();
        }

        if(isset($category)) {
            $products = Product::where('category_id', $category->id)->where("name", "like", "%$keyword%")->get();     
        }
        $products = Product::where('is_active', true)->where("name", "like", "%$keyword%")->get();
        $key = $request->input('keyword');
        
        return view('theme.search', compact('key', 'products'));
    }

    public function brand($slug_brand, Request $request) {
        $paginate = 9;
        $brand = Brand::where('slug', $slug_brand)->first();

        $categoryIds = [];
        foreach(Category::get() as $category) {
            if(isset($category->parent) && $category->parent->slug == 'san-pham') {
                array_push($categoryIds, $category->id);
            }
        }
        $categories = Category::whereIn('id', $categoryIds)->get();

        $products = (object)[];

        $page = $request->has('page') ? $request->page : 1;
        $soft = ($request->has('soft') && $request->soft != "all") ? $request->soft : 'all';
        $filterCategories = ($request->has('filter_category') && $request->filter_category != "all") ? $request->filter_category : "all";

        if($filterCategories != "all") {
            $ids = [];
            $categorySlugs = explode(',', $filterCategories);
            foreach($categorySlugs as $slug) {
                $cate = Category::where('slug', $slug)->first();
                $ids[] = $cate->id;
                if(isset($cate->children)) {
                    foreach($cate->children as $child) {
                        $ids[] = $child->id;
                    }
                }
            }
        }

        if(isset($soft) && $soft == 'name_asc') {
            if($filterCategories != "all") {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->whereIn('category_id', $ids)->orderBy('name', 'ASC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->orderBy('name', 'ASC')->paginate($paginate);
            }
            
        }        
        elseif(isset($soft) && $soft == 'name_desc') {
            if($filterCategories != "all") {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->whereIn('category_id', $ids)->orderBy('name', 'DESC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->orderBy('name', 'DESC')->paginate($paginate);
            }
            
        }        
        elseif(isset($soft) && $soft == 'price_asc') {
            if($filterCategories != "all") {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->whereIn('category_id', $ids)->orderBy('odd_price', 'ASC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->orderBy('name', 'DESC')->paginate($paginate);
            }
            
        }        
        elseif(isset($soft) && $soft == 'price_desc') {
            if($filterCategories != "all") {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->whereIn('category_id', $ids)->orderBy('odd_price', 'DESC')->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->orderBy('name', 'DESC')->paginate($paginate);
            }
            
        }        
        else {
            if($filterCategories != "all") {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->whereIn('category_id', $ids)->paginate($paginate);
            }
            else {
                $productByCates = Product::where('is_active', true)->where('brand_id', $brand->id)->paginate($paginate);
            }  
        }

        $products = $productByCates;

        return view('theme.brand', compact('brand', 'categories', 'filterCategories', 'soft', 'page', 'products'));
    }
}
