<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author HCB 
 */
class DioeArticleControllerTest extends UnitTestCase
{
    /**
     * @var \DioeArticleSystem\Dioearticlesystem\Controller\DioeArticleController
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\DioeArticleSystem\Dioearticlesystem\Controller\DioeArticleController::class)
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
    public function listActionFetchesAllDioeArticlesFromRepositoryAndAssignsThemToView()
    {
        $allDioeArticles = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dioeArticleRepository = $this->getMockBuilder(\DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $dioeArticleRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDioeArticles));
        $this->inject($this->subject, 'dioeArticleRepository', $dioeArticleRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('dioeArticles', $allDioeArticles);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDioeArticleToView()
    {
        $dioeArticle = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('dioeArticle', $dioeArticle);

        $this->subject->showAction($dioeArticle);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenDioeArticleToDioeArticleRepository()
    {
        $dioeArticle = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();

        $dioeArticleRepository = $this->getMockBuilder(\DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $dioeArticleRepository->expects(self::once())->method('add')->with($dioeArticle);
        $this->inject($this->subject, 'dioeArticleRepository', $dioeArticleRepository);

        $this->subject->createAction($dioeArticle);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenDioeArticleToView()
    {
        $dioeArticle = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('dioeArticle', $dioeArticle);

        $this->subject->editAction($dioeArticle);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenDioeArticleInDioeArticleRepository()
    {
        $dioeArticle = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();

        $dioeArticleRepository = $this->getMockBuilder(\DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $dioeArticleRepository->expects(self::once())->method('update')->with($dioeArticle);
        $this->inject($this->subject, 'dioeArticleRepository', $dioeArticleRepository);

        $this->subject->updateAction($dioeArticle);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenDioeArticleFromDioeArticleRepository()
    {
        $dioeArticle = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();

        $dioeArticleRepository = $this->getMockBuilder(\DioeArticleSystem\Dioearticlesystem\Domain\Repository\DioeArticleRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $dioeArticleRepository->expects(self::once())->method('remove')->with($dioeArticle);
        $this->inject($this->subject, 'dioeArticleRepository', $dioeArticleRepository);

        $this->subject->deleteAction($dioeArticle);
    }
}
