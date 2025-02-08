<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\SEO;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.post_permissions.view_posts'))->only('index');
        $this->middleware('permission:'.config('global.post_permissions.create_post'))->only('store');
        $this->middleware('permission:'.config('global.post_permissions.update_post'))->only('update');
        $this->middleware('permission:'.config('global.post_permissions.delete_post'))->only('destroy');

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('category_id', 'ASC')->paginate(10);
        return view('admin.article.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.article.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postNames = Post::all()->pluck('title')->toArray();
        if(in_array($request->name,  $postNames)) {
            return redirect()->route('post.index')->with(['error' => 'Tiêu đề bài viết đã tồn tại !']);
        }
        else {
            try {
                $newPostData = [
                    "title" => $request->title,
                    "slug" => $request->slug,
                    "is_visible" => $request->is_visible ? true : false,
                    "description" => $request->description,
                    "detail" => $request->detail,
                ];
                $newPostData['category_id'] = 0;
                if($request->category_id) {
                    $newPostData['category_id'] = $request->category_id;
                }

                $imageName = '';
                if($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
        
                    $image = time().'_'.$request->file('image')->getClientOriginalName();
                    $imageName = pathinfo($image,PATHINFO_FILENAME).'.webp';
                }
                $newPostData['cover_image'] = $imageName;

                $newPost = Post::create($newPostData);

                $linkStorage = storage_path('app/public')."/posts/".$newPost->id;
                $request->image->move($linkStorage,$image);
                Parent::webpImage(storage_path('app/public')."/posts/".$newPost->id."/".$image, 80, true);

                if($request->input('options') !== null) {
                    $options = $request->input('options');
                    foreach($options as $option){
                        $newPost->tags()->attach((int)$option);
                    }
                }

                $newSEOData = [
                    'name' => json_encode('Bài viết id '.$newPost->id),
                    'type' => 'POST',
                    'type_id' => $newPost->id,
                    'title' => is_null($request->seo_title)? null : json_encode($request->seo_title),
                    'description' => is_null($request->seo_description)? null : json_encode($request->seo_description),
                    'keywords' => is_null($request->seo_keywords)? null : json_encode($request->seo_keywords),
                    'og_site_name' => is_null($request->seo_og_site_name)? null : json_encode($request->seo_og_site_name),
                    'og_description' => is_null($request->seo_og_description)? null : json_encode($request->seo_og_description),
                    'og_title' => is_null($request->seo_og_title)? null : json_encode($request->seo_og_title),
                    'og_type' => is_null($request->seo_og_type)? null : json_encode($request->seo_og_type),
                    'og_url' => is_null($request->seo_og_url)? null : json_encode($request->seo_og_url),
                    'og_image' => is_null($request->seo_og_image)? null : json_encode($request->seo_og_image),
                    'og_image_height' => is_null($request->seo_og_image_height)? null : json_encode($request->seo_og_image_height),
                    'og_image_width' => is_null($request->seo_og_image_width)? null : json_encode($request->seo_og_image_width),
                    'og_image_type' => is_null($request->seo_og_image_type)? null : json_encode($request->seo_og_image_type),
                    'og_image_alt' => is_null($request->seo_og_image_alt)? null : json_encode($request->seo_og_image_alt),
                    'twitter_site' => is_null($request->seo_twitter_site)? null : json_encode($request->seo_twitter_site),
                    'twitter_card' => is_null($request->seo_twitter_card)? null : json_encode($request->seo_twitter_card),
                    'twitter_creator' => is_null($request->seo_twitter_creator)? null : json_encode($request->seo_twitter_creator),
                    'twitter_title' => is_null($request->seo_twitter_title)? null : json_encode($request->seo_twitter_title),
                    'twitter_description' => is_null($request->seo_twitter_description)? null : json_encode($request->seo_twitter_description),
                    'twitter_image' => is_null($request->seo_twitter_image)? null : json_encode($request->seo_twitter_image),
                    'robots' => is_null($request->seo_robots)? null : json_encode($request->seo_robots),
                    'og_locale' => is_null($request->seo_og_locale)? null : json_encode($request->seo_og_locale),
                    'article_publisher' => is_null($request->seo_article_publisher)? null : json_encode($request->seo_article_publisher),
                    'og_image_secure_url' => is_null($request->seo_og_image_secure_url)? null : json_encode($request->seo_og_image_secure_url),
                    'twitter_label1' => is_null($request->seo_twitter_label1)? null : json_encode($request->seo_twitter_label1),
                    'twitter_data1' => is_null($request->seo_twitter_data1)? null : json_encode($request->seo_twitter_data1)
                ];
                SEO::create($newSEOData);

                return redirect()->route('post.index')->with(['msg' => 'Tạo mới bài viết thành công !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $SEOData = SEO::where(['type' => 'POST', 'type_id' => $post->id])->first();
        return view('admin.article.post.edit', compact('post', 'categories', 'tags', 'SEOData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $postTitles = Post::all()->pluck('title')->toArray();
        $keyTitle = array_search($post->title, $postTitles);
        array_splice($postTitles, $keyTitle, 1);

        $postSlugs = Post::all()->pluck('slug')->toArray();
        $keySlug = array_search($post->slug, $postSlugs);
        array_splice($postSlugs, $keySlug, 1);

        if(in_array($request->title, $postTitles) || in_array($request->slug, $postSlugs)) {
            return redirect()->route('brand.edit', $post->id)->with(['error' => 'Tiêu đề hoặc slug đã tồn tại !']);
        }
        else {
            try{
                $updatePostData = [];
                $request->title !=  $post->title ? $updatePostData['title'] = $request->title : '';
                $request->slug !=  $post->slug ? $updatePostData['slug'] = $request->slug : '';
                ($request->is_visible ? true : false) !=  $post->is_visible ? $updatePostData['is_visible'] = ($request->is_visible ? true : false) : '';
                $request->category_id !=  $post->category_id ? $updatePostData['category_id'] = $request->category_id : '';
                $request->description !=  $post->description ? $updatePostData['description'] = $request->description : '';
                $request->detail !=  $post->detail ? $updatePostData['detail'] = $request->detail : '';

                if($request->hasFile('image')) {
                    if(!empty($post->image)) {
                        $linkStorage = storage_path('app/public')."/posts/".$post->id;
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$post->cover_image);
                        }

                        $request->validate([
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
            
                        $image = time().'_'.$request->file('image')->getClientOriginalName();
                        $imageName = pathinfo($image,PATHINFO_FILENAME).'.webp';

                        $updatePostData['cover_image'] = $imageName;
                        $request->image->move($linkStorage,$image);
                        Parent::webpImage(storage_path('app/public')."/posts/".$post->id."/".$image, 80, true);
                    }
                }
                // if(empty($updatePostData)) {
                //     return redirect()->route('post.edit', $post->id)->with(['error' => 'Chưa có thông tin cập nhật !']);
                // }

                $post->update($updatePostData);

                $SEOData = SEO::where(['type' => 'POST', 'type_id' => $post->id])->first();
                is_null($SEOData) ? $oldSEOData = [] : 
                $oldSEOData = [
                    'name' => $SEOData->name,
                    'type' => $SEOData->type,
                    'type_id' => $SEOData->type_id,
                    'title' => $SEOData->title,
                    'description' => $SEOData->description,
                    'keywords' => $SEOData->keywords,
                    'og_site_name' => $SEOData->og_site_name,
                    'og_description' => $SEOData->og_description,
                    'og_title' => $SEOData->og_title,
                    'og_type' => $SEOData->og_type,
                    'og_url' => $SEOData->og_url,
                    'og_image' => $SEOData->og_image,
                    'og_image_height' => $SEOData->og_image_height,
                    'og_image_width' => $SEOData->og_image_width,
                    'og_image_type' => $SEOData->og_image_type,
                    'og_image_alt' => $SEOData->og_image_alt,
                    'twitter_site' => $SEOData->twitter_site,
                    'twitter_card' => $SEOData->twitter_card,
                    'twitter_creator' => $SEOData->twitter_creator,
                    'twitter_title' => $SEOData->twitter_title,
                    'twitter_description' => $SEOData->twitter_description,
                    'twitter_image' => $SEOData->twitter_image,
                    'robots' => $SEOData->robots,
                    'og_locale' => $SEOData->og_locale,
                    'article_publisher' => $SEOData->article_publisher,
                    'og_image_secure_url' => $SEOData->og_image_secure_url,
                    'twitter_label1' => $SEOData->twitter_label1,
                    'twitter_data1' => $SEOData->twitter_data1
                ];
                $updateSEOData = [
                    'name' => json_encode('Bài viết id '.$post->id),
                    'type' => 'POST',
                    'type_id' => $post->id,
                    'title' => is_null($request->seo_title)? null : json_encode($request->seo_title),
                    'description' => is_null($request->seo_description)? null : json_encode($request->seo_description),
                    'keywords' => is_null($request->seo_keywords)? null : json_encode($request->seo_keywords),
                    'og_site_name' => is_null($request->seo_og_site_name)? null : json_encode($request->seo_og_site_name),
                    'og_description' => is_null($request->seo_og_description)? null : json_encode($request->seo_og_description),
                    'og_title' => is_null($request->seo_og_title)? null : json_encode($request->seo_og_title),
                    'og_type' => is_null($request->seo_og_type)? null : json_encode($request->seo_og_type),
                    'og_url' => is_null($request->seo_og_url)? null : json_encode($request->seo_og_url),
                    'og_image' => is_null($request->seo_og_image)? null : json_encode($request->seo_og_image),
                    'og_image_height' => is_null($request->seo_og_image_height)? null : json_encode($request->seo_og_image_height),
                    'og_image_width' => is_null($request->seo_og_image_width)? null : json_encode($request->seo_og_image_width),
                    'og_image_type' => is_null($request->seo_og_image_type)? null : json_encode($request->seo_og_image_type),
                    'og_image_alt' => is_null($request->seo_og_image_alt)? null : json_encode($request->seo_og_image_alt),
                    'twitter_site' => is_null($request->seo_twitter_site)? null : json_encode($request->seo_twitter_site),
                    'twitter_card' => is_null($request->seo_twitter_card)? null : json_encode($request->seo_twitter_card),
                    'twitter_creator' => is_null($request->seo_twitter_creator)? null : json_encode($request->seo_twitter_creator),
                    'twitter_title' => is_null($request->seo_twitter_title)? null : json_encode($request->seo_twitter_title),
                    'twitter_description' => is_null($request->seo_twitter_description)? null : json_encode($request->seo_twitter_description),
                    'twitter_image' => is_null($request->seo_twitter_image)? null : json_encode($request->seo_twitter_image),
                    'robots' => is_null($request->seo_robots)? null : json_encode($request->seo_robots),
                    'og_locale' => is_null($request->seo_og_locale)? null : json_encode($request->seo_og_locale),
                    'article_publisher' => is_null($request->seo_article_publisher)? null : json_encode($request->seo_article_publisher),
                    'og_image_secure_url' => is_null($request->seo_og_image_secure_url)? null : json_encode($request->seo_og_image_secure_url),
                    'twitter_label1' => is_null($request->seo_twitter_label1)? null : json_encode($request->seo_twitter_label1),
                    'twitter_data1' => is_null($request->seo_twitter_data1)? null : json_encode($request->seo_twitter_data1)
                ];

                if(is_null($SEOData)){
                    SEO::create($updateSEOData);
                }
                else{
                    if ($oldSEOData != $updateSEOData){
                        $SEOData->update($updateSEOData);
                    }
                }

                if(!empty($request->input('options'))) {
                    foreach($post->tags as $tag) {
                        $post->tags()->detach($tag->id);
                    };
                    $options = $request->input('options');
                    foreach($options as $option){
                        $post->tags()->attach((int)$option);
                    }
                }
                else {
                    foreach($post->tags as $tag) {
                        $post->tags()->detach($tag->id);
                    };
                }

                return redirect()->route('post.edit', $post->id)->with(['msg' => 'Đã cập nhật bài viết !']);

            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $SEOData = SEO::where(['type' => 'POST', 'type_id' => $post->id])->first();
        $linkStorage = storage_path('app/public').'/posts/'.$post->id;
        if (is_dir($linkStorage)) {
            unlink($linkStorage.'/'.$post->cover_image);
            rmdir($linkStorage);
        }
        $post->tags()->detach();
        $post->delete();
        !is_null($SEOData) ? $SEOData->delete() : true;
        return redirect()->route('post.index')->with(['msg' => 'Đã xóa bài viết !']);
    }
}
