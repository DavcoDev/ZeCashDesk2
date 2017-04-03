<?php

namespace ZeCashDeskBundle\Repository;


/**
 * ItemsRepository
 *
 */
class ItemsRepository extends \Doctrine\ORM\EntityRepository {

	/**
	 * @param $code
	 *
	 * @return array
	 */
	public function findByGenCode( $code ) {
		return $this->createQueryBuilder( 'g' )
		            ->where( 'g.gencode = :gencode' )
		            ->setParameter( 'gencode', $code )
		            ->getQuery()
		            ->getOneOrNullResult();
	}
}
