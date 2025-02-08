<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;
    public $table = "s_e_o_s";

    protected $fillable = [
        'type',
        'name',
        'type_id',
        'title',
        'description',
        'keywords',
        'og_site_name',
        'og_description',
        'og_title',
        'og_type',
        'og_url',
        'og_image',
        'og_image_height',
        'og_image_width',
        'og_image_type',
        'og_image_alt',
        'twitter_site',
        'twitter_card',
        'twitter_creator',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'robots',
        'og_locale',
        'article_publisher',
        'og_image_secure_url',
        'twitter_label1',
        'twitter_data1'
    ];
}
