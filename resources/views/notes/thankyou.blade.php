@extends('layouts.frontend')

@section('main')
@extends('layouts.frontend')


@section('main')
<!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content bg padding-y-sm">
        <div class="container">
        <nav class="mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category name</a></li>
                <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Items</li>
            </ol>
        </nav>

        <div class="row">
        <div class="col-xl-10 col-md-9 col-sm-12">




        <!-- PRODUCT DETAIL -->
        <article class="card mt-3">
            <div class="card-body">
                <h4>Thank You For Your Purchase</h4>
                <p>
                    Kindly check your email shortly, your purchase will be sent to your email.
                </p>

            </div> <!-- card-body.// -->
        </article> <!-- card.// -->

        <!-- PRODUCT DETAIL .// -->

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

@endsection
