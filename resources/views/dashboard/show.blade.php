@extends('layouts.main')

@section('content')
<a class='top-right-button' href="{{route('add.student')}}">Add</a>
<div>
    <input class='search' type='search' name='search' id='search' placeholder='search by name'>

</div>
<br>
<table>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Institute</th>
            <th>Fees</th>
            <th>Actions</th>
        </tr>
        <tbody class='alldata'>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->institute }}</td>
                <td>{{ $student->fees }}</td>
                <td>
                    <a href="{{route('dash.update',['id'=>$student->id])}}" class='update'>Update</a>
                    <a href="{{route('dash.delete',['id'=>$student->id])}}" class='delete' onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tbody id='content' class='sdata'></tbody>
</table>

<script type='text/javascript'>
    $("#search").on('keyup',function(){
        $value=$(this).val();
        if($value){
            $('.alldata').hide();
            $('.sdata').show();
        }
        else{
            $('.alldata').show();
            $('.sdata').hide();
        }
        $.ajax(
            {
                type:'get',
                url:'{{URL::to('search')}}',
                data:{'search':$value},

                success:function(data){
                    console.log(data);
                    $('#content').html(data);
                   
                }
            }
        );
    })

</script>
@if(Session::has('delMsg'))
<h3 style="color : green;text-align: center;">{{Session::get('delMsg')}}</h3>
@endif
@if(Session::has('updateMsg'))
<h3 style="color : green;text-align: center;">{{Session::get('updateMsg')}}</h3>
@endif
@if(Session::has('saveMsg'))
<h3 style="color : green;text-align: center;">{{Session::get('saveMsg')}}</h3>
@endif
{{$students->links()}}
<style>
    .w-5{
        display:none;
    }
</style>
@endsection
