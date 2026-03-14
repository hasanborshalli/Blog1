<div class="admin-form-grid">
    <div class="form-group full">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required>
    </div>

    <div class="form-group full">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}">
    </div>

    <div class="form-group full">
        <label>Description</label>
        <textarea name="description" rows="5">{{ old('description', $category->description ?? '') }}</textarea>
    </div>

    <div class="form-group full">
        <label>Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title', $category->meta_title ?? '') }}">
    </div>

    <div class="form-group full">
        <label>Meta Description</label>
        <textarea name="meta_description"
            rows="4">{{ old('meta_description', $category->meta_description ?? '') }}</textarea>
    </div>

    <div class="form-check full">
        <label>
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category->is_active ?? true))>
            Active
        </label>
    </div>
</div>