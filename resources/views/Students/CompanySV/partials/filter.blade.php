<div class="d-flex flex-row">
    <div class="col-md-8">
      <form>
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
