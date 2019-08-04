@extends('layouts.frontend')

@section('title')
    {{ $note->name }}
@endsection

@section('extracss')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/singlenote.css') }}">
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


                                    @include('notes/singlenote/coverimage')



                                          <aside class="col-sm-6">
                                            <article class="card-body">
                                         

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
                                                    
                                                              <hr>


                                                        @include('notes/singlenote/ratingactions')
                                                    
                                                        @include('notes/singlenote/stars')
                                                        

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

                                                        

                                       
                                              </article> <!-- card-body.// -->

                                            </aside> <!-- col.// -->

                                  </div> <!-- row.// -->

                            </main> <!-- card.// -->




                                <!-- PRODUCT DETAIL -->
                                <article class="card mt-3">
                                    <div class="card-body">
                                        <h4>Detail overview</h4>
                                    {{ $note->description }}
                                    </div>
                                </article> 

                               



                            @include('notes/singlenote/reviews')

                            </div> 



                            @include('notes/singlenote/aside')




                            </div>



                  </div>


                  <input type="hidden" id="noteidajax" name="noteidajax" value="{{ $note->id }}">


        </section>

        
    


































         <script>
  


                      $.ajaxSetup({

                            headers: {

                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                            }

                        });








                          
                          var rec = ''
                          var note_id = document.getElementById("noteidajax").value;


                          (function (){
                            var radios = document.getElementsByName('recomeded');
                              // console.log(radios);
                              for(var i = 0; i < radios.length; i++){
                                  radios[i].onclick = function(){
                                      rec = this.value;

                                          $.ajax({
                                           type:'GET',
                                           url:'{{ URL::route('storerecommend') }}',
                                           data:{rc:rec, id: note_id},
                                           success:function(data) {
                                              $("#recms").html(data.msg);
                                           }
                                        });
                                  }
                              }
                          })();

                         




                            function storeRatings() {
                              var rating = document.getElementById("ratingsys").value;
                                  $.ajax({
                                     type:'GET',
                                     url:'{{ URL::route('storerating') }}',
                                     data:{rating: rating, id: note_id},
                                     success:function(data) {
                                        $("#rting").html(data.msg);
                                     }
                                  });
                            }












                            $("#submitreview").click(function(e){

                                  e.preventDefault();



                                  var review = document.getElementById("newreview").value;


                                  if(review.trim().length == 0) {
                                    $("#reviewmsg").html('<span class="alert alert-danger m-2">You are adding an empty review</span>');
                                    return
                                  }

                                  var user_id = $("input[name=user_id]").val();



                                  $.ajax({

                                     type:'POST',

                                     url:'{{ URL::route('storereview') }}',

                                     data:{review:review, note_id:note_id, user_id:user_id},

                                     success:function(data){

                                        $("#reviewmsg").html('<span class="alert alert-success m-2">'+data.msg+'</span>');

                                        document.getElementById("hrn").style.display = "block";
                                          
                                        $("#hr").html(data.review.review);

                                        document.getElementById("newreview").value = '';
                                           
                                        

                                     }

                                  });



                            });

                          </script>

@endsection



@section('extrajs')

   

@endsection