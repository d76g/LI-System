<div class="row">
    <div class="col-md-3">
      <form>
        <div class="row">
          <div class="col">
            <div class="input-group">
              <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control rounded" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
              <div class="input-group-append d-flex flex-row">
                  <button class="btn btn-outline-secondary ml-1" id="btn-refresh" type="button">
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