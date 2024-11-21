<?php
require_once("class.phpmailer.php");

if ($_POST['action'] == "forcoment"):
    // $usermail = User::get_UseremailAddress_byId(1);
	$usermail = 'norlingresort@mail.com.np';
    // $ccusermail = User::field_by_id(1, 'optional_email');
    // $sitename = Config::getField('sitename', true);

    foreach ($_POST as $key => $val) {
        $$key = $val;
    }
    $body = '
	<table width="100%" border="0" cellpadding="0" style="font:12px Arial, serif;color:#222;">
	  <tr>
		<td><p>Dear Sir,</p>
		</td>
	  </tr>
	  <tr>
		<td><p><span style="color:#0065B3; font-size:14px; font-weight:bold">Comment message</span><br />
		  The details provided are:</p>
		  <p><strong>Full Name</strong> : ' . $name . ' ' . $lastname . '<br />
		  <strong>E-mail Address</strong>: ' . $email . '<br />
		  <strong>Contact No.</strong>: ' . $phone . '<br />
		  <strong>Message</strong>: ' . $message . '<br />
		  </p>
		</td>
	  </tr>
	  <tr>
		<td><p>&nbsp;</p>
		<p>Thank you,<br />
		' . $name . '
		</p></td>
	  </tr>
	</table>
	';

    /*
    * mail info
    */

    $mail = new PHPMailer(); // defaults to using php "mail()"

    $mail->SetFrom($email, $name);
    $mail->AddReplyTo($email, $name);

    $mail->AddAddress($usermail, $sitename);
    // if add extra email address on back end
    if (!empty($ccusermail)) {
        $rec = explode(';', $ccusermail);
        if ($rec) {
            foreach ($rec as $row) {
                $mail->AddBCC($row, $sitename);
            }
        }
    }

    $mail->Subject = 'Enquiry mail from ' . $name;

    $mail->MsgHTML($body);

    if (!$mail->Send()) {
        echo json_encode(array("action" => "unsuccess", "message" => "We could not sent your request at the time. Please try again later."));
    } else {
        echo json_encode(array("action" => "success", "message" => "Your request has been successfully received, You will be shortly informed through mail with you verified by admin."));
    }
endif;

if ($_POST['action'] == "forpkg"):
    // $usermail = User::get_UseremailAddress_byId(1);
//	$usermail = 'swarna@longtail.info';
    // $ccusermail = User::field_by_id(1, 'optional_email');
    // $sitename = Config::getField('sitename', true);

    foreach ($_POST as $key => $val) {
        $$key = $val;
    }
    $body = '
	<table width="100%" border="0" cellpadding="0" style="font:12px Arial, serif;color:#222;">
	  <tr>
		<td><p>Dear Sir,</p>
		</td>
	  </tr>
	  <tr>
		<td><p><span style="color:#0065B3; font-size:14px; font-weight:bold">Enquiry message</span><br />
		  The details provided are:</p>
		  <p><strong>Fullname</strong> : ' . $name . '<br />
		  <strong>E-mail Address</strong>: ' . $email . '<br />
		  <strong>Contact No.</strong>: ' . $contact . '<br />
		  <strong>Hall Name:</strong>: ' . $event . '<br />
		  <strong>Event Date:</strong>: ' . $date . '<br />
		  <strong>Event Pax:</strong>: ' . $pax . '<br />
		  <strong>Message</strong>: ' . $message . '<br />
		  </p>
		</td>
	  </tr>
	  <tr>
		<td><p>&nbsp;</p>
		<p>Thank you,<br />
		' . $name . '
		</p></td>
	  </tr>
	</table>
	';

    /*
    * mail info
    */

    $mail = new PHPMailer(); // defaults to using php "mail()"

    $mail->SetFrom($email, $name);
    $mail->AddReplyTo($email, $name);

    $mail->AddAddress($usermail, $sitename);
    // if add extra email address on back end
    if (!empty($ccusermail)) {
        $rec = explode(';', $ccusermail);
        if ($rec) {
            foreach ($rec as $row) {
                $mail->AddBCC($row, $sitename);
            }
        }
    }

    $mail->Subject = 'Enquiry mail from ' . $name . ' for ' . $event;

    $mail->MsgHTML($body);

    if (!$mail->Send()) {
        echo json_encode(array("action" => "unsuccess", "message" => "We could not sent your request at the time. Please try again later."));
    } else {
        echo json_encode(array("action" => "success", "message" => "Your request has been successfully received, You will be shortly informed through mail with you verified by admin."));
    }
endif;
?>