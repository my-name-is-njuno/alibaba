        <div class="row">
                @auth

                    @if(Auth::user()->id == $note->user_id) 
                        
                        <div class="col-sm-12">
                            <dl class="dlist-inline">
                                  <dt>Recommedations: </dt>
                                  <dd>
                                      <label class="form-check form-check-inline btn btn-sm">24%</label>
                                      
                                      <span class="form-check-label"> would not likely recomeded your notes to others Low</span>
                                    <br>

                                    <label class="form-check form-check-inline btn btn-sm">20%</label>
                                      
                                      <span class="form-check-label"> would likely recomeded your notes to others Low</span>
                                    <br>
                                    <label class="form-check form-check-inline btn btn-sm">60%</label>
                                      
                                      <span class="form-check-label"> would most likely recomeded your notes to others Low</span>
                                    <br>
                                  </dd>
                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->


                    @else
                      

                        <div class="col-sm-4">
                            <dl class="dlist-inline">
                              <dt>Rate: </dt>

                              <dd id="rting">

                                @if($rated == 'notrated')
                                  <select class="form-control form-control-sm" id="ratingsys" onchange="storeRatings()" style="width:70px;">
                                      <option value="1"> 1 </option>
                                      <option value="2"> 2 </option>
                                      <option value="3"> 3 </option>
                                      <option value="4"> 4 </option>
                                      <option value="5"> 5 </option>
                                  </select>
                                @else 
                                    <span class="">
                                      You Have Rated <b> {{ $rated->stars }} </b>
                                    </span>
                                @endif
                              </dd>
                        </dl> 

                        </div> <!-- col.// -->
                        <div class="col-sm-8">
                            <dl class="dlist-inline" >
                                  <dt>Recommed: </dt>
                                  @if($recomended == 'notrecomended')
                                  <dd id="recms">
                                      <label class="form-check form-check-inline">
                                      <input class="form-check-input" name="recomeded" id="inlineRadio1" value="low" type="radio">
                                      <span class="form-check-label">Low</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                      <input class="form-check-input " name="recomeded" id="inlineRadio2" value="medium" type="radio">
                                      <span class="form-check-label">High</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                      <input class="form-check-input" name="recomeded" id="inlineRadio3" value="high" type="radio">
                                      <span class="form-check-label">Very High</span>
                                    </label>
                                  </dd>
                                  @else <br>
                                    Your recomedation <b> {{ $recomended->recomedation }}</b>
                                  @endif
                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->


                    @endif
                @else
                
                    <div class="col-sm-4">
                        <dl class="dlist-inline">
                          <a href="" class="btn btn-primary">Login To Rate</a>              
                    </div> <!-- col.// -->
                    <div class="col-sm-8">
                        <span>
                            Majority of User have recomeded this notes to Others
                        </span>
                    </div> <!-- col.// -->

                @endauth

            </div> <!-- row.// -->