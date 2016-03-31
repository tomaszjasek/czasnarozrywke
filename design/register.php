<?

$email = $_POST['email'];
$miasto = $_POST['miasto'];
$wojewodztwo = $_POST['wojewodztwo'];


$file = ("tenisisci/$email.txt");
if(file_exists($file)):
echo header("Location: rejestracja.htm");
elseif($haslo != $haslo2):
echo("You typed two different passwords!");
else:
$ciag = "$email $miasto $wojewodztwo";
$zapis = str_replace("$ "," $",$ciag);
$open = fopen("$file", "w+");
fputs($open, $zapis . "\n");
fclose($open);
echo header("Location: rejestracja.htm");
endif;

session_start();
$_SESSION['a']=$login;
?>