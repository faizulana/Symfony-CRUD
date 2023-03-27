<?php

namespace App\Controller;

use App\Entity\Capibara;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class GetCapibaras extends AbstractController
{
    public function __invoke(EntityManagerInterface $entityManager): JsonResponse
    {
        $capibaras = $entityManager->getRepository(Capibara::class)->findAll();

        return $this->json($capibaras);
    }

}
?>