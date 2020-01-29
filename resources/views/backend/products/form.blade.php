<div class="row">
    @php
    $input = "name_ar"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name (Arabic)</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "desc_ar"
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Description (Arabic)</label>
                <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}" rows="5">{{isset($row) ? $row->{$input} : ''}}</textarea>
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    @php
        $input = "name_en"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Name (English)</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "desc_en"
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Description (English)</label>
                <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}" rows="5">{{isset($row) ? $row->{$input} : ''}}</textarea>
                @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    @php
        $input = "meta_keywords_ar"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords (Arabic)</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "meta_description_ar"
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Meta description (Arabic)</label>
                <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}" rows="5">{{isset($row) ? $row->{$input} : ''}}</textarea>
                @error($input)
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    @php
        $input = "meta_keywords_en"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords (English)</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @php
        $input = "meta_description_en"
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Meta description (English)</label>
                <textarea class="form-control @error($input) is-invalid @enderror" name="{{$input}}" rows="5">{{isset($row) ? $row->{$input} : ''}}</textarea>
                @error($input)
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    @php
        $input = "price"
    @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Price</label>
            <input type="text" name="{{$input}}" value="{{isset($row) ? $row->{$input} : ''}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php
        $input = "category_id"
    @endphp
    <div class="col-md-12">
        <div class="form-group">
            <select id="categoryProduct" class="form-control chosen-select @error($input) is-invalid @enderror" name="{{$input}}" data-style="btn btn-link" id="exampleFormControlSelect1">
                <option class="form-control" selected disabled>Category</option>
                @foreach($categories as $category)
                    <option {{isset($row) && $row->sub_category->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name_en}}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

    </div>
    @php
        $input = "sub_category_id"
    @endphp
    <div class="col-md-12">
        <div class="form-group">
            <select id="subcategoryProduct" class="form-control chosen-select @error($input) is-invalid @enderror" name="{{$input}}" data-style="btn btn-link" id="exampleFormControlSelect1">

                @if(request()->route()->parameter('product'))
                <option selected value="{{$row['sub_category_id']}}">{{$row->sub_category->name_en}}</option>
                @endif
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">{{$pageTitle}}</button>
