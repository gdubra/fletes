<?php

namespace FletesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	/**
	* @Route("/",name="homepage")
	* @Method("GET")
	*
	*/
	public function indexAction()
	{
		return $this->render('FletesBundle:Oferta:listadoOferta.html.php');
	}
	
	/**
	* @Route("/login",name="login")
	* @Method("GET")
	*/
	public function loginAction(){
		return $this->render('FletesBundle:Default:login.html.php');
	}
	
	/**
	* @Route("/login_check",name="login_check")
	* @Method("POST")
	*/
	public function loginCheckAction(){
    }
    
    /**
    * @Route("/logout",name="logout")
    * @Method("GET")
    */
    public function logoutAction(){
        return $this->render('FletesBundle:Default:login.html.php');
    }
    
   
}
