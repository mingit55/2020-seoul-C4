<?php
namespace Controller;

use App\DB;

class ActionController {
    /**
     * 회원관리
     */
    function signUp(){
        checkEmpty();
        extract($_POST);
    
        $image = $_FILES['image'];
        $extname = extname($image['name']);
        $filename = time() . $extname;
        $filepath = "/images/users/$filename";
        if(move_uploaded_file($image['tmp_name'], UPLOAD."/$filename")){
            DB::query("INSERT INTO users (user_email, password, user_name, image, type)
                    VALUES (?, ?, ?, ?, ?)", [$user_email, $password, $user_name, $filepath, $user_type]);
            go("/", "성공적으로 회원가입 되었습니다.");
        } else {
            back("이미지를 찾지 못했습니다.");
        }
    }   
    function signIn(){
        checkEmpty();
        extract($_POST);

        $exist = DB::who($user_email);
        if(!$exist) back("아이디와 일치하는 회원이 존재하지 않습니다.");
        if($exist->password !== $password) back("비밀번호가 일치하지 않습니다.");

        $_SESSION['user'] = $exist;
        go("/", "로그인 되었습니다.");
    }
    function logout(){
        unset($_SESSION['user']);
        go("/", "로그아웃 되었습니다.");
    }

    /**
     * 한지상품판매관
     */
    function insertPaper(){
        checkEmpty();
        extract($_POST);
        
        
        $image = $_FILES['image'];
        $extname = extname($image['name']);
        $filename = time().$extname;
        $filepath = "/images/papers/$filename";

        move_uploaded_file($image['tmp_name'], UPLOAD."/$filename");

        DB::query("INSERT INTO papers(image, paper_name, uid, width_size, height_size, point, hash_tags)
                VALUES (?, ?, ?, ?, ?, ?, ?)", [
                    $filepath, $paper_name, $uid, $width_size, $height_size, $point, $hash_tags
                ]);        
        $pid = DB::lastInsertId();
        $tags = json_decode($hash_tags);
        foreach($tags as $tag){
            DB::query("INSERT INTO paper_tags(name, pid) VALUES (?, ?)", [$tag, $pid]);
        }

        go("/store", "상품이 등록되었습니다.");
    }

    function buyPapers(){
        checkEmpty();
        extract($_POST);
        $buyList = json_decode($buy_list);
    
        
        if($total_point > user()->point){
            back("포인트가 부족하여 구매하실 수 없습니다.");
        }

        foreach($buyList as $buyItem){
            $paper = DB::find("papers", $buyItem->id);
            $count = $buyItem->buyCount;
 
            $exist = DB::fetch("SELECT * FROM inventory WHERE pid = ?", [$paper->id]);
            if(!$exist) DB::query("INSERT INTO inventory(pid, uid, count) VALUES (?, ?, ?)", [$paper->id, user()->id, $count]);
            else DB::query("UPDATE inventory SET count = count + ? WHERE id = ?", [$count, user()->id]);

            DB::query("INSERT INTO sale_history(uid, point) VALUES (?, ?)", [$paper->uid, $paper->point * $count]);
            DB::query("UPDATE users SET point = point - ? WHERE id = ?", [$paper->point * $count, user()->id]);
            DB::query("UPDATE users SET point = point + ? WHERE id = ?", [$paper->point * $count, $paper->uid]);
        }
        go("/store", "총 {$total_count}개의 한지가 구매되었습니다.");
    }

    /**
     * 축제 공지사항
     */

    function insertNotice(){
        checkEmpty();
        extract($_POST);

        if(mb_strlen($title) > 50) back("제목은 50자 이하여야합니다.");

        $files = $_FILES['files'];
        $fileLength = count( $files['name'] );

        $filenames = [];

        for($i = 0; $i < $fileLength; $i++ ){
            if($files['name'][$i] == "") break;
            $name = $files['name'][$i];
            $size = $files['size'][$i];
            $tmp_name = $files['tmp_name'][$i];
            $filename = time() . "-$name";
            $filenames[] = $filename;
            
            if($size > 1024 * 1024 * 10) back("업로드 파일은 10MB 이하여야합니다.");
            if($i > 3) back("파일은 4개까지만 업로드 가능합니다.");

            move_uploaded_file($tmp_name, UPLOAD."/$filename");
        }

        DB::query("INSERT INTO notices(title, content, files) VALUES (?, ?, ?)", [$title, $content, json_encode($filenames)]);

        go("/notices", "공지사항을 작성했습니다.");
    }

    function updateNotice($id){
        $notice = DB::find("notices", $id);
        if(!$notice) back("공지사항이 존재하지 않습니다.");

        checkEmpty();
        extract($_POST);

        if(mb_strlen($title) > 50) back("제목은 50자 이하여야합니다.");

        $files = $_FILES['files'];
        $fileLength = count( $files['name'] );

        $filenames = [];

        for($i = 0; $i < $fileLength; $i++ ){
            if($files['name'][$i] == "") break;
            $name = $files['name'][$i];
            $size = $files['size'][$i];
            $tmp_name = $files['tmp_name'][$i];
            $filename = time() . "-$name";
            $filenames[] = $filename;
            
            if($size > 1024 * 1024 * 10) back("업로드 파일은 10MB 이하여야합니다.");
            if($i > 3) back("파일은 4개까지만 업로드 가능합니다.");

            move_uploaded_file($tmp_name, UPLOAD."/$filename");
        }

        DB::query("UPDATE notices SET title = ?, content = ?, files = ? WHERE id = ?", [$title, $content, json_encode($filenames), $id]);

        go("/notices/$id", "공지사항을 수정했습니다.");
    }

    function deleteNotice($id){
        $notice = DB::find("notices", $id);
        if(!$notice) back("공지사항이 존재하지 않습니다.");

        DB::query("DELETE FROM notices WHERE id = ?", [$id]);

        go("/notices", "삭제되었습니다.");
    }

    function downloadImage($filename){
        $extname = extname($filename);
        header("Content-Disposition: attachement; filename=download{$extname}");
        readfile(UPLOAD."/$filename");
    }
}