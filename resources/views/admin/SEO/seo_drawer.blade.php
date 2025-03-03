@if ($isCreateForm)
{{-- create form  --}}
<!-- drawer component -->
<div id="drawer-right-example"
    class="fixed top-0 right-0 z-[9999] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[67%] max-md:w-full dark:bg-gray-800 duration-500 border border-gray-300"
    tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Tối ưu SEO
    </h5>
    <button id="close-drawer" type="button" 
        data-drawer-hide="drawer-right-example"
        aria-controls="drawer-right-example"
        class="bg-gray-200 text-gray-900 rounded-lg text-sm w-8 h-8 fixed top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="flex flex-row flex-wrap gap-4">
        @php
            $metaDefault = config('app_seo_default.metaTags');
            $metaDefault->og_type = json_encode("article");
            $metaDefault->article_publisher = json_encode('hiendientuhg123@gmail.com');
            $metaDefault->og_url = json_encode($urlDefault);
            $metaDefault->og_image = json_encode(asset($metaDefault->og_image));
            $metaDefault->og_image_secure_url = json_encode(asset($metaDefault->og_image_secure_url));
            $metaDefault->twitter_image = json_encode(asset($metaDefault->twitter_image));
        @endphp
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
            <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tiêu đề"></textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
            <textarea name="seo_robots" id="seo_robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->robots)}}">{{json_decode($metaDefault->robots)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
            <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->description)}}">{{json_decode($metaDefault->description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
            <textarea name="seo_keywords" id="seo_keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->keywords)}}">{{json_decode($metaDefault->keywords)}}</textarea>
        </div>

        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
            <textarea name="seo_og_locale" id="seo_og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_locale)}}">{{json_decode($metaDefault->og_locale)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
            <textarea name="seo_og_site_name" id="seo_og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_site_name)}}">{{json_decode($metaDefault->og_site_name)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
            <textarea name="seo_og_description" id="seo_og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_description)}}">{{json_decode($metaDefault->og_description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
            <textarea name="seo_og_title" id="seo_og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tiêu đề"></textarea>
        </div>

        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
            <textarea name="seo_og_type" id="seo_og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_type)}}">{{json_decode($metaDefault->og_type)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
            <textarea name="seo_og_url" id="seo_og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_url)}}/abc">{{json_decode($metaDefault->og_url)}}/</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
            <textarea name="seo_article_publisher" id="seo_article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->article_publisher)}}">{{json_decode($metaDefault->article_publisher)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
            <textarea name="seo_og_image" id="seo_og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image)}}">{{json_decode($metaDefault->og_image)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
            <textarea name="seo_og_image_secure_url" id="seo_og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_secure_url)}}">{{json_decode($metaDefault->og_image_secure_url)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
            <textarea name="seo_og_image_height" id="seo_og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_height)}}">{{json_decode($metaDefault->og_image_height)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
            <textarea name="seo_og_image_width" id="seo_og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_width)}}">{{json_decode($metaDefault->og_image_width)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
            <textarea name="seo_og_image_type" id="seo_og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_type)}}">{{json_decode($metaDefault->og_image_type)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
            <textarea name="seo_og_image_alt" id="seo_og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_alt)}}">{{json_decode($metaDefault->og_image_alt)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
            <textarea name="seo_twitter_site" id="seo_twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_site)}}">{{json_decode($metaDefault->twitter_site)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
            <textarea name="seo_twitter_card" id="seo_twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_card)}}">{{json_decode($metaDefault->twitter_card)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
            <textarea name="seo_twitter_creator" id="seo_twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_creator)}}">{{json_decode($metaDefault->twitter_creator)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
            <textarea name="seo_twitter_title" id="seo_twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nhập tiêu đề"></textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
            <textarea name="seo_twitter_description" id="seo_twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_description)}}">{{json_decode($metaDefault->twitter_description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
            <textarea name="seo_twitter_image" id="seo_twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_image)}}">{{json_decode($metaDefault->twitter_image)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
            <textarea name="seo_twitter_label1" id="seo_twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($metaDefault->twitter_label1)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
            <textarea name="seo_twitter_data1" id="seo_twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($metaDefault->twitter_data1)}}</textarea>
        </div>
    </div>
</div>    
@else
{{-- edit  --}}
<!-- drawer component -->
<div id="drawer-right-example"
    class="fixed top-0 right-0 z-[9999] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[67%] max-md:w-full dark:bg-gray-800 duration-500 border border-gray-300"
    tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Tối ưu SEO
    </h5>
    <button id="close-drawer" type="button" 
        data-drawer-hide="drawer-right-example"
        aria-controls="drawer-right-example"
        class="bg-gray-200 text-gray-900 rounded-lg text-sm w-8 h-8 fixed top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="flex flex-row flex-wrap gap-4">
        @php
            $metaTag = $SEOData;
            $metaDefault = config('app_seo_default.metaTags');
            // $urlBase = $urlDefault;
            $metaDefault->og_type = json_encode("article");
            $metaDefault->og_title = json_encode($titleDefault);
            $metaDefault->article_publisher = json_encode('hiendientuhg123@gmail.com');
            $metaDefault->og_url = json_encode($urlDefault);
            $metaDefault->twitter_title = json_encode($titleDefault);
            $metaDefault->title = json_encode($titleDefault);
            $metaDefault->og_image = json_encode(asset($metaDefault->og_image));
            $metaDefault->og_image_secure_url = json_encode(asset($metaDefault->og_image_secure_url));
            $metaDefault->twitter_image = json_encode(asset($metaDefault->twitter_image));
            if (is_null($metaTag)) {
                $metaTag = $metaDefault;
            }
        @endphp
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
            <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->title)}}">{{json_decode($metaTag->title)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
            <textarea name="seo_robots" id="seo_robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->robots)}}">{{json_decode($metaTag->robots)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
            <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->description)}}">{{json_decode($metaTag->description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
            <textarea name="seo_keywords" id="seo_keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->keywords)}}">{{json_decode($metaTag->keywords)}}</textarea>
        </div>

        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
            <textarea name="seo_og_locale" id="seo_og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_locale)}}">{{json_decode($metaTag->og_locale)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
            <textarea name="seo_og_site_name" id="seo_og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_site_name)}}">{{json_decode($metaTag->og_site_name)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
            <textarea name="seo_og_description" id="seo_og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_description)}}">{{json_decode($metaTag->og_description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
            <textarea name="seo_og_title" id="seo_og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_title)}}">{{json_decode($metaTag->og_title)}}</textarea>
        </div>

        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
            <textarea name="seo_og_type" id="seo_og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_type)}}">{{json_decode($metaTag->og_type)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
            <textarea name="seo_og_url" id="seo_og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{$urlBase}}/abc">{{json_decode($metaTag->og_url)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
            <textarea name="seo_article_publisher" id="seo_article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->article_publisher)}}">{{json_decode($metaTag->article_publisher)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
            <textarea name="seo_og_image" id="seo_og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image)}}">{{json_decode($metaTag->og_image)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
            <textarea name="seo_og_image_secure_url" id="seo_og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_secure_url)}}">{{json_decode($metaTag->og_image_secure_url)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
            <textarea name="seo_og_image_height" id="seo_og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_height)}}">{{json_decode($metaTag->og_image_height)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
            <textarea name="seo_og_image_width" id="seo_og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_width)}}">{{json_decode($metaTag->og_image_width)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
            <textarea name="seo_og_image_type" id="seo_og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_type)}}">{{json_decode($metaTag->og_image_type)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
            <textarea name="seo_og_image_alt" id="seo_og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->og_image_alt)}}">{{json_decode($metaTag->og_image_alt)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
            <textarea name="seo_twitter_site" id="seo_twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_site)}}">{{json_decode($metaTag->twitter_site)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
            <textarea name="seo_twitter_card" id="seo_twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_card)}}">{{json_decode($metaTag->twitter_card)}}</textarea>
        </div>
        
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
            <textarea name="seo_twitter_creator" id="seo_twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_creator)}}">{{json_decode($metaTag->twitter_creator)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
            <textarea name="seo_twitter_title" id="seo_twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_title)}}">{{json_decode($metaTag->twitter_title)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
            <textarea name="seo_twitter_description" id="seo_twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_description)}}">{{json_decode($metaTag->twitter_description)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
            <textarea name="seo_twitter_image" id="seo_twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: {{json_decode($metaDefault->twitter_image)}}">{{json_decode($metaTag->twitter_image)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
            <textarea name="seo_twitter_label1" id="seo_twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($metaTag->twitter_label1)}}</textarea>
        </div>
        <div class="w-[calc(50%-8px)] max-md:w-full">
            <label for="seo_twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
            <textarea name="seo_twitter_data1" id="seo_twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống">{{json_decode($metaTag->twitter_data1)}}</textarea>
        </div>
    </div>
</div>   
@endif
<!-- drawer init and toggle -->
<button id="open-drawer" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
    type="button" data-drawer-target="drawer-right-example"
    data-drawer-show="drawer-right-example" data-drawer-placement="right"
        aria-controls="drawer-right-example" data-drawer-backdrop="false">
    Tối ưu SEO
</button>

<script type="text/javascript">
    window.addEventListener('click', function(e){   
        if (!document.getElementById('drawer-right-example').contains(e.target) && !document.getElementById('open-drawer').contains(e.target) && $('#drawer-right-example').attr('aria-modal') == 'true'){
            $('#close-drawer').trigger('click');
        }
    });
    function prevData(element) {
        $(element).data('prev', $(element).val());
    };
    function titleDefault(element) {
        $("#seo_title").val() == "" || $("#seo_title").val() == $(element).data('prev') ? $("#seo_title").val($(element).val()) : false;

        $("#seo_og_title").val() == "" || $("#seo_og_title").val() == $(element).data('prev') ? $("#seo_og_title").val($(element).val()) : false;

        $("#seo_twitter_title").val() == "" || $("#seo_twitter_title").val() == $(element).data('prev') ? $("#seo_twitter_title").val($(element).val()) : false;
        
        $("#slug").val() == "" || $("#slug").val() == ChangeToSlug($(element).data('prev')) ? $("#slug").val(ChangeToSlug($(element).val())) : false;

        @if ($isCreateForm) 
            $("#seo_og_url").val() == "" || $("#seo_og_url").val() == "{{json_decode($metaDefault->og_url)}}" + "/" + ChangeToSlug($(element).data('prev')) ? $("#seo_og_url").val("{{json_decode($metaDefault->og_url)}}" + "/" + ChangeToSlug($(element).val())) : false;   
        @else
            $("#seo_og_url").val() == "" || $("#seo_og_url").val() == "/" || $("#seo_og_url").val() == "{{json_decode($metaTag->og_url)}}" || $("#seo_og_url").val() == "{{$urlBase}}" + "/" + ChangeToSlug($(element).data('prev')) ? $("#seo_og_url").val("{{$urlBase}}" + "/" + ChangeToSlug($(element).val())) : false;
        @endif
        
    };

    function ogUrlDefault(element) {
        $(element).val(ChangeToSlug($(element).val()));
        
        @if ($isCreateForm) 
            $("#seo_og_url").val() == "" || $("#seo_og_url").val() == "{{json_decode($metaDefault->og_url)}}" + "/" + ChangeToSlug($(element).data('prev')) ? $("#seo_og_url").val("{{json_decode($metaDefault->og_url)}}" + "/" + ChangeToSlug($(element).val())) : false;   
        @else
            $("#seo_og_url").val() == "" || $("#seo_og_url").val() == "/" || $("#seo_og_url").val() == "{{json_decode($metaTag->og_url)}}" || $("#seo_og_url").val() == "{{$urlBase}}" + "/" + ChangeToSlug($(element).data('prev')) ? $("#seo_og_url").val("{{$urlBase}}" + "/" + ChangeToSlug($(element).val())) : false;
        @endif
    };

    function ChangeToSlug(title) {
        var slug;
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
    
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        return slug;
    }
</script>