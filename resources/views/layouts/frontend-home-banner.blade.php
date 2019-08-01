<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-y-sm">
        <div class="container">
        <div class="card">
            <div class="card-body">
        <div class="row row-sm">
            <aside class="col-md-3">
        <h5 class="text-uppercase">Notes Categories</h5>
            <ul class="menu-category">

                @foreach ($categories as $item)
                    <li> <a href="{{  route('notesbycat', ['cat'=>$item->slug]) }}">{{  $item->name }} </a></li>
                @endforeach



                <li class="has-submenu"> <a href="#">More category  <i class="icon-arrow-right pull-right"></i></a>
                    <ul class="submenu">

                        {{-- <li> <a href="#">Food &amp Beverage </a></li>
                        <li> <a href="#">Home Equipments </a></li>
                        <li> <a href="#">Machinery Items </a></li>
                        <li> <a href="#">Toys & Hobbies  </a></li>
                        <li> <a href="#">Consumer Electronics  </a></li>
                        <li> <a href="#">Home & Garden  </a></li>
                        <li> <a href="#">Beauty & Personal Care  </a></li> --}}
                    </ul>
                </li>
            </ul>

            </aside> <!-- col.// -->
            <div class="col-md-6">

        <!-- ================= main slide ================= -->
        <div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="false">
            <div class="item-slide">
                <img src="{{ asset('assets/images/banners/slide1.jpg') }}">
            </div>
            <div class="item-slide">
                <img src="{{ asset('assets/images/banners/slide2.jpg') }}">
            </div>
            <div class="item-slide">
                <img src="{{ asset('assets/images/banners/slide3.jpg') }}">
            </div>
        </div>
        <!-- ============== main slidesow .end // ============= -->

            </div> <!-- col.// -->
            <aside class="col-md-3">

        <h6 class="title-bg bg-secondary"> Top Sellers</h6>
        <div style="height:280px;">
            <figure class="itemside has-bg border-bottom" style="height: 33%;">
                <img class="img-bg" src="{{ asset('assets/images/items/item-sm.png') }}">
                <figcaption class="p-2">
                    <h6 class="title"> 100 notes buys </h6>
                    <a href="#">See More </a>
                </figcaption>
            </figure>

            <figure class="itemside has-bg border-bottom" style="height: 33%;">
                <img class="img-bg" src="{{ asset('assets/images/items/1.jpg') }}" height="80">
                <figcaption class="p-2">
                    <h6 class="title">90 Notes Sold </h6>
                    <a href="#">See More</a>
                </figcaption>
            </figure>
            <figure class="itemside has-bg border-bottom" style="height: 33%;">
                    <img class="img-bg" src="{{ asset('assets/images/items/1.jpg') }}" height="80">
                    <figcaption class="p-2">
                        <h6 class="title">Joan Nyagoto </h6>
                        <a href="#">See More</a>
                    </figcaption>
                </figure>
        </div>

            </aside>
        </div> <!-- row.// -->
            </div> <!-- card-body .// -->
        </div> <!-- card.// -->

        <figure class="mt-3 banner p-3 bg-secondary">
            <div class="text-lg text-center white">Useful banner can be here</div>
        </figure>

        </div> <!-- container .//  -->
        </section>
        <!-- ========================= SECTION MAIN END// ========================= -->
