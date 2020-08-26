<?php


/*

require_once(MODEL_PATH . '/Login.php'); 
  
$login = new Login([
    'email' => 'admin@innout.com.br',
    'password' => 'a'
]);

try {
    $login ->checkLogin();
    echo 'Deu Certo :)'; 
} catch (Exception $e){
    echo 'Problema no login :P ';
}



$user = new User(['name' => 'Lucas', 'email' =>'lucas@innout.com.br']);

print_r(User::getAll(['id' =>1], 'name, email'));
echo '<br>';
print_r(User::getAll([], 'name'));

echo '<br>';
//filtrando para pegar nomes
foreach(User::getAll([], 'name') as $user){
    echo $user-> name;
    echo '<br>';
}




echo User::getResultSetFromSelect(['id' => 1], 'name, email');

//echo $user->getSelect();
echo User::getSelect(['id' => 1], 'name, email');
echo '<br>';

echo User::getSelect(['name' => 'chaves', 'email' => 'chaves@innout.com']);



$user->set('email', 'licas_alterado@innout.com');
print_r($user->get('email'));

usando metodo magico 
print_r($user);
echo '<br>';
$user ->email = 'lucas_alterado@innout.com';
print_r($user->email);

====esta certo ===== 
$sql = 'select * from users';
$result = Database::getResultFromQuery($sql);

//$row -> linhas
while($row = $result ->fetch_assoc()){
    print_r($row);
    echo '<br';
}
*/



/*

require_once(MODEL_PATH . '/Login.php'); 
  
$login = new Login([
    'email' => 'admin@innout.com.br',
    'password' => 'a'
]);

try {
    $login ->checkLogin();
    echo 'Deu Certo :)'; 
} catch (Exception $e){
    echo 'Problema no login :P ';
}



$user = new User(['name' => 'Lucas', 'email' =>'lucas@innout.com.br']);

print_r(User::getAll(['id' =>1], 'name, email'));
echo '<br>';
print_r(User::getAll([], 'name'));

echo '<br>';
//filtrando para pegar nomes
foreach(User::getAll([], 'name') as $user){
    echo $user-> name;
    echo '<br>';
}




echo User::getResultSetFromSelect(['id' => 1], 'name, email');

//echo $user->getSelect();
echo User::getSelect(['id' => 1], 'name, email');
echo '<br>';

echo User::getSelect(['name' => 'chaves', 'email' => 'chaves@innout.com']);



$user->set('email', 'licas_alterado@innout.com');
print_r($user->get('email'));

usando metodo magico 
print_r($user);
echo '<br>';
$user ->email = 'lucas_alterado@innout.com';
print_r($user->email);

====esta certo ===== 
$sql = 'select * from users';
$result = Database::getResultFromQuery($sql);

//$row -> linhas
while($row = $result ->fetch_assoc()){
    print_r($row);
    echo '<br';
}


