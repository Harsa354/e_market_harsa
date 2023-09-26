<!-- Modal -->
<div class="modal fade" id="userForModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="user">
          @csrf
          <div id="method"></div>
  <div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label">Nama User</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="name">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-4 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpann</button>
      </form>
      </div>
    </div>
  </div>
</div>