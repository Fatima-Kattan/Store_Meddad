                        <div class="card-body">
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
                            <x-form.input name="name" label="Enter Product Name" type="text" :value="$product->name"
                                placeholder="Enter Product Name" id="name" />
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Product Description"
                                rows="4">{{ old('description', $product->description) }}</textarea>
                            @if ($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <x-form.select name="status" label="Select Product Status"
                            :options="['active' => 'Active', 'inactive' => 'Inactive']"
                            :selected="$product->status ?? 'active'" />


                        <x-form.select name="store_id" label="Select Product Store"
                            :options="$stores"
                            :selected="$product->store_id ?? ''" />

                            <x-form.select name="category_id" label="Select Product Category"
                            :options="$categories"
                            :selected="$product->category_id ?? ''" />

                            <x-form.input name="price" label="Enter Product Price" type="number" :value="$product->price"
                                placeholder="Enter Product Price" id="price" />
                            </div>