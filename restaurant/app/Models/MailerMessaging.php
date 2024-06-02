<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailerMessaging extends Model
{
    use HasFactory;//sendMail

    static function sendMail($mail,$name,$subject, $msgtxt)
    {
        
        $msg =  MailerMessaging::FormatRamahMsg($name,$subject,$msgtxt);
        $error = MailerMessaging::confidMail($mail, $subject, $msg);
        return $error;
    }

    static function confidMail($to, $subject, $texte) 
    {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            
            $mail->Host = env('MAIL_HOST');
            $mail->Port = env('MAIL_PORT');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');

            
            // Destinataire
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($to);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $texte;

            // Envoi de l'email
            $mail->send();
            return 'Email envoyé avec succès';
        } catch (Exception $e) {
            return 'Erreur lors de l\'envoi de l\'email : '. $mail->ErrorInfo;
        }
    }

    static function FormatRamahMsg($des,$subject,$msgtext)
    {
        return  '
                 <!DOCTYPE html >
                 <html >
                     <head>
                         <meta http-equiv=Content-Type content=text/html; charset=utf-8 />
                         <title> '.$subject.' </title>
                     </head>
                     <body yahoo bgcolor="#f6f8f1" style="background: rgba(220,220,220, 0.8); height: auto; font-family: \'Segoe UI\', sans-serif;" >
                         <div class=" container pt-5 m-auto" style="width:65%;margin-top: 5%;background-color: white; 
                                         margin: auto;background-color: rgba(255, 255, 255, 0.8)">
                             <div class="card-header " style="background-color: #008139;
                                         margin-bottom: 0;border-bottom: 1px solid rgba(0,0,0,.125);height: 10px">
                                 <div class=" " >
                                 </div>
                             </div>
                         
                             <div class="card bg-white pt-5 pb-1 pr-5 pl-5 shadow" style="padding: 3%; ">
                                 <h2 class="display-3 zoom mr-3 text-black-50" style="color: rgba(0,0,0,.5) !important; 
                                 font-size: 2.5rem;font-weight: 300;line-height: 1.2;"> WKSM - RAHMAH </h2>
                                 <div class="pt-5 h5" style="font-size: 1.25rem; ">
                                     Bonjour '.$des.',  <br><br>
                                 </div>
                                     <p>
                                          '.$subject.' <br><br>
                                         '.$msgtext.' 
                                     </p>
                                     L\'équipe WKSM,
                                 <div class="mt-5" style="margin-top: 3% ">
                                 </div>
                                 
                             </div>
 
                             <div class="card-footer bg-white d-flex" style="margin-left: 3%">
                                 <p class="" >
                                    '.env('APP_NAME').', Dakar  |  
                                 </p>
                             </div>
                       
                         </div>
                     
                     </body>
                 </html>
             ';
 
        
       
    }
}
