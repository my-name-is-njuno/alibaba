<article class="card mt-3">
            <div class="card-body">
                <h4>Reviews ( {{ $note->reviews->count() }} )</h4>

                <div id="reviewmsg"></div>
                @auth
                    
                
                @if (Auth::user()->id != $note->user_id)
                    <form method="post" action="{{ route('storereview') }}">
                        @csrf
                        <input type="hidden" name="note_id" value="{{ $note->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                          <label for="">Review Notes</label>
                          <textarea name="review" id="newreview" class="form-control" placeholder="" aria-describedby="helpId">

                          </textarea>
                          <button type="submit" class="btn btn-primary mt-3" id="submitreview">Submit Review</button>
                        </div>
                    </form>

                    <hr>
                            <div class="row" id="hnr" >

                              <div class="row media p-5 col-sm-10">
                                <img class="align-self-center mr-3" src="{{ asset('images/avatars/thumbnails/'.Auth::user()->avatar) }}" alt="" width="60px" height="60px" id="hri">
                                <div class="media-body">
                                  <h5 class="mt-0" id="hrn">{{ Auth::user()->name }}</h5>
                                  <p id="hr"></p>
                                  
                                </div>
                              </div>
                          </div>
                        @forelse ($note->reviews as $rv)
                        <div class="row">
                            <div class="media p-5 col-sm-10">
                                <img class="align-self-center mr-3" src="{{ asset('images/avatars/thumbnails/'.$rv->user->avatar) }}" alt="" width="60px" height="60px">
                                <div class="media-body" style="overflow: hidden;">
                                  <h5 class="mt-0">{{ $rv->user->name }}</h5>
                                  <small class="text-muted">{{ $rv->created_at->diffForHumans() }}</small>
                                  <p>{{ $rv->review }}</p>
                                  
                                </div>
                              </div>
                          </div>
                        @empty

                              <p class="lead mx-auto">No Reviews Yet</p>
                            
                        @endforelse

                    
                @endif
                

                @else
                  
                  @forelse ($note->reviews as $rv)
                        <div class="row">
                            <div class="media m-5 col-sm-12">
                                <img class="align-self-center mr-3" src="{{ asset('images/avatars/thumbnails/'.$rv->user->avatar) }}" alt="" width="60px" height="60px">
                                <div class="media-body">
                                  <h5 class="mt-0">{{ $rv->user->name }} </h5>
                                  <small class="text-muted">{{ $rv->created_at->diffForHumans() }}</small>
                                  <p>{{ $rv->review }}</p>
                                  
                                </div>
                              </div>
                          </div>
                        @empty

                              <p class="lead mx-auto">No Reviews Yet</p>
                            
                        @endforelse

                @endauth

                
            </div> <!-- card-body.// -->
        </article> 