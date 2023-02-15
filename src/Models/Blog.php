<?php
namespace Blog\Models;

class Blog {
    private $id;
    private $title;
    private $content;
    private $date;
    private $authorid;

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDate(){
        return $this->date;
    }

    public function getAuthorid(){
        return $this->authorid;
    }


    public function setId($id){
        $this->id = $id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setAuthorid($authorid){
        $this->authorid = $authorid;
    }
}
?>