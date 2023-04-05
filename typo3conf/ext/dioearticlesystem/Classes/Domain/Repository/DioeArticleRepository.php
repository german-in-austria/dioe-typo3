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
		public function filtered($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aPP = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0) {
	    return $this->filteredFunc($be, $aType, $aTag, $aHome, $aCluster, $aPP, $aLang, $aLimit, $aOffset, $aSPin, $aCPin, $aOrder);
		}

		/**
		 * Returns Count of filtered objects of this repository.
		 *
		 * @return int
		 * @api
		 */
		public function filteredCount($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aPP = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0) {
	    return $this->filteredFunc($be, $aType, $aTag, $aHome, $aCluster, $aPP, $aLang, $aLimit, $aOffset, 0, 0, $aOrder, 1);
		}

		/**
		 * Returns Count of filtered objects of this repository.
		 *
		 * @return array
		 * @api
		 */
		public function pubViewFX($aLang = 0, $vLang = 0) {
			$out = [];
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
			$yearsQ = $queryBuilder->select('pub_year')
			    ->from('tx_dioearticlesystem_domain_model_dioearticle')
			    ->groupBy('tx_dioearticlesystem_domain_model_dioearticle.pub_year')
					->where(
						$queryBuilder->expr()->gt('pub_year', 9),
						$queryBuilder->expr()->eq('a_type', 1)
					)
			    ->orderBy('pub_year', 'desc')
			    ->execute()->fetchAll();
			$years = [0];
			foreach ($yearsQ as $val) {
				$years[] = $val['pub_year'];
			}
			foreach ($years as $year) {
				$query = $this->createQuery();
				$constraints = [];
				$constraints[] = $query->equals('a_type', 1);
				if ($year > 9) {
					$constraints[] = $query->equals('pub_year', $year);
				} else {
					$constraints[] = $query->lessThan('pub_year', 10);
				}
				if ($aLang == 0 || $aLang == 1) {
					$constraints[] = $query->logicalOr($query->equals('sys_language_uid', $aLang), $query->equals('sys_language_uid',-1));
				}
				if ($constraints) {
					$query->matching($query->logicalAnd($constraints));
				}
				$out[] = [
					'title' => ($year > 9 ? $year : ($vLang == 0 ? 'bevorstehend' : 'forthcoming')),
					'array' => $query->execute()
				];
			}
			return $out;
		}

		/**
		 * Returns Count of filtered objects of this repository.
		 *
		 * @return array
		 * @api
		 */
		public function meeViewFX($aLang = 0, $vLang = 0, $aType = 2) {
			$out = [];
			$queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_dioearticlesystem_domain_model_dioearticle');
			$yearsQ = $queryBuilder->addSelectLiteral("Year(FROM_UNIXTIME(mee_time)) as fxyear")
			    ->from('tx_dioearticlesystem_domain_model_dioearticle')
			    ->groupBy('fxyear')
					->where(
						$queryBuilder->expr()->eq('a_type', $aType),
						$queryBuilder->expr()->lt('mee_time', 'UNIX_TIMESTAMP(NOW())')
					)
			    ->orderBy('fxyear', 'desc')
			    ->execute()->fetchAll();
			$years = [0];
			foreach ($yearsQ as $val) {
				$years[] = $val['fxyear'];
			}
			$nDate = new \DateTime();
			foreach ($years as $year) {
				$query = $this->createQuery();
				$constraints = [];
				$constraints[] = $query->equals('a_type', $aType);
				if ($year > 9) {
					$vDate = new \DateTime(strval($year) . '-01-01 00:00');
					$bDate = new \DateTime(strval($year + 1) . '-01-01 00:00');
					if ($bDate > $nDate) {
						$bDate = $nDate;
					}
					$constraints[] = $query->logicalAnd($query->greaterThanOrEqual('mee_time', $vDate), $query->lessThan('mee_time', $bDate));
				} else {
					$constraints[] = $query->greaterThan('mee_time', $nDate);
				}
				if ($aLang == 0 || $aLang == 1) {
					$constraints[] = $query->logicalOr($query->equals('sys_language_uid', $aLang), $query->equals('sys_language_uid',-1));
				}
				if ($constraints) {
					$query->matching($query->logicalAnd($constraints));
				}
				if ($year > 9) {
					$query->setOrderings(['mee_time' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);
				} else {
					$query->setOrderings(['mee_time' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
				}
				$out[] = [
					'title' => ($year > 9 ? $year : ($vLang == 0 ? 'geplant' : 'planned')),
					'array' => $query->execute()
				];
			}
			return $out;
		}

		public function filteredFunc($be = false, $aType = -1, $aTag = -1, $aHome = -1, $aCluster = -1, $aPP = -1, $aLang = 0, $aLimit = 0, $aOffset = 0, $aSPin = 0, $aCPin = 0, $aOrder = 0, $aCount = 0) {
			$mdg = 0;
			if ($aCount > 0) {
				$aOffset = 0;
			}
			if ($aSPin > 0 && $aOffset == 0) {
				$mdg++;
				$pinName = 'startPin';
			} else if ($aCPin > 0 && $aOffset == 0) {
				$mdg++;
				$pinName = 'catPin';
			}
			$dg = 0;
			$query = array();
			for ($dg = 0; $dg <= $mdg; $dg++) {
		    $query[$dg] = $this->createQuery();
				$constraints = [];
				if ($be) {
					$query[$dg]->getQuerySettings()->setRespectSysLanguage(false);
					$query[$dg]->getQuerySettings()->setIgnoreEnableFields($be);
					$constraints[] = $query[$dg]->equals('deleted', 0);
				}
		    if ($aType >= 0) {
	        $constraints[] = $query[$dg]->equals('a_type', $aType);
		    }
				if ($aTag >= 0) {
					if (gettype($aTag) == 'string') {
						if (strpos($aTag, ',') > -1) {
							$aTags = explode(",", $aTag);
							$tagConstraints = [];
							foreach ($aTags as &$value) {
								$tagConstraints = $query[$dg]->equals('tags.uid', intval($value));
							}
							$constraints[] = $query[$dg]->logicalOr($tagConstraints);
						} else {
							$xTag = intval($aTag);
							if ($xTag > 0) {
								$constraints[] = $query[$dg]->equals('tags.uid', $xTag);
							}
						}
					} else {
						$constraints[] = $query[$dg]->equals('tags.uid', $aTag);
					}
		    }
				if ($aHome >= 0) {
	        $constraints[] = $query[$dg]->equals('a_home', $aHome);
		    }
				if ($aCluster > -1 && $aCluster && $aCluster !== 'a,b,c,d,e') {
					if ($aCluster == 'sfb') {
						$constraints[] = $query[$dg]->equals('aTaskCluster', 'a,b,c,d,e');
					} else {
						if (gettype($aCluster) == 'string') {
							if (strpos($aCluster, ',') > -1) {
								$aTasks = explode(",", $aCluster);
								$taskConstraints = [];
								foreach ($aTasks as &$value) {
									$taskConstraints = $query[$dg]->contains('aTaskCluster', $value);
								}
								$constraints[] = $query[$dg]->logicalOr($taskConstraints);
							} else {
								$constraints[] = $query[$dg]->contains('aTaskCluster', $aCluster);
							}
						} else {
							$constraints[] = $query[$dg]->contains('aTaskCluster', $aCluster);
						}
						$constraints[] = $query[$dg]->logicalNot($query[$dg]->equals('aTaskCluster', 'a,b,c,d,e'));
					}
		    }
        if ($aPP > -1) {
          if (gettype($aPP) == 'string') {
            if (strpos($aPP, ',') > -1) {
              $aTasks = explode(",", $aPP);
              $ppConstraints = [];
              foreach ($aTasks as &$value) {
                $ppConstraints = $query[$dg]->contains('aProjectpart', $value);
              }
              $constraints[] = $query[$dg]->logicalOr($ppConstraints);
            } else {
              $constraints[] = $query[$dg]->contains('aProjectpart', $aPP);
            }
          }
        }
				if ($aLang == 0 || $aLang == 1) {
					$constraints[] = $query[$dg]->logicalOr($query[$dg]->equals('sys_language_uid', $aLang), $query[$dg]->equals('sys_language_uid',-1));
				}
				if ($mdg > 0 && $aOffset == 0) {
					$bDate = new \DateTime('-30 days');
					$fxQuery = $query[$dg]->logicalAnd($query[$dg]->equals($pinName, 1), $query[$dg]->greaterThanOrEqual('aDate', $bDate));
					if ($dg > 0) {
						$constraints[] = $query[$dg]->logicalNot($fxQuery);
					} else {
						$constraints[] = $fxQuery;
					}
				}
				if ($constraints) {
					$query[$dg]->matching($query[$dg]->logicalAnd($constraints));
				}
				if ($aOffset > 0) {
					$query[$dg]->setOffset($aOffset);
				}
				if ($aLimit > 0 && ($mdg == 0 || $dg > 0)) {
					$query[$dg]->setLimit($aLimit);
				}
				if ($aOrder > 0) {
					$query[$dg]->setOrderings(['aDate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
				}
				$query[$dg] = $query[$dg]->execute();
				// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($query[$dg]);
			}
			if ($aCount > 0) {
				return $query[0]->count();
			} else {
				if ($mdg > 0) {
					for ($dg = 1; $dg <= $mdg; $dg++) {
						foreach ($query[$dg]->toArray() as $result) {
							$query[0]->offsetSet(($query[0]->count()), $result);
						}
					}
				}
				return $query[0];
			}
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
