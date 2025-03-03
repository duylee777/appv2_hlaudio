<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Inventory;
use App\Models\SEO;
use App\Models\Unit;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.product_permissions.view_products'))->only('index');
        $this->middleware('permission:'.config('global.product_permissions.create_product'))->only('store');
        $this->middleware('permission:'.config('global.product_permissions.update_product'))->only('update');
        $this->middleware('permission:'.config('global.product_permissions.delete_product'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
                if($keyword = $request->keyword) {
                    $query->orWhere('code', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('name', 'LIKE', '%' . $keyword . '%')
                        ->get();
                }
            }]
        ])->orderBy('id', 'ASC')->paginate(20);
        return view('admin.shop.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    protected function getChilCate($cate) {
        $cateIds = []; 
    }
    public function create()
    {
        $brands = Brand::all();
        
        $cateIds = [];
        $cates = Category::get();
        $cateSanPham = Category::where('slug', 'san-pham')->first();
        if(count($cateSanPham->children) != 0) {
            foreach($cateSanPham->children as $cate) {
                array_push($cateIds, $cate->id);
                if(count($cate->children) != 0) {
                    foreach($cate->children as $cateLv2) {
                        array_push($cateIds, $cateLv2->id);
                    }
                }
            }
        }
        $categories = Category::where('is_visible', true)->whereIn('id', $cateIds)->get();
        
        $units = Unit::all();
        $discounts = Discount::all();
        return view('admin.shop.product.create', compact('brands', 'categories', 'units', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $productCodes = Product::all()->pluck('code')->toArray();
            if(in_array($request->code, $productCodes)) {
                return back()->withErrors('Mã sản phẩm đã tồn tại !')->withInput();
            }
            
            $productSlugs = Product::all()->pluck('slug')->toArray();
            if(in_array($request->slug, $productSlugs)) {
                return back()->withErrors('Slug sản phẩm đã tồn tại !')->withInput();
            }
            else {
                $dataNewProduct = [
                    'code' => $request->code,
                    'name' => $request->name,
                    'slug' =>  $request->slug ?? Parent::toSlug($request->name),
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'origin' => $request->origin,
                    'is_active' => $request->is_active ? true : false,
                    'is_featured' => $request->is_featured ? true : false,
                    'unit_id' => $request->unit_id,
                    'cost_price' => $request->cost_price,
                    'odd_price' => $request->odd_price,
                    'discount_id' => $request->discount_id,
                    'specifications' => json_encode($request->specification),
                    'description' => json_encode($request->description),
                ];

                $thumbnails = '';
                if($request->hasFile('thumb')) {
                    $request->validate([
                        'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                    ]);

                    $thumbnails = $request->code.'.'.$request->file('thumb')->getClientOriginalExtension();
                    // $thumbnails = $request->code.'.webp';
                    
                    $linkStorageThumbnails = storage_path('app/public')."/products/".$request->code."/thumbnails/";
                    $request->thumb->move($linkStorageThumbnails, $thumbnails);
                    Parent::webpImage($linkStorageThumbnails.$thumbnails, 90, true);
                }
                
                
                $images = [];
                if($request->hasFile('image')) {
                    foreach($request->file('image') as $imageFile) {
                        $requestImageName = time().'_'.$imageFile->getClientOriginalName();
                        //$imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                        $linkStorageImage = storage_path('app/public')."/products/".$request->code."/image/";
                        $imageFile->move($linkStorageImage, $requestImageName);
                        //Parent::webpImage($linkStorageImage.$requestImageName, 80, true);
                        //$images[] = $imageNameSaveDB;
                        $images[] = $requestImageName;
                    }
                }
                $dataNewProduct['image'] = json_encode($images);
               

                $document = [];
                if($request->hasFile('document')) {
                    foreach($request->file('document') as $file) {
                        $fileName = time().'_'.$file->getClientOriginalName();
                        $linkStorageDoc = storage_path('app/public')."/products/".$request->code."/document/";
                        $file->move($linkStorageDoc, $fileName);
                        $document[] = $fileName;
                    }
                }   
                $dataNewProduct['document'] = json_encode($document);

                // if($request->has('software_url')){
                //     $dataNewProduct['software'] = json_encode($request->software_url);
                // }
                // else {
                //     $dataNewProduct['software'] = json_encode("");
                // }
                
                $software = [];
                if($request->hasFile('software')) {
                    foreach($request->file('software') as $file) {
                        $fileName = time().'_'.$file->getClientOriginalName();
                        $linkStorageImage = "/products/".$request->code."/software/";
                        $file->move(storage_path('app/public').$linkStorageImage, $fileName);
                        $software[] = $fileName;
                    }
                }   
                $dataNewProduct['software'] = json_encode($software);
                

                // if($request->has('driver_url')){
                //     $dataNewProduct['driver'] = json_encode($request->driver_url);
                // }
                // else {
                //     $dataNewProduct['driver'] = json_encode("");
                // }
                
                $driver = [];
                if($request->hasFile('driver')) {
                    foreach($request->file('driver') as $file) {
                        $fileName = time().'_'.$file->getClientOriginalName();
                        $linkStorageImage = "/products/".$request->code."/driver/";
                        $file->move(storage_path('app/public').$linkStorageImage, $fileName);
                        $driver[] = $fileName;
                    }
                }   
                $dataNewProduct['driver'] = json_encode($driver);
                
                
                $newInventory = Inventory::create(['quantity' => $request->inventory_count]);
                $dataNewProduct['inventory_id'] = $newInventory->id;
                

                $product = Product::create($dataNewProduct);
                        
                $newSEOData = [
                    'name' => json_encode('Sản phẩm id '.$product->id),
                    'type' => 'PRODUCT',
                    'type_id' => $product->id,
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
                
                return redirect()->route('product.index')->with(['msg'=>'Tạo sản phẩm mới thành công !']);
            }
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // var_dump($product);die;
        // $product = Product::where('id', $id)->first();
        $brands = Brand::all();
        
        $cateIds = [];
        $cates = Category::get();
        $cateSanPham = Category::where('slug', 'san-pham')->first();
        if(count($cateSanPham->children) != 0) {
            foreach($cateSanPham->children as $cate) {
                array_push($cateIds, $cate->id);
                if(count($cate->children) != 0) {
                    foreach($cate->children as $cateLv2) {
                        array_push($cateIds, $cateLv2->id);
                    }
                }
            }
        }
        $categories = Category::where('is_visible', true)->whereIn('id', $cateIds)->get();
        
        $units = Unit::all();
        $discounts = Discount::all();
        $inventory = Inventory::all();
        
        $SEOData = SEO::where(['type' => 'PRODUCT', 'type_id' => $product->id])->first();
        return view('admin.shop.product.edit', compact('product', 'brands', 'categories', 'units', 'discounts', 'inventory', 'SEOData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd($request);die;
        try{
            $product = Product::where('id', $id)->first();
            $dataUpdateProduct = [
                'name' => $request->name,
                'slug' => Parent::toSlug($request->name),
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'origin' => $request->origin,
                'is_active' => $request->is_active ? true : false,
                'is_featured' => $request->is_featured ? true : false,
                'unit_id' => $request->unit_id,
                'cost_price' => $request->cost_price,
                'odd_price' => $request->odd_price,
                'discount_id' => $request->discount_id,
                'specifications' => json_encode($request->specification),
                'description' => json_encode($request->description),
            ];

            if($request->hasFile('thumb')) {
                
                $linkStorage = storage_path('app/public')."/products/".$product->code."/thumbnails";
            
                if (is_dir($linkStorage) && file_exists($linkStorage.'/'.$product->code.'.webp')) {
                    
                    unlink($linkStorage.'/'.$product->code.'.webp');
                }

                $request->validate([
                    'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);
                // $thumbnails = $product->code.'.webp';
                $thumbnails = $product->code.'.'.$request->file('thumb')->getClientOriginalExtension();
                // var_dump($thumbnails);
                // die;
                $linkStorageThumbnails = storage_path('app/public')."/products/".$product->code."/thumbnails/";
                $request->thumb->move($linkStorageThumbnails, $thumbnails);
                Parent::webpImage($linkStorageThumbnails.$thumbnails, 90, true);
            }

            if($request->hasFile('image')) {
                if(json_decode($product->image) != '') {
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/image/";
                    foreach(json_decode($product->image) as $image) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$image);
                        }
                    }
                }

                foreach($request->file('image') as $imageFile) {
                    $requestImageName = time().'_'.$imageFile->getClientOriginalName();
                    // $imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                    $linkStorageImage = storage_path('app/public')."/products/".$product->code."/image/";
                    $imageFile->move($linkStorageImage, $requestImageName);
                    //Parent::webpImage($linkStorageImage.$requestImageName, 80, true);
                    //$images[] = $imageNameSaveDB;
                    $images[] = $requestImageName;
                }
                $dataUpdateProduct['image'] = json_encode($images);
            }
            else {
                $updateImage = $request->imagename;
                if(isset($updateImage)){
                    $currentImage = json_decode($product->image);
                    $result = array_diff($currentImage, $updateImage);
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/image/";
                    foreach($result as $key => $value) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$value);
                        }
                    }
                    $dataUpdateProduct['image'] = json_encode($updateImage);
                }
                else {
                    $dataUpdateProduct['image'] = json_encode('');
                }
            }
            

            if($request->hasFile('document')) {
                if(json_decode($product->document) != '') {
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/document/";
                    foreach(json_decode($product->document) as $document) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$document);
                        }
                    }
                }

                foreach($request->file('document') as $file) {
                    $fileDoc = time().'_'.$file->getClientOriginalName();
                    $linkStorageDoc = "/products/".$product->code."/document/";
                    $file->move(storage_path('app/public').$linkStorageDoc, $fileDoc);
                    $document[] = $fileDoc;
                }
                $dataUpdateProduct['document'] = json_encode($document);
            }
            else {
                $updateDocument = $request->docname;
                if(isset($updateDocument)) {
                    $currentDocument = json_decode($product->document);
                    $result = array_diff($currentDocument, $updateDocument);
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/document/";
                    foreach($result as $key => $value) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$value);
                        }
                    }
                    $dataUpdateProduct['document'] = json_encode($updateDocument);
                }
                else {
                    $dataUpdateProduct['document'] = json_encode('');
                }
            }

            if($request->hasFile('software')) {
                if(json_decode($product->software) != '') {
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/software/";
                    foreach(json_decode($product->software) as $software) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$software);
                        }
                    }
                }

                foreach($request->file('software') as $file) {
                    $fileSoft = time().'_'.$file->getClientOriginalName();
                    $linkStorageSoft = "/products/".$product->code."/software/";
                    $file->move(storage_path('app/public').$linkStorageSoft, $fileSoft);
                    $software[] = $fileSoft;
                }
                $dataUpdateProduct['software'] = json_encode($software);
            }
            else {
                $updatesoftware = $request->softname;
                if(isset($updatesoftware)) {
                    $currentsoftware = json_decode($product->software);
                    $result = array_diff($currentsoftware, $updatesoftware);
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/software/";
                    foreach($result as $key => $value) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$value);
                        }
                    }
                    $dataUpdateProduct['software'] = json_encode($updatesoftware);
                }
                else {
                    $dataUpdateProduct['software'] = json_encode('');
                }
            }

            if($request->hasFile('driver')) {
                if(json_decode($product->driver) != '') {
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/driver/";
                    foreach(json_decode($product->driver) as $driver) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$driver);
                        }
                    }
                }

                foreach($request->file('driver') as $file) {
                    $fileDriver = time().'_'.$file->getClientOriginalName();
                    $linkStorageDriver = "/products/".$product->code."/driver/";
                    $file->move(storage_path('app/public').$linkStorageDriver, $fileDriver);
                    $driver[] = $fileDriver;
                }
                $dataUpdateProduct['driver'] = json_encode($driver);
            }
            else {
                $updatedriver = $request->drivername;
                if(isset($updatedriver)) {
                    $currentdriver = json_decode($product->driver);
                    $result = array_diff($currentdriver, $updatedriver);
                    $linkStorage = storage_path('app/public')."/products/".$product->code."/driver/";
                    foreach($result as $key => $value) {
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$value);
                        }
                    }
                    $dataUpdateProduct['driver'] = json_encode($updatedriver);
                }
                else {
                    $dataUpdateProduct['driver'] = json_encode('');
                }
            }

            $product->update($dataUpdateProduct);

            $SEOData = SEO::where(['type' => 'PRODUCT', 'type_id' => $product->id])->first();
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
                'name' => json_encode('Sản phẩm id '.$product->id),
                'type' => 'PRODUCT',
                'type_id' => $product->id,
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

            return redirect()->route('product.edit',$product->id)->with(['msg' => 'Cập nhật thành công !']);

        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $SEOData = SEO::where(['type' => 'PRODUCT', 'type_id' => $id])->first();
        $product = Product::where('id', $id)->first();
        $inventory = Inventory::where('id', $product->inventory_id)->first();

        $linkStorageThumb = storage_path('app/public').'/products/'.$product->code.'/thumbnails/';
        if (is_dir($linkStorageThumb)) {
            unlink($linkStorageThumb.'/'.$product->code.'.webp');
            rmdir($linkStorageThumb);
        }

        $linkStorageImage = storage_path('app/public').'/products/'.$product->code.'/image/';
        if (is_dir($linkStorageImage)) {
            foreach(json_decode($product->image) as $image) {
                unlink($linkStorageImage.'/'.$image);
            }
            rmdir($linkStorageImage);
        }
        $linkStorageDocument = storage_path('app/public').'/products/'.$product->code.'/document/';
        if (is_dir($linkStorageDocument)) {
            foreach(json_decode($product->document) as $document) {
                unlink($linkStorageDocument.'/'.$document);
            }
            rmdir($linkStorageDocument);
        }
        $linkStorageSoft = storage_path('app/public').'/products/'.$product->code.'/software/';
        if (is_dir($linkStorageSoft)) {
            foreach(json_decode($product->software) as $software) {
                unlink($linkStorageSoft.'/'.$software);
            }
            rmdir($linkStorageSoft);
        }
        $linkStorageDriver = storage_path('app/public').'/products/'.$product->code.'/driver/';
        if (is_dir($linkStorageDriver)) {
            foreach(json_decode($product->driver) as $driver) {
                unlink($linkStorageDriver.'/'.$driver);
            }
            rmdir($linkStorageDriver);
        }

        if(is_dir(storage_path('app/public').'/products/'.$product->code)) {
            rmdir(storage_path('app/public').'/products/'.$product->code);
        }
        
        $product->delete();
        $inventory->delete();
        !is_null($SEOData) ? $SEOData->delete() : true;
        return redirect()->route('product.index')->with(['msg' => 'Đã xóa thương hiệu !']);
    }
}
