<x-app-layout>
      @foreach ($documents as $data)
        <div id="docView" class="pt-3 pb-5" style="display: none">
          <div class="container-md p-3 d-flex justify-content-center bg-dark rounded">
              <embed src="{{Storage::URL($data->document_path)}}" width="800px" height="700px" />
          </div>
      </div>
      @endforeach
    {{-- Script to hide and View Form --}}
<script src="{{URL::asset('js/hideAndView.js')}}" type="text/javascript"></script>
  </x-app-layout>
  