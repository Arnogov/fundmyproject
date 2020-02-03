<?php

namespace App\DataFixtures;

use App\Entity\Contribution;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContributionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contribution1 = new Contribution();
        $contribution1->setAmount(500.00);
        $contribution1->setUser($this->getReference("John"));
        $contribution1->setProject($this->getReference("lesyeuxdanslebus"));
        $this->addReference("contribution1", $contribution1);
        $manager->persist($contribution1);

        $contribution2 = new Contribution();
        $contribution2->setAmount(1500.00);
        $contribution2->setUser($this->getReference("John"));
        $contribution2->setProject($this->getReference("goodgirl"));
        $this->addReference("contribution2", $contribution2);
        $manager->persist($contribution2);

        $contribution3 = new Contribution();
        $contribution3->setAmount(5000.00);
        $contribution3->setUser($this->getReference("John"));
        $contribution3->setProject($this->getReference("dabado"));
        $this->addReference("contribution3", $contribution3);
        $manager->persist($contribution3);

        $contribution4 = new Contribution();
        $contribution4->setAmount(2500.00);
        $contribution4->setUser($this->getReference("John"));
        $contribution4->setProject($this->getReference("doosh"));
        $this->addReference("contribution4", $contribution4);
        $manager->persist($contribution4);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            ProjectFixtures::class
        ];
    }
}
