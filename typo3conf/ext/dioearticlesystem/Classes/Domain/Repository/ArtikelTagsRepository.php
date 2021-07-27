<?php
declare(strict_types=1);

namespace DioeArticleSystem\Dioearticlesystem\Domain\Repository;


/**
 * This file is part of the "Diö Artikelsystem" Extension for TYPO3 CMS.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * (c) 2021 HCB
 * The repository for ArtikelTags
 */
class ArtikelTagsRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

		/**
		 * Returns all objects of this repository.
		 *
		 * @return QueryResultInterface|array
		 * @api
		 */
		public function findAll()
		{
				/** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
				$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
				$querySettings->setRespectStoragePage(false);
				$this->setDefaultQuerySettings($querySettings);

		    return $this->createQuery()->execute();
		}

}
