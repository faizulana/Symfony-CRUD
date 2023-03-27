<?php

namespace App\Controller;

use App\Entity\Capibara;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsController]
class PatchCapibara extends AbstractController
{
    public function __invoke(Request $request, Capibara $capibara, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $capibara->setName($data['name']);
        }

        if (isset($data['description'])) {
            $capibara->setDescription($data['description']);
        }

        if (isset($data['age'])) {
            $capibara->setAge($data['age']);
        }

        $entityManager->persist($capibara);
        $entityManager->flush();

        return $this->json($capibara);
    }
}