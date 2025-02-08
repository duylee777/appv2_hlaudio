<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.brand_permissions.view_brands'))->only('index');
        $this->middleware('permission:'.config('global.brand_permissions.create_brand'))->only('store');
        $this->middleware('permission:'.config('global.brand_permissions.update_brand'))->only('update');
        $this->middleware('permission:'.config('global.brand_permissions.delete_brand'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);
        $dataView['brands'] = $brands;
        return view('admin.brand.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brandNames = Brand::all()->pluck('name')->toArray();
        if(in_array($request->name,  $brandNames)) {
            return redirect()->route('brand.index')->with(['error' => 'Thương hiệu đã tồn tại !']);
        }
        else {
            try {
                $slug = Parent::toSlug($request->name);
                $imageName = '';
                if($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
        
                    $image = time().'_'.$request->file('image')->getClientOriginalName();
                    $imageName = pathinfo($image,PATHINFO_FILENAME).'.webp';
                    // var_dump($imageName);die;
                }
                
                $newBrandData = [
                    "slug" => $slug,
                    "name" => $request->name,
                    "image" => $imageName,
                ];
                $newBrand = Brand::create($newBrandData);
                
                $newSEOData = [
                    'name' => json_encode('Thương hiệu id '.$newBrand->id),
                    'type' => 'BRAND',
                    'type_id' => $newBrand->id,
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

                $linkStorage = "/brands/".$newBrand->slug;
                $request->image->move(storage_path('app/public').$linkStorage,$image);
                Parent::webpImage(storage_path('app/public').$linkStorage."/".$image, 90, true);
        
                return redirect()->route('brand.index')->with(['msg' => 'Đã thêm thương hiệu mới !']);
            }
            catch(\Exception $e) {
                return $e -> getMessage();
            } 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('brand.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $brand = Brand::find($id);
        $dataView['brand'] = $brand;
        $SEOData = SEO::where(['type' => 'BRAND', 'type_id' => $brand->id])->first();
        $dataView['SEOData'] = $SEOData;
        return view('admin.brand.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brandNames = Brand::all()->pluck('name')->toArray();
        $brand = Brand::where('id',$id)->first();
        $key = array_search($brand->name, $brandNames);
        array_splice($brandNames, $key, 1);

        if(in_array($request->name, $brandNames)) {
            return redirect()->route('brand.edit', $id)->with(['error' => 'Tên thương hiệu đã tồn tại !']);
        }
        else {
            try{
                $updateBrandData = [];

                if(Parent::toSlug($request->name) != $brand->slug) {
                    $updateBrandData['name'] = $request->name;
                    $updateBrandData['slug'] = Parent::toSlug($request->name);
                    // check has file in request
                    if($request->file('image')) {
                        $request->validate([
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
                        $requestImageName = time().'_'.$request->file('image')->getClientOriginalName();

                        $imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                        $updateBrandData["image"] = $imageNameSaveDB;

                        $linkNewStorage = storage_path('app/public')."/brands/".Parent::toSlug($request->name)."/";
                        $request->image->move($linkNewStorage, $requestImageName);
                        // convert file img to .webp img and delete file img
                        Parent::webpImage($linkNewStorage.$requestImageName, 90, true);

                        // delete current file image, folder with current slug
                        if (Storage::exists(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image) || Storage::exists(storage_path('app/public').'/brands/'.$brand->slug)) {
                            unlink(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image);
                            rmdir(storage_path('app/public').'/brands/'.$brand->slug);
                        }
                        

                    }
                    else {
                        
                        if (Storage::exists(storage_path('app/public').'/brands/'.$brand->slug)) {
                            rename(storage_path('app/public').'/brands/'.$brand->slug, storage_path('app/public').'/brands/'.Parent::toSlug($request->name));
                        }
                        
                    }
                }
                else {
                    if($request->file('image')) {
                        $request->validate([
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
                        $requestImageName = time().'_'.$request->file('image')->getClientOriginalName();

                        $imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                        $updateBrandData["image"] = $imageNameSaveDB;

                        $linkCurrentStorage = storage_path('app/public')."/brands/".$brand->slug."/";
                        $request->image->move($linkCurrentStorage, $requestImageName);
                        // convert file img to .webp img and delete file img
                        Parent::webpImage($linkCurrentStorage.$requestImageName, 90, true);

                        // delete current file image
                        if (Storage::exists(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image)) {
                            unlink(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image);
                        }
                    }
                }

                $SEOData = SEO::where(['type' => 'BRAND', 'type_id' => $brand->id])->first();
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
                    'name' => json_encode('Thương hiệu id '.$brand->id),
                    'type' => 'BRAND',
                    'type_id' => $brand->id,
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
                if(count($updateBrandData) != 0) {
                    $brand->update($updateBrandData);
                }

                if(count($updateBrandData) != 0||$oldSEOData != $updateSEOData) {
                    return redirect()->route('brand.index')->with(['msg' => 'Cập nhật thương hiệu thành công !']);
                }

                return redirect()->route('brand.edit', $brand->id)->with(['error' => 'Không có thông tin cập nhật !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $SEOData = SEO::where(['type' => 'BRAND', 'type_id' => $brand->id])->first();
        $linkStorage = storage_path('app/public').'/brands/'.$brand->slug;
        if (is_dir($linkStorage)) {
            unlink($linkStorage.'/'.$brand->image);
            rmdir($linkStorage);
        }
        $brand->delete();
        !is_null($SEOData) ? $SEOData->delete() : true;
        return redirect()->route('brand.index')->with(['msg' => 'Đã xóa thương hiệu !']);
    }
}
