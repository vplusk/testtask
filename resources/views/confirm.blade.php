@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete User {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('user.destroy', [$user->id]) }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <p>Are you shure you want to delete user {{ $user->name }} ?</p>
                        
                        <input type="submit" class="btn btn-info" value="Delete">
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
