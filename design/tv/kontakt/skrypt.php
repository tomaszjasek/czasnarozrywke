<?

$nadawca = $_POST['email'];
$temat = $_POST['temat'];
$adresat = 'biuro@sportstream.pl';


@$email = $_POST['email'];
@$content = $_POST['content'];
$header =  "From: $nadawca \nContent-Type:".' text/plain;charset="iso-8859-2"'."\nContent-Transfer-Encoding: 8bit";

if (mail($adresat, $temat, $content, $header))
echo '<p><b>$adresat </b> dzia³a</p>';

else
 echo '<p><b>$adresat[x] NIE</b> wys³ano maila!</p>';
?>
