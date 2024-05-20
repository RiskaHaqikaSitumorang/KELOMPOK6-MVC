<?php
include_once(__DIR__ . '/../Models/notesModel.php');

class NotesController {
    private $model;

    function __construct() {
        $this->model = new NotesModel();
    }

    function addNote() {
        if (isset($_POST['submit'])) {
            $category = $_POST['category'];
            $title = $_POST['notetitle'];
            $description = $_POST['notediscription'];
            $createdBy = $_SESSION['edmsid'];

            if ($this->model->addNote($category, $title, $description, $createdBy)) {
                echo "<script>alert('Note Added successfully');</script>";
                echo "<script>window.location.href='manage-notes.php'</script>";
            } else {
                echo "<script>alert('Failed to add note');</script>";
            }
        }
    }

    function deleteNote() {
        if (isset($_GET['del'])) {
            $noteId = $_GET['id'];
            $userId = $_SESSION['edmsid'];

            if ($this->model->deleteNoteById($noteId, $userId)) {
                echo "<script>alert('Note Deleted');</script>";
                echo "<script>window.location.href='manage-notes.php'</script>";
            } else {
                echo "<script>alert('Failed to delete note');</script>";
            }
        }
    }

    function searchNotes() {
        if (isset($_POST['searchdata'])) {
            $userId = $_SESSION['edmsid'];
            $searchData = $_POST['searchdata'];
            return $this->model->searchNotes($userId, $searchData);
        }
        return [];
    }

    function getNotes() {
        $userId = $_SESSION['edmsid'];
        return $this->model->getNotesByUserId($userId);
    }

    function getNoteDetails() {
        if (isset($_GET['noteid'])) {
            $noteId = $_GET['noteid'];
            $userId = $_SESSION['edmsid'];
            return $this->model->getNoteById($noteId, $userId);
        }
        return null;
    }

    function getNoteHistory() {
        if (isset($_GET['noteid'])) {
            $noteId = $_GET['noteid'];
            $userId = $_SESSION['edmsid'];
            return $this->model->getNoteHistory($noteId, $userId);
        }
        return [];
    }

    function addNoteHistory() {
        if (isset($_POST['submit'])) {
            $noteId = $_GET['noteid'];
            $userId = $_SESSION['edmsid'];
            $details = $_POST['remark'];

            if ($this->model->addNoteHistory($noteId, $userId, $details)) {
                echo "<script>alert('Note details added');</script>";
                echo "<script>window.location.href='manage-notes.php'</script>";
            } else {
                echo "<script>alert('Failed to add note details');</script>";
            }
        }
    }

    function deleteNoteHistory() {
        if (isset($_GET['del'])) {
            $historyId = $_GET['nhid'];
            $userId = $_SESSION['edmsid'];

            if ($this->model->deleteNoteHistoryById($historyId, $userId)) {
                echo "<script>alert('Note Deleted');</script>";
                echo "<script>window.location.href='view-note.php?noteid={$_GET['noteid']}'</script>";
            } else {
                echo "<script>alert('Failed to delete note history');</script>";
            }
        }
    }
}
?>
