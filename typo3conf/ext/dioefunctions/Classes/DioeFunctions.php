<?php
namespace Dioevendor\Dioefunctions;

class Functions {
  var $cObj;    // reference to the calling object.

  /*
  /   user_lizenz:
  /   Ersetzt String mit Lizenz
  /   lizenzKommerziell - Kommerzielle Nutzungen Ihres Werkes erlauben?
  /     nix > Ja
  /     -nc > Nein
  /   lizenzBearbeiten - Erlauben, dass Bearbeitungen Ihres Werkes geteilt werden?
  /     nix > Ja
  /     -nd > Nein
  /   - sa > Ja, solange andere unter denselben Bedingungen weitergeben
  /   > cc-by-lizenzKommerziell-lizenzBearbeiten;Name
  */
  public function user_lizenz($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    $alizenz = trim($this->cObj->data[0]);
    if(strlen($alizenz)<1) { return ''; }
    if(substr($alizenz,0,5)=='cc-by') {
      $alizenzout = 'by';
      list($alizenzby, $alizenzname) = explode(';',$alizenz,2);
      if(strlen(substr($alizenzby,6))>0) {
        $alizenzArray = explode('-', substr($alizenzby,6));
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
        return '<'.(($conf['bild']||$conf['span'])?'span':'div').' class="'.(($conf['bild'])?'img-add ':'').'lizenz lizenz-cc'.(($conf['klein'])?' klein':'').'">'.(($conf['keinlink'])?'':'<a rel="license" href="http://creativecommons.org/licenses/'.$alizenzout.'/4.0/" alt="cc-'.$alizenzout.'" target="_BLANK">').'<img alt="Creative Commons Lizenzvertrag" src="https://i.creativecommons.org/l/'.$alizenzout.'/4.0/'.(($conf['klein'])?'80x15':'88x31').'.png" />'.((strlen($alizenzname)>0)?'<span class="ccby"> by '.$alizenzname.'</span>':'').(($conf['keinlink'])?'':'</a>').'</'.(($conf['bild']||$conf['span'])?'span':'div').'>';
      }
    }
    return '<'.(($conf['bild']||$conf['span'])?'span':'div').' class="'.(($conf['bild'])?'img-add ':'').'lizenz lizenz-text'.(($conf['klein'])?' klein':'').'">'.$alizenz.'</'.(($conf['bild']||$conf['span'])?'span':'div').'>';
  }

  /*
  /   user_publikation_authoren:
  /   Gibt die Authoren und Editoren in richtiger Reihenfolge aus
  */
  public function user_publikation_authoren($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    if(isset($this->cObj->data['field'])) {
      $aField = $this->cObj->data['field'];
      $aNurAuthoren = $this->cObj->data['nurAuthoren'];
      $aNurEditoren = $this->cObj->data['nurEditoren'];
    } else {
      $aField = $this->cObj->data;
    }
    $aArt = $aField['art'];
    $aAuthoren = $aField['authorSektion'];
    $lNurAuthoren = array(); $lNurEditoren = array();
    foreach ($aAuthoren as $val) { if($val['authorIsEditor']==1) { $lNurEditoren[] = $val; } else { $lNurAuthoren[] = $val; };};
    if(count($lNurEditoren)) { end($lNurEditoren); $lNurEditoren[key($lNurEditoren)]['isLast'] = 1; }
    if(!empty($lNurEditoren) && !empty($lNurAuthoren)) {
       $aAuthoren = array_merge($lNurAuthoren,$lNurEditoren);
     } else {
       if(!empty($lNurEditoren)) { $aAuthoren = $lNurEditoren; };
       if(!empty($lNurAuthoren)) { $aAuthoren = $lNurAuthoren; };
     }
    $outAuthoren = ''; $adg=0;
    foreach ($aAuthoren as $val) {
      if(!($val['authorIsEditor']==0 && $aNurEditoren) && !($val['authorIsEditor']==1 && $aNurAuthoren)) {
        $outAuthoren.= (($adg>0)?' / ':'').$val['authorNachname'].', '.$val['authorVorname'].(($val['authorIsEditor']&&$val['isLast'])?' (Hg.)':'');
        $adg++;
      }
    }
    return $outAuthoren;
  }

