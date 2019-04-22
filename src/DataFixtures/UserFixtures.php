<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('ranking');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, '123456'));
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setStatus(1);
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('silkwires');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'qwerty'));
        $user2->setRoles(['ROLE_SUPER_ADMIN']);
        $user2->setStatus(1);
        $manager->persist($user2);

        $manager->flush();
    }
}
