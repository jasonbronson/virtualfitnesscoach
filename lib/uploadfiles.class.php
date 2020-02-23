<?php


class uploadfiles
{

 public function __construct(){

    $logger = sfLogger::getInstance();
    $logger->log("Uploadfiles Class Called", SF_LOG_DEBUG);

 }

 /**
  * this->files_array -required
  * this->path -required
  */
  public function upload(){

    $logger = sfLogger::getInstance();
    $request = sfContext::getInstance();
    $failed = "false";

  $filepath = sfConfig::get('sf_upload_dir')."/".$this->path;


  foreach($this->files_array as $key => $value){

    //get filename
    $fileName_orig = $request->getRequest()->getFileName($key);

    if($fileName_orig == ""){ //if no file continue to next item
      $logger->log("File $fileName_orig $key $value was blank", SF_LOG_DEBUG);
      continue;
    }

    if($this->case != "original"){
       $fileName = strtolower($fileName_orig);
       $logger->log("Case lowered to $fileName_orig", SF_LOG_DEBUG);
    }else{
      $fileName = strtolower($fileName_orig);
      $logger->log("Original Case untouched $fileName_orig", SF_LOG_DEBUG);
    }

    //$request->getRequest()->moveFile($key, $filepath.$fileName);
    //$logger->log("Move File $key to $filepath$fileName", SF_LOG_DEBUG);

if(move_uploaded_file($_FILES[$key]['tmp_name'], $filepath.$fileName)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).
    " has been uploaded";
} else{
    echo "There was an error uploading the file $key, please try again!".$_FILES[$key]['tmp_name'];
    die();
}


    //$tmp = substr(sprintf('%o', fileperms($filepath.$fileName)), -4);
    //$logger->log($key, SF_LOG_DEBUG);
    //file_put_contents("$filepath$fileName", "test", FILE_APPEND);

    if(file_exists($filepath.$fileName)){
      $logger->log("File $fileName Uploaded Successfully to $filepath", SF_LOG_DEBUG);
    }else{
      $logger->log("File Failed to Upload $filepath$fileName", SF_LOG_DEBUG);
      $failed = "true";
      die();
    }
  }

  return $failed;

  }

  public function removefiles(){

    $logger = sfLogger::getInstance();
    $path = sfConfig::get('sf_upload_dir')."/".$this->path;
    foreach($this->files_array as $key => $value){
      if(unlink($path.$value))
        $logger->log("File Removed $value", SF_LOG_DEBUG);
      else
        $logger->log("File Failed to remove $value", SF_LOG_DEBUG);
    }

  }

}


?>