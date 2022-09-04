<div class="form-row">

    <div class="col-md-6">
        <div class="position-relative form-group">
            <label for="post_id" ><b>Post</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <select name="post_id" id="post_id"
                    class="form-control @if($error && array_key_exists('post_id',$error)) is-invalid @endif">
                <option value="">select</option>
                @foreach($posts['data'] as $post)
                    <option
                            @if(isset($data) && $data['post_id'] == $post->id)
                                selected
                            @elseif(!isset($data) && isset($comment) && $comment['data']['post_id'] === $post->id)
                                selected
                            @endif
                            value="{{$post->id}}">{{$post->title}}
                    </option>
                @endforeach
            </select>

            @if($error && array_key_exists('post_id',$error))
                <span class="is-invalid">
                    <strong>{{ $error['post_id'][0] }}</strong>
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
                        @elseif(!isset($data) && isset($comment) && $comment['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                            selected
                        @elseif(!isset($data) && isset($comment) && $comment['data']['is_active'] == 0)
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
            <label for="comment" class=""><b>Comment</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <textarea name="comment" class="ckeditor form-control" id="comment" rows="5"  placeholder="Enter comment">
                @if(isset($data))
                    {{ $data['comment'] ?? '' }}
                @elseif(isset($comment))
                    {{ old('comment', optional($comment['data'])->comment) }}
                @endif
            </textarea>
            @if($error && array_key_exists('comment',$error))
                <span class="is-invalid">
                    <strong>{{ $error['comment'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
