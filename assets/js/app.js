var MyApp = angular.module('Appku',['ui.router']); //inisialisasi angular module

//config ui-router
MyApp.config(function($stateProvider,$urlRouterProvider){
	var base_url='http://localhost/rest-api/crud/';

	$urlRouterProvider.otherwise('/home'); //default route

	$stateProvider
		.state('home', {
			url: '/home',
			templateUrl: base_url+'home'
			})
		.state('pengurus', {
			url: '/pengurus',
			templateUrl: base_url+'pengurus'
			})
		.state('admin', {
			url: '/admin',
			templateUrl: base_url+'admin'
			})
		.state('about', {
			url: '/about',
			templateUrl: base_url+'about'
			});

});

MyApp.controller('crud',  function($scope,$http){ // controller sesuai view

	var base_url='http://localhost/rest-api/pengurus/data';

	//bersihkan form
	$scope.ClearData=function(){
		$scope.id='';
		$scope.nama='';
		$scope.alamat='';
		$scope.gaji='';
	}

	//tampilkan data
	$scope.GetData=function(){
		$http.get(base_url).then(function(response){
			console.log(response);
			$scope.isiData=response.data;
		});
	}
	$scope.GetData();

	// tambah data
	$scope.InsertData=function(){
		$http({
			method: 'POST',
			url: base_url,
			data: {'id':$scope.id, 'nama':$scope.nama, 'alamat':$scope.alamat, 'gaji':$scope.gaji}
		}).then(function(response){
			console.log(response);
			$scope.GetData();
			$scope.ClearData();
		});
	}

	// hapus data
	$scope.delData=function(id){

		// console.log(id);
		$http({
			method: 'DELETE',
			url: base_url,
			data: {'id':+id}
		}).then(function(response){
			console.log(response);
			$scope.GetData();
		});
	}

	//edit data
	$scope.getID=function(index) {
		$scope.idEdit=$scope.isiData[index].id;	
		$scope.namaEdit=$scope.isiData[index].nama;	
		$scope.alamatEdit=$scope.isiData[index].alamat;	
		$scope.gajiEdit=+$scope.isiData[index].gaji;	
	}

	// update data
	$scope.updateData=function(){
		$http({
			method: 'PUT',
			url: base_url,
			data: {'id':$scope.idEdit, 'nama':$scope.namaEdit, 'alamat':$scope.alamatEdit, 'gaji':$scope.gajiEdit}
		}).then(function(response){
			console.log(response);
			$scope.GetData();
		});
	}
});

MyApp.controller('admin',  function($scope,$http){ // controller sesuai view
	var base_url='http://localhost/rest-api/admin';

	$scope.ClearData=function() {
		$scope.form={};
	}

	//tampilkan data
	$scope.GetData=function(){
		$http.get(base_url).then(function(response){
			console.log(response);
			$scope.isiData=response.data;
		});
	}
	$scope.GetData();

	// simpan data baik tambah atau update
	$scope.saveData=function(){
		var data=angular.copy($scope.form);
				
		if(!data.id) { //jika datanya belum ada maka tambah data baru
			$http.post(base_url,data).then(function(response){
				console.log(response);
				$scope.GetData();
				$scope.ClearData();
			});
		} else { //selain itu update data
			$http.put(base_url,data).then(function(response){
				console.log(response);
				$scope.GetData();
				$scope.ClearData();
			});
		}
			
	}

	//tampilkan data yang akan diedit
	$scope.editData=function(data) {
		$scope.form=angular.copy(data);
	}

	// hapus data
	$scope.delData=function(id) {
		$http.delete(base_url, { 'id':id }).then(function(response){
			console.log(response);
			$scope.GetData();
		});
	}

});