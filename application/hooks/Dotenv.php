<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 18/01/2017
 * Time: 14:41
 */

class DotenvHooks
{
    function dotenv(){
        $dotenv = new Dotenv(APPPATH);
        $dotenv->load();
    }
}
