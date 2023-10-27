<?php 
session_start();
include_once('db_conn.php');


  
    // Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
    
    // Excel file name for download 
    $fileName = "composant-data_" . date('Y-m-d') . ".xls"; 
    // Column names 
    $fields = array('id', 'name', 'qte', 'purchase date','statut'); 
// Display column names as first row 
    $excelData = implode("\t", array_values($fields)) . "\n"; 
    $stmt = $conn->prepare(
        "SELECT * FROM composant  ORDER BY id DESC;");
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach($results as $row)
    {
        $lineData = array($row['id'], $row['nom'], $row['qte'], $row['date_achat'],$row['etat']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
     
        
        
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel"); 
        header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
        // Render excel data 
        echo $excelData; 
      
        
    

   
   

 ?>