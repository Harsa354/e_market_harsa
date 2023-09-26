<table class="table table-sm table-hover table-stripped
table-bordered" id="tbl-pemasok">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pemasok</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasok as $prod)
        <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $prod->nama_pemasok }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pemasokForModal" data-nama_pemasok="{{ $prod->nama_pemasok }}" data-id="{{ $prod->id }}" data-mode="edit">Edit</button>
                <form action="{{ route('pemasok.destroy',$prod->id)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-nama_pemasok="{{$prod->nama_pemasok}}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>