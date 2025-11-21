<?php
function boot(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
}

function dumpObjectStructure($obj){
    if(is_object($obj)){
        echo 'ESTRUCTURA OBJETO';
        $rco = new ReflectionClass($obj);
        $structure = [
            'atributos' => $rco->getProperties(),
            'metodos' => $rco->getMethods()
        ];
        echo '<pre>'.print_r($structure,true).'</pre>';
    }else{
        echo "La variable no es un objeto";
    }
}
function dump($var){
    echo '<pre>'.print_r($var,true).'</pre>';
}

function clearFileContent($ruta){
    $fhandler = fopen($ruta, 'w');
    fclose($fhandler);
}

function getDataFromCSV($ruta, $campoId = ''){
    $data = array();
    if($handler = fopen($ruta, 'r')){
        $cabeceras = fgetcsv($handler, 1000, ",");
        if(!empty($campoId)){
            $campoIndex = array_search($campoId,$cabeceras);
        }else{
            $campoIndex = null;
        }
        while (($lineData = fgetcsv($handler, 1000, ",")) !== FALSE) {
            if(isset($campoIndex)){
                $data[$lineData[$campoIndex]] = array_combine($cabeceras,$lineData);

            }else{
                $data[] = array_combine($cabeceras,$lineData);
            }
        }
        fclose($handler);
        return $data;
    }else{
        return null;
    }
    
}
function putDataInCSV($data, $ruta){ 
    if($handler = fopen($ruta, 'a')){
        $tamanoTotal = 0;
        foreach($data as $rowData){
            $tamano = fputcsv($handler,$rowData);
            if($tamano === FALSE){
                fclose($handler);
                return false;
            }
            $tamanoTotal += $tamano;
        }
        fclose($handler);
        return $tamanoTotal;
    }else{
        return null;
    }
}