@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h2 class="mb-2 text-center">Admin List</h2>
                <div class="d-flex justify-content-end mt-5">
                    <a href="{{ route('admin.create') }}" class="btn btn-danger">Add New</a>
                </div>            
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last Update</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td><a href="{{ route('admin.edit', ['user_id' => $item->id]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
