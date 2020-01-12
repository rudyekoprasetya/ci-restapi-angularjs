<div ng-controller="admin">  
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
	      <td><a href="#" ng-click="ord='username'">USERNAME</a></td>
	      <td><a href="#" ng-click="ord='password'">PASSWORD</a></td>
	      <td>AKSI</td>
	    </tr>
	  </thead>
	  <tbody>
	    <tr ng-repeat="row in isiData | filter:keyword | orderBy:ord">
	      <td>{{row.id}}</td>
	      <td>{{row.username}}</td>
	      <td>{{row.password}}</td>
	      <td><button class="btn btn-small btn-warning" data-toggle="modal" data-target="#myModal" ng-click="editData(row)">edit</button> <button class="btn btn-small btn-danger" ng-click="delData(row.id)">delete</button></td>
	    </tr>
	  </tbody>
	  
	</table>
	</div>  
	</div>

<!-- Modal tambah -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form role="form">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label>USERNAME</label>
          <input type="text" ng-model="form.username" class="form-control">
        </div>
        <div class="form-group">
          <label>PASSWORD</label>
          <input type="password" ng-model="form.password" class="form-control">
        </div>
      </div>
 
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="saveData()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" ng-click="ClearData()">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Tambah -->

</div>  