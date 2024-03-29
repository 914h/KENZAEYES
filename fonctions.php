<?php
function redirection($url)
{
	if (headers_sent())
		print('<meta http-equiv="refresh" content="0;URL='.$url.'">');
	else 
		header("Location: $url");
}
function fct_prenom($prenom)
{
	$prenom = strtoupper(substr($prenom, 0, 1)).strtolower(substr($prenom,1,strlen($prenom)-1));
	return($prenom);
}
function moncrypte($mdp)
{
	$mon_mdp = "";
	for ($i=0; $i<=strlen($mdp); $i++)
		$mon_mdp .=ord($mdp[$i]);
	
	$mon_mdp.=strlen($mdp);
	return $mon_mdp;
}
?>