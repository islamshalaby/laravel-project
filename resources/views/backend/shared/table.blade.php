<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title mt-0"> {{$pageTitle}}</h4>
                        <p class="card-category"> {{$pageDescription}}</p>
                    </div>
                    {{$createButton}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>
