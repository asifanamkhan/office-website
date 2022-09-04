<div class="form-row">
    <div class="col-md-8">
        <div class="position-relative form-group">
            <label for="name" class=""><b>Name</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="name" id="name" placeholder="Name" type="text" class="form-control
                    @if($error && array_key_exists('name',$error)) is-invalid @endif"
                    @if(isset($data))
                        value="{{ $data['name'] ?? '' }}"
                    @elseif(isset($tag))
                        value="{{ old('name', optional($tag['data'])->name) }}"
                    @endif>
            @if($error && array_key_exists('name',$error))
                <span class="is-invalid">
                    <strong>{{ $error['name'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="position-relative form-group">
            <label for="is_active" ><b>Status</b> </label>
            <select name="is_active" id="is_active"
                    class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">
                <option
                        @if(isset($data) && $data['is_active'] == 1)
                            selected
                        @elseif(!isset($data) && isset($tag) && $tag['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                            selected
                        @elseif(!isset($data) && isset($tag) && $tag['data']['is_active'] == 0)
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

    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="description" class=""><b>Description</b></label>
            <textarea name="description" class="ckeditor form-control " id="description" rows="5" placeholder="Enter Description">
                @if(isset($data))
                    {{ $data['description'] ?? '' }}
                @elseif(isset($tag))
                    {{ old('description', optional($tag['data'])->description) }}
                @endif
            </textarea>
        </div>
    </div>
</div>