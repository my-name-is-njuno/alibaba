@extends('layouts.frontend')



@section('title')
	Welcome
@endsection



@section('main')


@include('layouts/frontend-home-banner')


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg">
<div class="container">

<header class="section-heading heading-line">
	<h4 class="title-section bg">MACHINERY</h4>
</header>

<div class="card">
<div class="row no-gutters">
	<div class="col-md-3">

<article href="#" class="card-banner h-100 bg2">
	<div class="card-body zoom-wrap">
		<h5 class="title">Machinery items for manufacturers</h5>
		<p>Consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, c</p>
		<a href="{{ route('products') }}" class="btn btn-warning">Explore</a>
		<img src="images/items/item-sm.png" height="200" class="img-bg zoom-in">
	</div>
</article>

	</div> <!-- col.// -->
	<div class="col-md-9">
<ul class="row no-gutters border-cols">

    @foreach ($notes as $note)
    <li class="col-6 col-md-3">
            <a href="{{ route('singleproduct', ['slug'=>$note->slug]) }}" class="itembox">
                <div class="card-body">
                    <p class="word-limit">{{ $note->name }}  </p>
                    <img class="img-sm" src="{{ ('assets/images/items/1.jpg') }}">
                </div>
            </a>
        </li>
    @endforeach


</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->

</div> <!-- card.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->




@endsection
