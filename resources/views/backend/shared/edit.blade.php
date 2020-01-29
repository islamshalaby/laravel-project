<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{$pageTitle}}</h4>
                <p class="card-category">{{$pageDescription}}</p>
            </div>
            <div class="card-body">
                {{$slot}}
            </div>
        </div>
    </div>
    @if(request()->segment(2) == 'categories')
    <div class="col-md-4">
        <div class="card card-profile">
            <img style="max-height: 200px" class="img rounded" src="{{$row->photo->file}}">
        </div>
    </div>
    @endif
    @if(request()->route()->parameter('product'))
    <div class="col-md-4">

            {{$dropZone}}

    </div>
    <div class="col-md-12">
        {{$productImages}}
    </div>
    @endif
</div>