  /*
  /   user_publikation_authoren_bibtex:
  /   Ausgabe der Publikation als bibtex
  */
  public function user_publikation_bibtex($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    $aField = $this->cObj->data;
    $aArt = $this->cObj->data['art'];
    $aArten = array(1=>'article', 2=>'book', 3=>'inbook', 4=>'masterthesis', 5=>'phdthesis', 6=>'unpublished', 7=>'online');
    $aArtenFelder = array(
      1=>array('title','year','month','authorSektion','note','url','doi','volume','number','pages','isbn'),
      2=>array('title','year','month','authorSektion','note','url','doi','volume','number','series','edition','publisher','address','isbn'),
      3=>array('title','year','month','authorSektion','note','url','doi','booktitle','volume','number','series','edition','pages','publisher','address','isbn'),
      4=>array('title','year','month','authorSektion','note','url','doi','school','address'),
      5=>array('title','year','month','authorSektion','note','url','doi','school','address'),
      6=>array('title','year','month','authorSektion','note'),
      7=>array('title','year','month','authorSektion','note','url','doi','urldate'),
    );
    $ignoreFields = array('datum','uebersichtUeberschrift','uebersichtText','kategorien','uebersichtBild','uebersichtBildVerh','art');
    $aAuthoren = $this->cObj->data['authorSektion'];
    $lNurAuthoren = array(); $lNurEditoren = array();
    foreach ($aAuthoren as $val) { if($val['authorIsEditor']==1) { $lNurEditoren[] = $val; } else { $lNurAuthoren[] = $val; };};
    if(!empty($lNurEditoren) && !empty($lNurAuthoren)) { $aAuthoren = array_merge($lNurAuthoren,$lNurEditoren); };
    if(isset($aArtenFelder[$aArt])) {
      foreach ($aField as $key => $val) {
        if(!in_array($key,$aArtenFelder[$aArt])) {
          unset($aField[$key]);
        }
      }
    } else {
      foreach ($ignoreFields as $val) { unset($aField[$val]); };
    }
    $aArtText = $aArten[$aArt];
    if(strlen($aArtText)<1) {$aArtText = 'unknown';};
    $outBibTex = '@'.$aArtText.'{'.hash("md5",multi_implode($aField,',')).",\n";
    foreach ($aField as $key => $val) {
      if(!empty($val)) {
        if($key=='authorSektion') {
          $lAuthorIsEditor = -1; $audg = 0; $audg2 = 0;
          foreach ($aAuthoren as $ukey => $uval) {
            if($lAuthorIsEditor<>$uval['authorIsEditor']) {
              if($audg>0) { $outBibTex.= '"'.",\n"; };
              if($uval['authorIsEditor'] == 0) { $outBibTex.= 'author = "'; };
              if($uval['authorIsEditor'] == 1) { $outBibTex.= 'editor = "'; };
              $lAuthorIsEditor = $uval['authorIsEditor'];
              $audg2 = 0;
            }
            $outBibTex.= (($audg2>0)?' and ':'').'{'.$uval['authorNachname'].'}, {'.$uval['authorVorname'].'}';
            $audg++; $audg2++;
          }
          $outBibTex.= '"'.",\n";
        } else {
          $outBibTex.= $key.' = ';
          if(is_array($val)) {
            $audg = 0;
            foreach ($val as $ukey => $uval) {
              $outBibTex.= (($audg>0)?' AND ':'');
              if(is_array($uval)) {
                $outBibTex.= '{ ';
                $auudg = 0;
                foreach ($uval as $uukey => $uuval) {
                  $outBibTex.= (($auudg>0)?', ':'').$uukey.' = '.((is_numeric($uuval))?'':'{').$uuval.((is_numeric($uuval))?'':'}');
                  $auudg++;
                }
                $outBibTex.= ' }';
              } else {
                $outBibTex.= ((is_numeric($uval))?'':'{').$uval.((is_numeric($uval))?'':'}');
              }
              $audg++;
            }
          } else {
            if($key=='urldate') {
              $outBibTex.= '"'.date("Y.m.d",$val).'"';
						} elseif($key=='year') {
							$yearArray = [];
							$yearArray[0] = '"in planning"';
							$yearArray[1] = '"in print"';
							$yearArray[2] = '"submitted"';
							$yearArray[3] = '"in preparation"';
							$outBibTex.= (($yearArray[intval($val)]) ? $yearArray[intval($val)] : $val);
            } else {
              $outBibTex.= ((is_numeric($val))?'':'{').$val.((is_numeric($val))?'':'}');
            }
          }
          $outBibTex.= ",\n";
        }
      }
    };
    $outBibTex = substr($outBibTex,0,-2)."\n}";
    return $outBibTex;
  }

  /*
  /   user_php_html_entity_decode:
  */
  public function user_php_html_entity_decode_rss_encode($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    return htmlentities(html_entity_decode($this->cObj->data[0]),ENT_XML1);
  }

  /*
  /   user_remove_text_special:
  /   Spezieller Filter für Texte
  */
  public function user_remove_text_special($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    $outText = $this->cObj->data[0];
    $outText = preg_replace('/###img:.*?###/i', '', $outText);
    return $outText;
  }

  /*
  /   user_text_special:
  /   Spezieller Filter für Texte
  */
  public function user_text_special($content,$conf)    {
    global $TSFE;
    $TSFE->set_no_cache();
    $outText = $this->cObj->data[0];
    $outText = preg_replace('/###img:(.*?)###/i', '<span data-img="$1">&nbsp;</span>', $outText);
    return $outText;
  }
}

function multi_implode($array, $glue) {
  $ret = '';
  foreach ($array as $item) {
    if (is_array($item)) {
      $ret .= multi_implode($item, $glue) . $glue;
    } else {
      $ret .= $item . $glue;
    }
  }
  $ret = substr($ret, 0, 0-strlen($glue));
  return $ret;
}
