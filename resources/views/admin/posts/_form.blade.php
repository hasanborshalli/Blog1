<div class="admin-form-grid">
    <div class="form-group full">
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required>
    </div>

    <div class="form-group full">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id">
            <option value="">Select category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id ?? '') ==
                $category->id)>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" required>
            <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Draft</option>
            <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Published</option>
        </select>
    </div>

    <div class="form-group">
        <label>Published At</label>
        <input type="datetime-local" name="published_at"
            value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="form-group">
        <label>Featured Image</label>
        <input type="file" name="featured_image">
        @if(!empty($post?->featured_image))
        <div class="image-preview">
            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Featured image">
        </div>
        @endif
    </div>

    <div class="form-group full">
        <label>Excerpt</label>
        <textarea name="excerpt" rows="4">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div class="form-group full">
        <label>Content</label>
        <textarea name="content" rows="12" required>{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div class="form-group full">
        <label>Tags</label>
        <div class="checkbox-grid">
            @foreach($tags as $tag)
            <label class="checkbox-item">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags',
                $selectedTags ?? [])))
                >
                {{ $tag->name }}
            </label>
            @endforeach
        </div>
    </div>

    <div class="form-group full">
        <label>Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}">
    </div>

    <div class="form-group full">
        <label>Meta Description</label>
        <textarea name="meta_description"
            rows="4">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
    </div>

    <div class="form-check full">
        <label>
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured ??
            false))>
            Mark as featured
        </label>
    </div>
</div>