<?php
session_start();

define("ROOT", dirname(__DIR__));
define("SRC", ROOT."/src");
define("VIEW", SRC."/View");
define("UPLOAD", ROOT."/upload");


require SRC."/autoload.php";
require SRC."/helper.php";
require SRC."/web.php";

use App\DB;

if(!DB::who("admin")){
    DB::query("INSERT INTO users (user_email, password, user_name, image, type) 
                    VALUES (?, ?, ?, ?, ?)", ["admin", "1234", "관리자", "", "admin"]);
}