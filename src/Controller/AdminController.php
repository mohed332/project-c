<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\ManangeProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig',[
        'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/manage/packages", name="manage_packages")
     * @param ManangeProductService $manangeProductService
     * @return Response
     */
    public function managePackages(ManangeProductService $manangeProductService)
    {
        $allPackages = $manangeProductService->getProducts();
        return $this->render('admin/manage_packages.html.twig',[
            'controller_name' => 'AdminController',
            'packages' => $allPackages
        ]);
    }

    /**
     * @Route("/add/package/details", name="add_package_details")
     * @param Request $request
     * @param ManangeProductService $manangeProductService
     * @return Response
     */
    public function addPackages(Request $request, ManangeProductService $manangeProductService): Response
    {
        $packageName = $request->request->get('package_name');
        $packageDes = $request->request->get('package_description');
        $packageImage = $request->files->get('package_image', null);
        $packagePrice = $request->request->get('package_price');
        $packageType = $request->request->get('package_type');
        $allPackages = $manangeProductService->getProducts();
        $manangeProductService->manageProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType);
        return $this->render('admin/manage_packages.html.twig',[
        'controller_name' => 'AdminController',
        'packages' => $allPackages
        ]);
    }

    /**
     * @Route("/edit/package/detail", name="edit_package_detail")
     * @param Request $request
     * @param ManangeProductService $manangeProductService
     * @return Response
     */
    public function editPackage(Request $request, ManangeProductService $manangeProductService): Response
    {
        $packageId = $request->request->get('package_id');
        $packageName = $request->request->get('package_name');
        $packageDes = $request->request->get('package_description');
        $packageImage = $request->files->get('package_image', null);
        $packagePrice = $request->request->get('package_price');
        $packageType = $request->request->get('package_type');

        $allPackages = $manangeProductService->getProducts();
        $manangeProductService->editProducts($packageName, $packageDes, $packageImage, $packagePrice, $packageType, $packageId);
        return $this->render('admin/manage_packages.html.twig',[
            'controller_name' => 'AdminController',
            'packages' => $allPackages
        ]);
    }

    /**
     * @Route("/edit/package/details/{id}", name="edit_package_details")
     * @param Request $request
     * @param ManangeProductService $manangeProductService
     * @return Response
     */
    public function editPackages(Request $request, ManangeProductService $manangeProductService, $id): Response
    {
        $editPackageById =  $manangeProductService->getProductById($id);
        return $this->render('admin/edit_packages.html.twig',[
        'controller_name' => 'AdminController',
        'package' => $editPackageById
        ]);
    }
}
