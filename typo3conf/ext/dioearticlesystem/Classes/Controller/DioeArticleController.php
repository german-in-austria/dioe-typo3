<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3\CMS\Extbase\Annotation as Extbase;

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
		 * @Extbase\Inject
		 * @var \DioeArticleSystem\Dioearticlesystem\Domain\Repository\ArtikelTagsRepository
		 */
		public $artikelTagsRepository;

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
				$saTag = -1;
				if ((gettype($args['satag']) == 'string' || gettype($args['satag']) == 'integer') && (int)$args['satag'] >= 0) {
					$saTag = (int)$args['satag'];
				}
				$saCluster = $args['sacluster'];
				$saLang = $args['salang'] ?? 0;
				$dioeArticles = $this->dioeArticleRepository->filtered(true, $saType, $saTag, $saHome, $saCluster, $saLang);
        $this->view->assign('dioeArticles', $dioeArticles);
				$artikelTags = $this->artikelTagsRepository->findAll();
        $this->view->assign('artikelTags', $artikelTags);
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

		/**
		 * action export
		 *
		 * @return string|object|null|void
		 */
		public function exportAction()
		{
				$this->view->assign('isAdmin', $GLOBALS['BE_USER']->isAdmin());
				if ($GLOBALS['BE_USER']->isAdmin()) {
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

					$jsonFile = file_get_contents(\TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName('EXT:dioearticlesystem/Resources/Private/Backend/Export/Json/export.json'));
					$json = json_decode($jsonFile, true);
					$uIds = array();
					foreach ($json as &$value) {
						$uIds[] = $value['uid'];
					}
					$missingUids = array();
					$existingDioeArticles = $this->dioeArticleRepository->findHiddenByUids($uIds);
					// $this->view->assign('test', $existingDioeArticles);
					if ($existingDioeArticles) {
						foreach ($existingDioeArticles->toArray() as &$value) {
							foreach ($json as &$jsonValue) {
								if ($value->getUid() == $jsonValue['uid']) {
									$jsonValue['dbEntrie'] = $value;
								} else {
									$missingUids[] = $value->getUid();
								}
							}
						}
					}
					$this->view->assign('uIds', $uIds);
					$this->view->assign('missingUids', $missingUids);

					if ((gettype($args['expindex']) == 'string' || gettype($args['expindex']) == 'integer') && (int)$args['expindex'] >= 0) {
						$expIndex = (int)$args['expindex'];
						$targetUId = (int)$json[$expIndex]['uid'];
						$aJson = NULL;
						foreach ($json as &$jsonValue) {
							if ($targetUId == $jsonValue['uid']) {
								$aJson = &$jsonValue;
							}
						}
						if ($targetUId > 0) {
							$this->view->assign('expindex', $expIndex);
							$this->view->assign('targetUid', $targetUId);
							// Import !!!!
							$connectionPool = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
							$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
							$queryBuilder
									->delete('tx_dioearticlesystem_domain_model_dioearticle')
									->where($queryBuilder->expr()->eq('uid', $targetUId))
									->execute();
							$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
							$queryBuilder
							    ->insert('tx_dioearticlesystem_domain_model_dioearticle')
							    ->values([
							      'pid' => $sPid,
							      'crdate' => time(),
							      'uid' => $targetUId,
							      'a_date' => $aJson['datum'],
							      'prev_title' => $aJson['uebersichtUeberschrift'],
									])
									->execute();
							$newDioeArticle = $this->dioeArticleRepository->findHiddenByUid($targetUId);
							// ToDo: Fal löschen/setzen:
							$aJson['dbEntrie'] = $newDioeArticle;
							// $this->view->assign('test', $newDioeArticle);
						}
					} else {
						$this->view->assign('expindex', -1);
					}
					$this->view->assign('json', $json);
				}
		}
}
