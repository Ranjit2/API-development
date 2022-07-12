@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <dropdown-filter />
                
                </div>
            </div>
        </div>
         <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __("Summary") }}</div>
        
                <div class="card-body">
                    <Category />
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection
