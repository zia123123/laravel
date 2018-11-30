@extends('../layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
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
      <form method="post" action="{{ route('shares.update', $share->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Share Name:</label>
          <input type="text" class="form-control" name="share_name" value={{ $share->share_name }} />
        </div>
        <div class="form-group">
          <label for="price">Share Price :</label>
          <input type="text" class="form-control" name="share_price" value={{ $share->share_price }} />
        </div>
        <div class="form-group">
          <label for="quantity">Masukan Ip database anda:</label>
          <input type="text" class="form-control" name="share_qty" value={{ $share->share_qty }} />
        </div>
        <div class="form-group">
            <label for="quantity">Masukan IP web anda :</label>
            <input type="text" class="form-control" name="ip" value={{ $share->ip }} />
          </div>
        <div class="form-group">
            <label for="select">status</label>
              <select id="select" name="status">
                <option>proses Zia</option>
                <option>proses udin</option>
                <option>proses ocha</option>
                <option>proses wardah</option>
                <option> DONE! ZIA </option>
                <option> DONE! UDIN </option>
                <option> DONE! OCHA </option>
                <option> DONE! WARDAH </option>

              </select>
          </div>
        <div class="form-group">
            <label for="quantity">Masukan Url anda :</label>
            <input type="text" class="form-control" name="url" value={{ $share->url }} />
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
