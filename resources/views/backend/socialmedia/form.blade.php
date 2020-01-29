<div class="row">
    @php
    $input = "facebook"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Facebook</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "twitter"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Twitter</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php
        $input = "instagram"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Instagram</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "linkedin"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Linkedin</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    @php
        $input = "youtube"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Youtube</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

</div>
<button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
