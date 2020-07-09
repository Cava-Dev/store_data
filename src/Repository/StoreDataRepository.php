<?php

namespace App\Repository;

use App\Entity\StoreData;
use App\Entity\Store;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StoreData|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreData|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreData[]    findAll()
 * @method StoreData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StoreData::class);
    }

    public function storeDataDb($valuesInvoice, $valuesId, $packRow){

        $store = new Store;

        $store->setNameInvoice($valuesInvoice);
        $store->setClientId($valuesId);
        
        foreach($packRow as $value){
            $storeData= new StoreData;
            $store->addStoreData($storeData);
            $storeData->setDescription($value->description);
            $storeData->setQta($value->qta);
            $storeData->setAmount($value->amount);
            $storeData->setTotalAmount($value->total_amount);
            $this->_em->persist($storeData);
            $this->_em->persist($store);
            $this->_em->flush();
        }
    }
}
