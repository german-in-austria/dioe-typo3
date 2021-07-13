<?php
namespace HcbIamDioeMeme\HcbIamdioeMeme\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class MemeEntrieTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\MemeEntrie();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getDatumReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDatum()
        );
    }

    /**
     * @test
     */
    public function setDatumForDateTimeSetsDatum()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDatum($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'datum',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVotesReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getVotes()
        );
    }

    /**
     * @test
     */
    public function setVotesForIntSetsVotes()
    {
        $this->subject->setVotes(12);

        self::assertAttributeEquals(
            12,
            'votes',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBildReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getBild()
        );
    }

    /**
     * @test
     */
    public function setBildForFileReferenceSetsBild()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setBild($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'bild',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMemetagReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemetag()
        );
    }

    /**
     * @test
     */
    public function setMemetagForStringSetsMemetag()
    {
        $this->subject->setMemetag('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memetag',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMemetexteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMemetexte()
        );
    }

    /**
     * @test
     */
    public function setMemetexteForStringSetsMemetexte()
    {
        $this->subject->setMemetexte('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'memetexte',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFreigegebenReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getFreigegeben()
        );
    }

    /**
     * @test
     */
    public function setFreigegebenForBoolSetsFreigegeben()
    {
        $this->subject->setFreigegeben(true);

        self::assertAttributeEquals(
            true,
            'freigegeben',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAlterjahreReturnsInitialValueForInt()
    {
        self::assertSame(
            '',
            $this->subject->getAlterjahre()
        );
    }

    /**
     * @test
     */
    public function setAlterjahreForIntSetsAlterjahre()
    {
        $this->subject->setAlterjahre('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'alterjahre',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGeburtsortReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGeburtsort()
        );
    }

    /**
     * @test
     */
    public function setGeburtsortForStringSetsGeburtsort()
    {
        $this->subject->setGeburtsort('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'geburtsort',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWohnortReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWohnort()
        );
    }

    /**
     * @test
     */
    public function setWohnortForStringSetsWohnort()
    {
        $this->subject->setWohnort('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'wohnort',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGeschlechtReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGeschlecht()
        );
    }

    /**
     * @test
     */
    public function setGeschlechtForStringSetsGeschlecht()
    {
        $this->subject->setGeschlecht('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'geschlecht',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDialektReturnsInitialValueForString()
    {
        self::assertSame(
            false,
            $this->subject->getDialekt()
        );
    }

    /**
     * @test
     */
    public function setDialektForStringSetsDialekt()
    {
        $this->subject->setDialekt(true);

        self::assertAttributeEquals(
            true,
            'dialekt',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDialektalltagReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDialektalltag()
        );
    }

    /**
     * @test
     */
    public function setDialektalltagForStringSetsDialektalltag()
    {
        $this->subject->setDialektalltag('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'dialektalltag',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDialektbezeichnungReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDialektbezeichnung()
        );
    }

    /**
     * @test
     */
    public function setDialektbezeichnungForStringSetsDialektbezeichnung()
    {
        $this->subject->setDialektbezeichnung('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'dialektbezeichnung',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTeilnahmeReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getTeilnahme()
        );
    }

    /**
     * @test
     */
    public function setTeilnahmeForBoolSetsTeilnahme()
    {
        $this->subject->setTeilnahme(true);

        self::assertAttributeEquals(
            true,
            'teilnahme',
            $this->subject
        );
    }
}
