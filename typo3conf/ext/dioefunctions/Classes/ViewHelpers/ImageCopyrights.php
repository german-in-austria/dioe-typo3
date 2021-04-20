<?php
namespace Dioevendor\Dioefunctions\ViewHelpers;
// {namespace dioe=Dioevendor\Dioefunctions\ViewHelpers}

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

// <dioe:imagecopyrights value="cc-by; DiÖ" />
class ImagecopyrightsViewHelper extends AbstractViewHelper
{
	use CompileWithRenderStatic;

	public function initializeArguments()
	{
		$this->registerArgument('value', 'string', 'String with copyright informations.', true);
	}

	public static function renderStatic(
		array $arguments,
		\Closure $renderChildrenClosure,
		RenderingContextInterface $renderingContext
	) {
		return 'Image Copyrights (' . $arguments['value'] . ')';
	}
}
