<?php
class CSV{
    static function export($dataa,$filename){
        $date = date("Y-m-d");
   
           header("Content-Type: application/vnd.msword");
           header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
            header("content-disposition: attachment;filename=sampleword.doc");
       $i=0;
       foreach($dataa as $v){
              if($i==0){
                echo '"'.implode('";"',array_keys($v)).'"'."\n";
              }
              echo '"'.implode('";"',$v).'"'."\n";
           $i++;

       }
    }
}


?>