<?php

// tar -czf archive.tgz fichier.html
// tar -xzf archive.tgz

if(session_id() == '')
	session_start();

if(get_magic_quotes_gpc()) {
	function strip_array(&$var){
		if(is_array($var))
			foreach($var as $i => $v)
				$var[$i] = strip_array($v);
		else
			$var = stripslashes($var);
		return $var;
	}

	strip_array($_REQUEST);
	strip_array($_POST);
	strip_array($_GET);
	strip_array($_SESSION);
}


function getIsset($var, $default=null, $src='request'){
	$src = '$_'.strtoupper($src).'[\''.$var.'\']';
	eval('$resu = isset('.$src.') ? '.$src.' : $default;');
	return $resu;
}

function pre($var){
	echo '<pre>';
	(!empty($var) && (is_array($var) || is_object($var))) ? print_r($var) : var_dump($var);
	echo '</pre>';
}

exec('tar --help', $resu, $code);
define('use_cmd', $err === 0);
unset($resu, $err);

define('sep', '/');
define('dossier', str_replace(DIRECTORY_SEPARATOR, '/', dirname(__FILE__)));

if(!use_cmd){
	if(ini_get('max_execution_time') !== false)
		ini_set('max_execution_time', '0');

	if(!ini_get('safe_mode'))
		set_time_limit(0);
}

$errs = '';

if($nomArchive = getIsset('telecharger')){
	$nomArchive = key($nomArchive);
	$chemin = dossier.sep.rawurldecode($nomArchive);

    ob_clean();
    flush(); 
	
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream'); 
	header('Content-Disposition: attachment; filename='.str_replace(' ', '_', $nomArchive)); 
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0'); 
	header('Pragma: public'); 
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0, public'); 
	header('Content-Length: '.filesize($chemin)); 
	
	readfile($chemin);
	exit;
}

$cmd = false;

if($nomArchive = getIsset('desarchiver')){
	$nomArchive = rawurldecode(key($nomArchive));
	$cmd = use_cmd ? 'tar -xzf "'.$nomArchive.'"' : array(new PharData($nomArchive), 'extractTo', array());

}
elseif($aArchiver = getIsset('archiver')){
	$aArchiver = rawurldecode(key($aArchiver));
	
	if(use_cmd){
		if($aArchiver == '.'){
			$pfxCmd = 'cd ..;';
			$aArchiver = basename(dossier);
			$nomArchive = dossier.'/'.basename(dossier).'.tgz';
		}else{
			$nomArchive = $aArchiver.'.tgz';
			$pfxCmd = '';
		}
		
		$cmd = $pfxCmd.'tar -czf "'.$nomArchive.'" --exclude="'.basename($nomArchive).'" --exclude="'.basename(__FILE__).'" "'.$aArchiver.'"';
	}else{
		$folder = realpath(dossier.'/'.$aArchiver);
		$full = $aArchiver == '.';
		if($full){
			$aArchiver = basename(dossier);
			$nomArchive = dossier.'/'.basename(dossier).'.tar';
		}else{
			$nomArchive = $aArchiver.'.tar';
		}
		$archive = new PharData($nomArchive);
		$archive->buildFromDirectory($folder);
		// ^((?!hede).)*$
		
		$cmd = array($archive, 'compress', array(Phar::GZ), create_function('', '$f = \''.dossier.'/'.$nomArchive.'\';if(file_exists($f)){chmod($f, 0777);die(unlink($f));;}'));
	}
}

if($cmd){
	$start = microtime(true);
	if(use_cmd){
		exec($cmd.' 2>&1', $resu, $err);
	}else{
		ob_start();
		$resu = call_user_func_array(array($cmd[0], $cmd[1]), $cmd[2]);
		if(isset($cmd[3]) && is_callable($cmd[3]))	call_user_func($cmd[3]);
		$err = ob_get_clean();
		if($resu === false){
			$resu = array($err);
			$err = 1;
		}
	}
	$temps = microtime(true) - $start;

	if(!is_string($cmd))
		$cmd = var_export($cmd, true);
		
	if($err != 0)
		$errs .= $cmd."<br />\n".implode("<br />\n", $resu)."<br />(".$err.")<br />\n";		
	
	

	$errs .= round($temps, 6);
}


$opDir = opendir(dossier);

$lDos = $lFic = array();
while($fichier = readdir($opDir)){
	if($fichier == '..')
		continue;

	$cFic = dossier.sep.$fichier;
	if(is_dir($cFic)){
		$lDos[] = $fichier;
	}elseif(is_file($cFic) && preg_match('#\.(tar|tar\.gz|tgz)#i', $fichier)){
		$lFic[] = $fichier;
	}
}
closedir($opDir);
sort($lDos);
sort($lFic);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TarGz</title>
<style type="text/css">
/* <!-- */
.body{
	margin: 0;
}

table{
	margin: 0 auto;
}

.columns{
	-webkit-columns: 150px;
	-moz-columns: 150px;
	columns: 150px;
}
.libs{
	float: left;
	padding: 0 15px 0 0;
}
.inputs{
}
.libs, .inputs{
	line-height: 30px;
}

.colsFicDir{
    display: inline-block;
    vertical-align: top;
    width: 400px;
}

h2{
	margin: 0 auto 10px;
	border-bottom: 1px solid #000000;
}

form{
	margin: 0 auto;
	width: 800px;
}
/* --> */
</style>
</head>
<body>
<form action="?" method="post">
<h2><?php echo dossier;?></h2>
<?php if($errs):?>
	<p><?php echo $errs;?></p>
<?php endif;?>
	<table border="1" style="width: 100%;">
		<thead><tr><th colspan="2" style="width: 50%;">Dossiers</th><th colspan="3" style="width: 50%;">Fichiers</th></tr></thead>
		<tbody>
<?php
	$max = max(count($lDos), count($lFic));
	for($i = 0; $i < $max; $i++):?>
			<tr>
		<?php foreach(array($lDos, $lFic) as $cptT => $t): ?>
			<?php if(isset($t[$i])): $cle = rawurlencode($t[$i]);?>
				<td><?php echo $t[$i];?></td>
				<td>
				<?php if($cptT == 0):?>
					<input type="submit" name="archiver[<?php echo $cle;?>]" value="archiver" />
				<?php else:?>
					<input type="submit" name="telecharger[<?php echo $cle;?>]" value="télécharger" />
				</td>
				<td>
					<input type="submit" name="desarchiver[<?php echo $cle;?>]" value="désarchiver" />
				<?php endif;?>
				</td>
			<?php elseif(isset($t[$i-1]) || $i == 0):?>
				<td colspan="<?php echo $cptT == 0 ? 2 : 3;?>" rowspan="<?php echo $max - $i;?>">&nbsp;</td>
			<?php endif;?>
		<?php endforeach;?>
			</tr>
		<?php endfor;?>
		</tbody>
	</table>
</form>
</body>
</html>
