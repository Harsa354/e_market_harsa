<table class="table table-sm table-hover table-stripped
table-bordered" id="tbl-pembelian">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pembelian</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelian as $prod)
        <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $prod->nama_pembelian }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pembelianForModal" data-nama_pembelian="{{ $prod->nama_pembelian }}" data-id="{{ $prod->id }}" data-mode="edit">Edit</button>
                <form action="{{ route('pembelian.destroy',$prod->id)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_pembelian="{{$prod->nama_pembelian}}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>