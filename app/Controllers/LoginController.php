<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController extends BaseController
{
    use ResponseTrait;
      
    public function index()
    {
        $userModel = new UserModel();
   
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
           
        $user = $userModel->where('email', $email)->first();
   
        if(is_null($user)) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }
   
        $pwd_verify = password_verify($password, $user['password']);
   
        if(!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }
  
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
  
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['email'],
        );
          
        $token = JWT::encode($payload, $key, 'HS256');
        $decode = JWT::decode($token, new Key($key, 'HS256'));

        // var_dump($decode);
        // die();
       
  
        $response = [
            'message' => 'Login Succesful',
            'token' => $token,
            'decode' => $decode
        ];
          
        return $this->respond($response, 200);
        
    }
}
