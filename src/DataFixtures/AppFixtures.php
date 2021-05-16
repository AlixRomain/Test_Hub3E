<?php

namespace App\DataFixtures;

use App\Entity\Tools;
use App\Entity\User;
use App\Repository\ToolsRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $repoTools;
    private $faker;
    private $encoder;
    public function __construct( UserPasswordEncoderInterface $encoder, ToolsRepository $repoTools)
    {
        $this->repoTools = $repoTools;
        $this->faker = Factory::create("fr_FR");
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        //FOR LOAD METHOD WITH DROP TABLE "symfony console doctrine:fixtures:load"
        //FOR LOAD METHOD WITHOUT DROP TABLE "symfony console doctrine:fixtures:load --append"
        $contenu_fichier_json = file_get_contents(__DIR__.'/datas.json');
        $datas = json_decode($contenu_fichier_json, true);

        foreach($datas['tools'] as $tools ){
            $user = new User();
            $user->setUsername($this->faker->userName)
                ->setEmail($this->faker->email)
                ->setRoles(User::ROLE_USER)
                ->setPassword($this->encoder->encodePassword($user, "Hub3E2021!"));
            $manager->persist($user);

            $newTools = new Tools();
            $newTools->setName($tools["name"])
                ->setDescription($tools["description"])
                ->setRelation($user);
            $manager->persist($newTools);
        }
        $simpleUser = new User();
        $simpleUser->setUsername("user")
            ->setEmail("user@user.fr")
            ->setRoles(User::ROLE_USER)
            ->setPassword($this->encoder->encodePassword($simpleUser, "Hub3E2021!"));
        $manager->persist($simpleUser);

    $user = new User();
        $user->setUsername("admin")
            ->setEmail("admin@admin.fr")
            ->setRoles(User::ROLE_ADMIN)
            ->setPassword($this->encoder->encodePassword($user, "Hub3E2021!"));
        $manager->persist($user);

        $manager->flush();
    }
}
