<?

$nadawca = $_POST['email'];
$temat = $_POST['temat'];
$adresat = 'biuro@sportstream.pl';


@$email = $_POST['email'];
@$content = $_POST['content'];
$header =  "From: $nadawca \nContent-Type:".' text/plain;charset="iso-8859-2"'."\nContent-Transfer-Encoding: 8bit";

if (mail($adresat, $temat, $content, $header))
echo '<p>Twoja wiadomos� zosta�a wys�ana</p>';

else
 echo '<p><b>$adresat[x] NIE</b> wys�ano maila!</p>';
?>
