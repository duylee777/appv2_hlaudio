@if (isset($metaTag))
    <meta name="description" content="{{json_decode($metaTag->description)}}">
    <meta name="keywords" content="{{json_decode($metaTag->keywords)}}">
    <meta name="robots" content="{{json_decode($metaTag->robots) ?? "index, follow"}}">
    <meta property="og:locale" content="{{json_decode($metaTag->og_locale) ?? "vi_VN"}}">
    <meta property="og:type" content="{{json_decode($metaTag->og_type) ?? "object"}}">
    <meta property="og:title" content="{{json_decode($metaTag->og_title)?? app()->view->getSections()['title']}}">
    <meta property="og:description" content="{{json_decode($metaTag->og_description)}}">
    <meta property="og:url" content="{{json_decode($metaTag->og_url) ?? url()->current()}}">
    <meta property="og:site_name" content="{{json_decode($metaTag->og_site_name)?? url()->current()}} ">
    <meta property="article:publisher" content="{{json_decode($metaTag->article_publisher)}}">
    <meta property="og:updated_time" content="{{date('c', $metaTag->updated_at->timestamp)}}">
    <meta property="og:image" content="{{json_decode($metaTag->og_image)}}">
    <meta property="og:image:secure_url" content="{{json_decode($metaTag->og_image)}}">
    <meta property="og:image:width" content="{{json_decode($metaTag->og_image_width)}}">
    <meta property="og:image:height" content="{{json_decode($metaTag->og_image_height)}}">
    <meta property="og:image:alt" content="{{json_decode($metaTag->og_image_alt)}}">
    <meta property="og:image:type" content="{{json_decode($metaTag->og_image_type) ?? "image/png"}}">
    <meta property="article:published_time" content="{{date('c', $metaTag->created_at->timestamp)}}">
    <meta property="article:modified_time" content="{{date('c', $metaTag->updated_at->timestamp)}}">
    <meta name="twitter:card" content="{{json_decode($metaTag->twitter_card) ?? "summary_large_image"}}">
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
@else
    <meta name="robots" content= "index, follow">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="object">
    <meta property="og:title" content="{{app()->view->getSections()['title']}}">
    <meta property="og:url" content="{{ url()->current() }}">
@endif
