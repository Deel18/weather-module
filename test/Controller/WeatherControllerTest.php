<?php

namespace Anax\Weather;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherControllerTest extends TestCase
{

    /**
     * Setup the test.
     */
     protected function setUp()
     {
         global $di;

         //Setup di
         $di = new DIFactoryConfig();
         $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

         //use different cache for unit tests
         $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

         //setup the controller
         $controller = new WeatherController();
         $controller->setDi($di);
     }

     /**
      * Teardown the test
      */
      protected function tearDown()
      {
          $di->get("session")->destroy();
      }


    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        //$di->get("session")->set("res", null);
        //$di->get("session")->set("ip", null);
        //$di->get("session")->set("weatherWeek", null);
        //$di->get("session")->set("weatherPast", null);
        //$di->get("session")->set("geo", null);
        //$di->get("session")->set("latitude", null);
        //$di->get("session")->set("longitude", null);
        //$di->get("session")->set("apikey", null);

        $res = $controller->indexAction();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }


    /**
     * Test the route "info".
     */
    public function testIndexActionPost()
    {
        $response = $di->get("response");
        $request = $di->get("request");
        $session = $di->get("session");

        //Ip test
        $request->setPost("ip", "194.47.129.126");
        $request->setPost("verify", "Verify");
        $session->set("res", null);

        $res = $controller->indexActionPost();
        //$this->assertIsObject($res);
        //$response->redirectSelf();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
