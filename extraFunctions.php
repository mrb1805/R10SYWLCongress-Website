<?php
    function sendVerificationLink($name, $to, $verificationID){
        $to = "rahulcomp24@gmail.com";
        $subject = "IEEE Region 10 Student/YP/WIE/LM Congress 2016 - Phase 1 Registration";

        $message = "<p>Dear ".$name."</p>".
                    "<p>Hope this email finds you well.</p><br><br><br>".
                    "<p>Your application for <strong>IEEE Region 10 Student/YP/WIE/LM Congress 2016 - Phase 1 Registration</strong> is successfully submitted. Your reference number is <strong>".$verificationID."</strong>. We will keep notifying you regarding your registration via mail. In case you want to check the status. You can<a href='www.event.com/regstatus.php' target='_blank'> click here </a>to check the status.</p><br><br>".
                    "<p>Best Regards<br><br>".
                    "IEEE R10 Congress Team";

        $header = "From:r10sywlc@ieee.org \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ($to,$subject,$message,$header);

        if( $retval == true ){
            writeToLog("EMail Success",$to);
        }
        else{
            writeToLog("EMail Failed - ALERT - ",$to);
        }
    }

    function writeToLog($type, $content){
      $myfile = "Log6da545.txt";
      date_default_timezone_set("Asia/Kolkata");
      $text = date("Y-m-d h:i:s a", time()) ." - ". $type . " - " . $content . "\n";
      file_put_contents($myfile, $text, FILE_APPEND);
    }
?>
