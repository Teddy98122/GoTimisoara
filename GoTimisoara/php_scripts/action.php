  <?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__.'/vendor/autoload.php';

$app = new \Slim\App;


//REST API

//Informatii clienti
$app->get('/database/info', function (Request $request, Response $response, array $args) {
	$sql = "SELECT * from contact";
   try{
    $db = new PDO('sqlite:gotimisoara.db');
   	$stmt = $db->query($sql);
   	$info = $stmt->fetchAll(PDO::FETCH_OBJ);
   	echo json_encode($info);
   }
   catch(PDOException $e){
   	echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});

//Informatii client
$app->get('/database/info/{ID}', function (Request $request, Response $response, array $args) {
	$ID = $request->getAttribute('ID');
	$sql = "SELECT * from contact WHERE ID = $ID";
   try{
    $db = new PDO('sqlite:gotimisoara.db');
   	$stmt = $db->query($sql);
   	$info = $stmt->fetchAll(PDO::FETCH_OBJ);
   	echo json_encode($info);
   }
   catch(PDOException $e){
   	echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});


//Informatii client
$app->get('/database/search/client', function (Request $request, Response $response, array $args) {
  $ID = $request->getParam('ID');
  $sql = "SELECT * from contact WHERE ID = $ID";
   try{
    $db = new PDO('sqlite:gotimisoara.db');
    $stmt = $db->query($sql);
    $info = $stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($info);
   }
   catch(PDOException $e){
    echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});

//Adaugare client
$app->post('/database/add', function (Request $request, Response $response, array $args) {
   $firstname = $request->getParam('firstname');
   $lastname = $request->getParam('lastname'); 
   $email = $request->getParam('email');
   $message = $request->getParam('message');
   $sql = "INSERT INTO contact (firstname,lastname,email,message) VALUES (:firstname, :lastname, :email, :message) ";
   try{
    $db = new PDO('sqlite:gotimisoara.db');
   	$stmt = $db->prepare($sql);
   	$stmt -> bindParam(':firstname',$firstname);
   	$stmt -> bindParam(':lastname',$lastname);
   	$stmt -> bindParam(':email',$email);
   	$stmt -> bindParam(':message',$message);

   	$stmt->execute();

   	echo '{"raport": {"text": "Client adaugat"}';
   }
   catch(PDOException $e){
   	echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});
//Modificare client
$app->put('/database/update/{ID}', function (Request $request, Response $response, array $args) {
   $ID = $request->getAttribute('ID');
   $firstname = $request->getParam('firstname');
   $lastname = $request->getParam('lastname'); 
   $email = $request->getParam('email');
   $message = $request->getParam('message');
   $sql = "UPDATE contact SET
				firstname 	= :firstname,
				lastname 	= :lastname,
                email		= :email,
                message		= :message
			WHERE ID = $ID";

   try{
    $db = new PDO('sqlite:gotimisoara.db');
   	$stmt = $db->prepare($sql);
   	$stmt -> bindParam(':firstname', $firstname);
   	$stmt -> bindParam(':lastname', $lastname);
   	$stmt -> bindParam(':email' ,$message);
   	$stmt -> bindParam(':message', $message);

   	$stmt->execute();

   	echo '{"raport": {"text": "Client modificat"}';
   }
   catch(PDOException $e){
   	echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});

$app->post('/database/modify', function (Request $request, Response $response, array $args) {
   $ID = $request->getParam('ID');
   $firstname = $request->getParam('firstname');
   $lastname = $request->getParam('lastname'); 
   $email = $request->getParam('email');
   $message = $request->getParam('message');
   $sql = "UPDATE contact SET
        firstname   = :firstname,
        lastname  = :lastname,
                email   = :email,
                message   = :message
      WHERE ID = $ID";

   try{
    $db = new PDO('sqlite:gotimisoara.db');
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':firstname',$firstname);
    $stmt -> bindParam(':lastname',$lastname);
    $stmt -> bindParam(':email',$email);
    $stmt -> bindParam(':message',$message);

    $stmt->execute();

    echo '{"raport": {"text": "Client modificat"}';
   }
   catch(PDOException $e){
    echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});


//Stergere Client
$app->delete('/database/delete/{ID}', function (Request $request, Response $response, array $args) {
	$ID = $request->getAttribute('ID');
	$sql = "DELETE FROM contact WHERE ID = $ID";
   try{
    $db = new PDO('sqlite:gotimisoara.db');
   	$stmt = $db->prepare($sql);
   	$stmt -> execute();
   	echo '{"raport": {"text": "Client sters"}';
   }
   catch(PDOException $e){
   	echo '{"Error": {"text": '.$e->getMessage().'}';
   }

});


   //insert_Data();
   //extract_Data();
	$app->run();
?>