<div class="admin-form-grid">
    <div class="form-group full">
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $tag->name ?? '') }}" required>
    </div>

    <div class="form-group full">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $tag->slug ?? '') }}">
    </div>
</div>