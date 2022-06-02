<div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6 my-2">
        <form>
          <div class="d-flex flex-row">
            {{-- Sector Dropdown --}}
              <div class="input-group-prepend mx-2">
                  <select id="filter_role" name="role" class="outline-secondary custom-select rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div lass="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <option value=" " selected>All Roles</option>
                    @foreach ($filterUserbyRole as $record)
                      <option class="dropdown-item" {{$record == request()->query('role') ? 'selected' : '' }} value="{{$record->role_id}}">{{$record->role->role}}</option>                
                    @endforeach
                  </div>
                  </select>
              </div>
            {{-- Search bar --}}
              <div class="input-group">
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control rounded" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                <div class="input-group-append d-flex flex-row">
                    
                  <button class="btn btn-outline-secondary ml-1" type="submit" id="button-addon2">
                    <i class="fa fa-search"></i>
                  </button>
                  
                  <button class="btn btn-outline-secondary ml-1" id="btn-clear-search" type="button">
                    <i class="fa fa-refresh"></i>
                  </button>
                </div>
              </div>
          </div>
        </form>
      </div>
  </div>