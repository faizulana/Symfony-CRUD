<?php

namespace App\Controller;

use App\Entity\Capibara;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class GetCapibara extends AbstractController
{
    public function __invoke(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $capibara = $entityManager->getRepository(Capibara::class)->find($id);
        return $this->json($capibara);
    }

}
?>