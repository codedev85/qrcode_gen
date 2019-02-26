<!-- Id Field -->
{{-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div> --}}

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Role Id Field -->
{{-- <div class="form-group">
    {!! Form::label('role_id', 'Role Id:') !!}
    <p>{!! $user->role_id !!}</p>
</div> --}}

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{!! $user->email_verified_at !!}</p>
</div> --}}

<!-- Password Field -->
{{-- <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $user->password !!}</p>
</div> --}}

<!-- Remember Token Field -->
{{-- <div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{!! $user->remember_token !!}</p>
</div> --}}

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

@if($user->id == Auth::user()->id || Auth::user()->role_id < 3)
    <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <h3 class="text-center text-default">Transactions</h3>
        @include('transactions.table')
    </div>

     <div class="row col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <h3 class="text-center text-default">QRCodes</h3>
        @include('qrcodes.table')
    </div>
@endif