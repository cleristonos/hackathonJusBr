<?php


/**
 * Description of AbstractModel
 *
 * @author cleriston.os
 */
 namespace Model;
 use \Silex\Application;
class AbstractModel {
     protected static $entityManager;

    public static function setEntityManager($entityManager) {
        
        self:: $entityManager = $entityManager;
    }

}
