                        <div class="card-body">
                            <div class="mb-3">
                                <x-form.input name="name" label="Enter Team Member Name" type="text" :value="$member->name"
                                    placeholder="Enter Team Member Name" id="name" />
                            </div>
                            <div class="mb-3">
                                <x-form.input name="email" label="Email" type="email" :value="$member->email"
                                    placeholder="Enter Email" id="email" />
                            </div>
                            <div class="mb-3">
                                <x-form.input name="password" label="Password" type="password" :value="''"
                                    placeholder="Enter password" id="password" />
                            </div>
                            
                            <div class="mb-3">
                                <x-form.input name="password_confirmation" label="Confirm Password" type="password" :value="''"
                                    placeholder="Confirm password" id="password_confirmation" />
                            </div>
                            
                        </div>
