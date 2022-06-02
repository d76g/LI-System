<div class="d-flex flex-row">
    <div class="col-md-14 float float-start">
      <form>
        <div class="d-flex flex-row">
          <div class="d-flex flex-col">
            <p class="text-muted m-2" style="font-size:14px" id="info">Filter by Supervisors</p>
          </div>
          <div class="input-group-prepend">
            <select id="filter_negeri" name="negeri" class="outline-secondary custom-select rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <option value="">All States</option>
              @foreach ($filterStudentsbyNegeri as $record)
                <option class="dropdown-item" {{$record == request()->query('negeri') ? 'selected' : '' }} value="{{$record->Negeri}}">{{$record->Negeri}}</option>                
              @endforeach
            </div>
            </select>
          </div>
          <div class="d-flex flex-row pr-2">
            <div class="d-flex flex-col">
              <p class="text-muted mb-0 ml-4" style="font-size:14px" id="info">Search by Matric Number or Name</p>
            </div>
            <div class="input-group ml-2">
              <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control rounded" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
              <div class="input-group-append d-flex flex-row">
                  <button class="btn btn-outline-secondary ml-1" id="sv-btn-refresh" type="button">
                      <i class="fa fa-refresh"></i>
                  </button>
                <button class="btn btn-outline-secondary ml-1" type="submit" id="button-addon2">
                  <i class="fa fa-search"></i>
                </button>
                
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>