<?php
namespace Blog\Controllers;

use Blog\Models\BlogManager;
use Blog\Validator;

class BlogController {
    private $manager;
    private $validator;

    public function __construct(){
        $this->manager = new BlogManager();
        $this->validator = new Validator();
    }
    
    public function index() {
        require VIEWS . 'Blog/homepage.php';
    }

    public function create() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        require VIEWS . 'Blog/create.php';
    }

    public function store() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        /*$this->validator->validate([
            "name"=>["required", "min:2", "alphaNumDash"]
        ]);
        */
        $_SESSION['old'] = $_POST;
        
        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["title"], $_SESSION['user']['id']);
            
            if (empty($res)) {
                $this->manager->store();
                
                header("Location: /dashboard/");
            } else {
                $_SESSION["error"]['title'] = "Le nom de la liste est déjà utilisé !";
                header("Location: /dashboard/nouveau");
            }
        } else {
            header("Location: /dashboard/nouveau");
        }
    }

    public function showAll() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $blog = $this->manager->getAll();

        require VIEWS . 'Blog/index.php';
    }

    public function show($slug) {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        
        $blog = $this->manager->find($slug, $_SESSION["user"]["id"]);
        if (!$blog) {
            header("Location: /error");
        }
        require VIEWS . 'Blog/show.php';
    }
}
?>