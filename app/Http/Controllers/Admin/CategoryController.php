<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SEO;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Kiểm tra 1 danh mục có danh mục con không ? Nếu có trả về true
    protected function hasCategoryChild($categoryParent, $categories) {
        foreach($categories as $cate) {
            if($cate->parent_id == $categoryParent->id) return true;
        }
        return false;
    }

    // Lấy danh sách danh mục con theo danh mục cha
    protected function getCategoryChilds($categoryParent, $categories) {
        $childs = [];
        foreach($categories as $category) {
            if($category->parent_id == $categoryParent->id) {
                array_push($childs, $category);
            }
        }
        return $childs;
    }

    protected function arrCategoryByParent($category, $categoriesSource) {
        $newArray = [];

        array_push($newArray, $category);
        
        if($this->hasCategoryChild($category, $categoriesSource)) {
            $childs = $this->getCategoryChilds($category, $categoriesSource);
            foreach($childs as $child) {
                $newArray = array_merge($newArray, $this->arrCategoryByParent($child, $categoriesSource));
            }
        }

        return $newArray;
    }

    public function __construct()
    {
        $this->middleware('permission:'.config('global.category_permissions.view_categories'))->only('index');
        $this->middleware('permission:'.config('global.category_permissions.create_category'))->only('store');
        $this->middleware('permission:'.config('global.category_permissions.update_category'))->only('update');
        $this->middleware('permission:'.config('global.category_permissions.delete_category'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->get();
        $newArray = [];
        foreach($categories as $cate) {
            $newArray = array_merge($newArray, $this->arrCategoryByParent($cate, $categories));
        }
        $categories = (object)array_unique($newArray);
        // dd($categories);die;
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->get();;
        $newArray = [];
        foreach($categories as $cate) {
            $newArray = array_merge($newArray, $this->arrCategoryByParent($cate, $categories));
        }
        $categories = (object)array_unique($newArray);

        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->seo_title); die;
        $categories = Category::all()->pluck('name')->toArray();
        if(!in_array($request->name, $categories)){
            $slug = Parent::toSlug($request->name);
            $dataNewCategory = [
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ];

            if($request->is_visible == 'true') {
                $dataNewCategory['is_visible'] = true;
            }

            if($request->is_visible == 'false') {
                $dataNewCategory['is_visible'] = false;
            }

            $category = Category::create($dataNewCategory);
            
            $newSEOData = [
                'name' => json_encode('Danh mục id '.$category->id),
                'type' => 'CATEGORY',
                'type_id' => $category->id,
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

            return redirect()->route('category.index')->with(['msg' => 'Tạo danh mục mới thành công !']);
        }

        return redirect()->route('category.create')->withErrors('Tên danh mục đã tồn tại !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        $categories = Category::orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->get();
        $newArray = [];
        foreach($categories as $cate) {
            $newArray = array_merge($newArray, $this->arrCategoryByParent($cate, $categories));
        }
        $categories = (object)array_unique($newArray);
        $SEOData = SEO::where(['type' => 'CATEGORY', 'type_id' => $category->id])->first();
        return view('admin.category.edit', compact('category', 'categories', 'SEOData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categories = Category::all()->pluck('name')->toArray();
        $updateCategory = Category::where('id', $id)->first();
        $key = array_search($updateCategory->name, $categories);
        array_splice($categories, $key, 1);

        $dataCategoryUpdate = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
        ];

        if($request->is_visible == 'true') {
            $dataCategoryUpdate['is_visible'] = true;
        }

        if($request->is_visible == 'false') {
            $dataCategoryUpdate['is_visible'] = false;
        }

        $metaTag = SEO::where(['type' => 'CATEGORY', 'type_id' => $updateCategory->id])->first();
        $updateSEOData = [
            'name' => json_encode('Danh mục id '.$updateCategory->id),
            'type' => 'CATEGORY',
            'type_id' => $updateCategory->id,
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
        if(is_null($metaTag)){
            SEO::create($updateSEOData);
        }
        else{
            $oldSEOData = [
                'name' => $metaTag->name,
                'type' => $metaTag->type,
                'type_id' => $metaTag->type_id,
                'title' => $metaTag->title,
                'description' => $metaTag->description,
                'keywords' => $metaTag->keywords,
                'og_site_name' => $metaTag->og_site_name,
                'og_description' => $metaTag->og_description,
                'og_title' => $metaTag->og_title,
                'og_type' => $metaTag->og_type,
                'og_url' => $metaTag->og_url,
                'og_image' => $metaTag->og_image,
                'og_image_height' => $metaTag->og_image_height,
                'og_image_width' => $metaTag->og_image_width,
                'og_image_type' => $metaTag->og_image_type,
                'og_image_alt' => $metaTag->og_image_alt,
                'twitter_site' => $metaTag->twitter_site,
                'twitter_card' => $metaTag->twitter_card,
                'twitter_creator' => $metaTag->twitter_creator,
                'twitter_title' => $metaTag->twitter_title,
                'twitter_description' => $metaTag->twitter_description,
                'twitter_image' => $metaTag->twitter_image,
                'robots' => $metaTag->robots,
                'og_locale' => $metaTag->og_locale,
                'article_publisher' => $metaTag->article_publisher,
                'og_image_secure_url' => $metaTag->og_image_secure_url,
                'twitter_label1' => $metaTag->twitter_label1,
                'twitter_data1' => $metaTag->twitter_data1
            ];
            if($updateSEOData != $oldSEOData){
                $metaTag->update($updateSEOData);
            }
        }
        
        if(!in_array($request->name, $categories)) {
            $slug = Parent::toSlug($request->name);
            $dataCategoryUpdate['slug'] = $slug;
            $updateCategory->update($dataCategoryUpdate);

            return redirect()->route('category.edit', $id)->with(['msg' => 'Chỉnh sửa thành công !']);
        }
        return redirect()->route('category.edit', $id)->withErrors('Tên danh mục đã tồn tại !')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $SEOData = SEO::where(['type' => 'CATEGORY', 'type_id' => $id])->first();
        $categoryChilds = Category::where('parent_id', $id)->get();
        foreach($categoryChilds as $child) {
            Category::destroy($child->id);
        }
        Category::destroy($id);
        !is_null($SEOData) ? $SEOData->delete() : true;
        return response('Đã xóa danh mục !', 200);
    }
}
