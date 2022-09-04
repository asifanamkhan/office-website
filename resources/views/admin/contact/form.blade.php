<div class="form-row">
    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="name" class=""><b>Name</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="name" id="name" placeholder="Name" type="text" class="form-control
                    @if($error && array_key_exists('name',$error)) is-invalid @endif"
                    @if(isset($data))
                        value="{{ $data['name'] ?? '' }}"
                    @elseif(isset($contact))
                        value="{{ old('name', optional($contact['data'])->name) }}"
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
            <label for="email" class=""><b>Email</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="email" id="email" placeholder="Email" type="text" class="form-control
                    @if($error && array_key_exists('email',$error)) is-invalid @endif"
                    @if(isset($data))
                        value="{{ $data['email'] ?? '' }}"
                    @elseif(isset($contact))
                        value="{{ old('email', optional($contact['data'])->email) }}"
                    @endif>
            @if($error && array_key_exists('email',$error))
                <span class="is-invalid">
                    <strong>{{ $error['email'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="subject" class=""><b>Subject</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i></label>
            <input name="subject" id="subject" placeholder="Subject" type="text"  class="form-control
                    @if($error && array_key_exists('subject',$error)) is-invalid @endif"
                    @if(isset($data))
                        value="{{ $data['subject'] ?? '' }}"
                    @elseif(isset($contact))
                        value="{{ old('subject', optional($contact['data'])->subject) }}"
                    @endif>
            @if($error && array_key_exists('subject',$error))
                <span class="is-invalid">
                    <strong>{{ $error['subject'][0] }}</strong>
                </span>
            @endif
        </div>
    </div>

    
    <div class="col-md-12">
        <div class="position-relative form-group">
            <label for="message" class=""><b>Message</b> <i class="fa fa-asterisk fa-xs is-invalid" aria-hidden="true"></i> </label>
            <textarea name="message" class="ckeditor form-control" id="message" rows="5" placeholder="Enter Message">
               @if(isset($data))
                    {{ $data['message'] ?? '' }}
                @elseif(isset($contact))
                    {{ old('message', optional($contact['data'])->message) }}
                @endif
            </textarea>
        </div>
    </div>
    @if($error && array_key_exists('message',$error))
        <span class="is-invalid">
            <strong>{{ $error['message'][0] }}</strong>
        </span>
    @endif
</div>