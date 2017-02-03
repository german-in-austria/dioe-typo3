<?php

/*
/   lizenzKommerziell - Kommerzielle Nutzungen Ihres Werkes erlauben?
/     nix > Ja
/     -nc > Nein
/   lizenzBearbeiten - Erlauben, dass Bearbeitungen Ihres Werkes geteilt werden?
/     nix > Ja
/     -nd > Nein
/   - sa > Ja, solange andere unter denselben Bedingungen weitergeben
/   > cc-by-lizenzKommerziell-lizenzBearbeiten
*/
class user_funktionen_class {
  var $cObj;    // reference to the calling object.
  function user_lizenz($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    $alizenz = trim($this->cObj->data[0]);
    if(strlen($alizenz)<1) { return ''; }
    if(substr($alizenz,0,5)=='cc-by') {
      $alizenzout = 'by';
      if(strlen(substr($alizenz,6))>0) {
        $alizenzArray = split('-', substr($alizenz,6));
        $alerr = 0; $alizenzoutArray = array();
        foreach ($alizenzArray as $val) {
          switch ($val) {
              case 'nc':
                if(isset($alizenzoutArray[0])) { $alerr = 1; }
                $alizenzoutArray[0]='-nc';
                break;
              case 'nd':
                if(isset($alizenzoutArray[1])) { $alerr = 1; }
                $alizenzoutArray[1]='-nd';
                break;
              case 'sa':
                if(isset($alizenzoutArray[1])) { $alerr = 1; }
                $alizenzoutArray[1]='-sa';
                break;
              default:
                $alerr = 1;
          }
        }
        $alizenzout.=$alizenzoutArray[0].$alizenzoutArray[1];
      }
      if($alerr==0) {
        return '<'.(($conf['bild']||$conf['span'])?'span':'div').' class="'.(($conf['bild'])?'img-add ':'').'lizenz lizenz-cc">'.(($conf['keinlink'])?'':'<a rel="license" href="http://creativecommons.org/licenses/'.$alizenzout.'/4.0/" alt="cc-'.$alizenzout.'" target="_BLANK">').'<img alt="Creative Commons Lizenzvertrag" src="https://i.creativecommons.org/l/'.$alizenzout.'/4.0/'.(($conf['klein'])?'80x15':'88x31').'.png" />'.(($conf['keinlink'])?'':'</a>').'</'.(($conf['bild']||$conf['span'])?'span':'div').'>';
      };
    }
    return '<'.(($conf['bild']||$conf['span'])?'span':'div').' class="lizenz lizenz-text">'.$alizenz.'</'.(($conf['bild']||$conf['span'])?'span':'div').'>';
  }
}

?>
