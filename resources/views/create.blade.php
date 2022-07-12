@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <form action="{{route('user.store')}}" method="POST">@csrf
        <div class="col-md-8">
           
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                 <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" name="fullname">
                 </div>
                 <div class="form-group">
                    <form-country-city />
                </div>
                <div class="form-group">
                    <label for="name">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Age</label>
                    <select name="age" class="form-control">
                        <option value="">select</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="29">29</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
                
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
