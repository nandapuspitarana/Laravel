@extends('layouts.default')

@section('title', 'Edit Siswa')

@section('content')


<form class="container" method="POST" enctype="multipart/form-data" action="{{ route('student.update', $student->id) }}">
  <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}
  <div class="form-group">
    <label for="input">Nama</label>
    <input type="text" class="form-control"  name="name" placeholder="Enter Name" value="{{ $student->name }}" >
        @if($errors->first('name'))
          <p style="color: red">{{ $errors->first('name') }}</p>
        @endif
  </div>
  <div class="form-group">
    <label for="input">Alamat</label>
    <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ $student->address }}">
    @if($errors->first('address'))
          <p style="color: red">{{ $errors->first('address') }}</p>
        @endif
  </div>
  <div class="form-group">
    <label for="input">Umur</label>
    <input type="text" class="form-control"  name="age" placeholder="Enter Age" value="{{ $student->age }}">
  </div>
  @if($errors->first('age'))
          <p style="color: red">{{ $errors->first('age') }}</p>
        @endif
  <div class="form-group">
    <label for="input">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ $student->email }}">
  </div>
  <div class="form-group">
    <label for="input">photo (kosongkan jika tidak ingin diganti)</label>
    <input type="file" class="form-control" name="photo" >
  </div>
  @if($errors->first('email'))
          <p style="color: red">{{ $errors->first('email') }}</p>
        @endif
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</br>
    @if($errors->any())
      <div class="alert alert-danger mt-3 ml-3">
    <ul>
      @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
      @endforeach
</ul>

</div>

@endif

@stop
