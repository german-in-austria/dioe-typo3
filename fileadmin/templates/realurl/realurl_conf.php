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
      ),
    ),
  ),
);
