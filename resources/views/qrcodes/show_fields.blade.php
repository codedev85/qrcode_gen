<div class="col-md-6">

       <!-- Product Name Field -->
    <div class="form-group">
        {{-- {!! Form::label('product_name', 'Product Name:') !!} --}}
        <h3>{!! $qrcode->product_name !!}  <small>By - {!! $qrcode->company_name !!}</small></h3>
    </div>

       <!-- Ammount Field -->
    <div class="form-group">
        <h4>Amount: ${!! $qrcode->ammount !!}</h4>
    </div>


     <!-- Product Url Field -->
    <div class="form-group">
        {!! Form::label('product_url', 'Product Url:') !!}
        <p>
           <a href=" {!! $qrcode->product_url !!}" target="_blank">
              {!! $qrcode->product_url !!}
           </a>
        </p>
    </div>

       <!-- Status Field -->
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        <br>
        @if($qrcode->status == 1)
            {{-- <p>{!! $qrcode->status !!}</p> --}}
            <b class="text-success">Active</b>
        @else
            <b class="text-danger">Inactive</b>
        @endif
    </div>


    @if(!Auth::guest() && ($qrcode->user_id  == Auth::user()->id || Auth::user()->role_id < 3  ))
             <hr/>
                <!-- User Id Field -->
            <div class="form-group">
                {!! Form::label('user_id', 'User:') !!}
                <p>{!! $qrcode->user['email'] !!}</p>
            </div>

            <!-- Website Field -->
            <div class="form-group">
                {!! Form::label('website', 'Website:') !!}
                <p>
                 <a href="{!! $qrcode->website !!}" target="_blank">{!! $qrcode->website !!}</a>
                </p>
            </div>

            <!-- Callback Url Field -->
            <div class="form-group">
                {!! Form::label('callback_url', 'Callback Url:') !!}
                <p>
                  <a href="{!! $qrcode->callback_url !!}" target="_blank">{!! $qrcode->callback_url !!}</a>
                  </p>
            </div>

            <!-- Created At Field -->
            <div class="form-group">
                {!! Form::label('created_at', 'Created At:') !!}
                <p>{!! $qrcode->created_at !!}</p>
            </div>

            <!-- Updated At Field -->
            <div class="form-group">
                {!! Form::label('updated_at', 'Updated At:') !!}
                <p>{!! $qrcode->updated_at !!}</p>
            </div>

@endif
</div>
<div class="col-md-6">
   <!-- Qrcode Path Field -->
    <div class="form-group">
        {{-- {!! Form::label('qrcode_path', '<h4>Scan Qrcode to make payment:</h4>') !!} --}}
        <h4><b>Scan Qrcode to make payment:</b></h4>
        <p>{{--{!! $qrcode->qrcode_path !!} --}}
        <img src="{{asset($qrcode->qrcode_path)}}">
        </p>
    </div>

   {{-- @include('qrcodes.paystack-form') --}}

   <div class="col-md-4">
    <form method="POST" role="form" action="{{route('qrcodes.show_payment')}}" >
 {{csrf_field()}}
        @if(Auth::guest())
       <label for="email" class="text-success">Enter your Email</label>

      <input class="form-control" type="email" id="email" name="email"placeholder="johndoe@gmail.com" required/>
         @else
          <input type="hidden"  name="email" value="{{Auth::user()->email }}"/>
         @endif
         <input type="hidden"  name="qrcode_id" value="{{$qrcode->id }}"/>

           <p>
              <button class="btn btn-success btn-lg " type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>

    </form>
    </div>





</div>

@if(!Auth::guest() && ($qrcode->user_id == Auth::user()->id || Auth::user()->role_id < 3))
    <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <h3 class="text-center text-default">Transactions done on this QRCode</h3>
        @include('transactions.table')
    </div>
@endif
