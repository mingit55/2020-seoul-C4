<?php
namespace Controller;

use App\DB;

class ViewController {
    function main(){
        view("main");
    }

    /**
     * 전주한지문화축제
     */

    function intro(){
        view("intro");
    }   
    function roadMap(){
        view("road-map");
    }
    
    /**
     * 한지상품판매관
     */
    function companies(){
        $companies = DB::fetchAll("SELECT U.*, total_point
                                    FROM users U
                                    LEFT JOIN (SELECT SUM(point) total_point, uid FROM sale_history GROUP BY uid) S ON S.uid = U.id
                                    WHERE type = 'company'
                                    ORDER BY total_point DESC");
        view("companies", [
            "rankers" => array_slice($companies, 0, 4),
            "companies" => pagination(array_slice($companies, 4))
        ]);
    }
    function store(){
        view("store");
    }

    /**
     * 한지공예대전
     */
    function entry(){
        view("entry");
    }
    function artworks(){
        view("artworks");
    }

    /**
     * 축제 공지사항
     */
    function notices(){
        view("notices", [
            "notices" => pagination(DB::fetchAll("SELECT * FROM notices ORDER BY id DESC"))
        ]);
    }
    function notice($id){
        $notice = DB::find("notices", $id);
        $notice->files = json_decode($notice->files);
        view("notice", [
            "notice" => $notice
        ]);
    }
    function inquires(){
        view("inquires");
    }


    /**
     * 회원관리
     */
    function signIn(){
        view("sign-in");
    }
    function signUp(){
        view("sign-up");
    }
}