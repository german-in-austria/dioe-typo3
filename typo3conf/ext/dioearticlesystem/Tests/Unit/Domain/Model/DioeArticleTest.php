<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author HCB
 */
class DioeArticleTest extends UnitTestCase
{
    /**
     * @var \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\DioeArticle();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

		/**
     * @test
     */
    public function getATypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAType()
        );
    }

    /**
     * @test
     */
    public function getAHomeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getaHome()
        );
    }

    /**
     * @test
     */
    public function setATypeForIntSetsAType()
    {
        $this->subject->setAType(12);

        self::assertAttributeEquals(
            12,
            'aType',
            $this->subject
        );
    }

		/**
     * @test
     */
    public function setAHomeForIntSetsAHome()
    {
        $this->subject->setAHome(12);

        self::assertAttributeEquals(
            12,
            'aHome',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getADateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getADate()
        );
    }

    /**
     * @test
     */
    public function setADateForDateTimeSetsADate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setADate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'aDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrevTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPrevTitle()
        );
    }

    /**
     * @test
     */
    public function setPrevTitleForStringSetsPrevTitle()
    {
        $this->subject->setPrevTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'prevTitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrevTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPrevText()
        );
    }

    /**
     * @test
     */
    public function setPrevTextForStringSetsPrevText()
    {
        $this->subject->setPrevText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'prevText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getATaskClusterReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getATaskCluster()
        );
    }

    /**
     * @test
     */
    public function setATaskClusterForStringSetsATaskCluster()
    {
        $this->subject->setATaskCluster('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'aTaskCluster',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartPinReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getStartPin()
        );
    }

    /**
     * @test
     */
    public function setStartPinForBoolSetsStartPin()
    {
        $this->subject->setStartPin(true);

        self::assertAttributeEquals(
            true,
            'startPin',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCatPinReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getCatPin()
        );
    }

    /**
     * @test
     */
    public function setCatPinForBoolSetsCatPin()
    {
        $this->subject->setCatPin(true);

        self::assertAttributeEquals(
            true,
            'catPin',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrevPicReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getPrevPic()
        );
    }

    /**
     * @test
     */
    public function setPrevPicForFileReferenceSetsPrevPic()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPrevPic($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'prevPic',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPrevPicCroppingModeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPrevPicCroppingMode()
        );
    }

    /**
     * @test
     */
    public function setPrevPicCroppingModeForIntSetsPrevPicCroppingMode()
    {
        $this->subject->setPrevPicCroppingMode(12);

        self::assertAttributeEquals(
            12,
            'prevPicCroppingMode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDetailTitle()
        );
    }

    /**
     * @test
     */
    public function setDetailTitleForStringSetsDetailTitle()
    {
        $this->subject->setDetailTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'detailTitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDetailText()
        );
    }

    /**
     * @test
     */
    public function setDetailTextForStringSetsDetailText()
    {
        $this->subject->setDetailText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'detailText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDetailPicReturnsInitialValueForFileReference()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDetailPic()
        );
    }

    /**
     * @test
     */
    public function setDetailPicForFileReferenceSetsDetailPic()
    {
        $detailPic = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $objectStorageHoldingExactlyOneDetailPic = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDetailPic->attach($detailPic);
        $this->subject->setDetailPic($objectStorageHoldingExactlyOneDetailPic);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDetailPic,
            'detailPic',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addDetailPicToObjectStorageHoldingDetailPic()
    {
        $detailPic = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $detailPicObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $detailPicObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($detailPic));
        $this->inject($this->subject, 'detailPic', $detailPicObjectStorageMock);

        $this->subject->addDetailPic($detailPic);
    }

    /**
     * @test
     */
    public function removeDetailPicFromObjectStorageHoldingDetailPic()
    {
        $detailPic = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $detailPicObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $detailPicObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($detailPic));
        $this->inject($this->subject, 'detailPic', $detailPicObjectStorageMock);

        $this->subject->removeDetailPic($detailPic);
    }

    /**
     * @test
     */
    public function getDetailPicCroppingModeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDetailPicCroppingMode()
        );
    }

    /**
     * @test
     */
    public function setDetailPicCroppingModeForIntSetsDetailPicCroppingMode()
    {
        $this->subject->setDetailPicCroppingMode(12);

        self::assertAttributeEquals(
            12,
            'detailPicCroppingMode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAvFilesReturnsInitialValueForFileReference()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getAvFiles()
        );
    }

    /**
     * @test
     */
    public function setAvFilesForFileReferenceSetsAvFiles()
    {
        $avFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $objectStorageHoldingExactlyOneAvFiles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneAvFiles->attach($avFile);
        $this->subject->setAvFiles($objectStorageHoldingExactlyOneAvFiles);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneAvFiles,
            'avFiles',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addAvFileToObjectStorageHoldingAvFiles()
    {
        $avFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $avFilesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $avFilesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($avFile));
        $this->inject($this->subject, 'avFiles', $avFilesObjectStorageMock);

        $this->subject->addAvFile($avFile);
    }

    /**
     * @test
     */
    public function removeAvFileFromObjectStorageHoldingAvFiles()
    {
        $avFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $avFilesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $avFilesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($avFile));
        $this->inject($this->subject, 'avFiles', $avFilesObjectStorageMock);

        $this->subject->removeAvFile($avFile);
    }

    /**
     * @test
     */
    public function getAvColsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAvCols()
        );
    }

    /**
     * @test
     */
    public function setAvColsForIntSetsAvCols()
    {
        $this->subject->setAvCols(12);

        self::assertAttributeEquals(
            12,
            'avCols',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAvAspectRatioReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAvAspectRatio()
        );
    }

    /**
     * @test
     */
    public function setAvAspectRatioForIntSetsAvAspectRatio()
    {
        $this->subject->setAvAspectRatio(12);

        self::assertAttributeEquals(
            12,
            'avAspectRatio',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFFilesReturnsInitialValueForFileReference()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFFiles()
        );
    }

    /**
     * @test
     */
    public function setFFilesForFileReferenceSetsFFiles()
    {
        $fFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $objectStorageHoldingExactlyOneFFiles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFFiles->attach($fFile);
        $this->subject->setFFiles($objectStorageHoldingExactlyOneFFiles);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFFiles,
            'fFiles',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFFileToObjectStorageHoldingFFiles()
    {
        $fFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $fFilesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $fFilesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($fFile));
        $this->inject($this->subject, 'fFiles', $fFilesObjectStorageMock);

        $this->subject->addFFile($fFile);
    }

    /**
     * @test
     */
    public function removeFFileFromObjectStorageHoldingFFiles()
    {
        $fFile = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $fFilesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $fFilesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($fFile));
        $this->inject($this->subject, 'fFiles', $fFilesObjectStorageMock);

        $this->subject->removeFFile($fFile);
    }

    /**
     * @test
     */
    public function getZUserReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZUser()
        );
    }

    /**
     * @test
     */
    public function setZUserForIntSetsZUser()
    {
        $this->subject->setZUser(12);

        self::assertAttributeEquals(
            12,
            'zUser',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZName()
        );
    }

    /**
     * @test
     */
    public function setZNameForStringSetsZName()
    {
        $this->subject->setZName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZTitle()
        );
    }

    /**
     * @test
     */
    public function setZTitleForStringSetsZTitle()
    {
        $this->subject->setZTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zTitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZPlaceReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZPlace()
        );
    }

    /**
     * @test
     */
    public function setZPlaceForIntSetsZPlace()
    {
        $this->subject->setZPlace(12);

        self::assertAttributeEquals(
            12,
            'zPlace',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZLNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZLName()
        );
    }

    /**
     * @test
     */
    public function setZLNameForStringSetsZLName()
    {
        $this->subject->setZLName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zLName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZShareReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZShare()
        );
    }

    /**
     * @test
     */
    public function setZShareForIntSetsZShare()
    {
        $this->subject->setZShare(12);

        self::assertAttributeEquals(
            12,
            'zShare',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZComShareReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZComShare()
        );
    }

    /**
     * @test
     */
    public function setZComShareForIntSetsZComShare()
    {
        $this->subject->setZComShare(12);

        self::assertAttributeEquals(
            12,
            'zComShare',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZLTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZLText()
        );
    }

    /**
     * @test
     */
    public function setZLTextForStringSetsZLText()
    {
        $this->subject->setZLText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zLText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPFileReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getPFile()
        );
    }

    /**
     * @test
     */
    public function setPFileForFileReferenceSetsPFile()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPFile($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'pFile',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPDurationReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPDuration()
        );
    }

    /**
     * @test
     */
    public function setPDurationForStringSetsPDuration()
    {
        $this->subject->setPDuration('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pDuration',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPubType()
        );
    }

    /**
     * @test
     */
    public function setPubTypeForIntSetsPubType()
    {
        $this->subject->setPubType(12);

        self::assertAttributeEquals(
            12,
            'pubType',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubTitle()
        );
    }

    /**
     * @test
     */
    public function setPubTitleForStringSetsPubTitle()
    {
        $this->subject->setPubTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubTitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubEditorsSecReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubEditorsSec()
        );
    }

    /**
     * @test
     */
    public function setPubEditorsSecForStringSetsPubEditorsSec()
    {
        $this->subject->setPubEditorsSec('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubEditorsSec',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubYearReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPubYear()
        );
    }

    /**
     * @test
     */
    public function setPubYearForIntSetsPubYear()
    {
        $this->subject->setPubYear(12);

        self::assertAttributeEquals(
            12,
            'pubYear',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubMonthReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPubMonth()
        );
    }

    /**
     * @test
     */
    public function setPubMonthForIntSetsPubMonth()
    {
        $this->subject->setPubMonth(12);

        self::assertAttributeEquals(
            12,
            'pubMonth',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubBooktitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubBooktitle()
        );
    }

    /**
     * @test
     */
    public function setPubBooktitleForStringSetsPubBooktitle()
    {
        $this->subject->setPubBooktitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubBooktitle',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubPublisherReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubPublisher()
        );
    }

    /**
     * @test
     */
    public function setPubPublisherForStringSetsPubPublisher()
    {
        $this->subject->setPubPublisher('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubPublisher',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubJournalReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubJournal()
        );
    }

    /**
     * @test
     */
    public function setPubJournalForStringSetsPubJournal()
    {
        $this->subject->setPubJournal('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubJournal',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubVolumeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubVolume()
        );
    }

    /**
     * @test
     */
    public function setPubVolumeForStringSetsPubVolume()
    {
        $this->subject->setPubVolume('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubVolume',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubNumberReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubNumber()
        );
    }

    /**
     * @test
     */
    public function setPubNumberForStringSetsPubNumber()
    {
        $this->subject->setPubNumber('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubNumber',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubSeriesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubSeries()
        );
    }

    /**
     * @test
     */
    public function setPubSeriesForStringSetsPubSeries()
    {
        $this->subject->setPubSeries('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubSeries',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubSchoolReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubSchool()
        );
    }

    /**
     * @test
     */
    public function setPubSchoolForStringSetsPubSchool()
    {
        $this->subject->setPubSchool('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubSchool',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubAddress()
        );
    }

    /**
     * @test
     */
    public function setPubAddressForStringSetsPubAddress()
    {
        $this->subject->setPubAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubAddress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubEditionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubEdition()
        );
    }

    /**
     * @test
     */
    public function setPubEditionForStringSetsPubEdition()
    {
        $this->subject->setPubEdition('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubEdition',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubPagesReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubPages()
        );
    }

    /**
     * @test
     */
    public function setPubPagesForStringSetsPubPages()
    {
        $this->subject->setPubPages('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubPages',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubKeywordsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPubKeywords()
        );
    }

    /**
     * @test
     */
    public function setPubKeywordsForIntSetsPubKeywords()
    {
        $this->subject->setPubKeywords(12);

        self::assertAttributeEquals(
            12,
            'pubKeywords',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubIsbnReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubIsbn()
        );
    }

    /**
     * @test
     */
    public function setPubIsbnForStringSetsPubIsbn()
    {
        $this->subject->setPubIsbn('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubIsbn',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubDoiReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubDoi()
        );
    }

    /**
     * @test
     */
    public function setPubDoiForStringSetsPubDoi()
    {
        $this->subject->setPubDoi('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubDoi',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubUrlReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubUrl()
        );
    }

    /**
     * @test
     */
    public function setPubUrlForStringSetsPubUrl()
    {
        $this->subject->setPubUrl('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubUrl',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubUrlDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPubUrlDate()
        );
    }

    /**
     * @test
     */
    public function setPubUrlDateForDateTimeSetsPubUrlDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPubUrlDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'pubUrlDate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPubNoteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPubNote()
        );
    }

    /**
     * @test
     */
    public function setPubNoteForStringSetsPubNote()
    {
        $this->subject->setPubNote('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'pubNote',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeTitelReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeTitel()
        );
    }

    /**
     * @test
     */
    public function setMeeTitelForStringSetsMeeTitel()
    {
        $this->subject->setMeeTitel('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeTitel',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeePersonsSecReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeePersonsSec()
        );
    }

    /**
     * @test
     */
    public function setMeePersonsSecForStringSetsMeePersonsSec()
    {
        $this->subject->setMeePersonsSec('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meePersonsSec',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeOrganisersSecReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeOrganisersSec()
        );
    }

    /**
     * @test
     */
    public function setMeeOrganisersSecForStringSetsMeeOrganisersSec()
    {
        $this->subject->setMeeOrganisersSec('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeOrganisersSec',
            $this->subject
        );
    }

		/**
     * @test
     */
    public function getMeeOrganisationSecReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeOrganisationSec()
        );
    }

    /**
     * @test
     */
    public function setMeeOrganisationSecForStringSetsMeeOrganisationSec()
    {
        $this->subject->setMeeOrganisationSec('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeOrganisationSec',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeParticipantsSecReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeParticipantsSec()
        );
    }

    /**
     * @test
     */
    public function setMeeParticipantsSecForStringSetsMeeParticipantsSec()
    {
        $this->subject->setMeeParticipantsSec('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeParticipantsSec',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeTimeReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMeeTime()
        );
    }

    /**
     * @test
     */
    public function setMeeTimeForDateTimeSetsMeeTime()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMeeTime($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'meeTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeEndTimeReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getMeeEndTime()
        );
    }

    /**
     * @test
     */
    public function setMeeEndTimeForDateTimeSetsMeeEndTime()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setMeeEndTime($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'meeEndTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeShowTimeReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getMeeShowTime()
        );
    }

    /**
     * @test
     */
    public function setMeeShowTimeForBoolSetsMeeShowTime()
    {
        $this->subject->setMeeShowTime(true);

        self::assertAttributeEquals(
            true,
            'meeShowTime',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeTextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeText()
        );
    }

    /**
     * @test
     */
    public function setMeeTextForStringSetsMeeText()
    {
        $this->subject->setMeeText('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeText',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeEventReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeEvent()
        );
    }

    /**
     * @test
     */
    public function setMeeEventForStringSetsMeeEvent()
    {
        $this->subject->setMeeEvent('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeEvent',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeAdressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeAdress()
        );
    }

    /**
     * @test
     */
    public function setMeeAdressForStringSetsMeeAdress()
    {
        $this->subject->setMeeAdress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeAdress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeUrlReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeUrl()
        );
    }

    /**
     * @test
     */
    public function setMeeUrlForStringSetsMeeUrl()
    {
        $this->subject->setMeeUrl('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeUrl',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeDoiReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeDoi()
        );
    }

    /**
     * @test
     */
    public function setMeeDoiForStringSetsMeeDoi()
    {
        $this->subject->setMeeDoi('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeDoi',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeNoteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMeeNote()
        );
    }

    /**
     * @test
     */
    public function setMeeNoteForStringSetsMeeNote()
    {
        $this->subject->setMeeNote('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'meeNote',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMeeKeywordsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMeeKeywords()
        );
    }

    /**
     * @test
     */
    public function setMeeKeywordsForIntSetsMeeKeywords()
    {
        $this->subject->setMeeKeywords(12);

        self::assertAttributeEquals(
            12,
            'meeKeywords',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTagsReturnsInitialValueForArtikelTags()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTags()
        );
    }

    /**
     * @test
     */
    public function setTagsForObjectStorageContainingArtikelTagsSetsTags()
    {
        $tags = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags();
        $objectStorageHoldingExactlyOneTags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTags->attach($tags);
        $this->subject->setTags($objectStorageHoldingExactlyOneTags);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTags,
            'tags',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTagsToObjectStorageHoldingTags()
    {
        $tags = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($tags));
        $this->inject($this->subject, 'tags', $tagsObjectStorageMock);

        $this->subject->addTags($tags);
    }

    /**
     * @test
     */
    public function removeTagsFromObjectStorageHoldingTags()
    {
        $tags = new \DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags();
        $tagsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $tagsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($tags));
        $this->inject($this->subject, 'tags', $tagsObjectStorageMock);

        $this->subject->removeTags($tags);
    }
}
