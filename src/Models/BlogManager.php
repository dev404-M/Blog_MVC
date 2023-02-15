<?php
namespace Blog\Models;

use Blog\Models\Blog;
/** Class UserManager **/
class BlogManager {
    private $bdd;
    
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($title)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM blog WHERE title = ? AND authorid = ?");
        $stmt->execute(array(
            $title,
            $_SESSION['user']['id']
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Blog\Models\Blog");

        return $stmt->fetch();
    }

    public function store() {
        $stmt = $this->bdd->prepare("INSERT INTO blog (id, title, content, date, authorid) VALUES (:id, :title, :content, :date, :authorid)");
        $stmt->execute(array(
            'id' => uniqid(),
            'title' => htmlentities($_POST["title"]),
            'content' => htmlentities($_POST['content']),
            'date' => date('Y-m-d H:i:s'),
            'authorid' => $_SESSION['user']['id']
        ));
    }

    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM blog');
        $stmt->execute(array(
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Blog\Models\Blog");
    }
}