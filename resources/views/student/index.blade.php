@extends('layouts.default')
@section('title', 'Student')
@section('content')

@if (Session::get('success_message'))
<div class="col-12">
    <div class="alert alert-info">
        {{ Session::get('success_message') }}
    </div>
</div>
@endif

@if (Session::get('delete_message'))
<div class="col-12">
    <div class="alert alert-info">
        {{ Session::get('delete_message') }}
    </div>
</div>
@endif

<h1>Data Siswa</h1>

<form method="GET" action=" {{ route('student.search') }}" class="form-inline my-2 my-lg-0 mx-auto">
    <input name="keyword" class="form-control" type="text" placeholder="searching..">
</form>

<form class="form-inline my-2 my-lg-0">
    <a href="{{ route('student.create') }}" class="btn btn-outline-primary my-2 my-sm-0">Tambah Data</a>
</form>

<table class="table table-hover table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">photo</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Umur</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>

            <td>
                @if($student->photo)
                    <img src="{{ $student->photo }}" width="100" height="100">    
                @else
                    <img src="/photos/no-avatar.png" width="100" height="100">
                @endif
            </td>

            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->email }}</td>
            <td>
                <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                    <input type="hidden" name="_method" value="delete" />
                    {{ csrf_field() }}
                    <button type="submit" onclick="return confirm('Hapus {{ $student->name }} ?')" class="btn btn-danger w-100">Hapus</button>
                </form>

                <a class="btn btn-primary w-100" href="{{ route('student.edit', $student->id) }}">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $students->render() }}
@stop