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
        
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            html {
                scroll-behavior: smooth;
            }
            /* Custom Scrollbar */
              ::-webkit-scrollbar {
                  width: 7px;
              }

              ::-webkit-scrollbar-track {
                  background: #ffffff;
                  border-radius: 12px;
              }
              ::-webkit-scrollbar-thumb {
                  background: #3c1afd;
                  border-radius: 12px;
              }
        </style>
    </head>
    <div class="relative grid items-top h-screen py-4 sm:pt-0">
      <div class="absolute inset-0 z-10 h-full w-full brightness-50" style="background-color: black; opacity:40%"></div>  
      <img class="absolute inset-0 z-0 object-fit h-full w-full" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/UTHM_FSKTM.jpg/1280px-UTHM_FSKTM.jpg" alt="FSKTM Image">

      
      
        <nav class="z-20 bg-transparent px-2 sm:px-4 py-2.5 text-white animate__animated animate__fadeInDown">
          <div class="container flex flex-wrap justify-between justify-items-center items-center mx-auto">
          <a href="#" class="flex items-center">
          <img src="{{URL('/logo/favicon.png')}}" class="mr-3 h-6 sm:h-9 animate__animated animate__bounceInLeft" alt="Flowbite Logo">
          <span class="self-center text-xl font-semibold whitespace-nowrap white:text-white animate__animated animate__fadeInLeft">LI FSKTM</span>
          </a>
              <div class="md:order-2 flex  items-center justify-center text-white animate__animated animate__zoomIn">
                  @if (Route::has('login'))
                  <div class="flex pl-4 text-sm">
                      @auth
                              @can('admin')
                              <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-blue-100 hover:underline animate-pulse">Dashboard</a>
                              @endif
                              @can('studentView')
                              <a href="{{ route('student.home.index') }}" class="text-white hover:text-blue-100 hover:underline animate-pulse">Home</a>
                              @endif
                              @can('svView')
                              <a href="{{ route('supervisors.home.index') }}" class="text-white hover:text-blue-100 hover:underline animate-pulse">Home</a>
                              @endif
                      @else
                          <a href="{{ route('login') }}"><button type="button" 
                            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-transparent rounded-full border border-gray-200 hover:bg-black  hover:bg-opacity-30 animate-pulse hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Login</button></a>
                              @if (Route::has('register'))
                              <a href="{{ route('register') }}"><button type="button" 
                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-white focus:outline-none bg-transparent rounded-full border border-gray-200 hover:bg-black  hover:bg-opacity-30 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Sign Up</button></a>
                              @endif
                      @endauth
                  </div>
                  @endif
              </div>
                    
              <div class="hidden flex justify-center text-white text-xl md:flex md:w-auto md:order-1 animate__animated animate__zoomIn" id="mobile-menu-4">
                  <ul class="flex flex-col mt-4 pl-3  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium ">
                      <li>
                      <a href="#" class="block py-2 pr-4 text-lg transform hover:translate-y-2 hover:underline decoration-1" aria-current="page">Home</a>
                      </li>
                      <li>
                      <a href="#images" class="block py-2 pr-4 text-lg transform hover:translate-y-2  hover:underline decoration-1">Images</a>
                      </li>
                      <li>
                      <a href="#about" class="block py-2 pr-4 text-lg transform hover:translate-y-2 hover:underline decoration-1">About LI</a>
                      </li>
                      <li>
                      <a href="#contact" class="block py-2 pr-4 text-lg transform hover:translate-y-2 hover:underline decoration-1">Contact</a>
                      </li>
                  </ul>
              </div>
            </div>
          </nav>
          <div class="z-10 text-white grid grid-rows-3 justify-center justify-items-center ">
            <h1 class="text-6xl animate__animated animate__pulse animate__infinite" style="font-family:'Times New Roman', Times, serif">Where you can share thoughts</h1>
            <p class="text-2xl bg-black h-8" style="font-family:'Times New Roman', Times, serif">- Welcome to LI FSKTM UTHM- </p>
            <div>
              <a href="#images"><p class="text-2xl row-end-4 animate__animated animate__slideInDown animate__infinite"><i class="fas fa-chevron-down"></i></p></a>
            </div>
          </div>
  </div>
    <body class="antialiased">
        {{-- <div class="relative flex items-top justify-center h-screen  bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
          <div class="absolute inset-0 z-10 h-full w-full brightness-50" style="background-color: black; opacity:40%"></div>  
          <img class="absolute inset-0 z-0 object-fit h-full w-full" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/UTHM_FSKTM.jpg/1280px-UTHM_FSKTM.jpg" alt="FSKTM Image">
          </div> --}}
        {{-- Images Slider --}}
        <section id="images" class="overflow-hidden h-full text-gray-700">
          <div class="container px-5 py-3 mx-auto lg:pt-12 lg:px-32">
            <div class="flex flex-wrap -m-1 md:-m-2">
              @foreach ($images as $img)
              <div class="flex flex-wrap w-1/3">
                <div class="w-full p-1 md:p-2 mb-4 animate__animated animate__fadeInDown">
                    <img class="block object-cover object-center rounded-lg" src="{{Storage::URL($img->images_path)}}" data-target="#indicators" data-slide-to="0" alt="eLI Image" /> 
                </div>
              </div>
              @endforeach
              <div class="px-5 py-5">
              <p>{{$images->links()}}</p>
          </div>
            </div>
          </div>
        </section>
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
                      <h5 class="uppercase font-bold mb-2.5 text-gray-800">Related Systems</h5>
              
                      <ul class="list-none mb-0">
                        <li>
                          <a href="#!" class="text-gray-800">SMAP</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Author</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">LI</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">UTHM Library</a>
                        </li>
                      </ul>
                    </div>
              
                    <div class="mb-6">
                      <h5 class="uppercase font-bold mb-2.5 text-gray-800">FSKTM System</h5>
              
                      <ul class="list-none mb-0">
                        <li>
                          <a href="#!" class="text-gray-800">Home</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">Cources</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">News</a>
                        </li>
                        <li>
                          <a href="#!" class="text-gray-800">About FSKTM</a>
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
                        Jalan Delta 1/6, FSKTM, UTHM, 86400 Parit Raja, Johor
                      </p>
                      <p class="flex items-center justify-center md:justify-start mb-4">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope"
                          class="w-4 mr-4" role="img" xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z">
                          </path>
                        </svg>
                        <a href="mailto:muhaini@uthm.edu.my
                        ">Coordinator: Dr. Muhaini Binti Othman</a>
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
                  <h4>By Bashar Alshaibani <a href="https://www.instagram.com/d75g/">@d75g</a></h4>
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
