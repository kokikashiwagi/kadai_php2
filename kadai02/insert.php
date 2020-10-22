<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$name = $_POST['name'];
$cname = $_POST['cname'];
$star = $_POST['star'];
$comment = $_POST['comment'];
// $naiyou = $_POST['naiyou'];

//2. DB接続します
try {
  //ID MAMP ='root'
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai1;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id,name,country,star,comment,indate)VALUES(NULL,:name,:cname,:star,:comment,sysdate())");
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(id,name,cname,star,comment,indate)VALUES(NULL,:name,:cname,star,:comment,sysdate())");
//セキュリティー上、２回に分けて書く
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cname', $cname, PDO::PARAM_STR);  
$stmt->bindValue(':star', $star, PDO::PARAM_STR);  
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  
// $stmt->bindValue(':email', $email , PDO::PARAM_STR); 
// $stmt->bindValue(':text', $naiyou, PDO::PARAM_STR); 
$status = $stmt->execute();//実行した結果が記入される

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  // 成功したらページを飛ばしている
  header('Location: index.php');
  //５．index.phpへリダイレクト


}
?>
