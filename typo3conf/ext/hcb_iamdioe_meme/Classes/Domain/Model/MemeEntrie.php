<?php
namespace HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model;

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
 * MemeEntrie
 */
class MemeEntrie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * datum
     *
     * @var \DateTime
     */
    protected $datum = null;

    /**
     * votes
     *
     * @var int
     */
    protected $votes = 0;

    /**
     * bild
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $bild = null;

    /**
     * memetag
     *
     * @var string
     */
    protected $memetag = '';

    /**
     * memetexte
     *
     * @var string
     */
    protected $memetexte = '';

    /**
     * freigegeben
     *
     * @var bool
     */
    protected $freigegeben = false;

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * alterjahre
     *
     * @var string
     */
    protected $alterjahre = '';

    /**
     * geburtsort
     *
     * @var string
     */
    protected $geburtsort = '';

    /**
     * wohnort
     *
     * @var string
     */
    protected $wohnort = '';

    /**
     * geschlecht
     *
     * @var string
     */
    protected $geschlecht = '';

    /**
     * dialekt
     *
     * @var string
     */
    protected $dialekt = false;

    /**
     * dialektalltag
     *
     * @var string
     */
    protected $dialektalltag = '';

    /**
     * dialektbezeichnung
     *
     * @var string
     */
    protected $dialektbezeichnung = '';

    /**
     * teilnahme
     *
     * @var bool
     */
    protected $teilnahme = false;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
    }

    /**
     * Returns the pid
     *
     * @return int pid
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Returns the datum
     *
     * @return \DateTime datum
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Sets the datum
     *
     * @param \DateTime $datum
     * @return void
     */
    public function setDatum(\DateTime $datum)
    {
        $this->datum = $datum;
    }

    /**
     * Returns the votes
     *
     * @return int votes
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Sets the votes
     *
     * @param int $votes
     * @return void
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * Votes + 1
     *
     * @param int $votes
     * @return void
     */
    public function addVote()
    {
        $this->votes = $this->votes + 1;
    }

    /**
     * Returns the bild
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     */
    public function getBild()
    {
        return $this->bild;
    }

    /**
     * Sets the bild
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
     * @return void
     */
    public function setBild(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bild)
    {
        $this->bild = $bild;
    }

    /**
     * Returns the memetag
     *
     * @return string memetag
     */
    public function getMemetag()
    {
        return str_replace("#", "", $this->memetag);
    }

    /**
     * Sets the memetag
     *
     * @param string $memetag
     * @return void
     */
    public function setMemetag($memetag)
    {
        $this->memetag = str_replace("#", "", $memetag);
    }

    /**
     * Returns the memetexte
     *
     * @return string memetexte
     */
    public function getMemetexte()
    {
        return $this->memetexte;
    }

    /**
     * Sets the memetexte
     *
     * @param string $memetexte
     * @return void
     */
    public function setMemetexte($memetexte)
    {
        $this->memetexte = $memetexte;
    }

    /**
     * Returns the freigegeben
     *
     * @return bool freigegeben
     */
    public function getFreigegeben()
    {
        return $this->freigegeben;
    }

    /**
     * Sets the freigegeben
     *
     * @param bool $freigegeben
     * @return void
     */
    public function setFreigegeben($freigegeben)
    {
        $this->freigegeben = $freigegeben;
    }

    /**
     * Returns the boolean state of freigegeben
     *
     * @return bool freigegeben
     */
    public function isFreigegeben()
    {
        return $this->freigegeben;
    }

    /**
     * Returns the email
     *
     * @return string email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the alterjahre
     *
     * @return string alterjahre
     */
    public function getAlterjahre()
    {
        return $this->alterjahre;
    }

    /**
     * Sets the alterjahre
     *
     * @param string $alterjahre
     * @return void
     */
    public function setAlterjahre($alterjahre)
    {
        $this->alterjahre = $alterjahre;
    }

    /**
     * Returns the geburtsort
     *
     * @return string geburtsort
     */
    public function getGeburtsort()
    {
        return $this->geburtsort;
    }

    /**
     * Sets the geburtsort
     *
     * @param string $geburtsort
     * @return void
     */
    public function setGeburtsort($geburtsort)
    {
        $this->geburtsort = $geburtsort;
    }

    /**
     * Returns the wohnort
     *
     * @return string wohnort
     */
    public function getWohnort()
    {
        return $this->wohnort;
    }

    /**
     * Sets the wohnort
     *
     * @param string $wohnort
     * @return void
     */
    public function setWohnort($wohnort)
    {
        $this->wohnort = $wohnort;
    }

    /**
     * Returns the geschlecht
     *
     * @return string geschlecht
     */
    public function getGeschlecht()
    {
        return $this->geschlecht;
    }

    /**
     * Sets the geschlecht
     *
     * @param string $geschlecht
     * @return void
     */
    public function setGeschlecht($geschlecht)
    {
        $this->geschlecht = $geschlecht;
    }

    /**
     * Returns the dialekt
     *
     * @return string dialekt
     */
    public function getDialekt()
    {
        return $this->dialekt;
    }

    /**
     * Sets the dialekt
     *
     * @param string $dialekt
     * @return void
     */
    public function setDialekt($dialekt)
    {
        $this->dialekt = $dialekt;
    }

    /**
     * Returns the dialektalltag
     *
     * @return string dialektalltag
     */
    public function getDialektalltag()
    {
        return $this->dialektalltag;
    }

    /**
     * Sets the dialektalltag
     *
     * @param string $dialektalltag
     * @return void
     */
    public function setDialektalltag($dialektalltag)
    {
        $this->dialektalltag = $dialektalltag;
    }

    /**
     * Returns the dialektbezeichnung
     *
     * @return string dialektbezeichnung
     */
    public function getDialektbezeichnung()
    {
        return $this->dialektbezeichnung;
    }

    /**
     * Sets the dialektbezeichnung
     *
     * @param string $dialektbezeichnung
     * @return void
     */
    public function setDialektbezeichnung($dialektbezeichnung)
    {
        $this->dialektbezeichnung = $dialektbezeichnung;
    }

    /**
     * Returns the teilnahme
     *
     * @return bool teilnahme
     */
    public function getTeilnahme()
    {
        return $this->teilnahme;
    }

    /**
     * Sets the teilnahme
     *
     * @param bool $teilnahme
     * @return void
     */
    public function setTeilnahme($teilnahme)
    {
        $this->teilnahme = $teilnahme;
    }

    /**
     * Returns the boolean state of teilnahme
     *
     * @return bool teilnahme
     */
    public function isTeilnahme()
    {
        return $this->teilnahme;
    }
}
