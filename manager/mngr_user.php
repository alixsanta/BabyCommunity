<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;
    


    class ManagerUtilisateur extends Utilisateur {

        public function createUser(object $bdd):void{
            try{
                $nom = $this->getNomUtil();
                $prenom = $this->getPrenomUtil();
                $mail = $this->getMailUtil();
                $mdp = $this->getMdpUtil();
                $droit = $this->getIdRole();
                // $token = $this->getTokenUtil();
                $req = $bdd->prepare('INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util, token_util, id_droit) 
                VALUES(?, ?, ?, ?, ?, ?);');
                $req->bindparam(1, $nom, PDO::PARAM_STR);
                $req->bindparam(2, $prenom, PDO::PARAM_STR);
                $req->bindparam(3, $mail, PDO::PARAM_STR);
                $req->bindparam(4, $mdp, PDO::PARAM_STR);
                $req->bindparam(5, $token, PDO::PARAM_STR);
                $req->bindparam(6, $droit, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        // récupere les informations de l'utilisateur par son e-mail
        public function getUserByEmail(object $bdd){
            try{
                $mail = $this->getMailUtil();
                $req = $bdd->prepare('SELECT id_util, nom_util, prenom_util, mail_util, mdp_util, token_util, valide_util, id_droit 
                FROM utilisateur
                WHERE mail_util = ?;');
                $req->bindparam(1, $mail, PDO::PARAM_STR);
                $req->execute();
                return $req->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        // permet d'envoyer un mail depuis un compte outlook
        public function sendMail(?string $userMail, ?string $subject, ?string $message, string $email_smtp, string $mdp_smtp){
            // Load Composer's autoloader
            require 'vendor/autoload.php';

            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try{
                // Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.office365.com';                   // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $email_smtp;                            // SMTP username
                $mail->Password   = $mdp_smtp;                              // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable implicit TLS encryption
                $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                // Recipients
                $mail->setFrom($email_smtp, 'Hafarou-dine Ousseni');
                $mail->addAddress($userMail);                               // Add a recipient
                // $mail->addAddress('ellen@example.com');                  // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo '<div>Message has been sent</div>';
            }
            catch(Exception $e){
                echo "<div>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
            }
        }

        /**
         * Fonction qui recupére un utilisateur par son token
         */
        public function getUserByToken(object $bdd){
            try{
                $token = $this->getTokenUtil();
                $req = $bdd->prepare('SELECT id_util, name_util, first_name_util, mail_util, pwd_util, token_util, valide_util, id_role 
                FROM utilisateur
                WHERE token_util = ?;');
                $req->bindparam(1, $token, PDO::PARAM_STR);
                $req->execute();
                return $req->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }


        // Fonction d'activation de compte
        public function activateUser(object $bdd):void{
            try{
                $token = $this->getTokenUtil();
                $req = $bdd->prepare('UPDATE utilisateur
                SET valide_util = 1
                WHERE token_util = ?;');
                $req->bindparam(1, $token, PDO::PARAM_STR); 
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

    }

    // fonctin transférée du model
    function getUserByMail($bdd, $mail){
        try{
            $req = $bdd->prepare('SELECT login_user FROM utilisateurs 
            WHERE mail_user=:mail_user');
            $req->execute(array(
                'mail_user' =>$mail,
                ));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data[0]['mail_user'];
        }
        catch(Exception $e){                
            die('Erreur : '.$e->getMessage());
        }
    }
?>