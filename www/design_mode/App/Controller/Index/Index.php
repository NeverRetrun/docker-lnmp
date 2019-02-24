<?php
/**
 * Created by PhpStorm.
 * User: ruiyang
 * Date: 11/01/19
 * Time: 上午 09:48
 */

namespace App\Controller\Index;

use App\Controller\Factory\StdoutLoggerFactory;
use Core\Controller;

class Index extends Controller
{
    public function index()
    {
        throw new \Exception('test');
    }
}