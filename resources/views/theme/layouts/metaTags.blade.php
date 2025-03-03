@if ($localPage)
    @php
        $metaDefault = config('app_seo_default.metaTags');
    @endphp
    <meta name="description" content="{{json_decode($metaTag->description) ?? json_decode($metaDefault->description)}}">
    <meta name="keywords" content="{{json_decode($metaTag->keywords) ?? json_decode($metaDefault->keywords)}}">
    <meta name="robots" content="{{json_decode($metaTag->robots) ?? json_decode($metaDefault->robots)}}">
    <meta property="og:locale" content="{{json_decode($metaTag->og_locale) ?? json_decode($metaDefault->og_locale)}}">
    <meta property="og:type" content="{{json_decode($metaTag->og_type) ?? "object"}}">
    <meta property="og:title" content="{{json_decode($metaTag->og_title) ?? ($metaTag->type == "home" ? "Hienluong Audio - ".json_decode($metaTag->name) : json_decode($metaTag->name))}}">
    <meta property="og:description" content="{{json_decode($metaTag->og_description) ?? json_decode($metaDefault->og_description)}}">
    <meta property="og:url" content="{{json_decode($metaTag->og_url) ?? url()->current()}}">
    <meta property="og:site_name" content="{{json_decode($metaTag->og_site_name) ?? json_decode($metaDefault->og_site_name)}}">
    <meta property="article:publisher" content="{{json_decode($metaTag->article_publisher) ?? 'hiendientuhg123@gmail.com'}}">
    <meta property="og:updated_time" content="{{date('c', $metaTag->updated_at->timestamp)}}">
    <meta property="og:image" content="{{json_decode($metaTag->og_image) ?? asset($metaDefault->og_image)}}">
    <meta property="og:image:secure_url" content="{{json_decode($metaTag->og_image_secure_url) ?? asset($metaDefault->og_image_secure_url)}}">
    <meta property="og:image:width" content="{{json_decode($metaTag->og_image_width) ?? json_decode($metaDefault->og_image_width)}}">
    <meta property="og:image:height" content="{{json_decode($metaTag->og_image_height) ?? json_decode($metaDefault->og_image_height)}}">
    <meta property="og:image:alt" content="{{json_decode($metaTag->og_image_alt) ?? json_decode($metaDefault->og_image_alt)}}">
    <meta property="og:image:type" content="{{json_decode($metaTag->og_image_type) ?? json_decode($metaDefault->og_image_type)}}">
    <meta property="article:published_time" content="{{date('c', $metaTag->created_at->timestamp)}}">
    <meta property="article:modified_time" content="{{date('c', $metaTag->updated_at->timestamp)}}">
    <meta name="twitter:card" content="{{json_decode($metaTag->twitter_card) ?? json_decode($metaDefault->twitter_card)}}">
    <meta name="twitter:title" content="{{json_decode($metaTag->twitter_title) ?? "Hienluong Audio - ".json_decode($metaTag->name)}}">
    <meta name="twitter:description" content="{{json_decode($metaTag->twitter_description) ?? json_decode($metaDefault->twitter_description)}}">
    <meta name="twitter:site" content="{{json_decode($metaTag->twitter_site) ?? json_decode($metaDefault->twitter_site)}}">
    <meta name="twitter:creator" content="{{json_decode($metaTag->twitter_creator) ?? json_decode($metaDefault->twitter_creator)}}">
    <meta name="twitter:image" content="{{json_decode($metaTag->twitter_image) ?? asset($metaDefault->twitter_image)}}">
    @if (!is_null($metaTag->twitter_label1))
        <meta name="twitter:label1" content="{{json_decode($metaTag->twitter_label1)}}">
    @endif
    @if (!is_null($metaTag->twitter_data1))
        <meta name="twitter:data1" content="{{json_decode($metaTag->twitter_data1)}}">
    @endif    
@else
    @php
    // $pageTitle, $objectPage;
    if (is_null($metaTag)) {
        $metaTag = config('app_seo_default.metaTags');
        $metaTag->og_type = json_encode("article");
        $metaTag->og_title = json_encode($pageTitle);
        // $metaTag->article_publisher = json_encode('hiendientuhg123@gmail.com');
        $metaTag->og_url = json_encode(url()->current());
        $metaTag->twitter_title = json_encode($pageTitle);
        $metaTag->og_image = json_encode(asset($metaTag->og_image));
        $metaTag->og_image_secure_url = json_encode(asset($metaTag->og_image_secure_url));
        $metaTag->twitter_image = json_encode(asset($metaTag->twitter_image));
    }else {
        if (isset($postUrl)) {
           $metaTag->og_url = json_encode($postUrl.json_decode($metaTag->og_url));
        }
    }
    @endphp
    <meta name="description" content="{{json_decode($metaTag->description)}}">
    <meta name="keywords" content="{{json_decode($metaTag->keywords)}}">
    <meta name="robots" content="{{json_decode($metaTag->robots)}}">
    <meta property="og:locale" content="{{json_decode($metaTag->og_locale)}}">
    <meta property="og:type" content="{{json_decode($metaTag->og_type)}}">
    <meta property="og:title" content="{{json_decode($metaTag->og_title)}}">
    <meta property="og:description" content="{{json_decode($metaTag->og_description)}}">
    <meta property="og:url" content="{{json_decode($metaTag->og_url)}}">
    <meta property="og:site_name" content="{{json_decode($metaTag->og_site_name)}}">
    <meta property="article:publisher" content="{{json_decode($metaTag->article_publisher)}}">
    <meta property="og:updated_time" content="{{date('c', $objectPage->updated_at->timestamp)}}">
    <meta property="og:image" content="{{json_decode($metaTag->og_image)}}">
    <meta property="og:image:secure_url" content="{{json_decode($metaTag->og_image)}}">
    <meta property="og:image:width" content="{{json_decode($metaTag->og_image_width)}}">
    <meta property="og:image:height" content="{{json_decode($metaTag->og_image_height)}}">
    <meta property="og:image:alt" content="{{json_decode($metaTag->og_image_alt)}}">
    <meta property="og:image:type" content="{{json_decode($metaTag->og_image_type)}}">
    <meta property="article:published_time" content="{{date('c', $objectPage->created_at->timestamp)}}">
    <meta property="article:modified_time" content="{{date('c', $objectPage->updated_at->timestamp)}}">
    <meta name="twitter:card" content="{{json_decode($metaTag->twitter_card)}}">
    <meta name="twitter:title" content="{{json_decode($metaTag->twitter_title)}}">
    <meta name="twitter:description" content="{{json_decode($metaTag->twitter_description)}}">
    <meta name="twitter:site" content="{{json_decode($metaTag->twitter_site)}}">
    <meta name="twitter:creator" content="{{json_decode($metaTag->twitter_creator)}}">
    <meta name="twitter:image" content="{{json_decode($metaTag->twitter_image)}}">

    @if (!is_null($metaTag->twitter_label1))
    <meta name="twitter:label1" content="{{json_decode($metaTag->twitter_label1)}}">
    @endif
    @if (!is_null($metaTag->twitter_data1))
    <meta name="twitter:data1" content="{{json_decode($metaTag->twitter_data1)}}">
    @endif
@endif
