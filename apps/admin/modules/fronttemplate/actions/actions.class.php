<?php

/**
 * fronttemplate actions.
 *
 * @package    virtualgym
 * @subpackage fronttemplate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class fronttemplateActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
    $this->data = $this->getuser()->getAttribute('code');
  }
  public function executeTemplatesave()
  {

    $name = $this->getRequestParameter('settypename');
    $type = $this->getRequestParameter('settype');

if($_POST){
    $code = $this->getuser()->getAttribute('code');

    switch($type){
      case "text":
        $tmp = "<input type=text name='$name'>";
        break;
      case "textarea":
        $tmp = "<textarea cols=50 rows=5 name='$name'></textarea>";
        break;
      case "label":
        $tmp = "<div>$name</div>";
        break;
      case "radio":
        $tmp = "<input type=radio name='$name' value='$name'>";
        break;
    }

    if($code != "")
      $tmp .= $code;

    $this->getuser()->setAttribute('code', $tmp);
    $this->data = " $tmp ";

    return $this->setTemplate('index');

}





  }


}
