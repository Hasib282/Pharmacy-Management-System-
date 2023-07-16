<?php  

require_once 'db_connection.php';


//Check if email already exist
function checkEmail($email){
    $conn = db_conn();
    $sql = "select * from customer where Email = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}

//Check if username already exist
function checkUsername($username){
    $conn = db_conn();
    $sql = "select * from customer where Username = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();
        return $count;
    }
    catch(PDOException $e)
    {
        $message = "Error: " . $e->getMessage();
    }
}


//Add Admin / Registration admin to database
function addCustomer($data){
	$conn = db_conn();
    $sql = "INSERT into customer (Username, Name, Email, Phone, Gender, Address, Password, ProfilePic) 
    VALUES (:Username, :Name, :Email, :Phone, :Gender, :Address, :Password, :ProfilePic)";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
        	':Username'  => $data['uname'],
        	':Name'      => $data['name'],
        	':Email'     => $data['email'],
        	':Phone'     => $data['phone'],
        	':Gender'    => $data['gender'],
        	':Address'   => $data['address'],
        	':Password'  => $data['pass'],
        	':ProfilePic' => $data['profile']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}



//Show all Admin
function showCustomer(){
	$conn = db_conn();
    $sql = 'SELECT * FROM `customer` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//for select id using session value
function selectid($info){
    $conn = db_conn();
    $sql = "SELECT * FROM `customer` where (Username = :Username or Email = :Email)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':Username'  => $info,
            ':Email'      => $info
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


//Show admin details by id
function showCustomerById($id){
	$conn = db_conn();
	$sql = "SELECT * FROM `customer` where ID = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


//Search Admin
function searchCustomer($user_name){
    $conn = db_conn();
    $sql = "SELECT * FROM `customer` WHERE Username LIKE '%$user_name%'";
    try{
        $stmt = $conn->query($sql);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//Update Admin
function updateCustomerProfile($id, $data){
    $conn = db_conn();
    $sql = "UPDATE customer set Name = ?, Phone = ?, Gender = ?, Address = ? where ID = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
        	$data['name'], $data['phone'], $data['gender'], $data['address'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateCustomerPass($id, $data){
    $conn = db_conn();
    $sql = "UPDATE customer set Password = ? where ID = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $data['Password'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function updateCustomerProfilepic($id, $data){
    $conn = db_conn();
    $sql = "UPDATE customer set ProfilePic = ? where ID = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $data['profile'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


//Delete Admin
function deleteCustomer($id){
	$conn = db_conn();
    $sql = "DELETE FROM customer WHERE ID = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}





//Show all product
function showProduct(){
    $conn = db_conn();
    $sql = 'SELECT * FROM `product` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}





//Show all doctors
function showDoctor(){
    $conn = db_conn();
    $sql = 'SELECT * FROM `doctor` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

//Show all pharmacy
function showPharmacy(){
    $conn = db_conn();
    $sql = 'SELECT * FROM `pharmacy` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

//Show all orders
function showOrders(){
    $conn = db_conn();
    $sql = 'SELECT * FROM `orders` ';
    try{
        $stmt = $conn->query($sql);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}








?>