<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetByUsernameAction
{
    public function __invoke($username, EntityManagerInterface $em)
    {
        $user = $em->getRepository(UserRepository::class)->findOneBy([
            'username' => $username
        ]);

        if (!$user) {
            throw new NotFoundHttpException('User not found');
        }
        return $user;
    }
}
