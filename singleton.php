<?php
 
class Singleton {
    private static $instance = null;

    private static int $bigNumbers = 0;
    private static int $smallNumbers = 0;
                 
    private function __construct()
    { 
    }
     
    public function getNumbers(): array {
        return [self::$bigNumbers, self::$smallNumbers];
    }

    public function addNumber(int $number): void {
        if ($number >= 1000) {
            self::$bigNumbers += $number;
        } 
        if ($number <= 1000) {
            self::$smallNumbers += $number;
        }
    }

    public function removeNumber(int $number): void {
        if ($number >= 1000) {
            self::$bigNumbers -= $number;
        } 
        if ($number <= 1000) {
            self::$smallNumbers -= $number;
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Singleton();
        }
    
        return self::$instance;
    }
}
 
$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

var_dump($instance1 == $instance2);
var_dump($instance1->getNumbers());
$instance1->addNumber(1000);
$instance1->addNumber(1001);
$instance1->addNumber(999);
var_dump($instance1->getNumbers());

$instance1->removeNumber(1000);
$instance1->removeNumber(1001);
$instance1->removeNumber(999);
var_dump($instance1->getNumbers());
?>