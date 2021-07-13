<?php
namespace HcbIamDioeMeme\HcbIamdioeMeme\Controller;

/***
 *
 * This file is part of the "iamDioe Meme" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020
 *
 ***/

/**
 * MemeEntrieController
 */
class MemeEntrieController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * memeEntrieRepository
     *
     * @var \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository\MemeEntrieRepository
     * @inject
     */
    protected $memeEntrieRepository = null;

    /**
     * action generator
     *
     * @param HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie
     * @return void
     */
    public function generatorAction()
    {
        $resourceFactory = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\ResourceFactory');
        $memeimagesItems = array();
        $memeimagesItemUids = $this->settings['memeimages'];
        if(!empty($memeimagesItemUids)){
            $memeimagesItemUids = explode(',', $memeimagesItemUids);
            $arraySize = sizeof($memeimagesItemUids);
            for($i = 0; $i < $arraySize; $i++){
                $itemUid = $memeimagesItemUids[$i];
                $fileReference = $resourceFactory->getFileReferenceObject($itemUid);
                $fileArray = $fileReference->getProperties();
                array_push($memeimagesItems, $fileArray);
            }
        }
        $this->view->assign('pid', $this->configurationManager->getContentObject()->data['pages']);
        $this->view->assign('memeimagesItems', $memeimagesItems);
        $this->view->assign('teilnahmeText', $this->settings['teilnahme']);
        $this->view->assign('teilnahmeTextLen', strlen($this->settings['teilnahme']));
        $this->view->assign('datenschutzText', $this->settings['datenschutz']);
        $this->view->assign('danksagung', $this->settings['danksagung']);
        $this->view->assign('headline', $this->settings['headline']);
    }

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     * @inject
     */
    protected $persistenceManager;

    /**
     * action memelistAjax
     *
     * @param HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie
     * @return void
     */
    public function memelistAjaxAction()
    {
        $upvoteMemeEntrie = $this->memeEntrieRepository->findByUid($this->request->getArgument('uid'));
        if ($this->request->getArgument('upvote')) {
            $upvoteMemeEntrie->addVote();
            $this->memeEntrieRepository->update($upvoteMemeEntrie);
        }
        $this->view->assign('upvoteMemeEntrie', $upvoteMemeEntrie);
        $this->view->assign('upvoted', $this->request->getArgument('upvote'));
    }

    /**
     * action generatorAjax
     *
     * @param \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie $newMemeEntrie
     * @return void
     */
    public function generatorAjaxAction(\HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie $newMemeEntrie)
    {
        $newMemeEntrie->setDatum(new \DateTime());
        $newMemeEntrie->setVotes(0);
        $newMemeEntrie->setFreigegeben(0);
        if ($newMemeEntrie->getDialekt() != 1) {
            $newMemeEntrie->setDialekt(0);
        }
        $resourceFactory = \TYPO3\CMS\Core\Resource\ResourceFactory::getInstance();
        $storage = $resourceFactory->getDefaultStorage();
        if (!$storage->hasFolder('memebilder')) {
            $storage->createFolder('memebilder');
        }
        $aImage = base64_decode(explode(',', $this->request->getArgument('image'))[1]);
        $aImageName = $newMemeEntrie->getPid().'_'.date_format(date_create(), 'YmdHis').'_'.substr(md5(time().uniqid()), -5).'.png';
        $uploadFolder = $storage->getFolder('memebilder');
        $tempFileName = tempnam(sys_get_temp_dir(), 'memeupload');
        $handle = fopen($tempFileName, "w");
        fwrite($handle, $aImage);
        fclose($handle);
        $file = $storage->addFile($tempFileName, $uploadFolder, $aImageName);
        if ($tempFileName && file_exists($tempFileName)) {
            unlink($tempFileName);
        }
        
        $fileReference = $this->objectManager->get('HcbIamDioeMeme\\HcbIamdioeMeme\\Domain\\Model\\FileReference');
        $fileReference->setFile($file);
        $newMemeEntrie->setBild($fileReference);

        $this->memeEntrieRepository->add($newMemeEntrie);
        $this->persistenceManager->persistAll();

        $this->view->assign('newMemeEntrie', $newMemeEntrie);
    }

    /**
     * action memelist
     *
     * @param HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie
     * @return void
     */
    public function memelistAction()
    {
        if ($this->settings['preview']) {
            $memeEntriesRandom = $this->memeEntrieRepository->getRandomPublic($this->configurationManager->getContentObject()->data['pages']);
            $this->view->assign('memeEntriesRandom', $memeEntriesRandom);
            $this->view->assign('preview', true);
        } else {
            $memeEntries = $this->memeEntrieRepository->getAllPublic();
            $this->view->assign('memeEntries', $memeEntries);
        }
    }

}
