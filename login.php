<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="gp_logo.jpg">
    <link rel="stylesheet" href="antiRagging.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>College Anti Ragging System</title>]
    <style>
        *{
        }
        #banner {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-align: center;
            width: 100%;
        }

        #logo {
            width: 10%;
            height: max-content;
        }

        h1,
        h2,
        #Bname {
            font-family:'Times New Roman', Times, serif;
            width: 90%;
            font-size: 2em;
            height: max-content;
            font-weight: 500;
        }

        .marqee {
            background-color: #4d5b6a;
            color: aliceblue;
        }

        .nav {

            color: white;
            text-decoration: none;
            font-size: 1em;
        }
        .nav img{
            height: 20px;
            width: 20px;
        }
        nav {
            background-color: black;
            display: flex;
            flex-direction: row;
            justify-content: space-around;

            position: sticky;
        }
        main{
            text-align:center;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            color: #588c76;
            font-size: 25px;
            text-align: left;
            font-family:'Times New Roman', Times, serif;
        }
        #admin{
            display flex;
            flex-direction:row;
        }

        th{
            
            background-color:  #588c76;
            color: white;
        }
        button{
            background-color: #45eb4aff;
            border-radius: 25px;
            font-size: 10px;
            height: 30px;
            width: 60px;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
    </style>
</head>
<body>
    <header>
        <div id="marqee" class="marqee">
            <marquee behavior="slide" direction="left">
                <a class="marqee" href="grievance.html">
                    Click Here - to fill your Ragging Greivance
                </a>
            </marquee>
        </div>
        <div id="banner">
            <img id="logo" src="gp_logo.jpg" alt="">
            <div id="Bname">
                
                    Govt. Polytechnic Gauchar <br>
                    Anti Ragging System
                
            </div>
        </div>
        <div id="nav">
            <nav>
                <span><a class="nav" href="antiRagging.html">Home</a></span>
                <span><a class="nav" href="about.html">About</a></span>
                <span><a class="nav" href="contact.html">Contact</a></span>
                <span ><a class="nav" href="grievance.html">Grievance</a></span>
                <span><a class="nav" href="login.html"><img src="login.png" alt="">Login</a></span>
				
            </nav>
        </div>
    </header>
    <main>
        <div>
        <h2>Admin page</h2>
        <div id="admin">
            <div id="table1">
                <table>
            <tr>
                <th>Complaint Id</th>
                <th>Roll No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Greivance</th>
                <th>Verification</th>
            </tr>

            <?php

            $conn = mysqli_connect("localhost","root","","greivance");
            if( !$conn ){
                  die("connection failed". mysqli_connect_error());
            }
            $sql = "SELECT compalintId, name,email, rollno, grievance from complaint";
            $result = $conn->query($sql);

            if($result->num_rows>0){
                while($row=$result-> fetch_assoc()){
                    echo "<tr><td>". $row["compalintId"]."</td><td>".$row["rollno"]."</td><td>". $row["name"]."</td><td>". $row["email"]."</td><td>". $row["grievance"]."</td>";
                    echo "<td>";
                        echo "<button id='btn' onclick='sendEmail()'>verify </button>";
                    echo "</td></tr>";
            }
            echo "</table>";}
        
            else{
                echo "0 result";
            }

            $conn-> close();

            // session_start();

            // use PHPMailer\PHPMailer\PHPMailer;
            // use PHPMailer\PHPMailer\Exception;
            // use PHPMailer\PHPMailer\SMTP;

            // // require 'vendor/autoload.php';

            // define('SMTP_HOST','smtp.gmail.com');
            // define('SMTP_USER','mr.s********8@gmail.com');
            // define('SMTP_PASS','hdxy ixds cgel k+1n+1g+1i+1');
            // define('SMTP_PORT', 587);
            
            // if(isset($_SESSION['user_id'])){
            //     $user_id_to_find = $_SESSION['user_id'];
            // }else{
            //     http_response_code(401);
            //     echo json_encode(["success"=>false,"message"=>"Invalid user Id provided!"]);
            //     exit;
            // }
            // // $user_id_to_find = (int)($_POST['user_id']);

            // $subject = "Verification of your greivance";
            // $message = "Your greivance has been verified by the college admin. We will take necessary actions soon. Thank you for your patience.";

            // $recipient_email = null;
            // // $mail = new PHPMailer(true);
            // $conn = new mysqli_connect("localhost","root","","greivance");
            // if($conn->connect_error){
            //     die("Connection failed: ". $conn->connect_error);
            // }
            // $sql = "SELECT email FROM complaint WHERE compalintId = $user_id_to_find";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("i",$user_id_to_find);
            // $stmt->execute();
            // $result = $stmt->get_result();

            // if($result->num_rows > 0){
            //     $row = $result->fetch_assoc();
            //     $recipient_email = $row['email'];
            //     echo " Recipient Email found: ". $recipient_email."\n";
            // }else{
            //     echo "No user found with Id." . $user_id_to_find;
            // }
            // $stmt->close();
            // $conn->close();

            // if($recipient_email){
            //     try{
            //         $mail->isSMTP();
            //         $mail->Host = SMTP_HOST;
            //         $mail->SMTPAuth = true;
            //         $mail->Username = SMTP_USER;
            //         $mail->Password = SMTP_PASS;
            //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            //         $mail->Port = SMTP_PORT;

            //         $mail->setFrom(SMTP_USER, 'College Anti Ragging Committee');
            //         $mail->addAddress($recipient_email);

            //         $mail->isHTML(false);
            //         $mail->Subject = $subject;
            //         $mail->Body = $message;

            //         $mail->send();
            //         echo json_encode(["success"=>true,"message"=>"Verification email sent successfully to ". $recipient_email]);
            //     }catch(Exception $e){
            //         echo json_encode(["success"=>false,"message"=>"Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
            //  }else{
            //          http_response_code(400);
            //         echo json_encode(["success"=>false,"message"=>"Recipient email not found for Id." . $user_id_to_find]);
            //  }
            // }   
                
            // // }
            ?>
            </table>
            </div>
            <!-- <div id="table2">
                <form action="https://api.web3forms.com/submit" method="POST">
                    <input type="hidden" name="access_key" value="4880681a-2166-4070-b59e-948c440d978a">

                </form>
            </div> -->
        </div>
    </div>
    </main>
</body>
<script>
    const button = document.getElementById('btn');
    function sendEmail(){
        
        alert("You have verified this");
        button.style.backgroundColor='yellow';
        button.innerText='Verified';
        return true;
        
    }
    // document.getElementById('sendEmailBtn').onclick =  function(){
    //     const userId = 7;

    //     this.disabled = true;
    //     this.textContent = 'Sending...';

    //     const formData = new FormData();
    //     formData.append('user_id', userId);

    //     fetch('login.php', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => {
    //         if(!response.ok){
    //             throw new Error(`HTTP error! Status: ${response.status}`);
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         if(data.success){
    //             alert(data.success);
    //             this.textContent = 'Email Sent';
    //         }else{
    //             alert('Failed to send Email: ' + data.message);
    //             this.textContent = 'Verify';
    //         }
    //     })
    //     .catch(error => {
    //         alert('An Unexpexted Error occurred: ' + error.message);
    //         this.textContent = 'Verify';
    //     })
    //     .finally(() => {
    //         if(this.textContent !== 'Email Sent'){
    //             this.disabled = false;
    //         }
    //     });
    // };
        
    </script>

</html>
