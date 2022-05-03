@can('svView')
<button type="button" class="d-flex flex-column btn btn-danger mb-2 float-left col-md-1">
    <a href="{{route('supervisors.company.index')}}" style="text-decoration-line: none" class="text-white ml-3"><i class="fa-solid fa-arrow-left-long">
        </i>Back</a>
</button>
@endif
@can('studentView')
<button type="button" class="d-flex flex-column btn btn-danger mb-2 float-left col-md-1">
    <a href="{{route('student.company.index')}}" style="text-decoration-line: none" class="text-white ml-3"><i class="fa-solid fa-arrow-left-long">
        </i>Back</a>
</button>
@endif
@can('admin')
<button type="button" class="d-flex flex-column btn btn-danger mb-2 float-left col-md-1">
    <a href="{{route('admin.company.index')}}" style="text-decoration-line: none" class="text-white ml-3"><i class="fa-solid fa-arrow-left-long">
        </i>Back</a>
</button>
@endif