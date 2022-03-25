<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Domain\Model;

use DioeArticleSystem\Dioearticlesystem\Utility\XmlProcessor;


/**
 * This file is part of the "Diö Artikelsystem" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * (c) 2021 HCB
 * DioeArticle
 */
class DioeArticle extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
		/**
		 * @var boolean
		 */
		protected $hidden;

		/**
		 * _languageUid
		 * @var int
		 */
		protected $_languageUid;

		/**
		 * @param int $_languageUid
		 * @return void
		 */
		public function set_languageUid($_languageUid) {
		    $this->_languageUid = $_languageUid;
		}

		/**
		 * @return int
		 */
		public function get_languageUid() {
		    return $this->_languageUid;
		}

    /**
     * Art des Artikels
     *
     * @var int
     */
    protected $aType = 0;

		/**
     * Ursprung des Artikels
     *
     * @var int
     */
    protected $aHome = 0;

    /**
     * Datum
     *
     * @var \DateTime
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $aDate = null;

		/**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags>
     */
    protected $tags = null;

    /**
     * Überschrift (Muss angegeben werden.)
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $prevTitle = '';

    /**
     * Text (Wenn leer wird der Text der Detailseite, in gekürzter Form, verwendet)
     *
     *
     * @var string
     */
    protected $prevText = '';

    /**
     * Kategorien (Einen Task-Cluster und ggf. eine weitere Kategorie auswählen.)
     *
     *
     * @var string
     */
    protected $aTaskCluster = '';

    /**
     * Auf Startseite Pinnen
     *
     * @var bool
     */
    protected $startPin = false;

    /**
     * In Kategorie Pinnen
     *
     * @var bool
     */
    protected $catPin = false;

    /**
     * Bild
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $prevPic = null;

    /**
     * Seitenverhältniss des Bildes
     *
     *
     * @var int
     */
    protected $prevPicCroppingMode = 0;

    /**
     * Überschrift (Wenn leer wird Überschrift der Übersicht verwendet)
     *
     *
     * @var string
     */
    protected $detailTitle = '';

    /**
     * Text (Wenn leer wird Text von Übersicht verwendet)
     *
     *
     * @var string
     */
    protected $detailText = '';

    /**
     * Bilder
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $detailPic = null;

    /**
     * Seitenverhältniss des Bildes
     *
     *
     * @var int
     */
    protected $detailPicCroppingMode = 0;

    /**
     * Dateien
     *
     * @var string
     */
    protected $avFiles = null;

    /**
     * Spalten
     *
     * @var int
     */
    protected $avCols = 0;

    /**
     * Seitenverhältniss
     *
     * @var int
     */
    protected $avAspectRatio = 0;

    /**
     * Dateien
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $fFiles = null;

    /**
     * Name (BE-User)
     *
     * @var int
     */
    protected $zUser = 0;

    /**
     * Name (Überschreibt obere Auswahl!)
     *
     *
     * @var string
     */
    protected $zName = '';

    /**
     * Titel (Sonst Überschrift vom Reiter "Übersicht")
     *
     *
     * @var string
     */
    protected $zTitle = '';

    /**
     * Standort
     *
     * @var int
     */
    protected $zPlace = 0;

    /**
     * Lizenz: Name
     *
     *
     * @var string
     */
    protected $zLName = '';

    /**
     * Lizenz: Erlauben, dass Bearbeitungen Ihres Werkes geteilt werden?
     * (creativecommons.org)
     *
     *
     * @var int
     */
    protected $zShare = 0;

    /**
     * Lizenz: Kommerzielle Nutzungen Ihres Werkes erlauben? (creativecommons.org)
     *
     *
     * @var int
     */
    protected $zComShare = 0;

    /**
     * Lizenz: Freitext (Überschreibt obere Lizenzfelder!)
     *
     *
     * @var string
     */
    protected $zLText = '';

    /**
     * Datei (mp3)
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $pFile = null;

    /**
     * Dauer (z.B.: "50:30" -> 50 Minuten und 30 Sekunden)
     *
     *
     * @var string
     */
    protected $pDuration = '';

    /**
     * Art
     *
     * @var int
     */
    protected $pubType = 0;

    /**
     * Titel
     *
     * @var string
     */
    protected $pubTitle = '';

    /**
     * Autoren/Herausgeber(author/editor)
     *
     * @var string
     */
    protected $pubEditorsSec = '';

    /**
     * Erscheinungsjahr (year, vierstellig, 0=in Planung, 1=in Druck, 2=eingereicht,
     * 3=in Vorbereitung)
     *
     * @var int
     */
    protected $pubYear = 0;

    /**
     * Monat (month)
     *
     * @var int
     */
    protected $pubMonth = 0;

    /**
     * Buchtitel (booktitle)
     *
     * @var string
     */
    protected $pubBooktitle = '';

    /**
     * Verlag (publisher)
     *
     * @var string
     */
    protected $pubPublisher = '';

    /**
     * Zeitschrift (journal)
     *
     * @var string
     */
    protected $pubJournal = '';

    /**
     * Band (volume)
     *
     * @var string
     */
    protected $pubVolume = '';

    /**
     * (Reihen-)Nummer (number)
     *
     * @var string
     */
    protected $pubNumber = '';

    /**
     * Reihe (series)
     *
     * @var string
     */
    protected $pubSeries = '';

    /**
     * Universität (school)
     *
     * @var string
     */
    protected $pubSchool = '';

    /**
     * Verlagsort (address)
     *
     * @var string
     */
    protected $pubAddress = '';

    /**
     * Auflage (edition)
     *
     * @var string
     */
    protected $pubEdition = '';

    /**
     * Seite(n) (von-bis) (pages)
     *
     * @var string
     */
    protected $pubPages = '';

    /**
     * Schlüsselwörter (keywords)
     *
     * @var int
     */
    protected $pubKeywords = 0;

    /**
     * ISBN (isbn)
     *
     * @var string
     */
    protected $pubIsbn = '';

    /**
     * Digital Object Identifier (doi)
     *
     * @var string
     */
    protected $pubDoi = '';

    /**
     * URL (url)
     *
     * @var string
     */
    protected $pubUrl = '';

    /**
     * URL Zugriffsdatum (urldate)
     *
     * @var \DateTime
     */
    protected $pubUrlDate = null;

    /**
     * Notiz (note)
     *
     * @var string
     */
    protected $pubNote = '';

    /**
     * Titel
     *
     * @var string
     */
    protected $meeTitel = '';

    /**
     * Vortragende
     *
     * @var string
     */
    protected $meePersonsSec = '';

    /**
     * Organisatoren
     *
     * @var string
     */
    protected $meeOrganisersSec = '';

		/**
     * Organisationen
     *
     * @var string
     */
    protected $meeOrganisationSec = '';

    /**
     * Teilnehmer
     *
     * @var string
     */
    protected $meeParticipantsSec = '';

    /**
     * Zeit
     *
     * @var \DateTime
     */
    protected $meeTime = null;

    /**
     * bis Zeit
     *
     * @var \DateTime
     */
    protected $meeEndTime = null;

    /**
     * Uhrzeit anzeigen
     *
     * @var bool
     */
    protected $meeShowTime = false;

    /**
     * Termintext (Nur für Lehrveranstaltungen!)
     *
     * @var string
     */
    protected $meeText = '';

    /**
     * Event
     *
     * @var string
     */
    protected $meeEvent = '';

    /**
     * Adresse
     *
     * @var string
     */
    protected $meeAdress = '';

    /**
     * URL
     *
     * @var string
     */
    protected $meeUrl = '';

    /**
     * terminDoi
     *
     * @var string
     */
    protected $meeDoi = '';

    /**
     * Notiz
     *
     * @var string
     */
    protected $meeNote = '';

    /**
     * Schlüsselwörter (keywords)
     *
     * @var int
     */
    protected $meeKeywords = 0;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->detailPic = $this->detailPic ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->fFiles = $this->fFiles ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
				$this->tags = $this->tags ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

		/**
		 * @return bool
		 */
		public function isHidden()
		{
		    return $this->hidden;
		}

		/**
		 * @param bool $hidden
		 */
		public function setHidden($hidden)
		{
		    $this->hidden = $hidden;
		}

    /**
     * Returns the aDate
     *
     * @return \DateTime $aDate
     */
    public function getADate()
    {
        return $this->aDate;
    }

    /**
     * Sets the aDate
     *
     * @param \DateTime $aDate
     * @return void
     */
    public function setADate(\DateTime $aDate)
    {
        $this->aDate = $aDate;
    }

		/**
     * Adds a ArtikelTags
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags $tags
     * @return void
     */
    public function addTags(\DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags $tags)
    {
        $this->tags->attach($tags);
    }

    /**
     * Removes a ArtikelTags
     *
     * @param \DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags $tagsToRemove The ArtikelTags to be removed
     * @return void
     */
    public function removeTags(\DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags $tagsToRemove)
    {
        $this->tags->detach($tagsToRemove);
    }

    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags> $tags
     */
    public function getTags()
    {
				return $this->tags;
    }

		/**
		 * Returns the tags
		 *
		 * @return array $tags
		 */
		public function getTagsTxt()
		{
				$ttxt = '';
				$thtml = '';
				$dg = 0;
				$tcolor = '';
				if ($this->tags) {
					$tarr = $this->tags->toArray();
					foreach ($tarr as $tag) {
						if ($dg > 0) {
							if ($dg == count($tarr) - 1) {
								$ttxt .= ' und ';
								$thtml .= ' und ';
							} else {
								$ttxt .= ', ';
								$thtml .= ', ';
							}
						} else {
							$tcolor = $tag->getColor();
						}
						$ttxt .= $tag->getName();
						$thtml .= '<span' . ($tag->getColor() ? ' style="color:' . $tag->getColor() . ';"' : '') . '>' . $tag->getName() . '</span>';
						$dg += 1;
					}
				}
				return [
					'array' => $this->tags,
					'txt' => $ttxt,
					'html' => $thtml,
					'color' => $tcolor
				];
		}

    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\DioeArticleSystem\Dioearticlesystem\Domain\Model\ArtikelTags> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Returns the prevTitle
     *
     * @return string $prevTitle
     */
    public function getPrevTitle()
    {
        return $this->prevTitle;
    }

    /**
     * Sets the prevTitle
     *
     * @param string $prevTitle
     * @return void
     */
    public function setPrevTitle($prevTitle)
    {
        $this->prevTitle = $prevTitle;
    }

    /**
     * Returns the prevText
     *
     * @return string $prevText
     */
    public function getPrevText()
    {
        return $this->prevText;
    }

    /**
     * Sets the prevText
     *
     * @param string $prevText
     * @return void
     */
    public function setPrevText($prevText)
    {
        $this->prevText = $prevText;
    }

    /**
     * Returns the startPin
     *
     * @return bool $startPin
     */
    public function getStartPin()
    {
        return $this->startPin;
    }

    /**
     * Sets the startPin
     *
     * @param bool $startPin
     * @return void
     */
    public function setStartPin($startPin)
    {
        $this->startPin = $startPin;
    }

    /**
     * Returns the boolean state of startPin
     *
     * @return bool
     */
    public function isStartPin()
    {
        return $this->startPin;
    }

    /**
     * Returns the catPin
     *
     * @return bool $catPin
     */
    public function getCatPin()
    {
        return $this->catPin;
    }

    /**
     * Sets the catPin
     *
     * @param bool $catPin
     * @return void
     */
    public function setCatPin($catPin)
    {
        $this->catPin = $catPin;
    }

    /**
     * Returns the boolean state of catPin
     *
     * @return bool
     */
    public function isCatPin()
    {
        return $this->catPin;
    }

    /**
     * Returns the prevPic
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $prevPic
     */
    public function getPrevPic()
    {
        return $this->prevPic;
    }

    /**
     * Sets the prevPic
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $prevPic
     * @return void
     */
    public function setPrevPic(\TYPO3\CMS\Extbase\Domain\Model\FileReference $prevPic)
    {
        $this->prevPic = $prevPic;
    }

    /**
     * Returns the prevPicCroppingMode
     *
     * @return int $prevPicCroppingMode
     */
    public function getPrevPicCroppingMode()
    {
        return $this->prevPicCroppingMode;
    }

    /**
     * Sets the prevPicCroppingMode
     *
     * @param int $prevPicCroppingMode
     * @return void
     */
    public function setPrevPicCroppingMode($prevPicCroppingMode)
    {
        $this->prevPicCroppingMode = $prevPicCroppingMode;
    }

    /**
     * Returns the detailTitle
     *
     * @return string $detailTitle
     */
    public function getDetailTitle()
    {
        return $this->detailTitle;
    }

    /**
     * Sets the detailTitle
     *
     * @param string $detailTitle
     * @return void
     */
    public function setDetailTitle($detailTitle)
    {
        $this->detailTitle = $detailTitle;
    }

    /**
     * Returns the detailText
     *
     * @return string $detailText
     */
    public function getDetailText()
    {
        return $this->detailText;
    }

    /**
     * Sets the detailText
     *
     * @param string $detailText
     * @return void
     */
    public function setDetailText($detailText)
    {
        $this->detailText = $detailText;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $detailPic
     * @return void
     */
    public function addDetailPic(\TYPO3\CMS\Extbase\Domain\Model\FileReference $detailPic)
    {
        $this->detailPic->attach($detailPic);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $detailPicToRemove The FileReference to be removed
     * @return void
     */
    public function removeDetailPic(\TYPO3\CMS\Extbase\Domain\Model\FileReference $detailPicToRemove)
    {
        $this->detailPic->detach($detailPicToRemove);
    }

    /**
     * Returns the detailPic
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $detailPic
     */
    public function getDetailPic()
    {
        return $this->detailPic;
    }

    /**
     * Sets the detailPic
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $detailPic
     * @return void
     */
    public function setDetailPic(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $detailPic)
    {
        $this->detailPic = $detailPic;
    }

    /**
     * Returns the detailPicCroppingMode
     *
     * @return int $detailPicCroppingMode
     */
    public function getDetailPicCroppingMode()
    {
        return $this->detailPicCroppingMode;
    }

    /**
     * Sets the detailPicCroppingMode
     *
     * @param int $detailPicCroppingMode
     * @return void
     */
    public function setDetailPicCroppingMode($detailPicCroppingMode)
    {
        $this->detailPicCroppingMode = $detailPicCroppingMode;
    }

		/**
     * Returns the avFiles
     *
     * @return string $avFiles
     */
    public function getAvFiles()
    {
        return $this->avFiles;
    }

		/**
     * Returns the avFiles
     *
     * @return string $avFiles
     */
    public function getAvFilesP()
    {
        return XmlProcessor::xmlArray($this->avFiles);
    }

    /**
     * Sets the avFiles
     *
     * @param string $avFiles
     * @return void
     */
    public function setAvFiles($avFiles)
    {
        $this->avFiles = $avFiles;
    }

    /**
     * Returns the avCols
     *
     * @return int $avCols
     */
    public function getAvCols()
    {
        return $this->avCols;
    }

    /**
     * Sets the avCols
     *
     * @param int $avCols
     * @return void
     */
    public function setAvCols($avCols)
    {
        $this->avCols = $avCols;
    }

    /**
     * Returns the avAspectRatio
     *
     * @return int $avAspectRatio
     */
    public function getAvAspectRatio()
    {
        return $this->avAspectRatio;
    }

    /**
     * Sets the avAspectRatio
     *
     * @param int $avAspectRatio
     * @return void
     */
    public function setAvAspectRatio($avAspectRatio)
    {
        $this->avAspectRatio = $avAspectRatio;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fFile
     * @return void
     */
    public function addFFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fFile)
    {
        $this->fFiles->attach($fFile);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $fFileToRemove The FileReference to be removed
     * @return void
     */
    public function removeFFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $fFileToRemove)
    {
        $this->fFiles->detach($fFileToRemove);
    }

    /**
     * Returns the fFiles
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $fFiles
     */
    public function getFFiles()
    {
        return $this->fFiles;
    }

    /**
     * Sets the fFiles
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $fFiles
     * @return void
     */
    public function setFFiles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $fFiles)
    {
        $this->fFiles = $fFiles;
    }

    /**
     * Returns the zUser
     *
     * @return int $zUser
     */
    public function getZUser()
    {
        return $this->zUser;
    }

    /**
     * Sets the zUser
     *
     * @param int $zUser
     * @return void
     */
    public function setZUser($zUser)
    {
        $this->zUser = $zUser;
    }

    /**
     * Returns the zName
     *
     * @return string $zName
     */
    public function getZName()
    {
        return $this->zName;
    }

    /**
     * Sets the zName
     *
     * @param string $zName
     * @return void
     */
    public function setZName($zName)
    {
        $this->zName = $zName;
    }

    /**
     * Returns the zTitle
     *
     * @return string $zTitle
     */
    public function getZTitle()
    {
        return $this->zTitle;
    }

    /**
     * Sets the zTitle
     *
     * @param string $zTitle
     * @return void
     */
    public function setZTitle($zTitle)
    {
        $this->zTitle = $zTitle;
    }

    /**
     * Returns the zPlace
     *
     * @return int $zPlace
     */
    public function getZPlace()
    {
        return $this->zPlace;
    }

    /**
     * Sets the zPlace
     *
     * @param int $zPlace
     * @return void
     */
    public function setZPlace($zPlace)
    {
        $this->zPlace = $zPlace;
    }

    /**
     * Returns the zLName
     *
     * @return string $zLName
     */
    public function getZLName()
    {
        return $this->zLName;
    }

    /**
     * Sets the zLName
     *
     * @param string $zLName
     * @return void
     */
    public function setZLName($zLName)
    {
        $this->zLName = $zLName;
    }

    /**
     * Returns the zShare
     *
     * @return int $zShare
     */
    public function getZShare()
    {
        return $this->zShare;
    }

    /**
     * Sets the zShare
     *
     * @param int $zShare
     * @return void
     */
    public function setZShare($zShare)
    {
        $this->zShare = $zShare;
    }

    /**
     * Returns the zComShare
     *
     * @return int $zComShare
     */
    public function getZComShare()
    {
        return $this->zComShare;
    }

    /**
     * Sets the zComShare
     *
     * @param int $zComShare
     * @return void
     */
    public function setZComShare($zComShare)
    {
        $this->zComShare = $zComShare;
    }

    /**
     * Returns the zLText
     *
     * @return string $zLText
     */
    public function getZLText()
    {
        return $this->zLText;
    }

    /**
     * Sets the zLText
     *
     * @param string $zLText
     * @return void
     */
    public function setZLText($zLText)
    {
        $this->zLText = $zLText;
    }

    /**
     * Returns the pFile
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pFile
     */
    public function getPFile()
    {
        return $this->pFile;
    }

    /**
     * Sets the pFile
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pFile
     * @return void
     */
    public function setPFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pFile)
    {
        $this->pFile = $pFile;
    }

    /**
     * Returns the pDuration
     *
     * @return string $pDuration
     */
    public function getPDuration()
    {
        return $this->pDuration;
    }

    /**
     * Sets the pDuration
     *
     * @param string $pDuration
     * @return void
     */
    public function setPDuration($pDuration)
    {
        $this->pDuration = $pDuration;
    }

		/**
		 * Returns the pubBibTexAuthors
		 *
		 * @return string $pubBibTexAuthors
		 */
		public function getPubBibTexAuthors()
		{
			$txt = '';
			// Autoren und Editoren
			$pae = $this->getPubEditorsSec();
			$txt .= htmlspecialchars($pae['txtAuthor']);
			if ($this->pubType !== 3 && strlen($pae['txtEditor']) > 0) {
				if (strlen($pae['txtAuthor']) > 0 && strlen($pae['txtEditor']) > 0) {
					$txt .= ' / ';
				}
				$txt .= htmlspecialchars($pae['txtEditor']) . ' (Hg.)';
			}
			return $txt;
		}

		/**
		 * Returns the pubBibTex
		 *
		 * @return string $pubBibTex
		 */
		public function getPubBibTex()
		{
				$languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
				$sys_language_uid = $languageAspect->getId();
				$txt = '';
				// Autoren und Editoren
				$pae = $this->getPubEditorsSec();
				$txt .= htmlspecialchars($pae['txtAuthor']);
				if ($this->pubType !== 3 && strlen($pae['txtEditor']) > 0) {
					if (strlen($pae['txtAuthor']) > 0 && strlen($pae['txtEditor']) > 0) {
						$txt .= ' / ';
					}
					$txt .= htmlspecialchars($pae['txtEditor']) . ' (Hg.)';
				}
				if (strlen($pae['txtAuthor']) > 0 || strlen($pae['txtEditor']) > 0) {
					$txt .= ' ';
				}
				// Zeitraum
				if ($this->pubYear > 9) {
					$txt .= '(' . $this->pubYear . '): ';
				} else {
					$langtxt = $sys_language_uid == 0 ? ['in Planung', 'in Druck', 'eingereicht', 'in Vorbereitung']
					 																	: ['in planning', 'in print', 'submitted', 'in preparation'];
					$txt .= '(' . (@$langtxt[$this->pubYear] ?: 'unbekannt') . '): ';
				}
				$txt .= $this->pubTitle . '. ';
				if ($this->pubType == 6) {
					$txt .= '[unveröffentlicht]';
				} else {
					if (in_array($this->pubType, [1, 3])) {
						$txt .= 'In: ';
					}
					if ($this->pubType == 1) {
						$txt .= htmlspecialchars($this->pubJournal) . ' ';
					}
					if ($this->pubType == 3) {
						$txt .= htmlspecialchars($pae['txtEditor']) . ': ';
						if ($this->pubBooktitle && strlen($this->pubBooktitle) > 0) {
							$txt .= htmlspecialchars($this->pubBooktitle) . ' ';
						}
					}
					if (in_array($this->pubType, [1, 2, 3]) && $this->pubVolume && strlen($this->pubVolume) > 0) {
						$txt .= ($sys_language_uid == 0 ? 'Band ' : 'volume ') . htmlspecialchars($this->pubVolume) . '. ';
					}
					$pubPoint = false;
					if (in_array($this->pubType, [2, 3]) && $this->pubEdition && strlen($this->pubEdition) > 0) {
						$txt .= htmlspecialchars($this->pubEdition) . ' ';
					}
					if ($this->pubType == 1 && $this->pubNumber && strlen($this->pubNumber) > 0) {
						$txt .= htmlspecialchars($this->pubNumber) . ($this->pubPages && strlen($this->pubPages) > 0 ? ', ' : ' ');
					}
					if ($this->pubType == 1 && $this->pubPages && strlen($this->pubPages) > 0) {
						$txt .= htmlspecialchars($this->pubPages) . ' ';
						$pubPoint = true;
					}
					if (in_array($this->pubType, [2, 3]) && $this->pubAddress && strlen($this->pubAddress) > 0) {
						$txt .= htmlspecialchars($this->pubAddress) . ': ';
					}
					if ($this->pubType == 2 && $this->pubPublisher && strlen($this->pubPublisher) > 0) {
						$txt .= htmlspecialchars($this->pubPublisher);
						$pubPoint = true;
					}
					if ($pubPoint) {
						$tTxt = trim($txt);
						if (substr($tTxt, -1)  != '.') {
							$txt = $tTxt . '. ';
						}
					}
					if ($this->pubType == 2 && $this->pubSeries && strlen($this->pubSeries) > 0) {
						$txt .= htmlspecialchars($this->pubSeries);
						if ($this->pubNumber && strlen($this->pubNumber) > 0) {
							$txt .= ' ' . htmlspecialchars($this->pubNumber);
						}
						$txt .= '. ';
					}
					if ($this->pubType == 3 && $this->pubPublisher && strlen($this->pubPublisher) > 0) {
						$txt .= htmlspecialchars($this->pubPublisher) . ' ';
					}
					if ($this->pubType == 3) {
						if ($this->pubSeries && strlen($this->pubSeries) > 0) {
							$txt .= '(' . htmlspecialchars($this->pubSeries);
							if ($this->pubNumber && strlen($this->pubNumber) > 0) {
								$txt .= ' ' . htmlspecialchars($this->pubNumber);
							}
							$txt .= ')';
						}
						if ($this->pubPages && strlen($this->pubPages) > 0) {
							$txt .= ' ' . htmlspecialchars($this->pubPages);
						}
						$txt .= '. ';
					}
					if (in_array($this->pubType, [4, 5, 45]) && $this->pubSchool && strlen($this->pubSchool) > 0) {
						$txt .= '[' . ($this->pubType == 4 ? 'Abschlussarbeit' : 'Dissertation') . ' ' . htmlspecialchars($this->pubSchool) . '.';
						if ($this->pubAddress && strlen($this->pubAddress) > 0) {
							$txt .= ' ' . htmlspecialchars($this->pubAddress);
						}
						$txt .= '] ';
					}
					if ($this->pubType == 7 && $this->pubUrl && strlen($this->pubUrl) > 0) {
						$txt .= 'URL: <a href="' . $this->pubUrl . '" target="_BLANK" class="hide-url-printer">' . htmlspecialchars($this->pubUrl) . '</a> ';
						if ($this->pubUrlDate) {
							$pud = $this->pubUrlDate ? $this->pubUrlDate->getTimestamp() : 0;
							$txt .= '(' . date('d.m.Y', $pud) . ') ';
						}
					}
					if ($this->pubNote && strlen($this->pubNote) > 0) {
						$txt .= htmlspecialchars($this->pubNote) . '. ';
					}
					if (in_array($this->pubType, [1, 2, 3]) && $this->pubIsbn && strlen($this->pubIsbn) > 0) {
						$txt .= '[ISBN: ' . htmlspecialchars($this->pubIsbn) . '] ';
					}
					if ($this->pubDoi && strlen($this->pubDoi) > 0) {
						$txt .= '[DOI: ';
						if (str_starts_with($this->pubDoi, 'http')) {
							$txt .= '<a href="' . $this->pubDoi . '" target="_BLANK" class="hide-url-printer">' . htmlspecialchars($this->pubDoi) . '</a>';
						} else {
							$txt .= htmlspecialchars($this->pubDoi);
						}
						$txt .= '] ';
					}
					if ($this->pubType !== 7 && $this->pubUrl && strlen($this->pubUrl) > 0) {
						$txt .= '[URL: <a href="' . $this->pubUrl . '" target="_BLANK" class="hide-url-printer">' . htmlspecialchars($this->pubUrl) . '</a>] ';
					}
					if ($this->pubType == 7) {
						$txt .= '[Online-Publikation]';
					}
				}
				// if ($this->pubKeywords) {
				// 	$txt .= ' Schlagwörter: ' . $this->pubKeywords . '.';
				// }
				return $txt;
		}

    /**
     * Returns the pubType
     *
     * @return int $pubType
     */
    public function getPubType()
    {
				return [
					'val' => $this->pubType,
					'txt' => @['unbekannt', 'article', 'book', 'inbook', 'masterthesis', 'phdthesis', 'unpublished', 'online'][$this->pubType] ?: 'unbekannt'
				];
    }

    /**
     * Sets the pubType
     *
     * @param int $pubType
     * @return void
     */
    public function setPubType($pubType)
    {
        $this->pubType = $pubType;
    }

    /**
     * Returns the pubTitle
     *
     * @return string $pubTitle
     */
    public function getPubTitle()
    {
        return $this->pubTitle;
    }

    /**
     * Sets the pubTitle
     *
     * @param string $pubTitle
     * @return void
     */
    public function setPubTitle($pubTitle)
    {
        $this->pubTitle = $pubTitle;
    }

    /**
     * Returns the pubYear
     *
     * @return int $pubYear
     */
    public function getPubYear()
    {
        return $this->pubYear;
    }

    /**
     * Sets the pubYear
     *
     * @param int $pubYear
     * @return void
     */
    public function setPubYear($pubYear)
    {
        $this->pubYear = $pubYear;
    }

    /**
     * Returns the pubMonth
     *
     * @return int $pubMonth
     */
    public function getPubMonth()
    {
        return $this->pubMonth;
    }

    /**
     * Sets the pubMonth
     *
     * @param int $pubMonth
     * @return void
     */
    public function setPubMonth($pubMonth)
    {
        $this->pubMonth = $pubMonth;
    }

    /**
     * Returns the pubBooktitle
     *
     * @return string $pubBooktitle
     */
    public function getPubBooktitle()
    {
        return $this->pubBooktitle;
    }

    /**
     * Sets the pubBooktitle
     *
     * @param string $pubBooktitle
     * @return void
     */
    public function setPubBooktitle($pubBooktitle)
    {
        $this->pubBooktitle = $pubBooktitle;
    }

    /**
     * Returns the pubPublisher
     *
     * @return string $pubPublisher
     */
    public function getPubPublisher()
    {
        return $this->pubPublisher;
    }

    /**
     * Sets the pubPublisher
     *
     * @param string $pubPublisher
     * @return void
     */
    public function setPubPublisher($pubPublisher)
    {
        $this->pubPublisher = $pubPublisher;
    }

    /**
     * Returns the pubJournal
     *
     * @return string $pubJournal
     */
    public function getPubJournal()
    {
        return $this->pubJournal;
    }

    /**
     * Sets the pubJournal
     *
     * @param string $pubJournal
     * @return void
     */
    public function setPubJournal($pubJournal)
    {
        $this->pubJournal = $pubJournal;
    }

    /**
     * Returns the pubVolume
     *
     * @return string $pubVolume
     */
    public function getPubVolume()
    {
        return $this->pubVolume;
    }

    /**
     * Sets the pubVolume
     *
     * @param string $pubVolume
     * @return void
     */
    public function setPubVolume($pubVolume)
    {
        $this->pubVolume = $pubVolume;
    }

    /**
     * Returns the pubNumber
     *
     * @return string $pubNumber
     */
    public function getPubNumber()
    {
        return $this->pubNumber;
    }

    /**
     * Sets the pubNumber
     *
     * @param string $pubNumber
     * @return void
     */
    public function setPubNumber($pubNumber)
    {
        $this->pubNumber = $pubNumber;
    }

    /**
     * Returns the pubSeries
     *
     * @return string $pubSeries
     */
    public function getPubSeries()
    {
        return $this->pubSeries;
    }

    /**
     * Sets the pubSeries
     *
     * @param string $pubSeries
     * @return void
     */
    public function setPubSeries($pubSeries)
    {
        $this->pubSeries = $pubSeries;
    }

    /**
     * Returns the pubSchool
     *
     * @return string $pubSchool
     */
    public function getPubSchool()
    {
        return $this->pubSchool;
    }

    /**
     * Sets the pubSchool
     *
     * @param string $pubSchool
     * @return void
     */
    public function setPubSchool($pubSchool)
    {
        $this->pubSchool = $pubSchool;
    }

    /**
     * Returns the pubAddress
     *
     * @return string $pubAddress
     */
    public function getPubAddress()
    {
        return $this->pubAddress;
    }

    /**
     * Sets the pubAddress
     *
     * @param string $pubAddress
     * @return void
     */
    public function setPubAddress($pubAddress)
    {
        $this->pubAddress = $pubAddress;
    }

    /**
     * Returns the pubEdition
     *
     * @return string $pubEdition
     */
    public function getPubEdition()
    {
        return $this->pubEdition;
    }

    /**
     * Sets the pubEdition
     *
     * @param string $pubEdition
     * @return void
     */
    public function setPubEdition($pubEdition)
    {
        $this->pubEdition = $pubEdition;
    }

    /**
     * Returns the pubPages
     *
     * @return string $pubPages
     */
    public function getPubPages()
    {
        return $this->pubPages;
    }

    /**
     * Sets the pubPages
     *
     * @param string $pubPages
     * @return void
     */
    public function setPubPages($pubPages)
    {
        $this->pubPages = $pubPages;
    }

    /**
     * Returns the pubKeywords
     *
     * @return int $pubKeywords
     */
    public function getPubKeywords()
    {
        return $this->pubKeywords;
    }

    /**
     * Sets the pubKeywords
     *
     * @param int $pubKeywords
     * @return void
     */
    public function setPubKeywords($pubKeywords)
    {
        $this->pubKeywords = $pubKeywords;
    }

    /**
     * Returns the pubIsbn
     *
     * @return string $pubIsbn
     */
    public function getPubIsbn()
    {
        return $this->pubIsbn;
    }

    /**
     * Sets the pubIsbn
     *
     * @param string $pubIsbn
     * @return void
     */
    public function setPubIsbn($pubIsbn)
    {
        $this->pubIsbn = $pubIsbn;
    }

    /**
     * Returns the pubDoi
     *
     * @return string $pubDoi
     */
    public function getPubDoi()
    {
        return $this->pubDoi;
    }

    /**
     * Sets the pubDoi
     *
     * @param string $pubDoi
     * @return void
     */
    public function setPubDoi($pubDoi)
    {
        $this->pubDoi = $pubDoi;
    }

    /**
     * Returns the pubUrl
     *
     * @return string $pubUrl
     */
    public function getPubUrl()
    {
        return $this->pubUrl;
    }

    /**
     * Sets the pubUrl
     *
     * @param string $pubUrl
     * @return void
     */
    public function setPubUrl($pubUrl)
    {
        $this->pubUrl = $pubUrl;
    }

    /**
     * Returns the pubUrlDate
     *
     * @return \DateTime $pubUrlDate
     */
    public function getPubUrlDate()
    {
        return $this->pubUrlDate;
    }

    /**
     * Sets the pubUrlDate
     *
     * @param \DateTime $pubUrlDate
     * @return void
     */
    public function setPubUrlDate(\DateTime $pubUrlDate)
    {
        $this->pubUrlDate = $pubUrlDate;
    }

    /**
     * Returns the pubNote
     *
     * @return string $pubNote
     */
    public function getPubNote()
    {
        return $this->pubNote;
    }

    /**
     * Sets the pubNote
     *
     * @param string $pubNote
     * @return void
     */
    public function setPubNote($pubNote)
    {
        $this->pubNote = $pubNote;
    }

    /**
     * Returns the meeTitel
     *
     * @return string $meeTitel
     */
    public function getMeeTitel()
    {
        return $this->meeTitel;
    }

    /**
     * Sets the meeTitel
     *
     * @param string $meeTitel
     * @return void
     */
    public function setMeeTitel($meeTitel)
    {
        $this->meeTitel = $meeTitel;
    }

		/**
     * Returns the meeTimeText
     *
     * @return string $meeTimeText
     */
    public function getMeeTimeText()
    {
			// date('d.m.Y', $x)
				$vTime = $this->meeTime->getTimestamp();
				$bTime = $this->meeEndTime ? $this->meeEndTime->getTimestamp() : 0;
				$vTimeFd = date('d.m.Y', $vTime);
				$bTimeFd = date('d.m.Y', $bTime);
				$txt = date($this->meeShowTime ? 'd.m.Y - H:i' : 'd.m.Y', $vTime);
				$sTxt = $txt;
				$eTxt = $bTime > 0 ? date($this->meeShowTime ? 'd.m.Y - H:i' : 'd.m.Y', $bTime) : '';
				if ($this->meeShowTime && $vTimeFd !== $bTimeFd) {
					$txt .= ' Uhr';
				}
				if ($vTime < $bTime && ($this->meeShowTime || $vTimeFd !== $bTimeFd)) {
					if ($vTimeFd !== $bTimeFd) {
						$txt .= ' bis ';
					}
					$txt .= date($this->meeShowTime ? ($vTimeFd !== $bTimeFd ? 'd.m.Y - H:i' : '-H:i') : 'd.m.Y', $bTime);
					if ($this->meeShowTime) {
						$txt .= ' Uhr';
					}
				}
				// $txt .= ' (' . $vTime . ', ' . $bTime . ', ' . $this->meeShowTime . ')';
				if ($this->meePersonsSec) {
					$txt = '(' . $txt . ')';
				}
        return [
					'all' => $txt,
					'start' => $sTxt,
					'end' => $eTxt
				];
    }

    /**
     * Returns the meeTime
     *
     * @return \DateTime $meeTime
     */
    public function getMeeTime()
    {
        return $this->meeTime;
    }

    /**
     * Sets the meeTime
     *
     * @param \DateTime $meeTime
     * @return void
     */
    public function setMeeTime(\DateTime $meeTime)
    {
        $this->meeTime = $meeTime;
    }

    /**
     * Returns the meeEndTime
     *
     * @return \DateTime $meeEndTime
     */
    public function getMeeEndTime()
    {
        return $this->meeEndTime;
    }

    /**
     * Sets the meeEndTime
     *
     * @param \DateTime $meeEndTime
     * @return void
     */
    public function setMeeEndTime(\DateTime $meeEndTime)
    {
        $this->meeEndTime = $meeEndTime;
    }

    /**
     * Returns the meeShowTime
     *
     * @return bool $meeShowTime
     */
    public function getMeeShowTime()
    {
        return $this->meeShowTime;
    }

    /**
     * Sets the meeShowTime
     *
     * @param bool $meeShowTime
     * @return void
     */
    public function setMeeShowTime($meeShowTime)
    {
        $this->meeShowTime = $meeShowTime;
    }

    /**
     * Returns the boolean state of meeShowTime
     *
     * @return bool
     */
    public function isMeeShowTime()
    {
        return $this->meeShowTime;
    }

    /**
     * Returns the meeText
     *
     * @return string $meeText
     */
    public function getMeeText()
    {
        return $this->meeText;
    }

    /**
     * Sets the meeText
     *
     * @param string $meeText
     * @return void
     */
    public function setMeeText($meeText)
    {
        $this->meeText = $meeText;
    }

    /**
     * Returns the meeEvent
     *
     * @return string $meeEvent
     */
    public function getMeeEvent()
    {
        return $this->meeEvent;
    }

    /**
     * Sets the meeEvent
     *
     * @param string $meeEvent
     * @return void
     */
    public function setMeeEvent($meeEvent)
    {
        $this->meeEvent = $meeEvent;
    }

    /**
     * Returns the meeAdress
     *
     * @return string $meeAdress
     */
    public function getMeeAdress()
    {
        return $this->meeAdress;
    }

    /**
     * Sets the meeAdress
     *
     * @param string $meeAdress
     * @return void
     */
    public function setMeeAdress($meeAdress)
    {
        $this->meeAdress = $meeAdress;
    }

    /**
     * Returns the meeUrl
     *
     * @return string $meeUrl
     */
    public function getMeeUrl()
    {
        return $this->meeUrl;
    }

    /**
     * Sets the meeUrl
     *
     * @param string $meeUrl
     * @return void
     */
    public function setMeeUrl($meeUrl)
    {
        $this->meeUrl = $meeUrl;
    }

    /**
     * Returns the meeDoi
     *
     * @return string $meeDoi
     */
    public function getMeeDoi()
    {
        return $this->meeDoi;
    }

    /**
     * Sets the meeDoi
     *
     * @param string $meeDoi
     * @return void
     */
    public function setMeeDoi($meeDoi)
    {
        $this->meeDoi = $meeDoi;
    }

    /**
     * Returns the meeNote
     *
     * @return string $meeNote
     */
    public function getMeeNote()
    {
        return $this->meeNote;
    }

    /**
     * Sets the meeNote
     *
     * @param string $meeNote
     * @return void
     */
    public function setMeeNote($meeNote)
    {
        $this->meeNote = $meeNote;
    }

    /**
     * Returns the meeKeywords
     *
     * @return int $meeKeywords
     */
    public function getMeeKeywords()
    {
        return $this->meeKeywords;
    }

    /**
     * Sets the meeKeywords
     *
     * @param int $meeKeywords
     * @return void
     */
    public function setMeeKeywords($meeKeywords)
    {
        $this->meeKeywords = $meeKeywords;
    }

	    /**
     * Returns the pubEditorsSec
     *
     * @return array $pubEditorsSec
     */
    public function getPubEditorsSec()
    {
				$pesArray = XmlProcessor::xmlArray($this->pubEditorsSec);
				$pestxtAll = '';
				$pestxtEditor = '';
				$pestxtAuthor = '';
				$dg = 0;
				$dgA = 0;
				$dgE = 0;
				foreach ($pesArray as $person) {
					if ($dg > 0) {
						$pestxtAll .= ' / ';
					}
					$pestxtAll .= $person['authorNachname'] . ', ' . $person['authorVorname'];
					if ($person['authorIsEditor']) {
						if ($dgE > 0) {
							$pestxtEditor .= ' / ';
						}
						$pestxtEditor .= $person['authorNachname'] . ', ' . $person['authorVorname'];
						$dgE += 1;
					} else {
						if ($dgA > 0) {
							$pestxtAuthor .= ' / ';
						}
						$pestxtAuthor .= $person['authorNachname'] . ', ' . $person['authorVorname'];
						$dgA += 1;
					}
					$dg += 1;
				}
				return [
					'array' => $pesArray,
					'txtAll' => $pestxtAll,
					'txtAuthor' => $pestxtAuthor,
					'txtEditor' => $pestxtEditor
				];
    }

    /**
     * Sets the pubEditorsSec
     *
     * @param string $pubEditorsSec
     * @return void
     */
    public function setPubEditorsSec($pubEditorsSec)
    {
        $this->pubEditorsSec = $pubEditorsSec;
    }

    /**
     * Returns the meePersonsSec
     *
     * @return array $meePersonsSec
     */
    public function getMeePersonsSec()
    {
				$mpsArray = XmlProcessor::xmlArray($this->meePersonsSec);
				$mpstxt = '';
				$dg = 0;
				foreach ($mpsArray as $person) {
					if ($dg > 0) {
						$mpstxt .= ' / ';
					}
					$mpstxt .= $person['nachname'] . ', ' . $person['vorname'];
					$dg += 1;
				}
				return [
					'array' => $mpsArray,
					'txt' => $mpstxt
				];
    }

		/**
     * Returns the meePersonsSec
     *
     * @return string $meePersonsSec
     */
    public function getMeePersonsSecRaw()
    {
				return $this->meePersonsSec;
    }

    /**
     * Sets the meePersonsSec
     *
     * @param string $meePersonsSec
     * @return void
     */
    public function setMeePersonsSec($meePersonsSec)
    {
        $this->meePersonsSec = $meePersonsSec;
    }

    /**
     * Returns the meeOrganisersSec
     *
     * @return array $meeOrganisersSec
     */
    public function getMeeOrganisersSec()
    {
				$mosArray = XmlProcessor::xmlArray($this->meeOrganisersSec);
				$mostxt = '';
				$dg = 0;
				foreach ($mosArray as $person) {
					if ($dg > 0) {
						$mostxt .= ', ';
					}
					$mostxt .= $person['vorname'] . ' ' . $person['nachname'];
					$dg += 1;
				}
				return [
					'array' => $mosArray,
					'txt' => $mostxt
				];
    }

    /**
     * Sets the meeOrganisersSec
     *
     * @param string $meeOrganisersSec
     * @return void
     */
    public function setMeeOrganisersSec($meeOrganisersSec)
    {
        $this->meeOrganisersSec = $meeOrganisersSec;
    }

    /**
     * Returns the meeOrganisationSec
     *
     * @return array $meeOrganisationSec
     */
    public function getMeeOrganisationSec()
    {
				$mosArray = XmlProcessor::xmlArray($this->meeOrganisationSec);
				$mostxt = '';
				$moshtml = '';
				$dg = 0;
				foreach ($mosArray as $org) {
					if ($dg > 0) {
						$mostxt .= ' / ';
						$moshtml .= ' / ';
					}
					$mostxt .= $org['organisation'];
					if ($org['url']) {
						$moshtml .= '<a href="' . $org['url'] . '" target="_blank">' . $org['organisation'] . '</a>';
					} else {
						$moshtml .= $org['organisation'];
					}
					$dg += 1;
				}
				return [
					'array' => $mosArray,
					'txt' => $mostxt,
					'html' => $moshtml
				];
    }

    /**
     * Sets the meeOrganisationSec
     *
     * @param string $meeOrganisationSec
     * @return void
     */
    public function setMeeOrganisationSec($meeOrganisationSec)
    {
        $this->meeOrganisationSec = $meeOrganisationSec;
    }

    /**
     * Returns the meeParticipantsSec
     *
     * @return array $meeParticipantsSec
     */
    public function getMeeParticipantsSec()
    {
				$mosArray = XmlProcessor::xmlArray($this->meeParticipantsSec);
				$mostxt = '';
				$moshtml = '';
				$dg = 0;
				foreach ($mosArray as $org) {
					if ($dg > 0) {
						$mostxt .= ' / ';
						$moshtml .= ' / ';
					}
					$mostxt .= $org['nachname'] . ', ' . $org['vorname'];
					$moshtml .= $org['nachname'] . ', ' . $org['vorname'];
					if ($org['institution']) {
						$mostxt .= ' (' . $org['institution'] . ')';
						if ($org['url']) {
							$moshtml .= ' (<a href="' . $org['url'] . '" target="_blank">' . $org['institution'] . '</a>)';
						} else {
							$moshtml .= ' (' . $org['institution'] . ')';
						}
					}
					$dg += 1;
				}
				return [
					'array' => $mosArray,
					'txt' => $mostxt,
					'html' => $moshtml
				];
    }

    /**
     * Sets the meeParticipantsSec
     *
     * @param string $meeParticipantsSec
     * @return void
     */
    public function setMeeParticipantsSec($meeParticipantsSec)
    {
        $this->meeParticipantsSec = $meeParticipantsSec;
    }

    /**
     * Returns the aType
     *
     * @return array $aType
     */
    public function getAType()
    {
				$languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
				$sys_language_uid = $languageAspect->getId();
				if ($sys_language_uid == 1) {
					$typSing = ['Article', 'Publication', 'Presentation', 'Event', 'Teaching'];
					$typPlur = ['Articles', 'Publications', 'Presentations', 'Events', 'Teachings'];
				} else {
					$typSing = ['Beitrag', 'Publikation', 'Vortrag', 'Veranstaltung', 'Lehre'];
					$typPlur = ['Beiträge', 'Publikationen', 'Vorträge', 'Veranstaltungen', 'Lehren'];
				}
        return [
					'val' => $this->aType,
					'txt' => $typSing[$this->aType],
					'txtp' => $typPlur[$this->aType],
					'color' => ['#66be5e','#5dc3e9','#3757a7','#f15f7d','#fbc820'][$this->aType],
					'view' => ['bei','pub','vorverleh','vorverleh','vorverleh'][$this->aType]
				];
    }

		/**
     * Returns the aHome
     *
     * @return array $aHome
     */
    public function getAHome()
    {
        return ['val' => $this->aHome, 'txt' => ['DiÖ', 'IamDiÖ'][$this->aHome], 'txtp' => ['DiÖ', 'IamDiÖ'][$this->aHome]];
    }

    /**
     * Sets the aType
     *
     * @param int $aType
     * @return void
     */
    public function setAType($aType)
    {
        $this->aType = $aType;
    }

		/**
     * Sets the aHome
     *
     * @param int $aHome
     * @return void
     */
    public function setAHome($aHome)
    {
        $this->aHome = $aHome;
    }

    /**
     * Returns the aTaskCluster
     *
     * @return string $aTaskCluster
     */
    public function getATaskCluster()
    {
			$languageAspect = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Context\Context::class)->getAspect('language');
			$sys_language_uid = $languageAspect->getId();
			$val = $this->aTaskCluster;
			$classes = '';
			$txt = '';
			$txtl = '';
			$list = [];
			if (!$val) {
				$classes = 'cluster-none';
			} else {
				if ($val == 'a,b,c,d,e') {
					$txt = $txt . 'SFB';
					$txtl = $txtl . ($sys_language_uid == 1 ? 'All SFB' : 'Gesamt-SFB');
					$classes = $classes . ' cluster-all';
					$list[] = ['txt' => 'SFB', 'txtl' => ($sys_language_uid == 1 ? 'All SFB' : 'Gesamt-SFB'), 'classes' => 'cluster-all'];
				} else {
					foreach (explode(",", $val) as $aCluster) {
						$txt = $txt . 'TC' . strtoupper($aCluster) . ', ';
						$txtl = $txtl . 'Cluster ' . strtoupper($aCluster) . ', ';
						$classes = $classes . ' cluster-' . $aCluster;
						$list[] = ['txt' => 'TC' . strtoupper($aCluster), 'txtl' => 'Cluster ' . strtoupper($aCluster), 'classes' => ' cluster-' . $aCluster];
					}
					$txt = rtrim($txt, ", ");
					$txtl = rtrim($txtl, ", ");
				}
			}
      return ['val' => $val, 'classes' => trim($classes), 'txt' => $txt, 'txtl' => $txtl, 'list' => $list];
    }

    /**
     * Sets the aTaskCluster
     *
     * @param string $aTaskCluster
     * @return void
     */
    public function setATaskCluster($aTaskCluster)
    {
        $this->aTaskCluster = $aTaskCluster;
    }
}
