<div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">{{$row->name}}</h4>
            <p class="card-category">{{$row->created_at->toDayDateTimeString()}}</p>
        </div>
        <div class="card-body table-responsive">
            {{$slot}}
        </div>
    </div>
</div>
