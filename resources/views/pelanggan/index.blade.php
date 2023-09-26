@extends('templates.layout')

@push('style')

@endpush

@section('content')
     <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pelanggan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pelangganForModal">
                Tambah Pelanggan
                </button>

                @if (session('success'))
                <div class="mt-2 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamattt</strong> {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif

                    @if ($errors->any())
                <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                @endif
                @include('pelanggan.data')

                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
            @include('pelanggan.form')
        </div>
        <!-- /.card -->

    </section>
@endsection

@push('script')
    <script>
      $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-success").slideUp(500);
      })

      $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-danger").slideUp(500);
      })

      $(function(){
        $('#tbl-pelanggan').DataTable()
      })

        // dialog hapus data
    $('.btn-delete').on('click', function(e){
        
        let nama_pelanggan = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
          icon: 'error',
          title: 'Hapus Data',
          html: `Apakah data <b>${nama_pelanggan}</b> akan dihapus?`,
          confirmButtonText: 'Ya',
          denyButtonText: 'Tidak',
          showDenyButton: true,
          focusConfirm: false
        }).then((result) => {
          if (result.isConfirmed) $(e.target).closest('form').submit()
          else swal.close()
        })
      })

    //   Form Modal
    $('#pelangganForModal').on('show.bs.modal', function(e){
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const nama_pelanggan = btn.data('nama_pelanggan')
        const id = btn.data('id')
        const modal = $(this)
        if(mode === 'edit'){
          modal.find('.modal-title').text('Edit Data pelanggan')
          modal.find('#nama_pelanggan').val(nama_pelanggan)
          modal.find('.modal-body form').attr('action','{{ url("pelanggan") }}/'+id)
          modal.find('#method').html('@method("PATCH")')
        }else{
          modal.find('.modal-title').text('Tambah Data pelanggan')
          modal.find('#nama_pelanggan').val('')
          modal.find('#method').html('')
          modal.find('.modal-body form').attr('action','{{ url("pelanggan") }}')
        }
      })
    </script>
@endpush