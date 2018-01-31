<?php
$pdo = NULL;

function connect(){
	global $dataBD, $pdo;

	$pdo = new \PDO('mysql:host='.$dataBD['host'].';dbname='.$dataBD['dbname'], $dataBD['login'], $dataBD['pass']);
}

function filter($data, $flag='s'){
	if(empty($data)) return false;
	
	switch($flag){
		case 's':
			$data = trim(strip_tags($data));
			$data = (string)$data;
			break;
		case 'i':
			$data = (int)$data;
			break;
	}

	if(empty($data)) return false;

	return $data;
}

function getUsers(){
	global $pdo;

	$query = $pdo->query('SELECT * FROM `users`');

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function getUser($login, $email){
	global $pdo;

	$query = $pdo->prepare('SELECT `id` FROM `users` WHERE `login` = :login OR `email` = :email');
	$query->execute(['login' => $login, 'email' => $email]);

	return $query->fetch(\PDO::FETCH_ASSOC)['id'];
}

function getUserByPass($login, $pass){
	global $pdo;

	$query = $pdo->prepare('SELECT `id` FROM `users` WHERE `login` = :login AND `pass` = :pass');
	$query->execute(['login' => $login, 'pass' => $pass]);

	return $query->fetch(\PDO::FETCH_ASSOC);
}

function getUserByID(int $id){
	global $pdo;

	$query = $pdo->prepare('SELECT * FROM `users` WHERE `id` = :id');
	$query->execute(['id' => $id]);

	return $query->fetch(\PDO::FETCH_ASSOC);
}

function updateUser($data){
	global $pdo;

	$query = $pdo->prepare('UPDATE `users` SET `login` = :login, `name` = :name, `email` = :email, `dob` = :dob WHERE `id` = :id');
	$query->execute(['login' => $data['login'], 'email' => $data['email'], 'name' => $data['name'], 'dob' => $data['dob'], 'id' => $data['user_id']]);
}

function addUser($data, $isAddAdmin=false){
	global $pdo, $settings;

	$url = $settings['root_url'].'register.php?status=';
	if($isAddAdmin) $url = $isAddAdmin;
	
	$status;
	$login = filter($data['login']);
	$name = filter($data['name']);
	$password = ($data['pass']);
	$mail = $data['mail'];

	if(($data['pass']) != ($data['pass_conf'])){
		$status = 'Пароли не совпадают!';
		redirect($url.$status);
	}
	
	if(!getUser($login, $mail)){
		$query = $pdo->prepare('INSERT INTO `users`(`login`, `name`, `pass`, `email`) VALUES(:login, :name, :pass, :email)');
		$query->execute(['login' => $login, 'name' => $name, 'pass' => $password, 'email' => $mail]);

		$userId = $pdo->lastInsertId();
		$roleId = $data['role'];

		addRole($userId, $roleId);
		$status = 'Пользователь успешно добавлен!';
	}else{
		$status = 'Такой пользователь уже существует! Добавьте нового.';
	}
	redirect($url.$status);
}

function deleteUser($user_id){
	global $pdo;

	$query = $pdo->prepare('DELETE FROM `users_roles` WHERE `user_id` = :user_id');
	$query->execute(['user_id' => $user_id]);

	$query = $pdo->prepare('DELETE FROM `users` WHERE `id` = :user_id');
	$query->execute(['user_id' => $user_id]);
}

function updateRole($user_id, $role_id){
	global $pdo;

	$query = $pdo->prepare('UPDATE `users_roles` SET `role_id` = :role_id WHERE `user_id` = :user_id');
	$query->execute(['user_id' => $user_id, 'role_id' => $role_id]);
}

function addRole($userId, $roleId){
	global $pdo;

	$query = $pdo->prepare('INSERT INTO `users_roles`(`user_id`, `role_id`) VALUES(:userId, :roleId)');
	$query->execute(['userId' => $userId, 'roleId' => $roleId]);
}

function getRoleByUserID($user_id, $role='role'){
	global $pdo;

	$query = $pdo->prepare('SELECT `ur`.`role_id`, `r`.`title` as `role` FROM `users_roles` `ur` INNER JOIN `role` `r` ON `r`.`id` = `ur`.`role_id` WHERE `ur`.`user_id` = :user_id');
	$query->execute(['user_id' => $user_id]);
	
	return $query->fetch(\PDO::FETCH_ASSOC)[$role];
}

function getRoles(){
	global $pdo;

	$query = $pdo->query('SELECT * FROM `role`');

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function getPosts(){
	global $pdo;

	$query = $pdo->query('SELECT * FROM `posts`');

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function updatePost($data){
	global $pdo;

	$query = $pdo->prepare('UPDATE `posts` SET `title` = :title, `content` = :content WHERE `id` = :id');
	$query->execute(['title' => $data['title'], 'content' => $data['content'], 'id' => $data['post_id']]);
}

function deletePost($post_id){
	global $pdo;

	$query = $pdo->prepare('DELETE FROM `users_posts` WHERE `post_id` = :post_id');
	$query->execute(['post_id' => $post_id]);

	$query = $pdo->prepare('DELETE FROM `posts` WHERE `id` = :post_id');
	$query->execute(['post_id' => $post_id]);
}

function getPostByID(int $id){
	global $pdo;

	$query = $pdo->prepare('SELECT * FROM `posts` WHERE `id` = :id');
	$query->execute(['id' => $id]);

	return $query->fetch(\PDO::FETCH_ASSOC);
}

function getCategoryByPostID($post_id){
	global $pdo;

	$query = $pdo->prepare('SELECT `category`.`title` FROM `category` INNER JOIN `posts` ON `category`.`id` = `posts`.`category_id` WHERE `posts`.`id` = :id');
  	$query->execute(['id' => $post_id]);
	
	return $query->fetch(\PDO::FETCH_ASSOC);
}

function getCategorys(){
	global $pdo;

	$query = $pdo->query('SELECT * FROM `category`');

	return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function updateCategory($post_id, $category_id){
	global $pdo;

	$query = $pdo->prepare('UPDATE `posts` SET `category_id` = :category_id WHERE `id` = :post_id');
	$query->execute(['post_id' => $post_id, 'category_id' => $category_id]);
}

function addPost($data){
	global $pdo;

	$title = $data['title'];
	$text = $data['text'];
	$category = $data['category_id'];

	$query = $pdo->prepare('INSERT INTO `posts` (`title`, `text`, `category_id`) VALUES (:title, :text, :category_id)');
	$query->execute(['title' => $title, 'text' => $text, 'category_id' => $category]);
	//addCategory($post_Id, $category_Id);

}