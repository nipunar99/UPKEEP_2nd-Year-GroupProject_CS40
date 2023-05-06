<?php

class FileUploader {
    private $fileSizeLimit;
    private $allowedExtensions;
    private $directory;

    public function __construct($directory, $fileExtensions = array('jpg', 'jpeg', 'png', 'gif'), $fileSizeLimit = 2097152) {
        $this->fileSizeLimit = $fileSizeLimit;
        $this->allowedExtensions = $fileExtensions;
        $this->directory = $directory;
    }

    public function uploadFile($file,$fileNameGenerator = null)
    {
//        $file = $_FILES[$this->fileInputName];

        // Check for errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('Error uploading file: ' . $this->uploadErrorMessages[$file['error']]);
        }

        // Check file size
        if ($file['size'] > $this->fileSizeLimit) {
            throw new Exception('File is too large. Maximum size is ' .$this->humanFileSize($this->fileSizeLimit));
        }

        // Check file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($fileExtension), $this->allowedExtensions)) {
            throw new Exception('Invalid file type. Allowed types are: ' . implode(', ', $this->allowedExtensions));
        }

        // Generate file name
        if (!$fileNameGenerator) {
            $fileNameGenerator = function ($fileExtension) {
                return uniqid() . '.' . $fileExtension;
            };
        }
        $fileName = $fileNameGenerator($fileExtension);

        // Move file to upload directory
        $destination = $this->directory . '/' . $fileName;
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new Exception('Error moving file to destination.');
        }

        return $fileName;
    }

    public function deleteFile($fileName) {
        $filePath = $this->directory . '/' . $fileName;
        if (!unlink($filePath)) {
            throw new Exception('Error deleting file.');
        }
    }

    public function filExist($fileName){
        $filePath = $this->directory . '/' . $fileName;
        return file_exists($filePath);
    }

    private function humanFileSize($size) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }
}
