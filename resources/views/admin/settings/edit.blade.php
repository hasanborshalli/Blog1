@extends('admin.layouts.app')

@section('content')
<div class="admin-page-head">
    <h1>Settings</h1>
</div>

<div class="admin-card">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf

        <div class="admin-form-grid">
            <div class="form-group full">
                <label>Site Name</label>
                <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}" required>
            </div>

            <div class="form-group full">
                <label>Tagline</label>
                <input type="text" name="tagline" value="{{ old('tagline', $setting->tagline) }}">
            </div>

            <div class="form-group">
                <label>Contact Email</label>
                <input type="email" name="contact_email" value="{{ old('contact_email', $setting->contact_email) }}">
            </div>

            <div class="form-group">
                <label>Contact Phone</label>
                <input type="text" name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone) }}">
            </div>

            <div class="form-group">
                <label>Facebook URL</label>
                <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}">
            </div>

            <div class="form-group">
                <label>Instagram URL</label>
                <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}">
            </div>

            <div class="form-group">
                <label>LinkedIn URL</label>
                <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}">
            </div>

            <div class="form-group">
                <label>Twitter URL</label>
                <input type="url" name="twitter" value="{{ old('twitter', $setting->twitter) }}">
            </div>

            <div class="form-group full">
                <label>YouTube URL</label>
                <input type="url" name="youtube" value="{{ old('youtube', $setting->youtube) }}">
            </div>

            <div class="form-group full">
                <label>About Text</label>
                <textarea name="about_text" rows="6">{{ old('about_text', $setting->about_text) }}</textarea>
            </div>

            <div class="form-group full">
                <label>Footer Text</label>
                <textarea name="footer_text" rows="4">{{ old('footer_text', $setting->footer_text) }}</textarea>
            </div>

            <div class="form-group">
                <label>Posts Per Page</label>
                <input type="number" name="posts_per_page" value="{{ old('posts_per_page', $setting->posts_per_page) }}"
                    min="1" max="50" required>
            </div>

            <div class="form-check">
                <label>
                    <input type="checkbox" name="comments_enabled" value="1" @checked(old('comments_enabled',
                        $setting->comments_enabled))>
                    Enable comments
                </label>
            </div>

            <div class="form-group full">
                <label>Meta Title</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $setting->meta_title) }}">
            </div>

            <div class="form-group full">
                <label>Meta Description</label>
                <textarea name="meta_description"
                    rows="4">{{ old('meta_description', $setting->meta_description) }}</textarea>
            </div>
        </div>

        <button type="submit" class="admin-link-btn">Save Settings</button>
    </form>
</div>
@endsection