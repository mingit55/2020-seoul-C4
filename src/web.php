<?php
use App\Router;

Router::get("/", "ViewController@main");
Router::get("/images/{group_name}/{file_name}", "ApiController@getImage");

/**
 * 전주한지문화축제
 */
Router::get("/intro", "ViewController@intro");
Router::get("/road-map", "ViewController@roadMap");


/**
 * 한지상품판매관
 */
Router::get("/companies", "ViewController@companies");
Router::get("/store", "ViewController@store");

Router::get("/api/papers", "ApiController@getPapers");
Router::get("/api/papers/tags", "ApiController@getPaperTags");

Router::post("/insert/paper", "ActionController@insertPaper", "company");
Router::post("/store/buy", "ActionController@buyPapers", "user");

/**
 * 한지공예대전
 */
Router::get("/entry", "ViewController@entry", "user");
Router::get("/artworks", "ViewController@artworks");

Router::get("/api/inventory", "ApiController@getInventory");
Router::get("/api/inventory/{id}", "ApiController@getInventoryItem");
Router::get("/api/delete/inventory/{id}", "ApiController@deleteInventory");
Router::get("/api/update/inventory/{id}", "ApiController@updateInventory");
/**
 * 축제 공지사항
 */
Router::get("/notices", "ViewController@notices");
Router::get("/inquires", "ViewController@inquires");
Router::get("/notices/{id}", "ViewController@notice");

Router::post("/insert/notices", "ActionController@insertNotice", "admin");
Router::get("/delete/notices/{id}", "ActionController@deleteNotice", "admin");
Router::post("/update/notices/{id}", "ActionController@updateNotice", "admin");
Router::get("/download/{filename}", "ActionController@downloadImage");

/**
 * 회원관리
 */
Router::get("/sign-in", "ViewController@signIn");
Router::get("/sign-up", "ViewController@signUp");

Router::get("/api/users/{user_email}", "ApiController@getUser");

Router::post("/sign-up", "ActionController@signUp");
Router::post("/sign-in", "ActionController@signIn");
Router::get("/logout", "ActionController@logout");

Router::start();