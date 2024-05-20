<?php
// model.php

function updateNurseProfilePic($editid, $currentpic, $profilepic, $allowed_extensions, $con) {
    $oldprofilepic = "images" . "/" . $currentpic;
    $extension = substr($profilepic, strlen($profilepic) - 4, strlen($profilepic));

    if (!in_array($extension, $allowed_extensions)) {
        return "Invalid format. Only jpg / jpeg/ png /gif format allowed";
    } else {
        $newprofilepic = md5($profilepic) . time() . $extension;
        move_uploaded_file($_FILES["profilepic"]["tmp_name"], "images/" . $newprofilepic);

        $query = mysqli_query($con, "update tblnurse set ProfilePic='$newprofilepic' where ID='$editid'");
        if ($query) {
            unlink($oldprofilepic);
            return "Profile pic updated successfully";
        } else {
            return "Something went wrong. Please try again.";
        }
    }
}
?>
