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
        if (isset($_GET['n'])){
        //if (isset($_POST['n'])){
            //$n = (int) $_POST['n'];
            $n = $_GET['n'];
            obtenercifras($n);
        }else{
            echo "Número incorrecto.";
        }
    
        function obtenercifras($n){
            echo "Número a convertir: ";
            echo number_format($n, 3, ',');
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

            echo "<br> Unidad: ".($unidad);             //1
            echo "<br> Decena: ".($decena);             //10
            echo "<br> Centena: ".($centena);           //100
            echo "<br> Unidad de millar: ".($umillar);  //1000
            echo "<br> Decena de millar: ".($dmillar);  //10000
            echo "<br> Centena de millar: ".($cmillar); //100000
            echo "<br> Unidad de millón: ".($umillon);  //1000000

            echo "<br> Decena de millón: ".($dmillon);  //10,000,000  - 99,000,000
            echo "<br> Centena de millón: ".($cmillon); //100,000,000 - 999,999,999
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
    ?>
</body>
</html> 
