<?php
namespace FletesBundle\Repository;

use Symfony\Component\Security\Core\User\UserProviderInterface;

use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\ORM\QueryBuilder;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository implements UserProviderInterface{
    
    function loadUserByUsername($usuario){
        return $this->createQueryBuilder('u')
        ->andWhere('(u.usuario=:usuario or u.email=:usuario) and u.activo = true')
        ->setParameter('usuario',$usuario)->getQuery()->getSingleResult();
        
    }
    
    public function refreshUser(UserInterface $user){
        return $this->loadUserByUsername($user->getUsername());
    }
    
    public function supportsClass($class){
        return $class=='FletesBundle:Usuario';
    }
}