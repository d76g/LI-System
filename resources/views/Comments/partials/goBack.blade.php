@can('svView')
    <a href="{{route('supervisors.company.index')}}" style="text-decoration-line: none" class="text-white">
        <button type="button" class="btn btn-danger mb-2 float-left">
            <i class="fa-solid fa-arrow-left-long mr-1"></i>Back</button></a>
@endif

@can('studentView')
<a href="{{route('student.company.index')}}" style="text-decoration-line: none" class="text-white">
    <button type="button" class="btn btn-danger mb-2 float-left">
        <i class="fa-solid fa-arrow-left-long mr-1"></i>Back</button></a>
@endif

@can('admin')
<a href="{{route('admin.company.index')}}" style="text-decoration-line: none" class="text-white">
    <button type="button" class="btn btn-danger mb-2 float-left">
        <i class="fa-solid fa-arrow-left-long mr-1"></i>Back</button></a>
@endif