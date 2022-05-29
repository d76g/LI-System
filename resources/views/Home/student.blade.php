<x-app-layout>
    <div class="container d-flex justify-content-center animate__animated animate__fadeInUp animate__slow ">
      <div class="border border-light bg-light w-75 mt-6 ml-10" style="height: 100vh; box-shadow: 10px 10px 23px -10px rgba(0,0,0,0.31)">
        <div class="holder d-flex align-items-center justify-content-center">
          <div class="container">
            <img style="width:350px; margin:auto;" src="{{asset('/images/blogging.svg')}}" alt="Working Image">
              <header class="text-center my-3">
                  <h1 class="display-4">What to-do list</h1>
                  <p class="fst-italic text-muted">While using this system you can do the following:</p>
              </header>
              
              <div class="row">
                  <div class="col-lg-5 mx-auto">
      
                      <!-- CHECKBOX LIST -->
                      <div class="card rounded border-0 shadow-sm position-relative">
                          <div class="card-body p-3">
                              <div class="d-flex align-items-center mb-4 pb-4 border-bottom"><i class="far fa-calendar-alt fa-3x"></i>
                                  <div class="ms-3">
                                      <h4 class="text-uppercase fw-weight-bold mb-0" id="day"></h4>
                                      <p class="text-gray fst-italic mb-0" id="date"></p>
                                  </div>
                              </div>
                              <div class="flex flex-row mb-1">
                                <p>#1</p>
                                <p class="ml-2">Add Company Supervisor's Details</p>
                              </div>
                              <div class="flex flex-row mb-2">
                                <p>#2</p>
                                <p class="ml-2">View Company Reviews</p>
                              </div>

                              <div class="flex flex-row mb-2">
                                <p>#3</p>
                                <p class="ml-2">Download Documents</p>
                              </div>
                
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
    </div>
    <script>
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      document.getElementById('date').innerHTML = date;

      const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      var day = new Date();
      let todayDay = weekday[day.getDay()];
      document.getElementById('day').innerHTML = todayDay;
      </script>
</x-app-layout>
