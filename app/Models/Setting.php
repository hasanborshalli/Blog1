<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'tagline',
        'logo',
        'favicon',
        'contact_email',
        'contact_phone',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'youtube',
        'about_text',
        'footer_text',
        'comments_enabled',
        'posts_per_page',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'comments_enabled' => 'boolean',
        'posts_per_page' => 'integer',
    ];
}