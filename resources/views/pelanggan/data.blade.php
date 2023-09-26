<table class="table table-sm table-hover table-stripped
table-bordered" id="tbl-pelanggan">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pelanggan</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $prod)
        <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $prod->nama_pelanggan }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pelangganForModal" data-nama_pelanggan="{{ $prod->nama_pelanggan }}" data-id="{{ $prod->id }}" data-mode="edit">Edit</button>
                <form action="{{ route('pelanggan.destroy',$prod->id)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_pelanggan="{{$prod->nama_pelanggan}}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>