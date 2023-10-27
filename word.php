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
    $fileName = "composant-data_" . date('Y-m-d') . ".doc"; 
    // Column names 
    $fields = array('id','nom', 'composant', 'qte'); 
// Display column names as first row 
    $excelData = implode("\t", array_values($fields)) . "\n"; 
    $stmt = $conn->prepare(
        "SELECT * FROM compoetud  ORDER BY id DESC;");
    $stmt->execute();
    $results = $stmt->fetchAll();
    
    foreach($results as $row)
    {
        $lineData = array($row['id'], $row['nom'], $row['composant'], $row['qte']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
     
        
        
        // Headers for download 
        header("Content-Type: application/vnd.msword");
           header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
            header("content-disposition: attachment;filename=sampleword.doc");
 
        // Render excel data 
        echo $excelData; 
      
        
    

   
   

 ?>