@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User {{ $user->name }}</div>

                <div class="card-body">
                    <form action="{{ route('user.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="form-group">
                            <label for="name">User name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">User email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="">User image</label>        
                            @if(!empty($user->photo))
                                <img src="{{ \Storage::url('avatars/' . $user->photo) }}" alt="" style="max-width:50%">
                            @endif
                            
                            <br>
                            <input type="file" name="photo">
                        </div>
                        <input type="submit" class="btn btn-info" value="Update">
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
