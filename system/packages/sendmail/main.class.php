<?php

//SendMail class

class sendMail{

  public $name;
  public $phone;
  public $mail;
  public $message;
  public $domain;

  public $errors;
  public $error_description;

  public function __construct(){
    $this->errors = 0;
    $this->error_description = "";
  }

  public function send(){
    $this->escape_atts();
    if(!is_null($this->name)){

      if(!is_null($this->mail)){

        if(!is_null($this->message)){

          $headers = "From: ".$this->name." <sendmail@".$this->domain.">\n";
    			$headers .= "X-Sender: < sendmail@".$this->domain." >\n";
    			$headers .= "X-Priority: 1\n"; // Urgent message!
    			$headers .= "Return-Path: < sendmail@".$this->domain." >\n";  // Return path for errors
    			$headers .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    			$headers .= "Mime-Version: 1.0 \r\n";
    			$headers .= "Content-type: text/html; charset=utf-8\r\n";

          $mensaje = "
            <h3>Mensaje recibido desde ".$this->domain."</h3>
            <hr style='background-color:#ccc; border:none; height:1px;'/>
            <div style='text-align:left; font-size:12px; font-weight:bold; width:auto; padding:10px 20px;'>
              Nombre: ".$this->name."<br/>
              E-mail: ".$this->mail."<br/>
              Telefono: ".$this->phone."
            </div>
            <div>".$this->message."</div>
          ";

          if(mail("contacto@".$this->domain."", "Mensaje enviado desde ".$this->domain."", $mensaje, $headers)){
            $this->error_description = "";
            $this->errors = 0;
            return true;
          }else{
            $this->error_description = "No se pudo conectar con el servidor SMTP.";
            return false;
          }


        }else{$this->errors++; $this->error_description .= "No se especificó el mensaje "; }

      }else{ $this->errors++; $this->error_description .= "No se especificó el correo electrónico del remitente";  }

    }else{ $this->errors++; $this->error_description .= "No se especificó el nombre del remitente. "; }
    return false;
  }

  private function escape_atts(){
    $this->name = htmlspecialchars($this->name);
    $this->mail = htmlspecialchars($this->mail);
    $this->phone = htmlspecialchars($this->phone);
    $this->message = htmlspecialchars($this->message);
  }

}

?>
