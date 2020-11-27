<?php 
        $to = "gpymeswebsite@gmail.com";
        $from = $_POST['cf_email'];
        $name = $_POST['cf_name'];
        $subject = "G-PYMES | Contacto -> ".$name;
        $message ="Mensaje de Contacto "."\n\n"." Persona : " . $name ."\n"."
                    Escribió lo siguiente: "."\n".$_POST['cf_message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        $mail_status = mail($to,$subject,$message,$headers);

    if ($mail_status) { ?>
    <script language="javascript" type="text/javascript">
        // Print a message
        alert('Gracias por contactarnos, te escribimos pronto');
        // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
        window.location = 'index.php';
    </script>
    <?php
    }
    else { ?>
    <script language="javascript" type="text/javascript">

        alert('Mensaje fallido, por favor envíe un email al correo artunduagajhoan2@gmail.com');
        window.location = 'index.php';
    </script>
    <?php
}?>
