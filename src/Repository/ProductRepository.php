<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param $packageName
     * @param $packageDes
     * @param $packageImage
     * @param $packagePrice
     * @param $packageType
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function manageProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType)
    {
        $product = new Product();
        $product->setName($packageName);
        $product->setDescription($packageDes);
        $product->setPhoto($packageImage);
        $product->setPrice($packagePrice);
        $product->setCourseType($packageType);
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }
    /**
     * @param $packageName
     * @param $packageDes
     * @param $packageImage
     * @param $packagePrice
     * @param $packageType
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function manageProduct($packageName, $packageDes, $packageImage, $packagePrice, $packageType, $allPackages)
    {
        $package = $this->findOneBy(['id' => $allPackages]);
        $package->setName($packageName);
        $package->setDescription($packageDes);
        $package->setPhoto($packageImage);
        $package->setPrice($packagePrice);
        $package->setCourseType($packageType);
        $this->getEntityManager()->persist($package);
        $this->getEntityManager()->flush();
    }
}
