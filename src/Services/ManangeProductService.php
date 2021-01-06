<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ManangeProductService
 * @package App\Services
 */
class ManangeProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * ManageProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    /**
     * @param $packageName
     * @param $packageDes
     * @param $packageImage
     * @param $packagePrice
     * @param $packageType
     */
    public function manageProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType)
    {
        $this->productRepository->manageProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType);
    }

    /**
     * @param $packageName
     * @param $packageDes
     * @param $packageImage
     * @param $packagePrice
     * @param $packageType
     * @param $packageId
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function editProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType, $packageId)
    {
        $this->productRepository->manageProduct($packageName, $packageDes, $packageImage, $packagePrice, $packageType, $packageId);
    }

    /**
     *
     */
    public function getProducts()
    {
        return $this->productRepository->findAll();
    }

    /**
     * @param $id
     */
    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }
}