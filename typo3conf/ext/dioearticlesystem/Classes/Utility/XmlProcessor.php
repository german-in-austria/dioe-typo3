<?php
namespace DioeArticleSystem\Dioearticlesystem\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Service\FlexFormService;

class XmlProcessor
{
    /**
     * returns the projects (stored in the database as flexform XML) as an array for fluid
     */
    public static function xmlArray($xml)
    {
      $flexformService = GeneralUtility::makeInstance(FlexFormService::class);
      $xmlArray = $flexformService->convertFlexFormContentToArray($xml);
      $out = [];
      if (array_values($xmlArray) && array_values($xmlArray)[0]) {
        foreach (array_values($xmlArray)[0] as $xmlData) {
					$aData = null;
					if (array_values($xmlData) && array_values($xmlData)[0]) {
						$out[] = array_values($xmlData)[0];
					}
        }
      }
      return $out;
    }
}
