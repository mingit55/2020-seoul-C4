<?php
namespace Controller;

use App\DB;

class ApiController {
    function getImage($group_name, $file_name){
        $filepath = UPLOAD."/$file_name";
        if(is_file($filepath)){
            header("Content-Type: image/jpeg");
            readfile($filepath);
        }
    }
    
    function getUser($user_email){
        $exist = DB::who($user_email);
        json_response($exist);
    }

    function getPapers(){
        json_response(
            array_map(function($paper){
                $paper->hash_tags = json_decode($paper->hash_tags);
                return $paper;
            }, DB::fetchAll("SELECT P.*, user_name company_name
                FROM papers P
                LEFT JOIN users U ON U.id = P.uid"))
        );
        
    }

    function getPaperTags(){
        json_response(
            array_map(function($tag){
                return $tag->name;
            }, DB::fetchAll("SELECT DISTINCT name FROM paper_tags"))
        );
    }

    function getInventory(){
        json_response(
            DB::fetchAll("SELECT DISTINCT I.count, P.*
                            FROM inventory I
                            LEFT JOIN papers P ON P.id = I.pid
                            WHERE I.uid = ?", [user()->id])
        );
    }

    function getInventoryItem($id){
        json_response(
            DB::fetch("SELECT DISTINCT I.count, P.*
                            FROM inventory I
                            LEFT JOIN papers P ON P.id = I.pid
                            WHERE I.id = ?", [$id])
        );
    }

    function deleteInventory($id){
        $item = DB::find("inventory", $id);
        if($item && $item->uid == user()->id){
            DB::query("DELETE FROM inventory WHERE id = ?", [$id]);
        }
    }

    function updateInventry($id){
        $item = DB::find("inventory", $id);
        if($item && $item->uid == user()->id && isset($_GET['count']) && is_numeric($_GET['count'])){
            $count = $_GET['count'];
            DB::query("UPDATE inventory SET count = ? WHERE id = ?", [$count, $id]);
        }
    }
}