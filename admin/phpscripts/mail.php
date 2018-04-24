<?php

  function redirect_to($location){
    if($location != NULL){
      header("Location: {$location}");
      exit;
    }
  }


function submitMessage($name, $email, $phone, $message, $direct){
  $to = "jake@jakerutledge.com";
  $subj = "Message from customer submitted via traceygalloway.com";
  $extra = "Reply-To: ".$email;
  $msg = "Name: " .$name. "\n\nEmail: ".$email."\n\nPhone: ".$phone."\n\nComments: ".$message;
  mail($to,$subj,$msg,$extra);
  $direct = $direct. "?name={$name}";
  redirect_to($direct);

}

 ?>
