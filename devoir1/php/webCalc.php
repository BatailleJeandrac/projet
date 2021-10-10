<?php

   $resultat="";
   $a="";


    if(isset($_POST['valider'])){
        if(isset($_POST['operande1']) && isset($_POST['operande2'])){   
            
                $nombre1= $_POST['operande1'];
                $nombre2= $_POST['operande2'];
                $resultat;
                $operateur;
                $a=1;
                $operateurChoice= $_POST['listOperateur'];
                
            
                
                if(!is_numeric($nombre1) || !is_numeric($nombre2)){
                    $a=0;
                    $resultat="Vous devez rentrer des chiffre!";
                    $operateur="";
                     if(empty($nombre1) || empty($nombre2)){
                         $resultat="vous devez remplir les champs!";
                     }
                }else{
            
                    switch($operateurChoice){
                        case 'addition':
                            $operateur="+";
                            $resultat= $nombre1+$nombre2;
                        break;
                
                        case 'soustraction':
                            $operateur="-";
                            $resultat= $nombre1-$nombre2;
                        break;
                
                        case 'multiplication':
                            $operateur="x";
                            $resultat= $nombre1*$nombre2;
                        break;
                        case 'division':
                            $operateur="/";
                            if($nombre2==0){
                            $resultat= "Infini";
                            }
                            else{
                                $resultat= $nombre1/$nombre2;
                            }
                    
                    }
               
            
        }
    }

} 
?>

<html lang="en" dir="ltr">
  <head>    
    <meta charset="utf-8">
    <title>Calculatrice</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie-edge"/>
    <link rel="stylesheet" href="../Css/calculate.css"/>
  </head>
  <body>

  <center> <h1 class="text2">web Calculator</h1></center>
        
        <div class="calculateBox">
            <div class="box">
                <form method="post" action="../php/webCalc.php">
                    <div class="form-element">
                        <label for="op1">Entrez la premiere operande : </label>
                        <input type="number" name="operande1" id="op1" required>
                    </div>
                
                    <div class="form-element">
                        <label for="operateur">Choississez l'operateur : </label>
                        <select id="operateur" name="listOperateur">
                            <option value="addition" <?php if(isset($operateurChoice) && $operateurChoice=="addition") echo "selected";?>>+</option>
                            <option value="soustraction" <?php if(isset($operateurChoice) && $operateurChoice=="soustraction") echo "selected";?>>-</option>
                            <option value="multiplication" <?php if(isset($operateurChoice) && $operateurChoice=="multiplication") echo "selected"?>>*</option>
                            <option value="division" <?php if(isset($operateurChoice) && $operateurChoice=="division") echo "selected"?>>/</option>
                        </select>
                    </div>
                
                    <div class="form-element">
                        <label for="op2">Entrez la seconde operande : </label>
                        <input type="number" name="operande2" id="op2">   
                    </div>
                
                    <div class="form-button">
                        <input type="submit" name="valider" value="Calculer"/>
                        <input type="reset" name="reset" value="Effacer" required/>
                    </div>
                
                </form>
                <div class="result">
                    <p style="font-size: 0.7em;">
                        <?php
                            $var='Le Resultat est : ';
                        if(($resultat) && $nombre2==0 && $operateur=='/' || $a==0)
                            echo $resultat;        
                        else
                            echo $var .' '.$resultat;
                        ?>
                    </p>    
                </div>
            </div>
        </div>
     
  </body>
</html>

