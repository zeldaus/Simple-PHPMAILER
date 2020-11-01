<div class="myform">
	<h2>
		Simple-Mailer
	</h2>
	<form method="post" name="f1">
		<p>
			<input id="from" name="from" size="20" type="text" placeholder="Votre Email" />
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input id="name" name="name" size="20" type="text" placeholder="Votre Nom" />
			<br />
			<br />
			<input id="dec" name="dec" size="20" type="text" placeholder="reply-to" />
		</p>
		<p>
			<input id="subject" name="subject" size="20" type="text" placeholder="Sujet" />
			<br />
			<br />
			<textarea id="letter" cols="20" name="letter" rows="12" placeholder="code HTML (Letter)">
			</textarea>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
			<textarea id="mlist" cols="20" name="emails" rows="12" placeholder="Maillist">
			</textarea>
		</p>
		<p>
			&nbsp;
			<input class="button" name="post" type="submit" value="Spammer !" />
		</p>
	</form>
</div>
<?php 
if (isset($_POST['post']))
{
$from = $_POST['from'];
$subject = $_POST['subject'];
$name = $_POST['name'];
$letter = $_POST['letter'];
$dec = $_POST['dec'];
$headers = "From: $name <$from>" . "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$mails = $_POST['emails'];
$usr=explode("\n",$_POST['emails']);
array_unshift($usr,"");unset($usr[0]);
foreach($usr as $key => $user)
{
    $too = $user;
    mail($too,$subject,$letter,$headers);
    print "<div class='alert alert-success' role='alert'> <strong>".$key."...... </strong><b>".$too." - Spammed ! </b> </div><br>";
}
}
?>
