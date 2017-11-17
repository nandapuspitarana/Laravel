@extends('layouts.default')

@section('title', 'Student')

@section('content')

  @if (Session::get('success_message'))
  <div class="container">
  <div class="row">
  <div class="col-12">
  <div class="alert alert-info">
  {{ Session::get('success_message') }}
          </div>
        </div>
      </div>
    </div>
  @endif

<h1>Data Siswa</h1>
<form method="GET" action=" {{ route('student.search') }}" class="form-inline my-2 my-lg-0 ml-5">
<input name="keyword" class="form-control" type="text" placeholder="searching..">
</form>
<form class="form-inline my-2 my-lg-0 ml-auto">
      <a href="{{route('student.create')}}" class="btn btn-outline-primary my-2 my-sm-0">Tambah Data</a>
    </form>
  
<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">#</th>
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
        <td>{{ $student->name }}</td>
        <td>{{ $student->address }}</td>
        <td>{{ $student->age }}</td>
        <td>{{ $student->email }}</td>
        <td>
          <form method="POST" action="{{route('student.destroy', $student->id) }}">
            <input type="hidden" name="_method" value="delete" />
            {{ csrf_field() }}
            <button type="submit" onclick="return confirm('Hapus {{ $student->name }} ?')" class="btn btn-danger">Hapus</button>
          </form>    
            <a class="btn btn-primary" href="{{ route('student.edit', $student->id) }}">Update</a>
        </tr>
    @endforeach
  </tbody>
</table>
{{ $students->render() }}
@stop