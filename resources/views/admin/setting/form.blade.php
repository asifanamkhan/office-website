<div class="form-row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="name" class=""><b>Name</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="name" id="name" placeholder="Name" type="text" class="form-control
                   @if($error && array_key_exists('name',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['name'] ?? '' }}"
                   @elseif(isset($setting))
                        value="{{ old('name', optional($setting['data'])->name) }}"
                    @endif>
            @if($error && array_key_exists('name',$error))
                <span class="is-invalid">
                    <strong>{{ $error['name'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="is_active" ><b>Status</b> </label>
            <select name="is_active" id="is_active"
                    class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">
                <option
                        @if(isset($data) && $data['is_active'] == 1)
                        selected
                        @elseif(!isset($data) && isset($setting) && $setting['data']['is_active'] == 1)
                        selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                        selected
                        @elseif(!isset($data) && isset($setting) && $setting['data']['is_active'] == 0)
                        selected
                        @endif
                        value="0">Deactivate
                </option>
            </select>

            @if($error && array_key_exists('is_active',$error))
                <span class="is-invalid">
                    <strong>{{ $error['is_active'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="email_1" class=""><b>Email-1</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="email_1" id="email_1" placeholder="Email-1" type="text" class="form-control
                   @if($error && array_key_exists('email_1',$error)) is-invalid @endif"
                        @if(isset($data))
                   value="{{ $data['email_1'] ?? '' }}"
                        @elseif(isset($setting))
                   value="{{ old('email_1', optional($setting['data'])->email_1) }}"
                    @endif>
            @if($error && array_key_exists('email_1',$error))
                <span class="is-invalid">
                    <strong>{{ $error['email_1'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="email_2" class=""><b>Email-2</b> </label>
            <input name="email_2" id="email_2" placeholder="Email-2" type="text" class="form-control
                   @if($error && array_key_exists('email_2',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['email_2'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('email_2', optional($setting['data'])->email_2) }}"
                    @endif>
            @if($error && array_key_exists('email_2',$error))
                <span class="is-invalid">
                    <strong>{{ $error['email_2'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="phone_1" class=""><b>Phone-1</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="phone_1" id="phone_1" placeholder="Phone-1" type="text" class="form-control
                   @if($error && array_key_exists('phone_1',$error)) is-invalid @endif"
                        @if(isset($data))
                   value="{{ $data['phone_1'] ?? '' }}"
                        @elseif(isset($setting))
                   value="{{ old('phone_1', optional($setting['data'])->phone_1) }}"
                    @endif>
            @if($error && array_key_exists('phone_1',$error))
                <span class="is-invalid">
                    <strong>{{ $error['phone_1'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="phone_2" class=""><b>Phone-2</b> </label>
            <input name="phone_2" id="phone_2" placeholder="Phone-2" type="text" class="form-control
                   @if($error && array_key_exists('phone_2',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['phone_2'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('phone_2', optional($setting['data'])->phone_2) }}"
                    @endif>
            @if($error && array_key_exists('phone_2',$error))
                <span class="is-invalid">
                    <strong>{{ $error['phone_2'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="facebook_link" class=""><b>Facebook link</b> </label>
            <input name="facebook_link" id="facebook_link" placeholder="Facebook link" type="text" class="form-control
                   @if($error && array_key_exists('facebook_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['facebook_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('facebook_link', optional($setting['data'])->facebook_link) }}"
                    @endif>
            @if($error && array_key_exists('facebook_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['facebook_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="youtube_link" class=""><b>Youtube link</b> </label>
            <input name="youtube_link" id="youtube_link" placeholder="Youtube link" type="text" class="form-control
                   @if($error && array_key_exists('youtube_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['youtube_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('youtube_link', optional($setting['data'])->youtube_link) }}"
                    @endif>
            @if($error && array_key_exists('youtube_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['youtube_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="linkedin_link" class=""><b>LinkedIn link</b> </label>
            <input name="linkedin_link" id="linkedin_link" placeholder="LinkedIn link" type="text" class="form-control
                   @if($error && array_key_exists('linkedin_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['linkedin_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('linkedin_link', optional($setting['data'])->linkedin_link) }}"
                    @endif>
            @if($error && array_key_exists('linkedin_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['linkedin_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="instagram_link" class=""><b>Instagram link</b> </label>
            <input name="instagram_link" id="instagram_link" placeholder="Facebook link" type="text" class="form-control
                   @if($error && array_key_exists('instagram_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['instagram_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('instagram_link', optional($setting['data'])->instagram_link) }}"
                    @endif>
            @if($error && array_key_exists('instagram_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['instagram_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="twitter_link" class=""><b>Twitter link</b> </label>
            <input name="twitter_link" id="twitter_link" placeholder="Twitter link" type="text" class="form-control
                   @if($error && array_key_exists('twitter_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['twitter_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('twitter_link', optional($setting['data'])->twitter_link) }}"
                    @endif>
            @if($error && array_key_exists('twitter_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['twitter_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="skype_link" class=""><b>Skype link</b> </label>
            <input name="skype_link" id="skype_link" placeholder="Skype link" type="text" class="form-control
                   @if($error && array_key_exists('skype_link',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['skype_link'] ?? '' }}"
                   @elseif(isset($setting))
                   value="{{ old('skype_link', optional($setting['data'])->skype_link) }}"
                    @endif>
            @if($error && array_key_exists('skype_link',$error))
                <span class="is-invalid">
                    <strong>{{ $error['skype_link'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="google_location" class=""><b>Google map location (N:B: Only location link without iframe tag)</b> </label>
            <textarea name="google_location" class="form-control" id="google_location" rows="3" placeholder="Enter address">
                   @if(isset($data))
                    {{ $data['google_location'] ?? '' }}
                @elseif(isset($setting))
                    {{ old('google_location', optional($setting['data'])->google_location) }}
                @endif
                </textarea>
            @if($error && array_key_exists('google_location',$error))
                <span class="is-invalid">
                    <strong>{{ $error['google_location'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="position-relative form-group">
                <label for="address" class=""><b>Address</b> </label>
                <textarea name="address" class="ckeditor form-control" id="address" rows="5" placeholder="Enter address">
                   @if(isset($data))
                        {{ $data['address'] ?? '' }}
                    @elseif(isset($setting))
                        {{ old('address', optional($setting['data'])->address) }}
                    @endif
                </textarea>
                @if($error && array_key_exists('address',$error))
                    <span class="is-invalid">
                    <strong>{{ $error['address'][0] }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="position-relative row form-group">
                    <label for="exampleFile" class="col-sm-3 col-form-label"><b>Company Logo</b> </label>
                    <div class="col-md-9">
                        <input name="image" id="exampleFile" type="file" class="form-control" onchange="loadPreview(this)">
                        <small class="form-text text-muted">maximum file size is 2 mb</small>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group" id="uploadImage">
                    <img id="upload" class="img-thumbnail" height="auto" src="#" alt="image"/>
                </div>
                @if ($setting && optional($setting['data'])->logo)
                    <div class="form-group" id="showImage">
                        <img src="{{asset('images/settings/'.$setting['data']->logo)  }}" alt="" class="img-thumbnail"
                             style="width: 550px; height: 350px">
                        <input type="hidden" value="{{ $setting['data']->logo }}" name="oldImage">
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-relative form-group">
                <label for="review" class=""><b>Description</b></label>
                <textarea name="description" class="ckeditor form-control" id="description" rows="5" placeholder="Enter description">
                    @if(isset($data))
                        {{ $data['description'] ?? '' }}
                    @elseif(isset($setting))
                        {{ old('description', optional($setting['data'])->description) }}
                    @endif
                </textarea>
                @if($error && array_key_exists('description',$error))
                    <span class="is-invalid">
                    <strong>{{ $error['description'][0] }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="col-md-12">
                <div class="position-relative row form-group">
                    <label for="exampleFile" class="col-sm-3 col-form-label"><b>Company favicon</b> </label>
                    <div class="col-md-9">
                        <input name="favicon" id="favicon_exampleFile" type="file" class="form-control" onchange="faviconPreview(this)">
                        <small class="form-text text-muted">maximum file size is 2 mb</small>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group" id="favicon_uploadImage">
                    <img id="favicon_upload" class="img-thumbnail" height="auto" src="#" alt="image"/>
                </div>
                @if ($setting && optional($setting['data'])->favicon)
                    <div class="form-group" id="favicon_showImage">
                        <img src="{{ asset('images/settings/'.$setting['data']->favicon) }}" alt="" class="img-thumbnail"
                             style="width: 550px; height: 350px">
                        <input type="hidden" value="{{ $setting['data']->favicon }}" name="oldImage">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


