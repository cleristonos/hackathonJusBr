<?php

/**
 * Description of AbstractController
 *
 * @author cleriston
 */

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AbstractController {

    public static $session;

    public static function mainBefore(Request $req) {
        
    }

}
