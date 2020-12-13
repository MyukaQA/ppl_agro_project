<div class="container">
  <div class="row justify-content-center">
    <h1 class="section-title">Jenis Tanaman</h1>
  </div>
</div>
 
<div class="row">
  <div class="col-lg-10 mx-auto">
    <!-- Accordion -->
    <div id="accordionExample1" class="accordion shadow">
      @foreach ($data as $jenistanaman)
        <!-- Accordion item 1 -->
        <div class="card">
          <div id="headingOne" class="card-header bg-white shadow-sm border-0">
            <h3 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#{{$jenistanaman->slug}}" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark text-uppercase collapsible-link py-2">{{$jenistanaman->title}}</a></h3>
          </div>
          <div id="{{$jenistanaman->slug}}" aria-labelledby="headingOne" data-parent="#accordionExample1" class="collapse">
            <div class="card-body p-5">
              <p class="font-weight-light m-0">{{$jenistanaman->content}}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>