<button data-modal-target="create-modal" data-modal-toggle="create-modal" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
    </svg>
    Thêm danh mục mới
</button>

<div id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Create modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Create modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tạo danh mục mới
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="create-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Create modal body -->
            <form class="discount-form p-4 md:p-5" data-route="{{ route('category.store') }}" method="POST" class="" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Danh mục</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Nhập danh mục ..." required="">
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-semibold text-gray-900">Danh mục cha</label>
                        <select id="parent_id" name="parent_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="0" class="font-medium">Danh mục gốc
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" class="font-medium">{{$category->name}}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <div class="flex items-center">
                            <input id="visible"  name="visible" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="visible" class="ms-2 text-sm font-semibold text-gray-900">Hiển thị cho khách hàng</label>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-semibold text-gray-900">Mô tả danh mục</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Viết mô tả danh mục tại đây..."></textarea>
                    </div>
                </div>
                
                <!-- drawer component -->
                <div id="drawer-right-example"
                    class="fixed top-0 right-0 z-[9999] h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[50%] max-md:w-full dark:bg-gray-800 duration-500 border border-gray-300"
                    tabindex="-1" aria-labelledby="drawer-right-label">
                    <h5 id="drawer-right-label"
                        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>Tối ưu SEO
                    </h5>
                    <button id="close-drawer" type="button" data-drawer-hide="drawer-right-example"
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
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="seo_title" class="block mb-2 font-semibold text-gray-900">Thẻ title</label>
                            <textarea name="seo_title" id="seo_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="robots" class="block mb-2 font-semibold text-gray-900">Thẻ meta robots</label>
                            <textarea name="seo_robots" id="robots" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: index, follow"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="seo_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta description</label>
                            <textarea name="seo_description" id="seo_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="keywords" class="block mb-2 font-semibold text-gray-900">Thẻ meta keywords</label>
                            <textarea name="seo_keywords" id="keywords" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio, Line Array, Loa, Speaker, Công suất, Amplifier, Microphone, Vang, Mixer, Crossover, Quản lý nguồn điện, Phụ kiện âm thanh, Dàn loa Karaoke"></textarea>
                        </div>

                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_locale" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:locale</label>
                            <textarea name="seo_og_locale" id="og_locale" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: vi_VN"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_site_name" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:site_name</label>
                            <textarea name="seo_og_site_name" id="og_site_name" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:description</label>
                            <textarea name="seo_og_description" id="og_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:title</label>
                            <textarea name="seo_og_title" id="og_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <Tên trang>"></textarea>
                        </div>

                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_type" class="block mb-2 font-semibold text-gray-900">Thẻ og:type</label>
                            <textarea name="seo_og_type" id="og_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: object"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:url</label>
                            <textarea name="seo_og_url" id="og_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: <url trang hiện tại>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="article_publisher" class="block mb-2 font-semibold text-gray-900">Thẻ meta article:publisher</label>
                            <textarea name="seo_article_publisher" id="article_publisher" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link facebook của Aucus Audio>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image</label>
                            <textarea name="seo_og_image" id="og_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image_secure_url" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:secure_url</label>
                            <textarea name="seo_og_image_secure_url" id="og_image_secure_url" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>"></textarea>
                        </div>
                        
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image_height" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:height</label>
                            <textarea name="seo_og_image_height" id="og_image_height" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: height"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image_width" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:width</label>
                            <textarea name="seo_og_image_width" id="og_image_width" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Kích thước ảnh: width"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image_type" class="block mb-2 font-semibold text-gray-900">Thẻ meta og:image:type</label>
                            <textarea name="seo_og_image_type" id="og_image_type" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: image/png"></textarea>
                        </div>
                        
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="og_image_alt" class="block mb-2 font-semibold text-gray-900">Thẻ og:image:alt</label>
                            <textarea name="seo_og_image_alt" id="og_image_alt" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio logo"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_site" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:site</label>
                            <textarea name="seo_twitter_site" id="twitter_site" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: cskh@aucusaudio.vn"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_card" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:card</label>
                            <textarea name="seo_twitter_card" id="twitter_card" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Mặc định: summary_large_image"></textarea>
                        </div>
                        
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_creator" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:creator</label>
                            <textarea name="seo_twitter_creator" id="twitter_creator" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: aucusaudio.vn"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_title" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:title</label>
                            <textarea name="seo_twitter_title" id="twitter_title" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: AucusAudio"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_description" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:description</label>
                            <textarea name="seo_twitter_description" id="twitter_description" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: Aucus Audio là đơn vị nhập khẩu, phân phối các thiết bị âm thanh chính hãng, chuyên nghiệp. Các loại loa, microphone, Amplifier, dàn loa karaoke, phụ kiện âm thanh…"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_image" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:image</label>
                            <textarea name="seo_twitter_image" id="twitter_image" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Ví dụ: <link ảnh của thương hiệu>"></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_label1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:label1</label>
                            <textarea name="seo_twitter_label1" id="twitter_label1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống..."></textarea>
                        </div>
                        <div class="w-[calc(50%-8px)] max-md:w-full">
                            <label for="twitter_data1" class="block mb-2 font-semibold text-gray-900">Thẻ meta twitter:data1</label>
                            <textarea name="seo_twitter_data1" id="twitter_data1" cols="30" rows="3" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Có thể để trống..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row">
                    <button type="submit" class="btn_create_item text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Tạo danh mục mới
                    </button>
                    
                    <button id="open-drawer" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-5 text-center" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right"  aria-controls="drawer-right-example" data-drawer-backdrop="flase">
                        Tối ưu SEO
                    </button>    
                </div>
            </form>
        </div>
    </div>
</div> 
<script>
    window.addEventListener('click', function(e){   
        if (!document.getElementById('drawer-right-example').contains(e.target) && !document.getElementById('open-drawer').contains(e.target) && $('#drawer-right-example').attr('aria-modal') == 'true'){
            $('#close-drawer').trigger('click');
            console.log(true);
        } else{
            // $('.close-drawer').trigger('click');
            console.log(false);
        }
    });
</script>