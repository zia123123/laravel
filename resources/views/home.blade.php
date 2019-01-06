@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @section('content')
<style>
  .uper {

    margin-top: 40px;
    margin-left: 30%;
    margin-right: 30%;
  }

</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Stock Name</td>
            <td> estimated payment </td>
          <td>ip target</td>
          <td>url target</td>
          <td>Status</td>
          <td>photo</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shares as $share)
        <tr>
            <td>{{$share->id}}</td>
            <td>{{$share->share_name}}</td>
            <td>Rp. {{$share->share_price}}</td>
            <td>{{ $share->ip}}</td>
            <td>{{$share->url}}</td>
            <td>{{$share->status}}</td>
            <td><img style="width: 30px;" src="{{URL::asset($share->filename)}}"></td>
            <td><a href="{{ route('shares.edit',$share->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
             <td><a href="{{ route('shares.show',$share->id)}}" class="btn btn-success">show</a></td>
           <td>
                <form action="{{ route('shares.destroy', $share->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

        </div>
    </div>
</div>
@endsection
