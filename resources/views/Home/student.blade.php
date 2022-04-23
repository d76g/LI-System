<x-app-layout>
    <div class="card-body" style="height:50%">
    <div class="jumbotron">
        <h1 class="display-4">Hello,{{Auth::user()->name}}</h1>
        <p class="lead">Welcome to the LI FSKTM System.</p>
        <hr class="my-4">
        <p>You can rate companies and download related documents for the intenship.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
      </div>
    </div>
</x-app-layout>
