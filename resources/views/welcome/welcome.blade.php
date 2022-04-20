<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LI FSKTM</title>
        <link rel="icon" type="image/png" sizes="32x32" href="/lifav.png">
        <link rel="manifest" href="/site.webmanifest">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    
<nav class="bg-blue-700 px-2 sm:px-4 py-2.5 text-white">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="https://flowbite.com" class="flex items-center">
    <img src="{{URL('/logo/favicon.png')}}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
    <span class="self-center text-xl font-semibold whitespace-nowrap white:text-white">LI FSKTM</span>
    </a>
        <div class="flex md:order-2 text-white">
            @if (Route::has('login'))
            <div class="flex pl-4 text-sm">
                @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white hover:text-blue-100 hover:underline">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}"><button type="button" class="text-white bg-blue-700 hover:bg-white hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-slate-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Login</button></a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"><button type="button" class="text-white bg-blue-700 hover:bg-white hover:text-blue-700 focus:ring-4 focus:outline-none focus:ring-slate-50 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Sign Up</button></a>
                        @endif
                @endauth
            </div>
            @endif
        </div>
               
    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
            <li>
            <a href="#" class="block py-2 pr-4 pl-3 text-white" aria-current="page">Home</a>
            </li>
            <li>
            <a href="#images" class="block py-2 pr-4 pl-3 text-white">Images</a>
            </li>
            <li>
            <a href="#about" class="block py-2 pr-4 pl-3 text-white">About LI</a>
            </li>
            <li>
            <a href="#contact" class="block py-2 pr-4 pl-3 text-white">Contact</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            
            {{-- Body Content --}}
            <!--Title-->
            <div>
                <div class="m-5">
                    <img class="w-72" src="{{url('/images/building.svg')}}" alt="building" />
                </div>
                <h1 class="text-center font-serif">
                    This is the landing Page ...
                </h1>
                <h4 class="text-center font-serif">
                    Coming Soon
                </h4>
                <p class="m-5 font-mono text-blue-700 text-center font-bold " id="demo"></p>
                
            </div>
            {{-- End of Body Content --}}
        </div>
        {{-- Images Slider --}}
        <div class="container mx-auto">
            <section id="images" class="overflow-hidden text-gray-700 ">
                <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                    <div class="container">
                        <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
                
                          {{-- @foreach ($multiImages as $img)
                            <div class="col-12 col-md-6 col-lg-3"> 
                              <img src="{{Storage::URL($img->images_path)}}" data-target="#indicators" data-slide-to="0" alt="eLI Image" /> 
                            </div> 
                          @endforeach --}}
                        </div>
                    </div>
                </div>
              </section>
        </div>
        {{-- End Of Images Slides --}}
        <div id="about" class="container mx-auto">
        <footer class="bg-gray-200 text-center lg:text-left">
            <div class="container p-6 text-gray-800">
                <div class="grid lg:grid-cols-2 gap-4">
                  <div class="mb-6 md:mb-0">
                    <h5 class="font-medium mb-2 uppercase">• Why Developing this system ?</h5>
            
                    <p class="mb-4">
                      × This system is developed to help FSKTM to manage internship data and resources.
                    </p>
                  </div>
            
                  <div class="mb-6 md:mb-0">
                    <h5 class="font-medium mb-2 uppercase">• Who will use the system?</h5>
            
                    <p class="mb-4">
                      × Every human being involved in the internship (Coordinator, Supervisors and Students).
                    </p>
                  </div>
                </div>
              </div>

              {{-- Contact Container --}}
                <div id="contact" class="container p-6">
                  <div class="grid lg:grid-cols-4 md:grid-cols-2">
                    <div class="mb-6">
                      <h5 class="uppercase font-bold mb-2.5 text-gray-800">Links</h5>
              
                      <ul class="list-none mb-0">
                        <li>
                          <a href="#!" class="text-gray-800">Link 1</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 2</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 3</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 4</a>
                        </li>
                      </ul>
                    </div>
              
                    <div class="mb-6">
                      <h5 class="uppercase font-bold mb-2.5 text-gray-800">Links</h5>
              
                      <ul class="list-none mb-0">
                        <li>
                          <a href="#!" class="text-gray-800">Link 1</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 2</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 3</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 4</a>
                        </li>
                      </ul>
                    </div>
              
                    <div class="mb-6">
                      <h5 class="uppercase font-bold mb-2.5 text-gray-800">Links</h5>
              
                      <ul class="list-none mb-0">
                        <li>
                          <a href="#!" class="text-gray-800">Link 1</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 2</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 3</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Link 4</a>
                        </li>
                      </ul>
                    </div>
              
                    <div>
                      <h6 class="uppercase font-semibold mb-4 flex justify-center md:justify-start">
                        Contact
                      </h6>
                      <p class="flex items-center justify-center md:justify-start mb-4">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home"
                          class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                          <path fill="currentColor"
                            d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z">
                          </path>
                        </svg>
                        Jalan Delta 1/6, 86400 Parit Raja, Johor
                      </p>
                      <p class="flex items-center justify-center md:justify-start mb-4">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
                          class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                          </path>
                        </svg>
                        muhaini@uthm.edu.my
                      </p>
                      <p class="flex items-center justify-center md:justify-start mb-4">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone"
                          class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z">
                          </path>
                        </svg>
                        + 60 19-746 2388
                      </p>
                    </div>
                  </div>
                </div>
                {{-- End of Contact --}}
                <div class="text-white text-center p-4 bg-blue-700">
                  © 2021 Copyright:
                  <a class="text-white" href="#">LI FSKTM</a>
                  <h4>By Bashar Alshaibani @d75g</h4>
                </div>
        </footer>
      </div>
        <!-- Display the countdown timer in an element -->


<script>
// Set the date we're counting down to
var countDownDate = new Date("Jul 20, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
    </body>
</html>
