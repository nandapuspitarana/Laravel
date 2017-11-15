@extends('layouts.default')

@section('title', 'Edit Siswa')

@section('content')

<form class="container" method="POST" action="{{ route('student.update', $student->id) }}">
  <input type="hidden" name="_method" value="put" />
  {{ csrf_field() }}
  <div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Masukkan Nama">
    @if($errors->first('name'))
		<p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="address" value="{{ $student->address }}" class="form-control" placeholder="Masukkan Alamat">
    @if($errors->first('address'))
		<p class="text-danger">{{ $errors->first('address') }}</p>
    @endif
  </div>
  <div class="form-group">
    <label>Umur</label>
    <input type="number" name="age" value="{{ $student->age }}" class="form-control" placeholder="Masukkan Umur" min="1" max="200">
    @if($errors->first('age'))
		<p class="text-danger">{{ $errors->first('age') }}</p>
    @endif
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="Masukkan Email">
    @if($errors->first('email'))
		<p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@if($errors->any())
	<div class="mt-4 container alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@stop