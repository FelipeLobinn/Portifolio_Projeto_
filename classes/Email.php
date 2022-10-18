<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Email
    {
        function __construct($tipoEmail,$usuarioEmail,$usuarioNome='',$usuarioMensagem='')
        {
            $mail = new PHPMailer();
            
            if($tipoEmail==1){
                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->CharSet    = 'UTF-8';
                    $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = '921c06481307a4';                       //SMTP username
                    $mail->Password   = '07b123def98fed';                       //SMTP password
                    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 2525;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('Sett@gmail.com', 'Sett');
                    $mail->addAddress($usuarioEmail, 'Usuário');     //Add a recipient
                    //$mail->addAddress('ellen@example.com');               //Name is optional
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');

                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Sett quer falar com você!';
                    $mail->Body    = "<h2 style='text-align:center'>Olá, meu querido!</h2><br><p style='text-align:center'><b>Tenha um bom dia!!</b></p>";
                    $mail->AltBody = "Olá, meu querido!\nTenha um bom dia!!";

                    $mail->send();
                    echo '<script>alert("Mensagem Enviada!")</script>';
                } catch (Exception $e) {
                    echo '<script>alert("Erro ao Enviar Mensagem!")</script>';
                }
            }
            elseif($tipoEmail==2){
                try{
                    $mail->isSMTP();                                         
                    $mail->CharSet    = 'UTF-8';
                    $mail->Host       = 'smtp.mailtrap.io';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = '921c06481307a4';
                    $mail->Password   = '07b123def98fed';
                    $mail->Port       = 2525;
                    
                    $mail->setFrom('Sett@gmail.com', 'Sett');
                    $mail->addAddress($usuarioEmail, $usuarioNome);
                    
                    $mail->isHTML(true);
                    $mail->Subject = 'Recebemos sua mensagem!';
                    $mail->Body    = "<body style='text-align:center'><h2>Obrigado por contatar-nos, $usuarioNome!</h2><br><h4>Sua mensagem foi:</h4><br><p>$usuarioMensagem</p></body>";
                    $mail->AltBody = "Obrigado por contatar-nos, $usuarioNome!\nSua mensagem foi:\n$usuarioMensagem";

                    $mail->send();
                } catch (Exception $e) {
                    echo '<script>alert("Erro ao Enviar Mensagem!")</script>';
                }
            }
        }
    }
?>