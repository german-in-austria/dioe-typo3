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
				$languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
				$sys_language_uid = $languageAspect->getId();
				// ToDo: spin, cpin !!!
				$dioeArticles = $this->dioeArticleRepository->filtered(false, intval($this->settings['atype']), $this->settings['atags'], $this->settings['ahome'], $this->settings['ataskcluster'], $sys_language_uid, intval($this->settings['amax']), 0, intval($this->settings['spin']), intval($this->settings['cpin']));
	      $this->view->assign('dioeArticles', $dioeArticles);
				$this->view->assign('cObj', $this->configurationManager->getContentObject()->data);
    }

		/**
     * action ajax
     *
     * @return string|object|null|void
     */
    public function ajaxAction()
    {
				$languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
				$sys_language_uid = $languageAspect->getId();
				$dstart = intval($this->request->getArguments()['start']);
				// ToDo: spin, cpin !!!
				$dioeArticles = $this->dioeArticleRepository->filtered(false, intval($this->settings['atype']), $this->settings['atags'], $this->settings['ahome'], $this->settings['ataskcluster'], $sys_language_uid, intval($this->settings['amax']), $dstart, intval($this->settings['spin']), intval($this->settings['cpin']));
	      $this->view->assign('dioeArticles', $dioeArticles);
				$this->view->assign('cObj', $this->configurationManager->getContentObject()->data);
				$this->view->assign('dstart', $dstart);
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
					$errorArray = array();
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

					// Import:
					if ((gettype($args['expindex']) == 'string' || gettype($args['expindex']) == 'integer') && (int)$args['expindex'] >= 0) {
						$targetUids = array();
						$expIndexes = array();
						$expcount = isset($args['expcount']) ? (int)$args['expcount'] : 1;
						for ($i = (int)$args['expindex']; $i <= (int)$args['expindex'] + $expcount - 1; $i++) {
							// Einzelimport:
							$expIndex = $i;
							$targetUId = (int)$json[$expIndex]['uid'];
							unset($aJson);
							$aJson = NULL;
							foreach ($json as &$jsonValue) {
								if ($targetUId == $jsonValue['uid']) {
									$aJson = &$jsonValue;
								}
							}
							if ($targetUId > 0) {
								$targetUids[] = $targetUId;
								$expIndexes[] = $expIndex;
								// Import !!!!
								$connectionPool = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
								// $queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
								// $statement = $queryBuilder
								// 		->select('*')
								// 		->from('tx_dioearticlesystem_domain_model_dioearticle')
								// 		->where($queryBuilder->expr()->eq('uid', 2978))
								// 		->execute();
								// $testFetch = $statement->fetch();
								// $this->view->assign('test', array($testFetch, $testFetch['av_files']));
								// $this->view->assign('info', $testFetch['av_files']);

								$queryBuilder = $connectionPool->getQueryBuilderForTable('sys_file_reference');
								$statement = $queryBuilder
										->select('*')
										->from('sys_file_reference')
										->where($queryBuilder->expr()->eq('tablenames', '"tx_dioearticlesystem_domain_model_dioearticle"'))
										->andWhere($queryBuilder->expr()->eq('uid_foreign', $targetUId))
										->execute();
								$testFetch = $statement->fetchAll();
								// $this->view->assign('test', array($testFetch));

								$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
								$queryBuilder
										->delete('tx_dioearticlesystem_domain_model_dioearticle')
										->where($queryBuilder->expr()->eq('uid', $targetUId))
										->execute();

								$queryBuilder = $connectionPool->getQueryBuilderForTable('sys_file_reference');
								$statement = $queryBuilder
										->delete('sys_file_reference')
										->where($queryBuilder->expr()->eq('tablenames', '"tx_dioearticlesystem_domain_model_dioearticle"'))
										->andWhere($queryBuilder->expr()->eq('uid_foreign', $targetUId))
										->execute();

								$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
								$pid2type = array(
									'30' => 0,
									'35' => 1,
									'31' => 2,
									'32' => 3,
									'33' => 4
								);
								$falReferences = [];
								$nValues = array(
									'pid' => $sPid,
									'crdate' => time(),
									'uid' => $targetUId,
									'a_date' => $aJson['datum'],
									'prev_title' => isset($aJson['uebersichtUeberschrift']) ? $aJson['uebersichtUeberschrift'] : '',
									'prev_text' => isset($aJson['uebersichtText']) ? $this->linkCheck($aJson['uebersichtText']) : '',
									'a_task_cluster' => $this->getCluster($aJson['kategorien']),
									'a_home' => 0,
									'a_type' => isset($pid2type[$aJson['pid']]) ? $pid2type[$aJson['pid']] : 0,
									'start_pin' => str_contains($aJson['kategorien'], '21') ? 1 : 0,
									'cat_pin' => str_contains($aJson['kategorien'], '22') ? 1 : 0,
									'prev_pic_cropping_mode' => isset($aJson['uebersichtBildVerh']) ? $aJson['uebersichtBildVerh'] : 0,
									'detail_title' => isset($aJson['detailseiteUeberschrift']) ? $aJson['detailseiteUeberschrift'] : '',
									'detail_text' => isset($aJson['detailseiteText']) ? $this->linkCheck($aJson['detailseiteText']) : '',
									'detail_pic_cropping_mode' => isset($aJson['detailseiteBildVerh']) ? $aJson['detailseiteBildVerh'] : 0,
									'z_user' => -1,
									'z_name' => isset($aJson['zitationName']) ? $aJson['zitationName'] : '',
									'z_title' => isset($aJson['zitationUeberschrift']) ? $aJson['zitationUeberschrift'] : '',
									'z_place' => isset($aJson['zitationStandort']) ? $aJson['zitationStandort'] : 0,
									'z_l_name' => isset($aJson['lizenzName']) ? $aJson['lizenzName'] : '',
									'z_share' => isset($aJson['lizenzBearbeiten']) ? strval($pid2type[$aJson['lizenzBearbeiten']]) : '',
									'z_com_share' => isset($aJson['lizenzKommerziell']) ? strval($pid2type[$aJson['lizenzKommerziell']]) : '',
									'z_l_text' => isset($aJson['lizenzFreitext']) ? $aJson['lizenzFreitext'] : '',
									'pub_type' => isset($aJson['art']) ? $aJson['art'] : 0,
									'pub_title' => isset($aJson['title']) ? $aJson['title'] : '',
									'pub_year' => isset($aJson['year']) ? $aJson['year'] : 0,
									'pub_month' => isset($aJson['month']) ? $aJson['month'] : '',
									'pub_booktitle' => isset($aJson['booktitle']) ? $aJson['booktitle'] : '',
									'pub_publisher' => isset($aJson['publisher']) ? $aJson['publisher'] : '',
									'pub_journal' => isset($aJson['journal']) ? $aJson['journal'] : '',
									'pub_volume' => isset($aJson['volume']) ? $aJson['volume'] : '',
									'pub_number' => isset($aJson['number']) ? $aJson['number'] : '',
									'pub_series' => isset($aJson['series']) ? $aJson['series'] : '',
									'pub_school' => isset($aJson['school']) ? $aJson['school'] : '',
									'pub_address' => isset($aJson['address']) ? $aJson['address'] : '',
									'pub_edition' => isset($aJson['edition']) ? $aJson['edition'] : '',
									'pub_pages' => isset($aJson['pages']) ? $aJson['pages'] : '',
									'pub_keywords' => isset($aJson['keywords']) ? $aJson['keywords'] : 0,
									'pub_isbn' => isset($aJson['isbn']) ? $aJson['isbn'] : '',
									'pub_doi' => isset($aJson['doi']) ? $aJson['doi'] : '',
									'pub_url' => isset($aJson['url']) ? $aJson['url'] : '',
									'pub_url_date' => isset($aJson['urldate']) ? $aJson['urldate'] : 0,
									'pub_note' => isset($aJson['note']) ? $aJson['note'] : '',
									'mee_titel' => isset($aJson['terminTitel']) ? $aJson['terminTitel'] : '',
									'mee_time' => isset($aJson['terminZeit']) ? $aJson['terminZeit'] : 0,
									'mee_end_time' => isset($aJson['terminBisZeit']) ? $aJson['terminBisZeit'] : 0,
									'mee_show_time' => isset($aJson['terminUhrzeit']) ? $aJson['terminUhrzeit'] : 0,
									'mee_text' => isset($aJson['terminTermintext']) ? $aJson['terminTermintext'] : '',
									'mee_event' => isset($aJson['terminEvent']) ? $aJson['terminEvent'] : '',
									'mee_adress' => isset($aJson['terminAdress']) ? $aJson['terminAdress'] : '',
									'mee_url' => isset($aJson['terminUrl']) ? $aJson['terminUrl'] : '',
									'mee_doi' => isset($aJson['terminDoi']) ? $aJson['terminDoi'] : '',
									'mee_note' => isset($aJson['terminNote']) ? $aJson['terminNote'] : '',
									'mee_keywords' => isset($aJson['terminKeywords']) ? $aJson['terminKeywords'] : 0,
									'p_duration' => isset($aJson['podcastDauer']) ? $aJson['podcastDauer'] : 0,
									'av_cols' => isset($aJson['audioVideoSpalten']) ? $aJson['audioVideoSpalten'] : 6,
									'av_aspect_ratio' => isset($aJson['audioVideoSeitenverhaeltniss']) ? ($aJson['audioVideoSeitenverhaeltniss'] == '16by9' ? 1 : ($aJson['audioVideoSeitenverhaeltniss'] == '4by3' ? 2 : 0)) : 0,
									'mee_persons_sec' => isset($aJson['terminSektionPersonen']) ? $this->getSectionNameVorname($aJson['terminSektionPersonen'], 'vortragende', 'vortragender') : '', // sec (Vortragende)
									'mee_organisers_sec' => isset($aJson['terminSektionOrganiser']) ? $this->getSectionNameVorname($aJson['terminSektionOrganiser'], 'organisatoren', 'organisator') : '', // sec (Organisatoren)
									'mee_organisation_sec' => isset($aJson['terminSektionOrganisation']) ? $this->getSectionOrganisationUrl($aJson['terminSektionOrganisation']) : '', // sec (Organisationen)
									'mee_participants_sec' => isset($aJson['terminSektionParticipants']) ? $this->getSectionNameVornameInstUrl($aJson['terminSektionParticipants'], 'teilnehmer', 'teilnehmers') : '', // sec (Teilnehmer)
									'pub_editors_sec' => isset($aJson['authorSektion']) ? $this->getSectionAuthor($aJson['authorSektion']) : '', // sec (Autoren/Herausgeber)
									'prev_pic' => $this->getSetFalImg($aJson['uebersichtBild fal'], 'prev_pic', $targetUId, $falReferences, $errorArray), // fals
									'detail_pic' => $this->getSetFalImg($aJson['detailseiteBild fal'], 'detail_pic', $targetUId, $falReferences, $errorArray), // fals
									'p_file' => $this->getSetFalDatei($aJson['podcastDatei fal'], 'p_file', $targetUId, $falReferences, $errorArray), // fals
									'f_files' => $this->getSetFalDatei($aJson['sektionDateienDateien fal'], 'f_files', $targetUId, $falReferences, $errorArray), // fals
									'av_files' => $this->getSetSecAvDateien($aJson['sektionAudioVideoDateien fal'], $errorArray), // sec + fal
								);

								$queryBuilder
								    ->insert('tx_dioearticlesystem_domain_model_dioearticle')
								    ->values($nValues)
										->execute();
								$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_dioearticle_artikeltags_mm');
								$statement = $queryBuilder
										->delete('tx_dioearticlesystem_dioearticle_artikeltags_mm')
										->where($queryBuilder->expr()->eq('uid_local', $targetUId))
										->execute();
								// $this->view->assign('test', $statement);
								if (isset($aJson['kategorien'])) {
									$tagListKIdTId = array(
										'2' => 6,
										'3' => 7,
										'4' => 8,
										'5' => 9,
										'6' => 10,
										'7' => 11,
										'8' => 12,
										'9' => 13,
										'10' => 14,
										'11' => 15,
										'13' => 16,
										'14' => 17,
										'38' => 18,
										'39' => 19,
										'44' => 20,
										'45' => 21
									);
									$cats = explode(",", $aJson['kategorien']);
									$newTags = array();
									forEach($cats as $cat) {
										if ($tagListKIdTId[$cat]) {
											$newTags[] = $tagListKIdTId[$cat];
										}
									}
									if (count($newTags) > 0) {
										$dg = 1;
										forEach($newTags as $newTag) {
											$queryBuilder = $connectionPool->getQueryBuilderForTable('tx_dioearticlesystem_dioearticle_artikeltags_mm');
											$qTag = array(
												'uid_local' => $targetUId,
												'uid_foreign' => $newTag,
												'sorting' => $dg,
												'sorting_foreign' => 0,
											);
											$queryBuilder
											    ->insert('tx_dioearticlesystem_dioearticle_artikeltags_mm')
											    ->values($qTag)
													->execute();
										}
									}
								}
								$newDioeArticle = $this->dioeArticleRepository->findHiddenByUid($targetUId);
								forEach($falReferences as &$falReference) {
									// $falReference['fal']->title = "xxx";
									$reference = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Domain\Model\FileReference::class);
					        $reference->setOriginalResource($falReference['fal']);
									// $this->view->assign('test', array($reference->getUid(), $reference));
									// if ($falReference['description']) {
									// 	$this->view->assign('test', array($reference, $falReference));
									// }
									if ($falReference['field'] == 'prev_pic') {
										$newDioeArticle->setPrevPic($reference);
									} elseif ($falReference['field'] == 'detail_pic') {
										$newDioeArticle->addDetailPic($reference);
									} elseif ($falReference['field'] == 'p_file') {
										$newDioeArticle->setPFile($reference);
									} elseif ($falReference['field'] == 'f_files') {
										$newDioeArticle->addFFile($reference);
									}
									$falReference['ref'] = $reference;
									// $this->view->assign('test', array($reference->getUid(), $reference));
								}
								$this->dioeArticleRepository->update($newDioeArticle);
								$persistenceManager = $this->objectManager->get("TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager");
								$persistenceManager->persistAll();
								forEach($falReferences as &$falReference) {
									$queryBuilder = $connectionPool->getQueryBuilderForTable('sys_file_reference');
									$statement = $queryBuilder
											->update('sys_file_reference')
											->where($queryBuilder->expr()->eq('uid_local', $falReference['fileId']))
											->andWhere($queryBuilder->expr()->eq('uid_foreign', $targetUId))
											->andWhere($queryBuilder->expr()->eq('fieldname', '"' . $falReference['field'] . '"'))
											->set('title', $falReference['title'])
											->set('description', $falReference['description'])
											->execute();
								}
								// $this->view->assign('test', $falReferences);
								$aJson['dbEntrie'] = $newDioeArticle;
								$aJson['imported'] = TRUE;
							}
						}
						// Einzelimport Ende:
						$this->view->assign('expindex', end($expIndexes) + 1);
						$this->view->assign('expindexs', $expIndexes);
						$this->view->assign('targetUids', $targetUids);
						$this->view->assign('targetUidsStr', implode(", ", $targetUids));
					} else {
						$this->view->assign('expindex', 0);
					}
					$this->view->assign('json', $json);
					$this->view->assign('error', $errorArray);
				}
		}

		/**
		 *	getSetSecAvDateien
		 */
		public function getSetSecAvDateien ($falObj, &$errorArray) {
			$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
			$storage = $resourceFactory->getDefaultStorage();
			if ($falObj && is_array($falObj) && count($falObj) > 0) {
				$sectionArray = array(
					'data' => array(
						'sSection' => array(
							'lDEF' => array(
								'dateien' => array(
									'el' => array(
									)
								)
							)
						)
					)
				);
				forEach($falObj as $aDatei) {
					if ($aDatei['datei']) {
						$aFile = str_replace('fileadmin/', '', urldecode($aDatei['datei']));
						$aDateiId = 0;
						if ($storage->hasFile($aFile)) {
							$aFileId = $storage->getFile($aFile)->getUid();
							if ($aFileId && $aFileId > 0) {
								$aDateiId = $aFileId;
							} else {
								$errorArray[] = 'Datei "' . urldecode($aDatei['datei']) . '" konnte nicht zugewiesen werden!';
							}
						} else {
							$errorArray[] = 'Datei "' . urldecode($aDatei['datei']) . '" existiert nicht!';
						}
					}
					$sectionArray['data']['sSection']['lDEF']['dateien']['el'][substr(md5(uniqid()), 0, 22)] = array(
						'datei' => array(
							'el' => array(
								'titel' => array(
									'vDEF' => isset($aDatei['titel']) ? $aDatei['titel'] : ''
								),
								'youtube' => array(
									'vDEF' => isset($aDatei['youtube']) ? $aDatei['youtube'] : ''
								),
								'copyright' => array(
									'vDEF' => isset($aDatei['copyright']) ? $aDatei['copyright'] : ''
								),
								'datei' => array(
									'vDEF' => isset($aDateiId) ? $aDateiId : 0
								),
							)
						),
						'_TOGGLE' => 0
					);
				}
				$flexFormTools = new \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools();
				return $flexFormTools->flexArray2Xml($sectionArray, true);
			}
			return '';
		}

		/**
		 *	getSetFalDatei
		 */
		public function getSetFalDatei ($falObj, $fieldName, $targetUId, &$falReferences, &$errorArray) {
			$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
			$storage = $resourceFactory->getDefaultStorage();
			$fileCount = 0;
			if ($falObj && is_array($falObj) && count($falObj) > 0) {
				forEach($falObj as $aImg) {
					$aFile = str_replace('fileadmin/', '', urldecode($aImg['datei']));
					if ($storage->hasFile($aFile)) {
						$aFileId = $storage->getFile($aFile)->getUid();
						if ($aFileId && $aFileId > 0) {
							// $this->view->assign('test', array($aFile, $aFileId));
							$falReferences[] = array(
								'fal' => \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance()->createFileReferenceObject(
									array(
										'uid_local' => $aFileId,
										'uid_foreign' => $targetUId,
										'uid' => uniqid('NEW_'),
										'title' => $aImg['titel'],
									)
								),
								'field' => $fieldName,
								'title' => $aImg['titel'],
								'fileId' => $aFileId,
							);
							$fileCount += 1;
						} else {
							$errorArray[] = 'Datei "' . urldecode($aImg['datei']) . '" konnte nicht zugewiesen werden!';
						}
					} else {
						$errorArray[] = 'Datei "' . urldecode($aImg['datei']) . '" existiert nicht!';
					}
				}
			}
			return $fileCount;
		}

		/**
		 *	getSetFalImg
		 */
		public function getSetFalImg ($falObj, $fieldName, $targetUId, &$falReferences, &$errorArray) {
			$resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
			$storage = $resourceFactory->getDefaultStorage();
			$fileCount = 0;
			if ($falObj && is_array($falObj) && count($falObj) > 0) {
				forEach($falObj as $aImg) {
					$aFile = str_replace('fileadmin/', '', urldecode($aImg['file']));
					if ($storage->hasFile($aFile)) {
						$aFileId = $storage->getFile($aFile)->getUid();
						if ($aFileId && $aFileId > 0) {
							// $this->view->assign('test', array($aFile, $aFileId, $aImg['title'], $aImg['comment']));
							$falReferences[] = array(
								'fal' => \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance()->createFileReferenceObject(
									array(
										'uid_local' => $aFileId,
										'uid_foreign' => $targetUId,
										'uid' => uniqid('NEW_'),
										'title' => $aImg['title'],
										'description' => $aImg['comment'],
									)
								),
								'field' => $fieldName,
								'title' => $aImg['title'],
								'description' => $aImg['comment'],
								'fileId' => $aFileId,
							);
							$fileCount += 1;
						} else {
							$errorArray[] = 'Datei "' . urldecode($aImg['file']) . '" konnte nicht zugewiesen werden!';
						}
					} else {
						$errorArray[] = 'Datei "' . urldecode($aImg['file']) . '" existiert nicht!';
					}
				}
			}
			return $fileCount;
		}

		/**
		 *	getSectionNameVorname
		 */
		public function getSectionNameVorname ($array, $p, $s) {
			if (!is_array($array)) {
				return '';
			}
			$sectionArray = array(
				'data' => array(
					'sSection' => array(
						'lDEF' => array(
							$p => array(
								'el' => array(
								)
							)
						)
					)
				)
			);
			foreach ($array as $key => $val) {
				$sectionArray['data']['sSection']['lDEF'][$p]['el'][substr(md5(uniqid()), 0, 22)] = array(
					$s => array(
						'el' => array(
							'nachname' => array(
								'vDEF' => isset($val['nachname']) ? $val['nachname'] : ''
							),
							'vorname' => array(
								'vDEF' => isset($val['vorname']) ? $val['vorname'] : ''
							)
						)
					),
					'_TOGGLE' => 0
				);
			}
			$flexFormTools = new \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools();
			return $flexFormTools->flexArray2Xml($sectionArray, true);
		}

		/**
		 *	getSectionNameVornameInstUrl
		 */
		public function getSectionNameVornameInstUrl ($array, $p, $s) {
			if (!is_array($array)) {
				return '';
			}
			$sectionArray = array(
				'data' => array(
					'sSection' => array(
						'lDEF' => array(
							$p => array(
								'el' => array(
								)
							)
						)
					)
				)
			);
			foreach ($array as $key => $val) {
				$sectionArray['data']['sSection']['lDEF'][$p]['el'][substr(md5(uniqid()), 0, 22)] = array(
					$s => array(
						'el' => array(
							'nachname' => array(
								'vDEF' => isset($val['nachname']) ? $val['nachname'] : ''
							),
							'vorname' => array(
								'vDEF' => isset($val['vorname']) ? $val['vorname'] : ''
							),
							'institution' => array(
								'vDEF' => isset($val['institution']) ? $val['institution'] : ''
							),
							'url' => array(
								'vDEF' => isset($val['url']) ? $val['url'] : ''
							),
						)
					),
					'_TOGGLE' => 0
				);
			}
			$flexFormTools = new \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools();
			return $flexFormTools->flexArray2Xml($sectionArray, true);
		}

		/**
		 *	getSectionAuthor
		 */
		public function getSectionAuthor ($array) {
			if (!is_array($array)) {
				return '';
			}
			$sectionArray = array(
				'data' => array(
					'sSection' => array(
						'lDEF' => array(
							'editor' => array(
								'el' => array(
								)
							)
						)
					)
				)
			);
			foreach ($array as $key => $val) {
				$sectionArray['data']['sSection']['lDEF']['editor']['el'][substr(md5(uniqid()), 0, 22)] = array(
					'editorobj' => array(
						'el' => array(
							'authorNachname' => array(
								'vDEF' => isset($val['authorNachname']) ? $val['authorNachname'] : ''
							),
							'authorVorname' => array(
								'vDEF' => isset($val['authorVorname']) ? $val['authorVorname'] : ''
							),
							'authorIsEditor' => array(
								'vDEF' => isset($val['authorIsEditor']) ? $val['authorIsEditor'] : '0'
							)
						)
					),
					'_TOGGLE' => 0
				);
			}
			$flexFormTools = new \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools();
			return $flexFormTools->flexArray2Xml($sectionArray, true);
		}

		/**
		 *	getSectionOrganisationUrl
		 */
		public function getSectionOrganisationUrl ($array) {
			if (!is_array($array)) {
				return '';
			}
			$sectionArray = array(
				'data' => array(
					'sSection' => array(
						'lDEF' => array(
							'organisationen' => array(
								'el' => array(
								)
							)
						)
					)
				)
			);
			foreach ($array as $key => $val) {
				$sectionArray['data']['sSection']['lDEF']['organisationen']['el'][substr(md5(uniqid()), 0, 22)] = array(
					'organisation' => array(
						'el' => array(
							'organisation' => array(
								'vDEF' => isset($val['organisation']) ? $val['organisation'] : ''
							),
							'url' => array(
								'vDEF' => isset($val['url']) ? $val['url'] : ''
							)
						)
					),
					'_TOGGLE' => 0
				);
			}
			$flexFormTools = new \TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools();
			return $flexFormTools->flexArray2Xml($sectionArray, true);
		}

		/**
		 *	getCluster
		 */
		public function getCluster ($txt) {
			if ($txt) {
				$cats = explode(",", $txt);
				$clusters = array();
				if (in_array("37", $cats)) {
					return 'a,b,c,d,e';
				};
				if (in_array("16", $cats)) { $clusters[] = 'a'; };
				if (in_array("17", $cats)) { $clusters[] = 'b'; };
				if (in_array("18", $cats)) { $clusters[] = 'c'; };
				if (in_array("19", $cats)) { $clusters[] = 'd'; };
				if (in_array("20", $cats)) { $clusters[] = 'e'; };
				return implode(",", $clusters);
			} else {
				return NULL;
			}
		}

		/**
		 *	linkCheck
		 */
		public function linkCheck ($txt) {
			$search = array(
				"t3://page?uid=10",
				"t3://page?uid=1",
				"t3://page?uid=47",
				"t3://page?uid=177",
				"t3://page?uid=45",
				"t3://page?uid=49",
				"t3://page?uid=123",
				"t3://page?uid=60",
				"t3://page?uid=121",
				"t3://page?uid=71",
				"t3://page?uid=125",
				"t3://page?uid=173",
				"t3://page?uid=51",
				"t3://page?uid=16",
				"t3://page?uid=48",
				"t3://page?uid=140",
				"t3://page?uid=81",
				"t3://page?uid=59",
				"t3://page?uid=169",
				"t3://page?uid=46",
				"t3://page?uid=50",
				"t3://page?uid=53",
				"t3://page?uid=11",
				"t3://page?uid=17",
				"t3://page?uid=21",
				"t3://page?uid=19",
				"t3://page?uid=26",
				"t3://page?uid=22",
				"t3://page?uid=6",
				"t3://page?uid=9",
				"t3://page?uid=18",
				"t3://page?uid=61",
				"t3://page?uid=57",
				"t3://page?uid=13",
				"t3://file?uid=454",
				"t3://page?uid=14",
				"t3://page?uid=5",
				"t3://page?uid=12"
			);
			$replace = array(
				"t3://page?uid=8",
				"t3://page?uid=1",
				"t3://page?uid=25",
				"t3://page?uid=74",
				"t3://page?uid=23",
				"t3://page?uid=1",
				"t3://page?uid=85",
				"t3://page?uid=60",
				"t3://page?uid=65",
				"t3://page?uid=60",
				"t3://page?uid=117",
				"t3://page?uid=120",
				"t3://page?uid=34",
				"t3://page?uid=20",
				"t3://page?uid=26",
				"t3://page?uid=31",
				"t3://page?uid=30",
				"t3://page?uid=28",
				"t3://page?uid=107",
				"t3://page?uid=24",
				"t3://page?uid=33",
				"t3://page?uid=1",
				"t3://page?uid=12",
				"t3://page?uid=21",
				"t3://page?uid=37",
				"t3://page?uid=35",
				"t3://page?uid=43",
				"t3://page?uid=38",
				"t3://page?uid=4",
				"t3://page?uid=7",
				"t3://page?uid=22",
				"t3://page?uid=60",
				"t3://page?uid=41",
				"t3://page?uid=14",
				"t3://file?uid=167",
				"t3://page?uid=18",
				"t3://page?uid=3",
				"t3://page?uid=13"
			);
			return str_replace($search, $replace, $txt);
		}

}
