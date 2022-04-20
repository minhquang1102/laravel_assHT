{{-- Home sẽ kế thừ viiew master --}}
@extends('layout.master')
{{-- section sẽ thay đổi phần yeild trong master --}}
@section('title', 'Page User')
@section('content-title', 'Page User')
@section('content')
<div>
    <a href="{{route('users.create')}}">
        <button class="btn btn-primary">Create</button>
    </a>
</div>
<table class="table table-hover">   
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Actions</th>    
    </thead>
    <tbody>
     @foreach ($users as $user)             
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email ?: 'N/A'}}</td>         
            <td>{{$user->created_at ?: 'N/A'}}</td>
            <td>{{$user->updated_at ?: 'N/A'}}</td>  
            <td>
                <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">
                    Edit
                </a>
                    <form
                    action="{{route('users.delete', $user->id)}}"
                    method="POST">
                    @method('DELETE')                  
                    @csrf                  
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>       
        </tr>             
     @endforeach          
    </tbody>
</table>
{{ $users->links() }}
@endsection