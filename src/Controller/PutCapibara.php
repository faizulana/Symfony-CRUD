<?php

namespace App\Controller;

use App\Entity\Capibara;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class PutCapibara extends AbstractController
{
    public function __invoke(Request $request, EntityManagerInterface $entityManager, Capibara $capibara): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $capibara->setName($data['name']);
        $capibara->setDescription($data['description']);
        $capibara->setAge($data['age']);

        $entityManager->persist($capibara);
        $entityManager->flush();

        return $this->json($capibara);
    }
}