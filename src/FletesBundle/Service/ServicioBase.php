<?php
namespace FletesBundle\Service;

class ServicioBase{

    protected $em;
    protected $templating;
    
    protected function repo($clase){
        return $this->em->getRepository("FletesBundle:{$clase}");
    } 
}