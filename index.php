<?php 




$cam2="./192.168.1.80_001217d03ccd/";
$dir="/01/pic/";
$alldircam2=$cam2.date("Y-m-d").$dir;
//Camera maison
$pattern = "$alldircam2";
$latest_filename ="";
//Recherche le plus recent dossier
if($dossier = opendir($cam2))
{
    while(false !== ($fichier = readdir($dossier)))
    {
        if(!is_dir($fichier))
        {
             $latest_dir=$fichier;
        }
    }
}

$alldircam2=$cam2.$latest_dir.$dir;
//recherche le plus recent fichier
$pattern = "$alldircam2";
$latest_filename = "";
$aFichier='';

if($dossier = opendir($pattern))
{
    while(false !== ($fichier = readdir($dossier)))
    {
        if(!is_dir($fichier))
            $aFichier[]=$fichier;
    }
}

$latest_filename=max($aFichier);
$img2=$alldircam2.$latest_filename;
echo $img2;
$jardin = imagecreatetruecolor( 960, 540 );
imagecopyresampled($jardin, imagecreatefromjpeg($img2), 0, 0, 0, 0, 960, 540,704,576);
imagejpeg($jardin, "jardin.jpg",100);

//Affichage des images

echo " <br/><br/><img src=\"jardin.jpg\" />";
?>