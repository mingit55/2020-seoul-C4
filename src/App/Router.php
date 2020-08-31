<?php
namespace App;

class Router {
    static $pages = [];
    static function __callStatic($name, $args){
        if($name === strtolower($_SERVER['REQUEST_METHOD'])){
            self::$pages[] = $args;
        }
    }

    static function start(){
        $url = explode("?", $_SERVER['REQUEST_URI'])[0];
        
        foreach(self::$pages as $page){
            $regex = preg_replace("/{[^\/]+}/", "([^/]+)", $page[0]);
            $regex = preg_replace("/\//", "\\/", $regex);
            if(preg_match("/^{$regex}$/", $url, $matches)){
                unset($matches[0]);
                if(isset($page[2]) && $page[2] == "user" && (!user() || user()->type == 'admin')) go("/", "회원만 이용가능합니다.");
                if(isset($page[2]) && $page[2] == "company" && !company()) go("/", "기업 회원만 이용가능합니다.");
                if(isset($page[2]) && $page[2] == "admin" && !admin()) go("/", "권한이 없습니다.");
                $action = explode("@", $page[1]);
                $conName = "Controller\\{$action[0]}";
                $con = new $conName();
                $con->{$action[1]}(...$matches);
                exit;
            }
        }
        http_response_code(404);
    }
}