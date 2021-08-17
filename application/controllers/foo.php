<?php
class Foo extends RestController {
    public function __construct() {
       parent::__construct();
    }
public function index(){
    echo "foo called";
}
}