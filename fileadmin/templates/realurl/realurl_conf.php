<?php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl']=array (
  '_DEFAULT' =>
  array (
    'init' =>
    array (
      'appendMissingSlash' => 'ifNotFile,redirect',
      'emptyUrlReturnValue' => '/',
    ),
    'preVars' => array(
      array(
        'GETvar' => 'L',
        'valueMap' => array(
          'en' => '1',
        ),
        'noMatch' => 'bypass',
      ),
    ),
    'postVarSets' => array(
      39 => array(
        'artikel' => array(
          array (
            'GETvar' => 'artikel'
          ),
        ),
      ),
    ),
    'pagePath' =>
    array (
    ),
    'fileName' =>
    array (
      'defaultToHTMLsuffixOnPrev' => 0,
      'acceptHTMLsuffix' => 1,
      'index' =>
      array (
        'print' =>
        array (
          'keyValues' =>
          array (
            'type' => 98,
          ),
        ),
        'rss.xml' =>
        array (
          'keyValues' =>
          array (
            'rss' => 1,
          ),
        ),
        'podcast.xml' =>
        array (
          'keyValues' =>
          array (
            'podcast' => 1,
          ),
        ),
        'BibTex.bib' =>
        array (
          'keyValues' =>
          array (
            'bibTex' => 1,
          ),
        ),
      ),
    ),
  ),
);
// default Konfiguration übernehmen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['dioe.at'] =
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dioe.at'] = $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
// Rootpage ID anpassen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['dioe.at']['pagePath']['rootpage_id'] =
$TYPO3_CONF_VARS['EXTCONF']['realurl']['www.dioe.at']['pagePath']['rootpage_id'] = '1';

// default Konfiguration übernehmen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['iam.dioe.at'] =  $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
// Rootpage ID anpassen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['iam.dioe.at']['pagePath']['rootpage_id'] = '60';

// default Konfiguration übernehmen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['standard2018.dioe.at'] =  $TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'];
// Rootpage ID anpassen
$TYPO3_CONF_VARS['EXTCONF']['realurl']['standard2018.dioe.at']['pagePath']['rootpage_id'] = '87';
