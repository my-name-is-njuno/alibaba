@extends('layouts.frontend')

@section('title')
    {{ $note->name }}
@endsection

@section('main')
<!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg padding-y-sm">
        <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $note->cat->name }}</a></li>
               
                <li class="breadcrumb-item active" aria-current="page">{{ $note->name }}</li>
            </ol>
        </nav>

        <div class="row">
        <div class="col-xl-10 col-md-9 col-sm-12">
        
            @include('layouts/frontend-message')

        <main class="card">
            <div class="row no-gutters">
                <aside class="col-sm-6 border-right">
        <article class="gallery-wrap">

            <div class="img-big-wrap">
                <div>
                    <a href="images/items/1.jpg" data-fancybox="">
                        <img src="{{ asset('notes/coverimages/'.$note->coverimage) }}" class="img-thumbnail">
                    </a>
                </div>
            </div>
            <!-- slider-product.// -->
            <div class="img-small-wrap">
                <div class="item-gallery">
                    <img src="images/items/1.jpg">
                </div>
                <div class="item-gallery">
                    <img src="images/items/2.jpg"></div>
                <div class="item-gallery">
                    <img src="images/items/3.jpg">
                </div>
                <div class="item-gallery">
                    <img src="images/items/4.jpg">
                </div>
            </div>
            <!-- slider-nav.// -->

        </article>
        <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-6">
        <article class="card-body">
        <!-- short-info-wrap -->
            <h3 class="title mb-3">{{ $note->name }}</h3>

        <div class="mb-3">
            <var class="price h3 text-warning">
                <span class="currency">Kes </span><span class="num">{{ number_format($note->price) }}</span>
            </var>
            <span>/per copy</span>
        </div> <!-- price-detail-wrap .// -->
        <dl>
          <dt>Description</dt>
          <dd><p>{{ $note->details }} </p></dd>
        </dl>
        <dl class="row">
          <dt class="col-sm-3">Pages#</dt>
          <dd class="col-sm-9">{{ $note->pages }} pages</dd>

          <dt class="col-sm-3">Type</dt>
          <dd class="col-sm-9">{{ $note->doctype }} Document</dd>

          <dt class="col-sm-3">Delivery</dt>
          <dd class="col-sm-9">By Mail and Simple Download </dd>
        </dl>
        <div class="rating-wrap">

            <ul class="rating-stars">
                <li style="width:80%" class="stars-active">
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </li>
                <li>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </li>
            </ul>
            <div class="label-rating ml-2">{{ $note->reviews->count() }} reviews</div>
            <div class="label-rating">{{ $note->views }} views </div>
        </div> <!-- rating-wrap.// -->
        <hr>
            <div class="row">
                <div class="col-sm-5">
                    <dl class="dlist-inline">
                      <dt>Quantity: </dt>
                      <dd>
                          <select class="form-control form-control-sm" style="width:70px;">
                              <option> 1 </option>
                              <option> 2 </option>
                              <option> 3 </option>
                          </select>
                      </dd>
                    </dl>  <!-- item-property .// -->
                </div> <!-- col.// -->
                <div class="col-sm-7">
                    <dl class="dlist-inline">
                          <dt>Size: </dt>
                          <dd>
                              <label class="form-check form-check-inline">
                              <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                              <span class="form-check-label">SM</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                              <span class="form-check-label">MD</span>
                            </label>
                            <label class="form-check form-check-inline">
                              <input class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="option2" type="radio">
                              <span class="form-check-label">XXL</span>
                            </label>
                          </dd>
                    </dl>  <!-- item-property .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->

            <hr>

            @if (Auth::user() && Auth::user()->id == $note->user_id)
                <a href="{{ route('editnotes', ['slug'=>$note->slug]) }}" class="btn  btn-info"> <i class="fa fa-edit"></i> Edit Note Info </a>
                <a href="{{ route('deletenotes', ['slug'=>$note->slug]) }}" class="btn  btn-danger"> <i class="fa fa-trash"></i> Remove Notes </a>
            @else
            <form action="{{ route('cart', ['note'=>$note]) }}" method="post">
                @csrf
                <a href="#" class="btn  btn-warning"> <i class="fa fa-envelope"></i> Contact Supplier </a>
                <button  class="btn  btn-outline-warning" type="submit"> Add to Cart </a>
            </form>
            @endif

            

        <!-- short-info-wrap .// -->
        </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </main> <!-- card.// -->

        <!-- PRODUCT DETAIL -->
        <article class="card mt-3">
            <div class="card-body">
                <h4>Detail overview</h4>
            {{ $note->description }}
            </div> <!-- card-body.// -->
        </article> <!-- card.// -->

        <!-- PRODUCT DETAIL .// -->



        <article class="card mt-3">
            <div class="card-body">
                <h4>Reviews (0)</h4>
                @auth
                    
                
                @if (Auth::user()->id != $note->user_id)
                    <form method="post" action="{{ route('storereview') }}">
                        @csrf
                        <input type="hidden" name="note_id" value="{{ $note->id }}">

                        <div class="form-group">
                          <label for="">Review Notes</label>
                          <textarea name="review" id="review" class="form-control" placeholder="" aria-describedby="helpId">

                          </textarea>
                          <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                        </div>
                    </form>

                    <hr>
                    <div class="row">
                        
                        @forelse ($note->reviews as $rv)
                            <div class="media m-5">
                                <img class="align-self-center mr-3" src="{{ asset('images/avatars/thumbnails/'.$rv->user->avatar) }}" alt="" width="70px" height="70px">
                                <div class="media-body">
                                  <h5 class="mt-0">{{ $rv->user->name }}</h5>
                                  <p>{{ $rv->review }}</p>
                                  
                                </div>
                              </div>
                              
                        @empty

                              <p class="lead mx-auto">No Reviews Yet</p>
                            
                        @endforelse

                    </div>
                @endif

                @endauth
            </div> <!-- card-body.// -->
        </article> 

        </div> <!-- col // -->
        <aside class="col-xl-2 col-md-3 col-sm-12">
        <div class="card">
            <div class="card-header">
                Trade Assurance
            </div>
            <div class="card-body small">
                 <span>China | Trading Company</span>
                 <hr>
                 Transaction Level: Good <br>
                 Supplier Assessments: Best
                 <hr>
                 11 Transactions $330,000+
                 <hr>
                 Response Time 24h <br>
                 Response Rate: 94%  <br>
                 <hr>
                 <a href="">Visit pofile</a>

            </div> <!-- card-body.// -->
        </div> <!-- card.// -->
        <div class="card mt-3">
            <div class="card-header">
                You may like
            </div>
            <div class="card-body row">
        <div class="col-md-12 col-sm-3">
            <figure class="item border-bottom mb-3">
                    <a href="#" class="img-wrap"> <img src="images/items/2.jpg" class="img-md"></a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title">The name of product</a>
                        <div class="price-wrap mb-3">
                            <span class="price-new">$280</span> <del class="price-old">$280</del>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
            </figure> <!-- card-product // -->

        </div> <!-- col.// -->
        <div class="col-md-12 col-sm-3">
            <figure class="item border-bottom mb-3">
                <a class="img-wrap"> <img src="images/items/3.jpg" class="img-md"></a>
                    <figcaption class="info-wrap">
                        <a href="#" href="#" class="title">The name of product</a>
                        <div class="price-wrap mb-3">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
            </figure> <!-- card-product // -->

        </div> <!-- col.// -->
        <div class="col-md-12 col-sm-3">
        <figure class="item border-bottom mb-3">
                <a href="#" class="img-wrap"> <img src="images/items/4.jpg" class="img-md"></a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">The name of product</a>
                    <div class="price-wrap mb-3">
                        <span class="price-new">$280</span>
                    </div> <!-- price-wrap.// -->
                </figcaption>
        </figure> <!-- card-product // -->
        </div> <!-- col.// -->
            </div> <!-- card-body.// -->
        </div> <!-- card.// -->
        </aside> <!-- col // -->
        </div> <!-- row.// -->



        </div><!-- container // -->
        </section>
        <!-- ========================= SECTION CONTENT .END// ========================= -->

@endsection
