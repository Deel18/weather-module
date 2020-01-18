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

         $this->di = $di;

         //setup the controller
         $this->controller = new WeatherController();
         $this->controller->setDi($di);
     }

     /**
      * Teardown the test
      */
      protected function tearDown()
      {
          $this->di->get("session")->destroy();
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

        $res = $this->controller->indexAction();
        //$this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }


    /**
     * Test the route "info".
     */
    public function testIndexActionPost()
    {
        $response = $this->di->get("response");
        $request = $this->di->get("request");
        $session = $this->di->get("session");

        //Ip test
        $request->setPost("ip", "194.47.129.126");
        $request->setPost("verify", "Verify");
        $session->set("res", null);

        $res = $this->controller->indexActionPost();
        //$this->assertIsObject($res);
        //$response->redirectSelf();
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);
    }
}
