<?php
use App\DB;

function dump(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }
}
function dd(){
    dump(...func_get_args());
    exit;
}

function user(){
    if(isset($_SESSION['user'])){
        return DB::who($_SESSION['user']->user_email);
    }
    else {
        return false;
    }
}
function normal(){
    return user() && user()->type == "normal" ? user() : false;
}
function company(){
    return user() && user()->type == "company" ? user() : false;
}
function admin(){
    return user() && user()->type == "admin" ? user() : false;
}


function go($url, $message = ""){
    echo "<script>";
    if($message !=="") echo "alert('$message');";
    echo "location.href='$url';";
    echo "</script>";
    exit;
}

function back($message = ""){
    echo "<script>";
    if($message !=="") echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
    exit;
}

function json_response($data){
    echo json_encode($data);
    exit;
}

function view($viewName, $data = []){
    $filePath = VIEW."/$viewName.php";
    extract($data);
    if(is_file($filePath)){
        require VIEW."/header.php";
        require $filePath;
        require VIEW."/footer.php";
    }
    exit;
}

function checkEmpty(){
    foreach($_POST as $input){
        if(trim($input) === ""){
            back("모든 정보를 입력해 주세요!");
        }
    }
}

function extname($filename){
    return substr($filename, strrpos($filename, "."));
}

function pagination($data){
    define("PAGE__COUNT", 10);
    define("PAGE__BCOUNT", 5);

    $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] >= 1 ? $_GET['page'] : 1;
    
    $totalPage = ceil(count($data) / PAGE__COUNT);
    $currentBlock = ceil( $page / PAGE__BCOUNT );

    $start = $currentBlock * PAGE__BCOUNT - PAGE__BCOUNT + 1;
    $end = $start + PAGE__BCOUNT - 1;

    if($start < 1) $start = 1;
    if($end > $totalPage) $end = $totalPage;

    $prevPage = $start - 1;
    $prev = $prevPage < 1;
    
    $nextPage = $end + 1;
    $next = $nextPage > $totalPage;

    $data = array_slice($data, ($page - 1) * PAGE__COUNT, PAGE__COUNT);

    return (object)compact("page", "start", "end", "prev", "next", "prevPage", "nextPage", "data");
}

function enc($data){
    return strtolower(nl2br(str_replace(" ", "&nbsp;", htmlentities($data))));
}