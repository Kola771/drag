<?php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche les jours du mois                                                                                     
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=937
    Date édition     : 15 Fév 2019                                                                                        
    Date mise à jour : 11 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
    - correction du code                                                                                                  
    - amélioration du code                                                                                               
    - modification de la description                                                                                      
*/
/*---------------------------------------------------------------*/

 function aff_mois($mois , $annee){
 // parametres de couleur du tableau 
  $tbl_color = '#CCCCCC' ; 
  $dat_color = '#E0E0FF' ; 
  
  $first = getdate(mktime(0, 0, 0, $mois, 1, $annee)) ; 
// retourne la date du 1er jour du mois
  $ind = ($first['wday']==0?6:$first['wday']-1) ;
// retourne le numéro d'ordre 1er jour du mois
  $nbjours = date("t", mktime(0, 0, 0, $mois, 1, $annee)) ; 
// retourne le nombre de jours du mois
  
  // initialisation a blanc du tableau array_mois 
  for($i=0; $i<7; $i++) { 
  for($j=0; $j<7; $j++) { 
  $array_mois[$i][$j]=" " ; 
  } 
  } 
  
  // On rempli le tableau array_mois avec les valeurs 
  $array_mois[0] = array('Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim') ; 
  $numweek=1 ; 
  for($numjour=1;$numjour<=$nbjours;$numjour++) { 
  $array_mois[$numweek][$ind]=$numjour ; 
  $ind++ ; 
  if($ind==7) { 
  $numweek++; $ind=0 ; 
  } 
  } 
  
  // Nom du Mois en Français 
  switch($mois) { 
  case 1 : $nom_fr = "Janvier" ; break ; 
  case 2 : $nom_fr = "Fevrier" ; break ; 
  case 3 : $nom_fr = "Mars" ; break ; 
  case 4 : $nom_fr = "Avril" ; break ; 
  case 5 : $nom_fr = "Mai" ; break ; 
  case 6 : $nom_fr = "Juin" ; break ; 
  case 7 : $nom_fr = "Juillet" ; break ; 
  case 8 : $nom_fr = "Aout" ; break ; 
  case 9 : $nom_fr = "Septembre" ; break ; 
  case 10 : $nom_fr = "Octobre" ; break ; 
  case 11 : $nom_fr = "Novembre" ; break ; 
  case 12 : $nom_fr = "Decembre" ; break ; 
  } 
  
  // affichage du tableau 
  echo 
"<table width=175 height=90 cellspacing=0 cellpadding=0 border=1" .
" bgcolor='$tbl_color'>" ;
  echo 
"<tr><td align=\"center\" colspan=7 class='texte10px' bgcolor='$tbl_color'" .
" bordercolor='$tbl_color' >".$nom_fr." ".$annee."</td></tr>" ;
  for($week=0;$week<=6;$week++) { 
  echo "<tr>" ; 
  for($jours=0;$jours<=6;$jours++) { 
  $current = $array_mois[$week][$jours] ; 
  $dateref = date("Y-m-d", mktime(0, 0, 0, $mois, $current, $annee)) ; 
  if ( $current==date("d") && $mois==date("m") && $annee==date("Y") ) {
// Mets le jour courrant en gras 
  $current = "<b>".$current."</b>" ; 
  } 
  echo 
"<td align='center' class='texte10px' width=25 height=15 bgcolor='$dat_color'" .
" bordercolor='$dat_color'>".$current."</td>" ;
  } 
  echo "</tr>" ; 
  } 
  echo "</table>" ; 
}
  error_reporting(0);

  echo aff_mois(04, 2023);
?>
