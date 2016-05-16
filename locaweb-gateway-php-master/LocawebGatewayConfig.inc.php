<?php
class LocawebGatewayConfig{
  const DEFAULT_ENV = "sandbox";
  const DEFAULT_TOKEN = "1328617447542";
  static protected $environment = self::DEFAULT_ENV;
  static protected $token = self::DEFAULT_TOKEN;
  private function __construct(){}
  static public function getToken(){
    return self::$token;
  }
  
  static public function setToken($value){
    if(self::$token == self::DEFAULT_TOKEN)
      self::$token = $value;
  }

  static public function getEnvironment(){
    return self::$environment;
  }
  
  static public function setEnvironment($value){
    if(self::$environment == self::DEFAULT_ENV)
      self::$environment = $value;
  }
}
