<?php 
$hora='Actualización exitosa del servidor a las '.getdate()['hours'].':'.getdate()['minutes'].':'.getdate()['seconds'];
$payload = json_decode($_POST['payload']);

echo $hora;

if($payload->ref && $payload->ref=='refs/heads/master'){
	$file = fopen("log.txt", "a");
	fwrite($file, $hora . PHP_EOL);
	fclose($file);
	shell_exec('./pull_rep.sh');
}
?>