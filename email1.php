<?php
if(isset($_POST['comentario'])){
    global
    $to = "trogolucas@gmail.com"; // this is your Email address
    $from = "troodita@gmail.com"; // this is the sender's Email address
    $subject = "Form submission";
    $name=$sql=$pdo0->mysqli_query("SELECT id_usuario FROM usuario WHERE nome = :n");
    $result = mysqli_fetch_array($name);
    $subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['comentario'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $nome . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }
?>