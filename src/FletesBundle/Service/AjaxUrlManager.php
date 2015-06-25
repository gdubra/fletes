<?php
namespace FletesBundle\Service;
use Symfony\Component\Templating\Helper\Helper;

class AjaxUrlManager extends Helper{
    
    private $router;
    private $csrf_provider;
    private $ajax_urls;
    
    public function __construct($router,$csrf_provider){
        $this->router = $router;
        $this->csrf_provider = $csrf_provider;
    }
    
    public function getName() {
        return 'AjaxUrlManager';
    }
    
    private function init_ajax_urls(){
        if(!isset($this->ajax_urls) || empty($this->ajax_urls)){
            $this->ajax_urls = array();
            $urls_array = $this->get_urls_array();
            foreach ($urls_array as $key=>$url){
                $this->ajax_urls[$key] = array(
                                        'url' => $url,
                                        'csrf' => $this->csrf_provider->generateCsrfToken($url),
                );
            }
        }
        
    }

    private function get_urls_array(){
        return array(
        'HOMEPAGE'=>$this->router->generate('homepage'),
        //OFERTA
        'CREAR_OFERTA'=>$this->router->generate('crear_oferta'),
        'BUSCAR_OFERTA'=>$this->router->generate('buscar_oferta'),
        'VER_OFERTA'=>$this->router->generate('ver_oferta',array('id'=>':id')),
        //USUARIO
        'CREAR_USUARIO'=>$this->router->generate('crear_usuario'),
        'CONFIRMAR_LINK_RESETEAR_CLAVE'=>$this->router->generate('confirmar_link_resetear_clave'),
        'CONFIRMAR_RESETEAR_CLAVE'=>$this->router->generate('confirmar_reseteo'),
        );
    }
    
    public function get_ajax_urls(){
        if(!isset($this->ajax_urls) || empty($this->ajax_urls)){
            $this->init_ajax_urls();
        }
        
        return $this->ajax_urls;
    }
}