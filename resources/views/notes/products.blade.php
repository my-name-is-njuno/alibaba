@extends('layouts.frontend')


@section('title')
    All Notes
@endsection


@section('main')








<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
        <div class="container">

        <div class="row">

@include('layouts/frontend-products-sidenav')



<main class="col-sm-9">
        <h3 class="m-2">
                All Notes <small>(Page {{ $notes->currentPage() }} Of {{ $notes->lastPage() }})</small>
                <div class="float-right">
                    <small>
                            Sort By Price : <a href="{{ route('products', ['sort'=>'high_low']) }}" class="btn btn-info">High</a>
                            <a href="{{ route('products', ['sort'=>'low_high']) }}" class="btn btn-warning">Low</a>
                    </small>

                </div>
            </h3>
        @foreach ($notes as $note)


        <article class="card card-product">
            <div class="card-body">
            <div class="row">
                <aside class="col-sm-3">
                    <div class="img-wrap"><img src="{{ asset('assets/images/items/2.jpg') }}"></div>
                </aside> <!-- col.// -->
                <article class="col-sm-6">
                        <h4 class="title"> {{ $note->name }}  </h4>
                        <div class="rating-wrap  mb-2">
                            <ul class="rating-stars">
                                
                                    @if($note->getStars() > 0) 
                                      <li class="">
                                        <?php  for($i = 1; $i <= $note->getStars(); $i++) { ?>
                                            <i class="fa fa-star st starsfor" style="font-size: 15px; color: brown;"></i>
                                        <?php  }  ?>
                                      
                                        <?php
                                          $rm = 5 - $note->getStars(); 
                                          for($i = 1; $i <= $rm; $i++) {
                                        ?>
                                          <i class="fa fa-star st starsnot" style="font-size: 15px;"></i>
                                        <?php } ?>
                                      </li>

                                  @elseif($note->getStars() == 0)

                                    <li>
                                      <i class="fa fa-star"></i> 
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i> 
                                      <i class="fa fa-star"></i>

                                    </li>
                                  @endif
                            </ul>
                            <div class="label-rating ml-3">{{ $note->reviews->count() }} reviews</div>
                            <div class="label-rating ml-3">{{ $note->views }} views</div>
                        </div> <!-- rating-wrap.// -->
                        <p> {{ $note->details }} </p>
                        <dl class="dlist-align">
                          <dt>Pages</dt>
                          <dd>{{ $note->pages }} pages</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="dlist-align">
                          <dt>Type</dt>
                          <dd>{{ $note->doctype  }} document</dd>
                        </dl>  <!-- item-property-hor .// -->
                        <dl class="dlist-align">
                          <dt>By</dt>
                          <dd>{{ $note->user->name }}</dd>
                        </dl>  <!-- item-property-hor .// -->

                </article> <!-- col.// -->
                <aside class="col-sm-3 border-left">
                    <div class="action-wrap">
                        <div class="price-wrap h4">
                            <span class="price"> Kes {{ number_format($note->price) }} </span>

                        </div> <!-- info-price-detail // -->
                        <p class="text-success">Mail Delivery</p>
                        <br>
                        <p>
                            <form action="{{ route('cart', ['note'=>$note]) }}" method="post">
                                @csrf
                                <button  class="btn btn-primary"> Add To Cart </button>
                                <a href="{{ route('singleproduct', ['slug'=>$note->slug]) }}" class="btn btn-secondary"> Details  </a>
                            </form>


                        </p>
                        <a href="#"><i class="fa fa-heart"></i> Favourite</a>
                    </div> <!-- action-wrap.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
            </div> <!-- card-body .// -->
        </article> <!-- card product .// -->
        @endforeach


        {{ $notes->links() }}


            </main> <!-- col.// -->
        </div>

        </div> <!-- container .//  -->
        </section>
        <!-- ========================= SECTION CONTENT END// ========================= -->







        <!-- ========================= SECTION  ========================= -->
<section class="section-name bg-white padding-y">
        <div class="container">
        <h4>Another section if needed</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div><!-- container // -->
        </section>
        <!-- ========================= SECTION  END// ========================= -->

@endsection
