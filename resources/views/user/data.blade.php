<table class="table table-sm table-hover table-stripped
table-bordered" id="tbl-user">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama User</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $prod)
        <tr>
            <th scope="row">{{ $i = (!isset($i)?1:++$i) }}</th>
            <td>{{ $prod->name }}</td>
            <td>{{ $prod->email }}</td>
            <td>
                {{-- Tombol Edit --}}
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userForModal" data-id="{{ $prod->id }}" data-mode="edit"
                    data-name="{{ $prod->name }}"
                    data-password="{{ $prod->password }}"
                    data-email="{{ $prod->email }}"
                    >Edit</button>
                <form action="{{ route('user.destroy',$prod->id)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger btn-delete" data-name="{{$prod->name}}">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>