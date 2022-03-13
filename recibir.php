<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 06</title>
</head>
<body>  
    <h3>Practica 06: Número a letras</h3>
    <?php
        //if (isset($_GET['n'])){
        if (isset($_POST['n'])){
            $n = (int) $_POST['n'];
            //$n = $_GET['n'];
            if($n > 999999999){
                echo "Número muy gande, hasta 999,999,999";       
            }else{
                obtenercifras($n);
            }
        }else{
            echo "Número incorrecto.";
        }
    
        function obtenercifras($n){
            echo "Número a convertir: ";
            echo $n;
            echo "<br>";
            $unidad =(int)($n % 10);
            $decena =(int)(($n % 100 - $unidad) / 10);
            $centena=(int)(($n % 1000 - $unidad - $decena) / 100);
            $umillar=(int)(($n % 10000 - $unidad - $decena -$centena) / 1000);
            $dmillar=(int)(($n % 100000 - $unidad - $decena -$centena -$umillar) / 10000);
            $cmillar=(int)(($n % 1000000 - $unidad - $decena -$centena -$umillar - $dmillar) / 100000);
            $umillon=(int)(($n % 10000000 - $unidad - $decena -$centena -$umillar - $dmillar -$cmillar) / 1000000);
            $dmillon=(int)(($n % 100000000 - $unidad - $decena -$centena -$umillar - $dmillar -$cmillar - $umillon) / 10000000);
            $cmillon=(int)(($n % 1000000000 - $unidad - $decena -$centena -$umillar - $dmillar -$cmillar - $umillon - $dmillon) / 100000000);

            //echo "<br> Unidad: ".($unidad);             //1
            //echo "<br> Decena: ".($decena);             //10
            //echo "<br> Centena: ".($centena);           //100
            
            //echo "<br> Unidad de millar: ".($umillar);  //1000
            //echo "<br> Decena de millar: ".($dmillar);  //10000
            //echo "<br> Centena de millar: ".($cmillar); //100000
            
            //echo "<br> Unidad de millón: ".($umillon);  //1000000
            //echo "<br> Decena de millón: ".($dmillon);  //10,000,000  - 99,000,000
            //echo "<br> Centena de millón: ".($cmillon); //100,000,000 - 999,999,999
            echo "<br>";
            echo "<br>";
            numerosaletras($unidad, $decena,$centena,$umillar,$dmillar,$cmillar,$umillon,$dmillon,$cmillon);
        }
        function numerosaletras ($unidad, $decena,$centena,$umillar,$dmillar,$cmillar,$umillon,$dmillon,$cmillon){
            $cadena="";
            if ($unidad == 0 &&
            $decena == 0 &&
            $centena == 0 &&
            $umillar == 0 &&
            $dmillar == 0 &&
            $cmillar == 0 && 
            $umillon == 0 && 
            $dmillon == 0 &&
            $cmillon == 0){
                echo "CERO";
            }else{
                //millones
                if($cmillon != 0 || $dmillon != 0 || $umillon != 0){
                    if ($cmillon == 1){
                        if($dmillon == 0 && $umillon ==0 ){
                            $cadena.="CIEN";
                        }else{
                            $cadena.="CIENTO ";
                            if($dmillon==1){
                                $cadena.=esp($umillon);
                            }else if ($dmillon==2){
                                $cadena.=esp2($umillon);
                            }
                            else{
                                if($dmillon==0 || $umillon==0){
                                    $cadena.=imprimirdecenas($dmillon)." ".imprimirunidades($umillon);
                                }else{
                                    $cadena.=imprimirdecenas($dmillon)." Y ".imprimirunidades($umillon);     
                                }
                                
                            }
                        }
                    }else{
                        $cadena.=imprimircentenas($cmillon);
                            if($dmillon==1){
                                $cadena.='&nbsp;'.esp($umillon);
                            }else if ($dmillon==2){
                                $cadena.='&nbsp;'.esp2($umillon);
                            }
                            else{
                                if($dmillon==0 || $umillon==0){
                                    $cadena.='&nbsp;'.imprimirdecenas($dmillon)." ".imprimirunidades($umillon);
                                }else{
                                    $cadena.='&nbsp;'.imprimirdecenas($dmillon)." Y ".imprimirunidades($umillon);     
                                }
                        }
                    }
                    $cadena.=" MILLONES ";
                }
                //echo $cadena;
                //miles
                if($cmillar != 0 || $dmillar != 0 || $umillar != 0){
                    if ($cmillar == 1){
                        if($dmillar == 0 && $umillar ==0 ){
                            $cadena.="CIEN ";
                        }else{
                            $cadena.="CIENTO ";
                            if($dmillar==1){
                                $cadena.=esp($umillar);
                            }else if ($dmillar==2){
                                $cadena.=esp2($umillar);
                            }
                            else{
                                if($dmillar==0 || $umillar==0){
                                    $cadena.=imprimirdecenas($dmillar)." ".imprimirunidades($umillar);
                                }else{
                                    $cadena.=imprimirdecenas($dmillar)." Y ".imprimirunidades($umillar);     
                                }
                                
                            }
                        }
                    }else{
                        $cadena.=imprimircentenas($cmillar);
                            if($dmillar==1){
                                $cadena.='&nbsp;'.esp($umillar);
                            }else if ($dmillar==2){
                                $cadena.='&nbsp;'.esp2($umillar);
                            }else{
                                if($dmillar==0 || $umillar==0){     
                                    if($umillar==1){
                                        $cadena.="";
                                    }else{
                                        $cadena.='&nbsp;'.imprimirdecenas($dmillar)." ".imprimirunidades($umillar);
                                    }
                                }else{
                                    $cadena.='&nbsp;'.imprimirdecenas($dmillar)." Y ".imprimirunidades($umillar);     
                                }
                        }
                    }
                    $cadena.=" MIL ";

                }
                //centenas
                if($centena != 0 || $decena != 0 || $unidad != 0){
                    if ($centena == 1){
                        if($decena == 0 && $unidad ==0 ){
                            $cadena.="CIEN ";
                        }else{
                            $cadena.="CIENTO ";
                            if($decena==1){
                                $cadena.=esp($unidad);
                            }else if ($decena==2){
                                $cadena.=esp2($unidad);
                            }else{
                                if($decena==0 || $unidad==0){
                                    $cadena.=imprimirdecenas($decena)." ".imprimirunidades($unidad);
                                }else{
                                    $cadena.=imprimirdecenas($decena)." Y ".imprimirunidades($unidad);     
                                }
                                
                            }
                        }
                    }else{
                        $cadena.=imprimircentenas($centena);
                            if($decena==1){
                                $cadena.='&nbsp;'.esp($unidad);
                            }else if ($decena==2){
                                $cadena.='&nbsp;'.esp2($unidad);
                            }else{
                                if($decena==0 || $unidad==0){
                                    $cadena.='&nbsp;'.imprimirdecenas($decena)." ".imprimirunidades($unidad);
                                }else{
                                    $cadena.='&nbsp;'.imprimirdecenas($decena)." Y ".imprimirunidades($unidad);     
                                }
                        }
                    }
                    $cadena.=" ";

                }
                $cadena = str_replace('  ', ' ', $cadena);
                echo $cadena;
            }
        }
        function imprimircentenas($numero){
            switch($numero){
                case 1:
                    return "CIENTO";
                case 2:
                    return "DOSCIENTOS";
                case 3:
                    return "TRESCIENTOS";
                case 4:
                    return "CUATROCIENTOS";    
                case 5:
                    return "QUINIENTOS";
                case 6:
                    return "SEISCIENTOS";
                case 7:
                    return "SETECIENTOS ";
                case 8:
                    return "OCHOCIENTOS";   
                case 9:
                    return "NOVECIENTOS";                                 
            }
        }
        function imprimirdecenas($numero){
            switch($numero){
                case 1:
                    return "DIEZ";
                case 2:
                    return "VEINTE";
                case 3:
                    return "TREINTA";
                case 4:
                    return "CUARENTA";    
                case 5:
                    return "CICUENTA";
                case 6:
                    return "SESENTA";
                case 7:
                    return "SETENTA";
                case 8:
                    return "OCHENTA";   
                case 9:
                    return "NOVENTA";                                 
            }
        }
        function imprimirunidades($numero){
            switch($numero){
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";    
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";   
                case 9:
                    return "NUEVE";                                 
            }
        }
        function esp($numero){
            switch($numero){
                case 0:
                    return "DIEZ";
                case 1:
                    return "ONCE";
                case 2:
                    return "DOCE";
                case 3:
                    return "TRECE";
                case 4:
                    return "CATORCE";    
                case 5:
                    return "QUINCE";
                case 6:
                    return "DIECISEIS";
                case 7:
                    return "DIECISIETE";
                case 8:
                    return "DIECIOCHO";   
                case 9:
                    return "DIECINUEVE";                                 
            }
        }    
        function esp2($numero){
            switch($numero){
                case 0:
                    return "VEINTE";
                case 1:
                    return "VEINTIUNO";
                case 2:
                    return "VEINTIDOS";
                case 3:
                    return "VEINTITRES";
                case 4:
                    return "VEINTICUATRO";    
                case 5:
                    return "VEINTICINCO";
                case 6:
                    return "VEINTISEIS";
                case 7:
                    return "VEINTISIETE";
                case 8:
                    return "VEINTIOCHO";   
                case 9:
                    return "VEINTINUEVE";                                 
            }
        }     
    ?>
</body>
</html> 
