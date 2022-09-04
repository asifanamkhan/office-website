<div class="form-row">
    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="title" class=""><b>Title</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="title" id="title" placeholder="Title" type="text" class="form-control
                   @if($error && array_key_exists('title',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['title'] ?? '' }}"
                   @elseif(isset($portfolio))
                        value="{{ old('title', optional($portfolio['data'])->title) }}"
                   @endif>
            @if($error && array_key_exists('title',$error))
                <span class="is-invalid">
                    <strong>{{ $error['title'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="category_id" ><b>Category</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <select name="category_id" id="category_id"
                    class="form-control @if($error && array_key_exists('category_id',$error)) is-invalid @endif">
                <option value="">select</option>
                @foreach($categories['data'] as $category)
                    <option 
                        @if(isset($data) && $data['category_id'] == $category->id) 
                            selected
                        @elseif(!isset($data) && isset($portfolio) && $portfolio['data']['category_id'] === $category->id)
                            selected
                        @endif 
                        value="{{$category->id}}">{{$category->name}}
                    </option>
                @endforeach
            </select>

            @if($error && array_key_exists('category_id',$error))
                <span class="is-invalid">
                    <strong>{{ $error['category_id'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="link" class=""><b>Link</b> </label>
            <input name="link" id="link" placeholder="Link" type="text" class="form-control
                   @if($error && array_key_exists('link',$error)) is-invalid @endif"
                   @if(isset($data))
                        value="{{ $data['link'] ?? '' }}"
                   @elseif(isset($portfolio))
                        value="{{ old('link', optional($portfolio['data'])->link) }}"
                   @endif>
            @if($error && array_key_exists('link',$error))
                <span class="is-invalid">
                <strong>{{ $error['link'][0] }}</strong>
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
                        @elseif(!isset($data) && isset($portfolio) && $portfolio['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                            selected
                        @elseif(!isset($data) && isset($portfolio) && $portfolio['data']['is_active'] == 0)
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
            <div class="col-md-12">
                <div class="position-relative form-group">
                    <label for="description" class=""><b>Description</b></label>
                    <textarea name="description" class="ckeditor form-control"
                              id="description" rows="5" placeholder="Enter Description">
                        @if(isset($data))
                            {{ $data['description'] ?? '' }}
                        @elseif(isset($portfolio))
                            {{ old('description', optional($portfolio['data'])->description) }}
                        @endif
                    </textarea>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="position-relative form-group">
                <label for="is_active" ><b>Tags</b> </label>

                <select name="tag_id[]" id="tag_id" multiple="multiple" style="height: 200px;"
                        class="form-control @if($error && array_key_exists('tag_id',$error)) is-invalid @endif">
                    @foreach($tags['data'] as $tag)
                        @if(isset($portfolio))
                            @if( !isset($data) && $portfolio['data']['tags']->count() > 0))
                                <option
                                        @foreach($portfolio['data']['tags'] as $hasTag)
                                            @if($hasTag->id === $tag->id) selected @endif
                                        @endforeach
                                        value="{{$tag->id}}">{{$tag->name}}
                                </option>
                            @else
                                <option
                                        @if(isset($data) && array_key_exists('tag_id',$data))
                                            @foreach($data['tag_id'] as $prev)
                                                @if($prev ==  $tag->id) selected @endif
                                            @endforeach
                                        @endif
                                        value="{{$tag->id}}">{{$tag->name}}
                                </option>
                            @endif
                        @else

                            <option
                                    @if(isset($data) && array_key_exists('tag_id',$data))
                                        @foreach($data['tag_id'] as $prev)
                                            @if($prev ==  $tag->id) selected @endif
                                        @endforeach
                                    @endif
                                    value="{{$tag->id}}">{{$tag->name}}
                            </option>
                        @endif
                    @endforeach
                </select>

                @if($error && array_key_exists('tag_id',$error))
                    <span class="is-invalid">
                        <strong>{{ $error['tag_id'][0] }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-12">
                <div class="position-relative row form-group">
                    <label for="exampleFile" class="col-sm-3 col-form-label"><b>portfolio image</b> </label>
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
                @if (isset($portfolio) && optional($portfolio['data'])->image)
                    <div class="form-group" id="showImage">
                        <img src="{{ asset('images/portfolios/'.$portfolio['data']->image)  }}" alt="" class="img-thumbnail"
                             style="width: 550px; height: 350px">
                        <input type="hidden" value="{{ $portfolio['data']->image }}" name="oldImage">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


