<?php  

require_once ('../model/adminmodel.php');

function fetchAdmin(){
	return showAdmin();
}
function fetchAdminById($id){
	return showAdminById($id);
}

function fetchadminid($info){
	return selectid($info);
}

function fetchProduct(){
	return showProduct();
}

function fetchDoctor(){
	return showDoctor();
}

function fetchPharmacy(){
	return showPharmacy();
}

function fetchOrder(){
	return showOrders();
}

function fetchCustomer(){
	return showCustomer();
}









?> 