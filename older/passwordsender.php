    <?php
     
  $db_host  = "";
 $db_uid  = "";
 $db_pass = "";
 $db_name  = ""; 
    $db_con = mysql_connect($db_host,$db_uid,$db_pass) or die('could not connect');
    mysql_select_db($db_name);
    // array for JSON response
    $response = array();
     
     
     
     
    // check for post data
    if (isset($_POST["email"]) && (isset($_POST["number"])) {
    $email = $_POST['email'];
	$number = $_POST['number'];
     
    // get a product from products table
    $result = mysql_query("SELECT *FROM psword WHERE number ='$number'");
    $passwor = '';
    
    if (mysql_num_rows($result) > 0) {
	    $response = array();
        $response["fkk"] = array();
		
    while($row = mysql_fetch_array($result)){
     
    $fkk = array();
    $fkk["password"] = $row["password"];
    $passwor = $row["password"];
    //email sender
     
    //define the receiver of the email
    $to = $email;
    $subject = 'Your Password';
    $message = "Your password is: $passwor";
    $headers = "From: Outo Contacts\r\nReply-To: joniewm@gmail.com";
    $mail_sent = @mail( $to, $subject, $message, $headers );
     
    $response["success"] = 1;
     
   
	 array_push($response["fkk"], $fkk);
     }
 
     
    // echoing JSON response
    echo json_encode($response);
    } else {
    // no product found
    $response["success"] = 0;
    $response["message"] = "unsucesful";
     
    // echo no users JSON
    echo json_encode($response);
    }
   
    } else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
     
    // echoing JSON response
    echo json_encode($response);
    }
    ?>