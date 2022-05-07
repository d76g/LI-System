@if (session('success'))
<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2 p-2" width="24" height="24" role="img" aria-label="Fail:" aria-label="Close"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <strong><i class="fas fa-info-circle fa-xl"></i>{{session('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@elseif(session('status')) 
<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2 p-2" width="24" height="24" role="img" aria-label="Fail:" aria-label="Close"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <strong><i class="fas fa-check-circle"></i>{{session('status')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

