<div class="form-row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="title" class=""><b>Title</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
                <input name="title" id="title" placeholder="Title" type="text" class="form-control
                   @if($error && array_key_exists('title',$error)) is-invalid @endif"
                       @if(isset($data))
                            value="{{ $data['title'] ?? '' }}"
                       @elseif(isset($service))
                            value="{{ old('title', optional($service['data'])->title) }}"
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
                <label for="description" class=""><b>Description</b></label>
                <textarea name="description" class="ckeditor form-control" id="description" rows="5" placeholder="Enter Description">
                        @if(isset($data))
                            {{ $data['description'] ?? '' }}
                        @elseif(isset($service))
                            {{ old('description', optional($service['data'])->description) }}
                        @endif
                    </textarea>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="is_active" ><b>Status</b> </label>
                <select name="is_active" id="is_active"
                        class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">
                    <option
                            @if(isset($data) && $data['is_active'] == 1)
                                selected
                            @elseif(!isset($data) && isset($service) && $service['data']['is_active'] == 1)
                                selected
                            @endif
                            value="1"> Active
                    </option>
                    <option
                            @if(isset($data) && $data['is_active'] == 0)
                                selected
                            @elseif(!isset($data) && isset($service) && $service['data']['is_active'] == 0)
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
            <div class="position-relative row form-group">
                <label for="exampleFile" class="col-sm-3 col-form-label"><b>Service image</b> </label>
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
            @if ($service && optional($service['data'])->image)
                <div class="form-group" id="showImage">
                    <img src="{{ asset('images/services/'.$service['data']->image)  }}" alt="" class="img-thumbnail"
                         style="width: 550px; height: 350px">
                    <input type="hidden" value="{{ $service['data']->image }}" name="oldImage">
                </div>
            @endif
        </div>
    </div>
</div>
