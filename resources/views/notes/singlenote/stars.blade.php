<div class="rating-wrap">

            <hr>    

            <div class="label-rating">Overall Rating ({{ $note->stars->count() }})</div>
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
            
            <div class="label-rating ml-5">{{ $note->reviews->count() }} reviews</div>
            <div class="label-rating">{{ $note->views }} views </div>
        </div> <!-- rating-wrap.// -->