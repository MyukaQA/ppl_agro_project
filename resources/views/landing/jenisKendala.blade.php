<div class="container">
  <div class="row justify-content-center">
    <h1 class="display-20">Jenis Kendala & Solusinya</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-10 mx-auto">
    <!-- Accordion -->
    <div id="accordionExample" class="accordion shadow">

      @foreach ($kendala as $data)
      <!-- Accordion item 1 -->
        <div class="card">
          <div id="headingOne" class="card-header bg-white shadow-sm border-0">
            <h3 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#{{$data->ciri2}}" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark text-uppercase collapsible-link py-2">{{$data->ciri2}}</a></h3>
          </div>
          <div id="{{$data->ciri2}}" data-parent="#accordionExample" class="collapse show">
            <div class="card-body p-5">
              <p class="font-weight-light m-0">{{$data->penanganan}}</p>
            </div>
          </div>
        </div>
      @endforeach

      <!-- Accordion item 2 -->
      {{-- <div class="card">
        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
          <h3 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseTwok" aria-expanded="false" aria-controls="collapseTwok" class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">Collapsible Group Item #2</a></h3>
        </div>
        <div id="collapseTwok" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
          <div class="card-body p-5">
            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
          </div>
        </div>
      </div> --}}



    </div>
  </div>
</div>