<table class="table table-sm table-hover table-stripped
table-bordered" id="tbl-produk">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $prod)
        <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $prod->nama_produk }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#produkForModal" data-nama_produk="{{ $prod->nama_produk }}" data-id="{{ $prod->id }}" data-mode="edit">Edit</button>
                <form action="{{ route('produk.destroy',$prod->id)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_produk="{{$prod->nama_produk}}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>