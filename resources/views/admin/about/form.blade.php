<div class="form-row">
    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="title" ><b>Title</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="title" id="title" placeholder="Title" type="text" class="form-control
                    @if($error && array_key_exists('title',$error)) is-invalid @endif"
                    @if(isset($data))
                        value="{{ $data['title'] ?? '' }}"
                    @elseif(isset($about))
                        value="{{ old('title', optional($about['data'])->title) }}"
                    @endif>

            @if($error && array_key_exists('title',$error))
                <span class="is-invalid">
                    <strong>{{ $error['title'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="title" class=""><b>Sub Title</b> </label>
            <input name="sub_title" id="sub_title" placeholder="Sub ittle" type="text" class="form-control
                   @if($error && array_key_exists('sub_title',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['sub_title'] ?? '' }}"
                   @elseif(isset($about))
                        value="{{ old('sub_title', optional($about['data'])->sub_title) }}"
                   @endif>

            @if($error && array_key_exists('sub_title',$error))
                <span class="is-invalid">
                    <strong>{{ $error['sub_title'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="is_active" ><b>Status</b> </label>
            <select name="is_active" id="is_active"
                    class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">

                <option
                        @if(isset($data) && $data['is_active'] == 0)
                        selected
                        @elseif(!isset($data) && isset($about) && $about['data']['is_active'] == 0)
                        selected
                        @endif
                        value="0">Deactivate
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 1)
                            selected
                        @elseif(!isset($data) && isset($about) && $about['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>

            </select>

            @if($error && array_key_exists('is_active',$error))
                <span class="is-invalid">
                <strong>{{ $error['is_active'][0] }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="description" class=""><b>Description</b></label>
            <textarea name="description" class="ckeditor form-control "
                      id="description" rows="5"
                      placeholder="Enter Description">
                 @if(isset($data))
                    {{ $data['description'] ?? '' }}
                 @elseif(isset($about))
                    {{ old('description', optional($about['data'])->description) }}
                 @endif
            </textarea>
        </div>
    </div>
</div>
