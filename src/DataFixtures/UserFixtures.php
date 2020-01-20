<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    /**
     * UserFixtures constructor.
     */

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("arnogov@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, 'azerty'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
