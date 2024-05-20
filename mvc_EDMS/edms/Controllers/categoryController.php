<?php
include_once(__DIR__ . '/../Models/categoryModel.php');

class CategoryController {
    private $categoryModel;
    
    function __construct(){
        $this->categoryModel = new CategoryModel(); 
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
        $query = "INSERT INTO tblcategory (categoryName, createdBy) VALUES (?, ?)";
        $stmt = $this->categoryModel->execute($query, [$categoryName, $createdBy], "ss");
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Category added successfully');</script>"; 
            echo "<script>window.location.href='manage-categories.php'</script>";
        } else {
            echo "<script>alert('Failed to add category');</script>"; 
        }
    }
    
    

    function updateCategory($categoryId, $categoryName, $userId) {
        $update = $this->categoryModel->updateCategory($categoryId, $categoryName, $userId);
        if ($update) {
            echo "<script>alert('Category updated successfully');</script>"; 
            echo "<script>window.location.href='manage-categories.php'</script>";
        } else {
            echo "<script>alert('Failed to update category');</script>"; 
        }
    }

    function deleteCategory($categoryId, $userId) {
        $delete = $this->categoryModel->deleteCategory($categoryId, $userId);
        if ($delete) {
            echo "<script>alert('Category deleted successfully');</script>"; 
            echo "<script>window.location.href='manage-categories.php'</script>";
        } else {
            echo "<script>alert('Failed to delete category');</script>"; 
        }
    }
    

    function getAllCategories($userId){
        return $this->categoryModel->getAllCategories($userId);
    }

    function __destruct(){
    }
}
?>
