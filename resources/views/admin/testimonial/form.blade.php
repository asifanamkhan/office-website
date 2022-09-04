<div class="form-row">
    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="name" class=""><b>Name</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="name" id="name" placeholder="Name" type="text" class="form-control
                   @if($error && array_key_exists('name',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['name'] ?? '' }}"
                   @elseif(isset($testimonial))
                        value="{{ old('name', optional($testimonial['data'])->name) }}"
                    @endif>
            @if($error && array_key_exists('name',$error))
                <span class="is-invalid">
                    <strong>{{ $error['name'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="company" class=""><b>Company</b> </label>
            <input name="company" id="company" placeholder="Company" type="text" class="form-control
                   @if($error && array_key_exists('company',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['company'] ?? '' }}"
                   @elseif(isset($testimonial))
                        value="{{ old('company', optional($testimonial['data'])->company) }}"
                    @endif>
            @if($error && array_key_exists('company',$error))
                <span class="is-invalid">
                    <strong>{{ $error['company'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-7">
        <div class="position-relative form-group">
            <label for="rating" class=""><b>Rating</b> </label>
            <input name="rating" id="rating" placeholder="rating" type="number" class="form-control
                   @if($error && array_key_exists('rating',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['rating'] ?? '' }}"
                   @elseif(isset($testimonial))
                        value="{{ old('rating', optional($testimonial['data'])->rating) }}"
                    @endif>
            @if($error && array_key_exists('rating',$error))
                <span class="is-invalid">
                    <strong>{{ $error['rating'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="col-md-5">
        <div class="position-relative form-group">
            <label for="is_active" ><b>Status</b> </label>
            <select name="is_active" id="is_active"
                    class="form-control @if($error && array_key_exists('is_active',$error)) is-invalid @endif">
                <option
                        @if(isset($data) && $data['is_active'] == 1)
                            selected
                        @elseif(!isset($data) && isset($testimonial) && $testimonial['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                            selected
                        @elseif(!isset($data) && isset($testimonial) && $testimonial['data']['is_active'] == 0)
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
        <div class="col-md-7">
            <div class="position-relative form-group">
                <label for="review" class=""><b>Review</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
                <textarea name="review" class="ckeditor form-control" id="review" rows="5" placeholder="Enter Review">
                    @if(isset($data))
                        {{ $data['review'] ?? '' }}
                    @elseif(isset($testimonial))
                        {{ old('review', optional($testimonial['data'])->review) }}
                    @endif
                </textarea>
                @if($error && array_key_exists('review',$error))
                    <span class="is-invalid">
                    <strong>{{ $error['review'][0] }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="col-md-5">
            <div class="col-md-12">
                <div class="position-relative row form-group">
                    <label for="exampleFile" class="col-sm-3 col-form-label"><b>Company logo</b> </label>
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
                @if ($testimonial && optional($testimonial['data'])->logo)
                    <div class="form-group" id="showImage">
                        <img src="{{ asset('images/testimonials/'.$testimonial['data']->logo)  }}" alt="" class="img-thumbnail"
                             style="width: 550px; height: 350px">
                        <input type="hidden" value="{{ $testimonial['data']->logo }}" name="oldImage">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


