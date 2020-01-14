@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($users->count())
                    <table class="table table-striped"> 
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }} </td>
                            <td>{{ $user->email }} </td>
                            <td>
                                <a href="{{ route('user.edit', [$user->id]) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('confirm', [$user->id]) }}" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
