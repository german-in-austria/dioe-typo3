<?php
namespace HcbIamDioeMeme\HcbIamdioeMeme\Tests\Unit\Controller;

/**
 * Test case.
 */
class MemeEntrieControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HcbIamDioeMeme\HcbIamdioeMeme\Controller\MemeEntrieController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\HcbIamDioeMeme\HcbIamdioeMeme\Controller\MemeEntrieController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllMemeEntriesFromRepositoryAndAssignsThemToView()
    {

        $allMemeEntries = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $memeEntrieRepository = $this->getMockBuilder(\HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository\MemeEntrieRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $memeEntrieRepository->expects(self::once())->method('findAll')->will(self::returnValue($allMemeEntries));
        $this->inject($this->subject, 'memeEntrieRepository', $memeEntrieRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('memeEntries', $allMemeEntries);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMemeEntrieToView()
    {
        $memeEntrie = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('memeEntrie', $memeEntrie);

        $this->subject->showAction($memeEntrie);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMemeEntrieToMemeEntrieRepository()
    {
        $memeEntrie = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();

        $memeEntrieRepository = $this->getMockBuilder(\HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository\MemeEntrieRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $memeEntrieRepository->expects(self::once())->method('add')->with($memeEntrie);
        $this->inject($this->subject, 'memeEntrieRepository', $memeEntrieRepository);

        $this->subject->createAction($memeEntrie);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMemeEntrieToView()
    {
        $memeEntrie = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('memeEntrie', $memeEntrie);

        $this->subject->editAction($memeEntrie);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMemeEntrieInMemeEntrieRepository()
    {
        $memeEntrie = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();

        $memeEntrieRepository = $this->getMockBuilder(\HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository\MemeEntrieRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $memeEntrieRepository->expects(self::once())->method('update')->with($memeEntrie);
        $this->inject($this->subject, 'memeEntrieRepository', $memeEntrieRepository);

        $this->subject->updateAction($memeEntrie);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMemeEntrieFromMemeEntrieRepository()
    {
        $memeEntrie = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();

        $memeEntrieRepository = $this->getMockBuilder(\HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository\MemeEntrieRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $memeEntrieRepository->expects(self::once())->method('remove')->with($memeEntrie);
        $this->inject($this->subject, 'memeEntrieRepository', $memeEntrieRepository);

        $this->subject->deleteAction($memeEntrie);
    }
}
