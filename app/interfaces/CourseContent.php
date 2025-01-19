<?php

interface CourseContent {

    public function save();
    public function getType();
    public function getContent();
    
}

class VideoContent implements CourseContent {
    private $videoUrl;
    
    public function __construct($videoUrl) {
        $this->videoUrl = $videoUrl;
    }
    
    public function save() {
        
        return [
            'type' => 'video',
            'url' => $this->videoUrl
        ];
    }
    
    public function getType(){
        return 'video';
    }
    
    public function getContent() {
        return $this->videoUrl;
    }
}

class DocumentContent implements CourseContent {

    private $text;
    
    public function __construct($text) {
        $this->text = $text;
    }
    
    public function save() {
     
        return [
            'type' => 'document',
            'text' => $this->text
        ];
    }
    
    public function getType() {
        return 'document';
    }
    
    public function getContent() {
        return $this->text;
    }
}
