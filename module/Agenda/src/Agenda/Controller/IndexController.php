<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function testeAction() {
        session_start();
require_once '/home/ec2-user/www/esof/vendor/google-api-php-client/src/Google_Client.php';       
require_once '/home/ec2-user/www/esof/vendor/google-api-php-client/src/contrib/Google_CalendarService.php';
$client = new \Google_Client();

$client->setApplicationName("Google Calendar PHP Starter Application");
$client->setRedirectUri('http://esof.uberabatemdetudo.com/agenda/index/teste');

// Visit https://code.google.com/apis/console?api=calendar to generate your
// client id, client secret, and to register your redirect uri.
// $client->setClientId('insert_your_oauth2_client_id');
// $client->setClientSecret('insert_your_oauth2_client_secret');
//$client->setRedirectUri('insert_your_oauth2_redirect_uri');
// $client->setDeveloperKey('insert_your_developer_key');
$cal = new \Google_CalendarService($client);
if (isset($_GET['logout'])) {
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {
  $acl = $cal->acl->listAcl('primary');  
  print "<h1>Calendar List</h1><pre>" . print_r($acl, true) . "</pre>";
  
  foreach ($acl->getItems() as $rule) {
      echo $rule->getId() . ': ' . $rule->getRole().'<br<br>';
  }


$_SESSION['token'] = $client->getAccessToken();
} else {
  $authUrl = $client->createAuthUrl();
  print "<a class='login' href='$authUrl'>Connect Me!</a>";
}
/*$client->setClientId('916363986701.apps.googleusercontent.com');
$client->setClientSecret('WOc5E60RR1vQAX-KpzeSIyzZ');
$client->setRedirectUri('http://esof.uberabatemdetudo.com/oauth2callback');
$client->setDeveloperKey('AIzaSyDjTXs318NRyXiBYiMBn2Cwsa2ftHlGmeU');
  */      
    }
          
         
}
