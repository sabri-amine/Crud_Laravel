@extends('Layouts.master')
@section('main')
    
<table class="table table-light">
    <a href="{{ route('profile.create') }}" class="btn btn-white mb-3" style="border: none ;color:#00ac3f;font-size:18px"><i class="bi bi-person-plus"></i></a>
    <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('profile.show', $user->id) }}" class="btn btn-light btn-sm" style="border: none ;color:#23b1e0;font-size:18px"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('profiles.edit', $user->id) }}" class="btn btn-light btn-sm" style="border: none ;color:#000ab8;font-size:18px"> <i class="bi bi-pencil"></i> </a>
                    <form action="{{ route('profile.delete', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light btn-sm" style="border: none ;color:red;font-size:18px"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection