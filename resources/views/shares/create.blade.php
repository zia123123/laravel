@extends('../layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Permintaan Pengamanan
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('shares.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Share Name  :</label>
              <input type="text" class="form-control" name="share_name"/>
          </div>
          <div class="form-group">
              <label for="price">Estimate Payment :</label>
              <input type="text" class="form-control" name="share_price"/>
          </div>
          <div class="form-group">
            <label for="price">No Telp :</label>
            <input type="text" class="form-control" name="share_qty"/>
        </div>
          <div class="form-group">
            <label for="url">Masukan IP WEB anda:</label>
            <input type="text" class="form-control" name="ip"/>
        </div>
          <div class="form-group">
            <label for="url">Masukan Url WEB anda:</label>
            <input type="text" class="form-control" name="url"/>
        </div>
        <div>
            <input id="minute_length" type="file" name="filename" required="">
                </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection


