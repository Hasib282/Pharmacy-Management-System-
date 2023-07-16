<?php  

require_once ('../model/customermodel.php');

function fetchCustomer(){
	return showcustomer();
}
function fetchCustomerById($id){
	return showcustomerById($id);
}

function fetchCustomerid($info){
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











?> 