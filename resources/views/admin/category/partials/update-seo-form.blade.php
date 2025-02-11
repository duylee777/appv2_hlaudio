<button class="block" type="button" data-drawer-target="drawer-right-example-{{$category->id}}" data-drawer-show="drawer-right-example-{{$category->id}}" data-drawer-placement="right"  aria-controls="drawer-right-example-{{$category->id}}" data-drawer-backdrop="true" title="SEO">
    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512"><path d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32z"/></svg>
</button>

<!-- drawer component -->
<div id="drawer-right-example-{{$category->id}}"
    class="fixed top-0 right-0 z-[9999] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[67%] max-md:w-full dark:bg-gray-800 duration-500 border border-gray-300"
    tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg><span class="uppercase text-[#000]">{{$category->name}}</span>&nbsp;- Tối ưu SEO
    </h5>
    <button type="button" data-drawer-hide="drawer-right-example-{{$category->id}}"
        aria-controls="drawer-right-example-{{$category->id}}"
        class="bg-gray-200 text-gray-900 rounded-lg text-sm w-8 h-8 fixed top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <form method="POST" action="{{ route('admin.SEOCategory.update', $category->id) }}" class="px-4" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-row flex-wrap gap-4">
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="seo_title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
                <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>">{{is_null($SEOData) ? "" : json_decode($SEOData->title)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
                <textarea name="seo_robots" id="robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: index, follow">{{is_null($SEOData) ? "" : json_decode($SEOData->robots)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="seo_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
                <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->description)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
                <textarea name="seo_keywords" id="keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio, Line Array, Loa, Speaker, Công suất, Amplifier, Microphone, Vang, Mixer, Crossover, Quản lý nguồn điện, Phụ kiện âm thanh, Dàn loa Karaoke">{{is_null($SEOData) ? "" : json_decode($SEOData->keywords)}}</textarea>
            </div>

            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
                <textarea name="seo_og_locale" id="og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: vi_VN">{{is_null($SEOData) ? "" : json_decode($SEOData->og_locale)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
                <textarea name="seo_og_site_name" id="og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_site_name)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
                <textarea name="seo_og_description" id="og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->og_description)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
                <textarea name="seo_og_title" id="og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_title)}}</textarea>
            </div>

            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
                <textarea name="seo_og_type" id="og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: object">{{is_null($SEOData) ? "" : json_decode($SEOData->og_type)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
                <textarea name="seo_og_url" id="og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_url)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
                <textarea name="seo_article_publisher" id="article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link facebook của Aucus Audio>">{{is_null($SEOData) ? "" : json_decode($SEOData->article_publisher)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
                <textarea name="seo_og_image" id="og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
                <textarea name="seo_og_image_secure_url" id="og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_secure_url)}}</textarea>
            </div>
            
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
                <textarea name="seo_og_image_height" id="og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: height">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_height)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
                <textarea name="seo_og_image_width" id="og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: width">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_width)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
                <textarea name="seo_og_image_type" id="og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: image/png">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_type)}}</textarea>
            </div>
            
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
                <textarea name="seo_og_image_alt" id="og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio logo">{{is_null($SEOData) ? "" : json_decode($SEOData->og_image_alt)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
                <textarea name="seo_twitter_site" id="twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: cskh@aucusaudio.vn">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_site)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
                <textarea name="seo_twitter_card" id="twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: summary_large_image">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_card)}}</textarea>
            </div>
            
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
                <textarea name="seo_twitter_creator" id="twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: aucusaudio.vn">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_creator)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
                <textarea name="seo_twitter_title" id="twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_title)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
                <textarea name="seo_twitter_description" id="twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_description)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
                <textarea name="seo_twitter_image" id="twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_image)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
                <textarea name="seo_twitter_label1" id="twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống...">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_label1)}}</textarea>
            </div>
            <div class="w-[calc(50%-8px)] max-md:w-full">
                <label for="twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
                <textarea name="seo_twitter_data1" id="twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống...">{{is_null($SEOData) ? "" : json_decode($SEOData->twitter_data1)}}</textarea>
            </div>
        </div>
        <div class="text-left">
            <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                Cập nhật
            </button>
        </div>
    </form>
</div>
        