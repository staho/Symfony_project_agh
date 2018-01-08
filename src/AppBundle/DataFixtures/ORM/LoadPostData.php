<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 06.01.2018
 * Time: 15:20
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Entity\AnimalPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++){
          $animalPost = new AnimalPost();
          $animalPost->setCastration($faker->boolean(60));
          $animalPost->setVaccination($faker->boolean(80));
          $animalPost->setTitle($faker->name());
          $animalPost->setDescription($faker->text(800));
          $animalPost->setCreatedAt($faker->dateTime("now"));
          $animalPost->setPicture($faker->imageUrl($width=120, $height=120, 'cats'));

          $manager->persist($animalPost);

        }
        $manager->flush();
    }
}