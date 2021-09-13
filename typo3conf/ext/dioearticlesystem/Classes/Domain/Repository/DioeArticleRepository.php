<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Domain\Repository;


/**
 * This file is part of the "Diö Artikelsystem" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * (c) 2021 HCB
 * The repository for DioeArticles
 */
class DioeArticleRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['aDate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING];

		/**
		 * Returns all objects of this repository.
		 *
		 * @return QueryResultInterface|array
		 * @api
		 */
		public function findAll()
		{
		    return $this->createQuery()->execute();
		}

		/**
		 * Returns filtered objects of this repository.
		 *
		 * @return QueryResultInterface|array
		 * @api
		 */
		public function filtered($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0) {
	    return $this->filteredFunc($be, $aType, $aTag, $aHome, $aCluster, $aLang, $aLimit, $aOffset, $aSPin, $aCPin, $aOrder)->execute();
		}

		/**
		 * Returns Count of filtered objects of this repository.
		 *
		 * @return int
		 * @api
		 */
		public function filteredCount($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0) {
	    return $this->filteredFunc($be, $aType, $aTag, $aHome, $aCluster, $aLang, $aLimit, $aOffset, $aSPin, $aCPin, $aOrder)->count();
		}

		public function filteredFunc($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0) {
	    $query = $this->createQuery();
			$constraints = [];
			if ($be) {
				$query->getQuerySettings()->setRespectSysLanguage(false);
				$query->getQuerySettings()->setIgnoreEnableFields($be);
				$constraints[] = $query->equals('deleted', 0);
			}
	    if ($aType >= 0) {
        $constraints[] = $query->equals('a_type', $aType);
	    }
			if ($aTag >= 0) {
				if (gettype($aTag) == 'string') {
					if (strpos($aTag, ',') > -1) {
						$aTags = explode(",", $aTag);
						$tagConstraints = [];
						foreach ($aTags as &$value) {
							$tagConstraints = $query->equals('tags.uid', intval($value));
						}
						$constraints[] = $query->logicalOr($tagConstraints);
					} else {
						$aTag = intval($aTag);
						if ($aTag > 0) {
							$constraints[] = $query->equals('tags.uid', $aTag);
						}
					}
				} else {
					$constraints[] = $query->equals('tags.uid', $aTag);
				}
	    }
			if ($aHome >= 0) {
        $constraints[] = $query->equals('a_home', $aHome);
	    }
			if ($aCluster > -1 && $aCluster && $aCluster !== 'a,b,c,d,e') {
				if ($aCluster == 'sfb') {
					$constraints[] = $query->equals('aTaskCluster', 'a,b,c,d,e');
				} else {
					if (gettype($aCluster) == 'string') {
						if (strpos($aCluster, ',') > -1) {
							$aTasks = explode(",", $aCluster);
							$taskConstraints = [];
							foreach ($aTasks as &$value) {
								$taskConstraints = $query->contains('aTaskCluster', $value);
							}
							$constraints[] = $query->logicalOr($taskConstraints);
						} else {
							$constraints[] = $query->contains('aTaskCluster', $aCluster);
						}
					} else {
						$constraints[] = $query->contains('aTaskCluster', $aCluster);
					}
					$constraints[] = $query->logicalNot($query->equals('aTaskCluster', 'a,b,c,d,e'));
				}
	    }
			if ($aLang == 0 || $aLang == 1) {
				$constraints[] = $query->logicalOr($query->equals('sys_language_uid', $aLang), $query->equals('sys_language_uid',-1));
			}
			if ($constraints) {
				$query->matching($query->logicalAnd($constraints));
			}
			if ($aOffset > 0) {
				$query->setOffset($aOffset);
			}
			if ($aLimit > 0) {
				$query->setLimit($aLimit);
			}
			if ($aOrder > 0) {
				$query->setOrderings(['aDate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
			}
	    return $query;
		}

		public function findHiddenByUid($uid) {
      $query = $this->createQuery();
      $query->getQuerySettings()->setRespectSysLanguage(false);
			$query->getQuerySettings()->setIgnoreEnableFields(true);
      $query->matching($query->equals('uid', $uid));
      return $query->execute()->getFirst();
    }

		public function findHiddenByUids($uids) {
      $query = $this->createQuery();
      $query->getQuerySettings()->setRespectSysLanguage(false);
			$query->getQuerySettings()->setIgnoreEnableFields(true);
      $query->matching($query->in('uid', $uids));
      return $query->execute();
    }

}
