<?php

interface CourseContent {
    public function save();
    public function getType();
    public function getContent();
}

class VideoContent implements CourseContent {
    private $videoUrl;
    private $duration;
    
    public function __construct($videoUrl, $duration) {
        $this->videoUrl = $videoUrl;
        $this->duration = $duration;
    }
    
    public function save() {
        // Logique pour sauvegarder une vidéo
        return [
            'type' => 'video',
            'url' => $this->videoUrl,
            'duration' => $this->duration
        ];
    }
    
    public function getType() {
        return 'video';
    }
    
    public function getContent() {
        return $this->videoUrl;
    }
}

class DocumentContent implements CourseContent {
    private $documentPath;
    private $fileType;
    
    public function __construct($documentPath, $fileType) {
        $this->documentPath = $documentPath;
        $this->fileType = $fileType;
    }
    
    public function save() {
        // Logique pour sauvegarder un document
        return [
            'type' => 'document',
            'path' => $this->documentPath,
            'file_type' => $this->fileType
        ];
    }
    
    public function getType() {
        return 'document';
    }
    
    public function getContent() {
        return $this->documentPath;
    }
}
