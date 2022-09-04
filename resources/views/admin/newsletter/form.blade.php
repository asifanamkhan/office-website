<div class="form-row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="name" class=""><b>Name</b> </label>
                <input name="name" id="name" placeholder="Name" type="text" class="form-control
                        @if($error && array_key_exists('name',$error)) is-invalid @endif"
                        @if(isset($data))
                            value="{{ $data['name'] ?? '' }}"
                        @elseif(isset($newsletter))
                            value="{{ old('name', optional($newsletter['data'])->name) }}"
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
                        @elseif(isset($newsletter))
                            value="{{ old('email', optional($newsletter['data'])->email) }}"
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
                <label for="phone" class=""><b>Phone</b> </label>
                <input name="phone" id="phone" placeholder="Phone" type="text" class="form-control
                        @if($error && array_key_exists('phone',$error)) is-invalid @endif"
                        @if(isset($data))
                            value="{{ $data['phone'] ?? '' }}"
                        @elseif(isset($newsletter))
                            value="{{ old('phone', optional($newsletter['data'])->phone) }}"
                        @endif>
                @if($error && array_key_exists('phone',$error))
                    <span class="is-invalid">
                        <strong>{{ $error['phone'][0] }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="is_promotion" ><b>Promotion</b> </label>
                <select name="is_promotion" id="is_promotion"
                        class="form-control @if($error && array_key_exists('is_promotion',$error)) is-invalid @endif">

                    <option
                            @if(isset($data) && $data['is_promotion'] == 1)
                                selected
                            @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_promotion'] == 1)
                                selected
                            @endif
                            value="1"> Active
                    </option>
                    <option
                            @if(isset($data) && $data['is_promotion'] == 0)
                                selected
                            @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_promotion'] == 0)
                                selected
                            @endif
                            value="0">Deactivate
                    </option>

                </select>

                @if($error && array_key_exists('is_promotion',$error))
                    <span class="is-invalid">
                        <strong>{{ $error['is_promotion'][0] }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="position-relative form-group">
                <label for="is_discount" ><b>Discount</b> </label>
                <select name="is_discount" id="is_discount"
                        class="form-control @if($error && array_key_exists('is_discount',$error)) is-invalid @endif">

                    <option
                            @if(isset($data) && $data['is_discount'] == 1)
                                selected
                            @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_discount'] == 1)
                                selected
                            @endif
                            value="1"> Active
                    </option>
                    <option
                            @if(isset($data) && $data['is_discount'] == 0)
                                selected
                            @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_discount'] == 0)
                                selected
                            @endif
                            value="0">Deactivate
                    </option>

                </select>

                @if($error && array_key_exists('is_discount',$error))
                    <span class="is-invalid">
                        <strong>{{ $error['is_discount'][0] }}</strong>
                    </span>
                @endif
            </div>
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
                        @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_active'] == 1)
                            selected
                        @endif
                        value="1"> Active
                </option>
                <option
                        @if(isset($data) && $data['is_active'] == 0)
                            selected
                        @elseif(!isset($data) && isset($newsletter) && $newsletter['data']['is_active'] == 0)
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

        <div class="position-relative form-group">
            <label for="address" class=""><b>Address</b></label>
            <textarea name="address" class="ckeditor form-control" id="address" rows="10" placeholder="Enter Address">
                @if(isset($data))
                    {{ $data['address'] ?? '' }}
                @elseif(isset($newsletter))
                    {{ old('address', optional($newsletter['data'])->address) }}
                @endif
        </textarea>
        </div>
    </div>
</div>

    
