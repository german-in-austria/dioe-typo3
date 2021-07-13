<?php
namespace HcbIamDioeMeme\HcbIamdioeMeme\Domain\Repository;

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
 * The repository for MemeEntries
 */
class MemeEntrieRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    ];

    /**
     * Freigegebene Einträge
     * 
     * @return Tx_Extbase_Persistence_QueryResultInterface
     */
    public function getAllPublic() {
        $query = $this->createQuery();
        $query->matching($query->equals('freigegeben', 1));
        $query->setOrderings(['datum' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);
        return $query->execute();
    }

    public function getRandomPublic($pid) {
        $queryBuilder =  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)->getQueryBuilderForTable('tx_hcbiamdioememe_domain_model_memeentrie');
        $rndQuery = $queryBuilder
            ->select('uid')
            ->addSelectLiteral('RAND() AS rnd')
            ->from('tx_hcbiamdioememe_domain_model_memeentrie')
            ->where(
                $queryBuilder->expr()->eq('freigegeben', $queryBuilder->createNamedParameter(1, \PDO::PARAM_INT)),
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($pid, \PDO::PARAM_INT))
            )
            ->orderBy('rnd')
            ->setMaxResults(3)
            ->execute()
            ->fetchAll();
        $rndUids = array();
        $orderings = array();
        foreach ($rndQuery as $q) {
            $rndUids[] = $q['uid'];
        }
        $query = $this->createQuery();
        $query->matching($query->equals('freigegeben', 1));
        $query->matching($query->in('uid', $rndUids));
        // $query->setOrderings(['freigegeben' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        $query->setLimit(3);
        $queryResults = $query->execute()->toArray();
        shuffle($queryResults);
        return $queryResults;
    }

}
