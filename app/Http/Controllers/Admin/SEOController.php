<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.SEO.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.SEO.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newSEOData = [
            'name' => json_encode($request->seo_name),
            'type' => $request->seo_type,
            'type_id' => $request->seo_type_id,
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
        return redirect()->route('SEO.create')->with(['success' => 'Created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {  
        $SEOData = SEO::find($id);
        return view('admin.SEO.edit', compact('SEOData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $SEOData = SEO::find($id);
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
            'name' => json_encode($request->seo_name),
            'type' => $request->seo_type,
            'type_id' => $request->seo_type_id,
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
        if ($oldSEOData == $updateSEOData) {
            return redirect()->route('SEO.edit', $id)->with(['error' => 'No change']);
        } else {
            $SEOData->update($updateSEOData);
            return redirect()->route('SEO.edit', $id)->with(['success' => 'Updated']);
        }
    }

    public function updateSEOCategory(Request $request, $id)
    {
        $SEOData = SEO::where(['type' => 'CATEGORY', 'type_id' => $id])->first();
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
            'name' => json_encode('Danh mục id '.$id),
            'type' => 'CATEGORY',
            'type_id' => $id,
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
            return redirect()->route('category.index')->with(['msg' => 'Cập nhật danh mục thành công !']);
        }
        else{
            if ($oldSEOData != $updateSEOData){
                $SEOData->update($updateSEOData);
                return redirect()->route('category.index')->with(['msg' => 'Cập nhật danh mục thành công !']);
            }
            return redirect()->route('category.index')->with(['error' => 'Không có gì thay đổi !']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $SEOData = SEO::find($id);
        $SEOData->delete();
        return redirect()->route('SEO.index')->with(['success' => 'Deleted']);
    }
}
