<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace API\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    
    const API_VERSION = '1.0';
    public function indexAction()
    {
        $params = array();
        
        $param = $this->params()->fromQuery();
        if(isset($param['version']))
        {
            $params['version'] = self::API_VERSION;
        }
        return new JsonModel($params);
    }
    public function versionAction()
    {
        return new JsonModel(array('version'=>self::API_VERSION));
    }
}
