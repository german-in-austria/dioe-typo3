<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;

/**
 * This file is part of the "Diö Artikelsystem" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * (c) 2021 HCB
 * DioeArticleController
 */
class DioeArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * dioeArticleRepository
     *
     * @var \DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository
     */
    protected $dioeArticleRepository = null;

    /**
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository $dioeArticleRepository
     */
    public function injectDioeArticleRepository(\DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository $dioeArticleRepository)
    {
        $this->dioeArticleRepository = $dioeArticleRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
				$dioeArticles = $this->dioeArticleRepository->filtered();
        $this->view->assign('dioeArticles', $dioeArticles);
    }

		/**
     * action belist
     *
     * @return string|object|null|void
     */
    public function belistAction()
    {
				$sPid = $GLOBALS['_GET']['id'];
				$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\Extbase\\Object\\ObjectManager');
				$configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
				$extbaseFrameworkConfiguration = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
				$storagePid = $extbaseFrameworkConfiguration['module.']['tx_dioearticlesystem_web_dioearticlesystembeae.']['persistence.']['storagePid'];
				if ($storagePid) {
					$sPid = $storagePid;
				}
				$this->view->assign('sPid', $sPid);

				$args = $this->request->getArguments();
				$this->view->assign('args', $args);

				$saHome = -1;
				if ((gettype($args['sahome']) == 'string' || gettype($args['sahome']) == 'integer') && (int)$args['sahome'] >= 0) {
					$saHome = (int)$args['sahome'];
				}
				$saType = -1;
				if ((gettype($args['satype']) == 'string' || gettype($args['satype']) == 'integer') && (int)$args['satype'] >= 0) {
					$saType = (int)$args['satype'];
				}
				$saCluster = $args['sacluster'];
				$saLang = $args['salang'] ?? 0;
				$dioeArticles = $this->dioeArticleRepository->filtered(true, $saType, $saHome, $saCluster, $saLang);
        $this->view->assign('dioeArticles', $dioeArticles);
    }

    /**
     * action show
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle
     * @return string|object|null|void
     */
    public function showAction(\DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle)
    {
        $this->view->assign('dioeArticle', $dioeArticle);
    }

    /**
     * action new
     *
     * @return string|object|null|void
     */
    public function newAction()
    {
    }

    /**
     * action create
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $newDioeArticle
     * @return string|object|null|void
     */
    public function createAction(\DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $newDioeArticle)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dioeArticleRepository->add($newDioeArticle);
        $this->redirect('belist');
    }

    /**
     * action edit
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("dioeArticle")
     * @return string|object|null|void
     */
    public function editAction(\DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle)
    {
        $this->view->assign('dioeArticle', $dioeArticle);
    }

    /**
     * action update
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle
     * @return string|object|null|void
     */
    public function updateAction(\DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dioeArticleRepository->update($dioeArticle);
        $this->redirect('belist');
    }

    /**
     * action delete
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle
     * @return string|object|null|void
     */
    public function deleteAction(\DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle $dioeArticle)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dioeArticleRepository->remove($dioeArticle);
        $this->redirect('belist');
    }
}
