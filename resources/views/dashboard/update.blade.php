@extends('layouts.main')
@section('content')
<form action='' method="post">
{{@csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
    @error('name')
    <p style="color : red">{{$message}}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="course">Course</label>
    <input type="text" class="form-control" id="course" name="course" placeholder="Enter course">
    @error('course')
    <p style="color : red">{{$message}}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="institute">Institute</label>
    <input type="text" class="form-control" id="institute" name="institute" placeholder="Enter institute">
    @error('institute')
    <p style="color : red">{{$message}}</p>
    @enderror  
</div>
  <div class="form-group">
    <label for="fees">Fees</label>
    <input type="number" class="form-control" id="fees" name="fees" placeholder="Enter fees">
    @error('fees')
    <p style="color : red">{{$message}}</p>
    @enderror
  </div>
  <input type="submit" class="btn-primary">
</form>

@endsection