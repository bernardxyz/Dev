<?php

namespace App\Controller\Common;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\Serializer;
use Symfony\Component\VarDumper\VarDumper;

class BaseController extends AbstractController
{
    protected function activeMenu($key = null, $asArray = false)
    {
        $menu = [
            'dashboard'   => '',
            'user'        => '',
            'organization'=> ''
        ];

        if(array_key_exists($key, $menu)){
            $menu[$key] = 'active';
        }

        if(!$asArray){
            return (object)$menu;
        }

        return $menu;
    }

    public function getContent($associativeFlag = true, $postFlag = false)
    {
        if($postFlag){
            return $_POST;
        }

        /** @var RequestStack $requestStack */
        $requestStack = $this->get('request_stack');

        return json_decode($requestStack->getCurrentRequest()->getContent(), $associativeFlag);
    }

    protected function makeCommandFromRequest($class, $format = 'json')
    {
        /** @var RequestStack $reqStack */
        $reqStack = $this->get('request_stack');

        /** @var Serializer $serializer */
        $serializer = $this->get('jms_serializer');
        return $serializer->deserialize($reqStack->getCurrentRequest()->getContent(), $class, $format);
    }

    /** @return UploadedFile */
    protected function makeCommandFromUpload($name = 'file')
    {
        /** @var RequestStack $reqStack */
        $reqStack = $this->get('request_stack');
        /** @var FileBag $files */
        $files = $reqStack->getCurrentRequest()->files;

        return $files->get($name);
    }
}
