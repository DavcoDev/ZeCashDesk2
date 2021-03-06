<?php

namespace UserBundle\DataFixtures;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('Dav', 'Mig');


        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques
            $user->setUsername($name);
            $user->setPassword($name);

            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_USER'));
            // On le persiste
            $manager->persist($user);
        }
        $admin = new User();

        $admin->setUsername('Admin');
        $admin->setPassword('Admin');
        $admin->setSalt('');
        $admin->setRoles(array('ROLE_ADMIN'));
        $manager->persist($admin);

        // On déclenche l'enregistrement
        $manager->flush();
    }
}