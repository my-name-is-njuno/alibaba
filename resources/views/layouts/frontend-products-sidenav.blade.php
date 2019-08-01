<aside class="col-sm-3">

        <div class="card card-filter">
            <article class="card-group-item">
                <header class="card-header">
                    <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                        <i class="icon-action fa fa-chevron-down"></i>
                        <h6 class="title">By Category</h6>
                    </a>
                </header>
                <div style="" class="filter-content collapse show" id="collapse22">
                    <div class="card-body">
                        <form class="pb-3">
                        <div class="input-group">
                          <input class="form-control" placeholder="Search" type="text">
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                        </form>

                        <ul class="list-unstyled list-lg">
                                <li><a href="{{ route('products') }}">All Products<span class="float-right badge badge-light round"></span> </a></li>
                            @foreach ($categories as $ct)
                                <li><a href="{{ route('notesbycat', ['cat'=> $ct->slug]) }}">{{ $ct->name }}<span class="float-right badge badge-light round">{{ $ct->notes->count() }}</span> </a></li>
                            @endforeach


                        </ul>
                    </div> <!-- card-body.// -->
                </div> <!-- collapse .// -->
            </article> <!-- card-group-item.// -->
            <article class="card-group-item">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse33">
                        <i class="icon-action fa fa-chevron-down"></i>
                        <h6 class="title">By Price  </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse33">
                    <div class="card-body">
                        <input type="range" class="custom-range" min="0" max="100" name="">
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label>Min</label>
                          <input class="form-control" placeholder="Kes 0" type="number">
                        </div>
                        <div class="form-group text-right col-md-6">
                          <label>Max</label>
                          <input class="form-control" placeholder="Kes 1,0000" type="number">
                        </div>
                        </div> <!-- form-row.// -->
                        <button class="btn btn-block btn-outline-primary">Apply</button>
                    </div> <!-- card-body.// -->
                </div> <!-- collapse .// -->
            </article> <!-- card-group-item.// -->
            <article class="card-group-item">
                <header class="card-header">
                    <a href="#" data-toggle="collapse" data-target="#collapse44">
                        <i class="icon-action fa fa-chevron-down"></i>
                        <h6 class="title">By Feature </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse44">
                    <div class="card-body">
                    <form>
                        <label class="form-check">
                          <input class="form-check-input" value="" type="checkbox">
                          <span class="form-check-label">
                              <span class="float-right badge badge-light round">5</span>
                            Samsung
                          </span>
                        </label>  <!-- form-check.// -->
                        <label class="form-check">
                          <input class="form-check-input" value="" type="checkbox">
                          <span class="form-check-label">
                              <span class="float-right badge badge-light round">13</span>
                            Mersedes Benz
                          </span>
                        </label> <!-- form-check.// -->
                        <label class="form-check">
                          <input class="form-check-input" value="" type="checkbox">
                          <span class="form-check-label">
                              <span class="float-right badge badge-light round">12</span>
                            Nissan Altima
                          </span>
                        </label>  <!-- form-check.// -->
                        <label class="form-check">
                          <input class="form-check-input" value="" type="checkbox">
                          <span class="form-check-label">
                              <span class="float-right badge badge-light round">32</span>
                            Another Brand
                          </span>
                        </label>  <!-- form-check.// -->
                    </form>
                    </div> <!-- card-body.// -->
                </div> <!-- collapse .// -->
            </article> <!-- card-group-item.// -->
        </div> <!-- card.// -->


            </aside> <!-- col.// -->
