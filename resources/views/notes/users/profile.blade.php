@extends('layouts.frontend')

@section('title')
    {{ Auth::user()->name }} Profile
@endsection


@section('extracss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('main')


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
        <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-8">
                
            
                 <div class="card">

                    @include('layouts/frontend-message')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="info-div-tab" data-toggle="tab" href="#info-div" role="tab" aria-controls="info-div" aria-selected="true">Profile Info</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="edit-info-tab" data-toggle="tab" href="#edit-info" role="tab" aria-controls="edit-info" aria-selected="false">Edit Profile Info</a>
                      </li>
                      {{-- <li class="nav-item">
                        <a class="nav-link" id="edit-password-tab" data-toggle="tab" href="#edit-password" role="tab" aria-controls="edit-password" aria-selected="false">Edit Your Password</a>
                      </li> --}}
                    </ul>


                    <div class="tab-content" id="myTabContent">
                      <div class="m-3 tab-pane fade show active" id="info-div" role="tabpanel" aria-labelledby="info-div-tab">
                      
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="{{ asset('images/avatars/thumbnails/' . Auth::user()->avatar) }}" alt=""/>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                                <h5>
                                                    {{ Auth::user()->name }}
                                                </h5>
                                                <p>
                                                    {{-- {{ Auth::user()->about }}  --}}
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.
                                                </p>
                                                <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-work">
                                       
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>User Name</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ Auth::user()->name }}</p>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Email</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <p>{{ Auth::user()->email }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Country</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <p>{{ Auth::user()->country->name }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Profession</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p>{{ Auth::user()->proffesion }}</p>
                                                        </div>
                                                    </div>
                                        </div>





                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Notes Uploaded</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{ Auth::user()->notes->count() }} Notes </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Notes Purchased</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>{{ Auth::user()->orders->count() }} Orders</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Reviews For</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>230 reviews</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Stars </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>2 out 5</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Availability</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>6 months</p>
                                                                </div>
                                                            </div>
                                                    <div class="row">
                                                        
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </form>   
                      </div>









                      <div class="tab-pane fade" id="edit-info" role="tabpanel" aria-labelledby="edit-info-tab">
                          <div class="card-body mt-3">
                                    <form method="POST" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="proffesion" class="col-md-4 col-form-label text-md-right">{{ __('Proffesion') }}</label>

                                            <div class="col-md-6">
                                                <input id="proffesion" type="proffesion" class="form-control @error('proffesion') is-invalid @enderror" name="proffesion" value="{{ Auth::user()->proffesion }}" required autocomplete="proffesion">

                                                @error('proffesion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('About') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="about"  class="form-control @error('about') is-invalid @enderror" name="about" required> {{ Auth::user()->about }} </textarea>

                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                                            <div class="col-md-6">
                                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">

                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <br>
                                                <label>Current Avatar</label>
                                                <img src="{{ asset('images/avatars/thumbnails/'. Auth::user()->avatar) }}"  alt="" class="img-thumbnail">
                                            </div>
                                        </div>





                                        

                                        

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Update Your Info') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                      </div>





                      {{-- <div class="tab-pane fade" id="edit-password" role="tabpanel" aria-labelledby="edit-password-tab">
                          
                      </div> --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
        </section>
        <!-- ========================= SECTION  END// ========================= -->

@endsection
