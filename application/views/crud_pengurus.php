<div ng-controller="crud">  
  <div class="row">		
		<h1><?= $title; ?></h1>
	</div>
	<div class="row">
		<div class="col-md">
		<div class="form-group">
		    <label for="data">Cari Data</label>
		    <input type="text" class="form-control" placeholder="" ng-model="keyword">
		</div>
		</div>
		<div class="col-md">
		<button class="btn btn-success" style="margin-top: 32px;"  data-toggle="modal" data-target="#myModal">Tambah Data</button>
		</div>
	</div>

	<div class="row">  
	<div class="col-lg table-responsive">
	  <table class="table table-striped">
	  <thead>
	    <tr>
	      <td><a href="#" ng-click="ord='id'">ID</a></td>
	      <td><a href="#" ng-click="ord='nama'">NAMA</a></td>
	      <td><a href="#" ng-click="ord='alamat'">ALAMAT</a></td>
	      <td><a href="#" ng-click="ord='gaji'">GAJI</a></td>
	      <td>AKSI</td>
	    </tr>
	  </thead>
	  <tbody>
	    <tr ng-repeat="row in isiData | filter:keyword | orderBy:ord">
	      <td>{{row.id}}</td>
	      <td>{{row.nama}}</td>
	      <td>{{row.alamat}}</td>
	      <td>{{row.gaji}}</td>
	      <td><button class="btn btn-small btn-warning" data-toggle="modal" data-target="#myModalEdit" ng-click="getID($index)">edit</button> <button class="btn btn-small btn-danger" ng-click="delData(row.id)">delete</button></td>
	    </tr>
	  </tbody>
	  
	</table>
	</div>  
	</div>

<!-- Modal tambah -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label>ID</label>
          <input type="text" ng-model="id" class="form-control">
        </div>
        <div class="form-group">
          <label>NAMA</label>
          <input type="text" ng-model="nama" class="form-control">
        </div>
        <div class="form-group">
          <label>ALAMAT</label>
          <textarea class="form-control" ng-model="alamat"></textarea>
        </div>
        <div class="form-group">
          <label>GAJI</label>
          <input type="number" ng-model="gaji" class="form-control">
        </div>
      </div>
 
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="InsertData()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Modal Tambah -->

<!-- Modal tambah -->
<div class="modal" id="myModalEdit">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label>ID</label>
          <input type="text" ng-model="idEdit" class="form-control">
        </div>
        <div class="form-group">
          <label>NAMA</label>
          <input type="text" ng-model="namaEdit" class="form-control">
        </div>
        <div class="form-group">
          <label>ALAMAT</label>
          <textarea class="form-control" ng-model="alamatEdit"></textarea>
        </div>
        <div class="form-group">
          <label>GAJI</label>
          <input type="number" ng-model="gajiEdit" class="form-control">
        </div>
      </div>
 
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="updateData()">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Modal Tambah -->

</div>  