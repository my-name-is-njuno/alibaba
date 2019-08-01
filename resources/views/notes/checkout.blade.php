
@extends('layouts.frontend')

@section('extracss')
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}">
@endsection

@section('extrajs')

<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe.js') }}"></script>

@endsection

@section('main')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
        <div class="container">

        <div class="row">
            <main class="col-sm-9">

                @include('layouts/frontend-message')

            <div class="card">
                    <form action="{{ route('stripecheckout') }}" method="post" id="payment-form">
                        @csrf
                <div class="card-header bg-warning text-white">Billing Details</div>
                <div class="card-body">

                        <fieldset>


                            <div class="row">
                                    <div class="form-group col-sm-6">
                                <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" id="stripeemail" aria-describedby="email" placeholder="Your Email" value="{{ Auth::user()->email }}" disabled>
                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>



                                <div class="form-group col-sm-6">
                                        <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" id="stripename" aria-describedby="name" placeholder="Your name" value="{{ Auth::user()->name }}" disabled>
                                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="">Country</label>
                                        <input type="text" class="form-control" name="country" id="stripecountry" aria-describedby="country" placeholder="Your country">
                                    {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                    </div>


                                    <div class="form-group col-sm-6">
                                            <label for="">City</label>
                                                <input type="text" class="form-control" name="city" id="stripecity" aria-describedby="city" placeholder="Your city">
                                            {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                            </div>
                                <input type="hidden" name="total" value="{{ Cart::total() * 100 }}">
                        </fieldset>


                </div>

                <div class="card-header bg-warning text-white">Payment Info</div>
                <div class="card-body">
                        <fieldset>




                                <div class="form-row">
                                    <label for="card-element">
                                    Credit or debit card
                                    </label>
                                    <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <button class="btn btn-primary mt-3">Submit Payment</button>


                            </fieldset>
                </div>

            </div>
        </form>
        <div class="card">
            <div class="card-header bg-warning text-white">Items In Cart</div>
        <table class="table table-hover shopping-cart-wrap">
        <thead class="text-muted">
            @foreach (Cart::content() as $item)


            <tr>
                <td>
            <figure class="media">
                <div class="img-wrap"><img src="{{ asset('assets/images/items/1.jpg') }}" class="img-thumbnail img-sm"></div>
                <figcaption class="media-body">
                    <h6 class="title text-truncate">{{ $item->model->name }} </h6>
                    <dl class="dlist-inline small">
                      <dt>Size: </dt>
                      <dd>XXL</dd>
                    </dl>
                    <dl class="dlist-inline small">
                      <dt>Color: </dt>
                      <dd>Orange color</dd>
                    </dl>
                </figcaption>
            </figure>
                </td>
                <td>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </td>
                <td>
                    <div class="price-wrap">
                        <var class="price">KES {{ number_format($item->model->price) }}</var>
                        <small class="text-muted">(Kes {{ number_format($item->model->price) }} each)</small>
                    </div> <!-- price-wrap .// -->
                </td>
                <td class="text-right">
                <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a>
                <a href="{{ route('removefromcart', ['id'=>$item->rowId]) }}" class="btn btn-outline-danger"> × Remove</a>
                </td>
            </tr>
            @endforeach

        </tbody>
        </table>
        </div> <!-- card.// -->

            </main> <!-- col.// -->
            <aside class="col-sm-3">
        <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
        <dl class="dlist-align">
          <dt>Total price: </dt>
          <dd class="text-right">KES {{ Cart::subtotal() }}</dd>
        </dl>
        <dl class="dlist-align">
          <dt>Tax:</dt>
          <dd class="text-right">KES {{ Cart::tax() }}</dd>
        </dl>
        <dl class="dlist-align h4">
          <dt>Total:</dt>
          <dd class="text-right"><strong>KES {{ Cart::total() }}</strong></dd>
        </dl>
        <hr>
        <figure class="itemside mb-3">
            <aside class="aside"><img src="images/icons/pay-visa.png"></aside>
             <div class="text-wrap small text-muted">
        Pay 84.78 AED ( Save 14.97 AED )
        By using ADCB Cards
             </div>
        </figure>
        <figure class="itemside mb-3">
            <aside class="aside"> <img src="images/icons/pay-mastercard.png"> </aside>
            <div class="text-wrap small text-muted">
        Pay by MasterCard and Save 40%. <br>
        Lorem ipsum dolor
            </div>
        </figure>

            </aside> <!-- col.// -->
        </div>

        </div> <!-- container .//  -->
        </section>
        <!-- ========================= SECTION CONTENT END// ========================= -->

        <!-- ========================= SECTION  ========================= -->
        <section class="section-name bg-white padding-y">
        <div class="container">
        <header class="section-heading">
        <h2 class="title-section">Section name</h2>
        </header><!-- sect-heading -->

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div><!-- container // -->
        </section>
        <!-- ========================= SECTION  END// ========================= -->

        <!-- ========================= SECTION  ========================= -->
        <section class="section-name bg padding-y">
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

<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_JIVgtneTZaNFSF2w14HuEMOg004zxlRqv3');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>

@endsection
