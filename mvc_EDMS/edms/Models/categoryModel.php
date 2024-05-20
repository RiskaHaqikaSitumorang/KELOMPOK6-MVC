<?php
class CategoryModel {
    private $conn;
    
    function __construct(){
        // Create connection
        $this->conn = new mysqli("localhost", "root", "", "edmsdb");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: ". $this->conn->connect_error);
        }
    }

    function execute($query, $params = [], $types = "") {
        $stmt = $this->conn->prepare($query);
        if ($params && $types) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        return $stmt;
    }

    function addCategory($categoryName, $createdBy) {
        // Validasi data
        if (empty($categoryName)) {
            echo "<script>alert('Category name is required');</script>";
            return;
        }
    
        // Bersihkan data input
        $categoryName = htmlspecialchars($categoryName);
    
        // Tambahkan kategori
        $add = $this->conn->addCategory($categoryName, $createdBy);
        if ($add) {
            echo "<script>alert('Category added successfully');</script>"; 
            echo "<script>window.location.href='manage-categories.php'</script>";
        } else {
            echo "<script>alert('Failed to add category');</script>"; 
        }
    }
    

    function updateCategory($categoryId, $categoryName, $userId) {
        $query = "UPDATE tblcategory SET categoryName=? WHERE id=? AND createdBy=?";
        $stmt = $this->execute($query, [$categoryName, $categoryId, $userId], "sii");
        return $stmt->affected_rows > 0;
    }

    function deleteCategory($categoryId, $userId){
        $query = "DELETE FROM tblcategory WHERE id=? AND createdBy=?";
        $stmt = $this->execute($query, [$categoryId, $userId], "ii");
        return $stmt->affected_rows > 0;
    }

    function getAllCategories($userId){
        $query = "SELECT id, categoryName, creationDate FROM tblcategory WHERE createdBy=?";
        $stmt = $this->execute($query, [$userId], "i");
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    function __destruct(){
        $this->conn->close();
    }
}
?>
