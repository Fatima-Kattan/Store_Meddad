                        <div class="mb-3">
                            {{-- <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter Category Name" value="{{ old('name', $category->name) }}"> --}}
                            {{--  @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif --}}
                            {{--        @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror --}}
                            <x-form.input name="name" label="Enter Category Name" type="text" :value="$category->name"
                                placeholder="Enter Category Name" id="name" />
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Category Description"
                                rows="4">{{ old('description', $category->description) }}</textarea>
                            @if ($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <x-form.select name="status" label="Select Category Status"
                            :options="['active' => 'Active', 'inactive' => 'Inactive']"
                            :selected="$category->status ?? 'active'" />