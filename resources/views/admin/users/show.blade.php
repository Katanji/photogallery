@extends('layouts.master')

@section('content')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">Edit</a>

        {{--@if ($user->isWait())--}}
        {{--<form method="POST" action="{{ route('admin.users.verify', $user) }}" class="mr-1">--}}
        {{--@csrf--}}
        {{--<button class="btn btn-success">Verify</button>--}}
        {{--</form>--}}
        {{--@endif--}}

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection