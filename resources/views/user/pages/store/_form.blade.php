<div class="form-group">
    <label for="name">Store Name</label>
    <input type="text" name="name" id="name" class="form-control" 
           value="{{ old('name', $store->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="description">Store Description</label>
    <textarea name="description" id="description" class="form-control" rows="4" required>
        {{ old('description', $store->description ?? '') }}
    </textarea>
</div>

<div class="form-group">
    <label for="status">Store Status</label>
    <select name="status" id="status" class="form-control">
        <option value="active" {{ old('status', $store->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $store->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
</div>