@extends('layouts.frontend')




@section('title')
	
	Add Notes for Sale

@endsection


@section('main')
	
	 <section class="section-content bg padding-y-sm">
        <div class="container">
                <div class="row justify-content-center m-5">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Add Notes') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('storenotes') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                            <div class="col-md-6">
                                                <select id="category"  class="form-control @error('category') is-invalid @enderror" name="category"  required>
                                                    <option>Choose Category</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="details" class="col-md-4 col-form-label text-md-right">{{ __('Notes For') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="details"  class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required rows="1"  ></textarea>

                                                @error('details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required rows="6" ></textarea>

                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                       	
                                       	<div class="form-group row">
                                            <label for="intended" class="col-md-4 col-form-label text-md-right">{{ __('Intended for') }}</label>

                                            <div class="col-md-6">
                                                <input id="intended" type="text" class="form-control @error('intended') is-invalid @enderror" name="intended" value="{{ old('intended') }}" required >

                                                @error('intended')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="pages" class="col-md-4 col-form-label text-md-right">{{ __('Pages') }}</label>

                                            <div class="col-md-6">
                                                <input id="pages" type="number" step="1" class="form-control @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages') }}" required >

                                                @error('pages')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="notes" class="col-md-4 col-form-label text-md-right">{{ __('Upload Notess') }}</label>

                                            <div class="col-md-6">
                                                <input id="notes" type="file" class="form-control @error('notes') is-invalid @enderror" name="notes" required >

                                                @error('notes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="coverimage" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image (optional)') }}</label>

                                            <div class="col-md-6">
                                                <input id="coverimage" type="file" class="form-control @error('coverimage') is-invalid @enderror" name="coverimage"  >

                                                @error('coverimage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price - Kes') }}</label>

                                            <div class="col-md-6">
                                                <input id="price" type="number" step="0.5" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required >

                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        




                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Upload Notes') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        	</div>

        </section>

@endsection