<?php

class emaill
{
  public $message, $subject, $mailto;

    function  __construct($to,$subjct,$mail_Content)
    {
	   $this->subject = $subjct;
	   $this->message = $mail_Content;
	   $this->mailto = $to;
	}

    function sendmail()
    {
		$success = mail($this->mailto, $this->subject, $this->message);
		if (!$success)
		{
    		$errorMessage = error_get_last()['message'];
		}
    }
}
?>
