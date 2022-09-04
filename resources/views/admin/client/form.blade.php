<div class="form-row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="name" class=""><b>Name</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="name" id="name" placeholder="Name" type="text" class="form-control
                   @if($error && array_key_exists('name',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['name'] ?? '' }}"
                   @elseif(isset($client))
                        value="{{ old('name', optional($client['data'])->name) }}"
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
            <label for="email" class=""><b>Email</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="email" id="email" placeholder="Email" type="text" class="form-control
                   @if($error && array_key_exists('email',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['email'] ?? '' }}"
                   @elseif(isset($client))
                   value="{{ old('email', optional($client['data'])->email) }}"
                    @endif>
            @if($error && array_key_exists('email',$error))
                <span class="is-invalid">
                    <strong>{{ $error['email'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="company" class=""><b>Company</b> </label>
            <input name="company" id="company" placeholder="Company" type="text" class="form-control
                   @if($error && array_key_exists('company',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['company'] ?? '' }}"
                   @elseif(isset($client))
                   value="{{ old('company', optional($client['data'])->company) }}"
                    @endif>
            @if($error && array_key_exists('company',$error))
                <span class="is-invalid">
                    <strong>{{ $error['company'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="position-relative form-group">
            <label for="phone" class=""><b>Phone</b> </label>
            <input name="phone" id="phone" placeholder="Phone" type="text" class="form-control
                   @if($error && array_key_exists('phone',$error)) is-invalid @endif"
                   @if(isset($data))
                   value="{{ $data['phone'] ?? '' }}"
                   @elseif(isset($client))
                   value="{{ old('phone', optional($client['data'])->phone) }}"
                    @endif>
            @if($error && array_key_exists('phone',$error))
                <span class="is-invalid">
                    <strong>{{ $error['phone'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-2">
        <div class="position-relative form-group">
            <label for="is_active" ><b>Status</b> </label>
            <select name="is_active" id="is_active"
                    class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">
                <option
                        @if(isset($data) && $data['is_active'] == 1)
                            selected
                        @elseif(!isset($data) && isset($client) && $client['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                        selected
                        @elseif(!isset($data) && isset($client) && $client['data']['is_active'] == 0)
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

    <div class="form-row">
        <div class="col-md-6">
            <div class="position-relative form-group">
                <label for="address" class=""><b>Address</b> </label>
                <textarea name="address" class="ckeditor form-control" id="address" rows="5" placeholder="Enter address">
                   @if(isset($data))
                        {{ $data['address'] ?? '' }}
                    @elseif(isset($client))
                        {{ old('address', optional($client['data'])->address) }}
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
                    <label for="exampleFile" class="col-sm-3 col-form-label"><b>Image</b> </label>
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
                @if ($client && optional($client['data'])->image)
                    <div class="form-group" id="showImage">
                        <img src="{{ asset('images/clients/'.$client['data']->image)  }}" alt="" class="img-thumbnail"
                             style="width: 550px; height: 350px">
                        <input type="hidden" value="{{ $client['data']->image }}" name="oldImage">
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
                    @elseif(isset($client))
                        {{ old('description', optional($client['data'])->description) }}
                    @endif
                </textarea>
                @if($error && array_key_exists('description',$error))
                    <span class="is-invalid">
                    <strong>{{ $error['description'][0] }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>


