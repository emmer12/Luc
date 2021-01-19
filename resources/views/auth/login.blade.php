@extends('layouts.app')

@section('content')
<style>
 .header{
        background: white;
        padding: 10px;
        font-weight: 700;
        color: green;
        box-shadow: 2px 2px 3px #ddd;


    }
    .center-f{
        position: relative;
        background:white;
        margin:10px;
        box-shadow: 2px 2px 3px #ddd;
        left:50%;
        transform:translateX(-50% );        
        padding: 10px;    
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 center-f col-md-offset-2">
            <div class="panel panel-default">
                <div class="header">Login</div><br>


                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @if (session('msg'))
                    <div class="alert alert-danger">{{session('msg')}}</div>
                            
                        @endif
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach

                        @endif
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="property_id" class="col-md-4 control-label">Property Id</label>

                             <input id="number"  type="hidden" class="form-control" name="property_id" value="{{ isset($property_id) ? $property_id : '' }}"> 
                            <input id="number" disabled type="property_id" class="form-control" name="" value="{{ isset($property_id) ? $property_id : '' }}"> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('property_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
