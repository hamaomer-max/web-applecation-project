<?php

class Uploed extends db_object
{
    protected static $table_name = "post";

    protected static $columns = array('post_id', 'userid', 'title', 'detail', 'price', 'filename');
    public $post_id;
    public $user_id; // Corrected the variable name to match the column name
    public $title;
    public $detail;
    public $price;
    public $filename; // Corrected the variable name to match the column name
    public $fileTempName;
    public $direction = "../photo";
    public $fileError = array();
    public $array_err = array(
        UPLOAD_ERR_OK => "ئەپلۆدکرا",
        UPLOAD_ERR_INI_SIZE =>   "سایزی گەوورەیە",
        UPLOAD_ERR_FORM_SIZE => "کێشەیەک هەیە",
        UPLOAD_ERR_PARTIAL => "تکایە دووبارەی بکەرەوە",
        UPLOAD_ERR_NO_FILE => "تکایە وێنەیەک هەڵبژێرە",
        UPLOAD_ERR_NO_TMP_DIR => "فایلەکە بوونی نییە",
        UPLOAD_ERR_CANT_WRITE => "فایلەکە ناخووێنرێتەووە",
        UPLOAD_ERR_EXTENSION => "جۆری فایلەکە گونجاوو نییە"
    );

    public function set_image($image)
    {
        $fileAlow = array('png', 'jpg', 'jpeg');
        $fileExt =@ explode('.', $image['name']);
        $fileActualExt = strtolower(end($fileExt));
        global $session;
        if (empty($image) || !$image || !is_array($image) || empty($session->userid) || empty($this->title) || empty($this->detail) || empty($this->price)) {
          return  $this->fileError = $this->array_err[UPLOAD_ERR_NO_TMP_DIR];
        } elseif ($image['error'] != 0) {
          return  $this->fileError = $this->array_err[UPLOAD_ERR_PARTIAL];
        } elseif (!in_array($fileActualExt, $fileAlow)) {
         return   $this->fileError = $this->array_err[UPLOAD_ERR_EXTENSION];
        } else {
            $this->filename = $image['name'];
            $this->fileTempName = $image['tmp_name'];
            return true;
        }
    }

    public function save()
    {
        if ($this->post_id) {
            $this->update();
        } else {
            if (!empty($this->fileError)) {
              return  $this->fileError = $this->array_err[UPLOAD_ERR_FORM_SIZE];
            }
            if (empty($this->filename) || empty($this->fileTempName)) {
              return  $this->fileError = $this->array_err[UPLOAD_ERR_NO_TMP_DIR];
            }
            if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                $sourceFile = $_FILES['file']['tmp_name'];
                $destinationFile = 'D:\xampp\htdocs\OOP php project\includes\photo' . $_FILES['file']['name'];

            if (move_uploaded_file( $sourceFile , $destinationFile)) {
                if ($this->create()) {
                    unset($this->fileTempName);
                    return "بەسەرکەووتوی ئەپڵۆدکرا";
                }
            } else {
                return $this->fileError = $this->array_err[UPLOAD_ERR_PARTIAL];
            }
        }
    }
}
}

$uploed = new Uploed();

?>
