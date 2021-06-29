<?php
namespace Dioevendor\Dioefunctions\ViewHelpers;
// {namespace dioe=Dioevendor\Dioefunctions\ViewHelpers}

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Resource\FileReference;

// <dioe:copyrights value="cc-by; DiÖ" />
class CopyrightsViewHelper extends AbstractViewHelper
{
	use CompileWithRenderStatic;

	protected $escapeOutput = false;

	public function initializeArguments()
	{
		$this->registerArgument('value', 'string', 'String with copyright informations.', false, null);
		$this->registerArgument('bild', 'bool', 'Is image? (Boolean).', false, null);
		$this->registerArgument('span', 'bool', 'Is span? (Boolean).', false, null);
		$this->registerArgument('klein', 'bool', 'Is small? (Boolean).', false, null);
		$this->registerArgument('keinlink', 'bool', 'Without link? (Boolean).', false, null);
		$this->registerArgument('class', 'string', 'String with additional classes.', false, null);
	}

	public static function renderStatic(
		array $arguments,
		\Closure $renderChildrenClosure,
		RenderingContextInterface $renderingContext
	) {
		// return 'Image Copyrights (' . $arguments['value'] . ', ' . $arguments['bild'] . ', ' . $arguments['span'] . ', ' . $arguments['klein'] . ', ' . $arguments['keinlink'] . ')';
		$alizenz = $arguments['value'] ? trim($arguments['value']) : '';
    if(strlen($alizenz) < 1 || substr($alizenz, 0, 5)=='!nix!') { return ''; }
    if(substr($alizenz, 0, 5)=='cc-by') {
      $alizenzout = 'by';
      list($alizenzby, $alizenzname) = explode(';', $alizenz, 2);
			$alizenzname = trim($alizenzname);
      if(strlen(substr($alizenzby, 6)) > 0) {
        $alizenzArray = explode('-', substr($alizenzby, 6));
        $alerr = 0; $alizenzoutArray = array();
        foreach ($alizenzArray as $val) {
          switch ($val) {
              case 'nc':
                if(isset($alizenzoutArray[0])) { $alerr = 1; }
                $alizenzoutArray[0] = '-nc';
                break;
              case 'nd':
                if(isset($alizenzoutArray[1])) { $alerr = 1; }
                $alizenzoutArray[1] = '-nd';
                break;
              case 'sa':
                if(isset($alizenzoutArray[1])) { $alerr = 1; }
                $alizenzoutArray[1] = '-sa';
                break;
              default:
                $alerr = 1;
          }
        }
        $alizenzout .= $alizenzoutArray[0] . $alizenzoutArray[1];
      }
      if($alerr==0) {
        return '<' . (($arguments['bild'] || $arguments['span']) ? 'span' : 'div') . ' class="' . (($arguments['bild']) ? 'img-add ' : '') . 'lizenz lizenz-cc' . (($arguments['klein']) ? ' klein' : '') . (($arguments['class']) ? ' ' . $arguments['class'] : '') . '">' .
					(($arguments['keinlink']) ? '' : '<a rel="license" href="http://creativecommons.org/licenses/'.$alizenzout.'/4.0/" title="cc-' . $alizenzout . '" target="_BLANK">') .
					'<img alt="Creative Commons Lizenzvertrag" src="https://i.creativecommons.org/l/' . $alizenzout . '/4.0/' . (($arguments['klein']) ? '80x15' : '88x31') . '.png" alt="cc-' . $alizenzout . '" />' .
					((strlen($alizenzname) > 0) ? '<span class="ccby"> by ' . $alizenzname . '</span>' : '') .
					(($arguments['keinlink']) ? '' : '</a>') .
					'</' . (($arguments['bild'] || $arguments['span']) ? 'span' : 'div') . '>';
      }
    }
    return '<' . (($arguments['bild'] || $arguments['span']) ? 'span' : 'div') .
			' class="' . (($arguments['bild']) ? 'img-add ' : '') . 'lizenz lizenz-text' . (($arguments['klein']) ? ' klein' : '') . (($arguments['class']) ? ' ' . $arguments['class'] : '') . '">' .
			$alizenz . '</' . (($arguments['bild'] || $arguments['span']) ? 'span' : 'div') . '>';
	}
}
