@extends('layouts.app')

@section('content')
<div class="container">
    <a id="uploaddata" class="btn btn-info text-white mb-3">Upload data</a>
    <a id="filldata" class="btn btn-info text-white mb-3" style="display: none;">Fill data</a>
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id="fill" class="card">
                <div class="card-header">{{ __('Register') }}</div>
                    
                <div class="card-body">                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                
                    <form method="POST" class="row w-100 m-0" action="{{ route('register') }}">
                        @csrf                        
                        <v-form></v-form>
                        <div class="row mb-3 col-md-4 mx-auto">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 col-md-4 mx-auto">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="upload" class="col-md-12" style="display: none;">
                <div class="card">
                    <div class="card-header">{{ __('Upload Data') }}</div>                
                        <div class="card-body">   
                            <form action="/upload" method="POST" enctype="multipart/form-data">                                
                            @csrf          
                            <div class="row mb-2">
                                    <div class="col-md-6 offset-md-4">
                                      <input type="file" accept=".csv" name="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Upload') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#uploaddata").click(function(){
            $("#fill").hide()
            $(this).hide()
            $("#upload").show()                    
            $("#filldata").show()                    
        })
        $("#filldata").click(function(){
            $("#upload").hide();
            $(this).hide();
            $("#fill").show();            
            $("#uploaddata").show();            

        })
    });
</script>
@endsection