<?php

//Login_model  ====== camada Model responsável por php puro, regras, validacoes e acesso de bd
class Login extends Model {
    
    //validando dados apartir do login
    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors['email'] = 'E-mail obrigatório.';
        }

        if(!$this->password) {
            $errors['password'] = 'Informe a sua senha.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            if($user->end_date) {
                throw new AppException('Usuário desligado da empresa.');
            }
            //password digitado pelo usuario e paasword do bd 
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException('Usuário e Senha inválidos.');
    }
}