<form action="{{route($pluralModelName . '.destroy', $row->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button onclick="return confirm('Are you sure?')" type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
        <i class="material-icons">close</i>
    </button>
</form>
