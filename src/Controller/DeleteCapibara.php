<?php

namespace App\Controller;

use App\Entity\Capibara;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class DeleteCapibara extends AbstractController
{
    public function __invoke(Capibara $capibara, EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($capibara);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Capibara with was deleted']);
    }
}

?>