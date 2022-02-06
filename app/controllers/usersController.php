<?php

namespace App\controllers;
// TODO: CRUD, validation in usersCtrl
use App\Services\Router;

class usersController
{
    private $dbAdr = "../../users.json";

    public function create($newUserData)
    {
        //проверка на существование пользователя

        $isUserExists = false;
        $data = file_get_contents('users.json');
        // в массив
        $data = json_decode($data);
        $data = json_decode(json_encode($data), true);
        if(!empty($data)){
            foreach($data as $row){
                if(($row["login"] == $newUserData['login']) && ($row["email"] == $newUserData['email'])){
                    $isUserExists = true;
                    break;
                }
            }
        }

        if (!$isUserExists){

            //создание пользователя
            $data = file_get_contents('users.json');
            $data = json_decode($data, true);
            $password = $newUserData['pass'];
            $password = md5($password . "FBC5BB76A58C5CA4");
            $add_arr = array(
                'login' => $newUserData['login'],
                'pass' => $password,
                'email' => $newUserData['email'],
                'userName' => $newUserData['userName']
            );
            $data[] = $add_arr;
            $data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('users.json', $data);

            //возврат результата
            $response = [
                "status" => true,
                "message" =>'ok'
            ];
            echo json_encode($response);
        }
        else {
            $response = [
                "status" => true,
                "message" =>'user is exist'
            ];
            echo json_encode($response);
        }
    }

    public function read($userData){
        $data = file_get_contents('users.json');
        // в массив
        $data = json_decode($data);
        $data = json_decode(json_encode($data), true);
        if(!empty($data)){
            foreach($data as $row){
                $userData['pass'] = md5($userData['pass'] . "FBC5BB76A58C5CA4");
                if(($row["login"] == $userData['login']) && ($row["pass"] == $userData['pass'])){
                    session_start();
                    $_SESSION["user_login"] = $userData['login'];
                    $response = [
                        "status" => true,
                        "message" =>'ok'
                    ];
                    echo json_encode($response);
                    die();
                }
            }
            $response = [
                "status" => true,
                "message" =>'wrong login or password!'
            ];
            echo json_encode($response);
        }
    }

    public function update(){

    }

    public function delete(){

    }

    public function logout(){
        unset($_SESSION["user_login"]);
        Router::redirect('/login');
    }
}