<!-- //getData.php
<?php
include 'config.php';
$row = $_POST['row'];
$rowperpage = 5;
$query = 'SELECT * FROM posts limit ' . $row . ',' . $rowperpage;
$result = mysqli_query($con, $query);
$html = '';
while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    $shortcontent = substr($content, 0, 160) . "...";
    $link = $row['link'];

    $html .= '<div id="post_' . $id . '" class="post">';
    $html .= '<h1>' . $title . '</h1>';
    $html .= '<p>' . $shortcontent . '</p>';
    $html .= '<a href="' . $link . '" class="more" target="_blank">More</a>';
    $html .= '</div>';
}
echo $html;
?> -->
<?php
$id = $_GET['catid'];
$sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ORDER BY `threads`.`timestamp` DESC";
$res = mysqli_query($con, $sql);
$noRes = true;
while ($row = mysqli_fetch_assoc($res)) {
    $noRes = false;
    $id = $row['thread_id'];
    $catname = $row['thread_title'];
    $desc = $row['thread_desc'];
    $user_id = $row['thread_user_id'];
    $time = $row['timestamp'];
    $sql_user = "SELECT user_email FROM `user_details` WHERE sno='$user_id'";
    $res2 = mysqli_query($con, $sql_user);
    $fetch = mysqli_fetch_assoc($res2);

    echo ' <div class="media my-3 d-flex category-card post" id="post_">
<img class="mr-3 rounded-circle" src="img/slider2.jpg" style="width:100px; height:100px;" alt="Generic placeholder image">
<div class="mx-3">
<h5 class="mt-0"><a href="thread.php?threadid=' . $id . '&user_id=' . $user_id . '" class="text-decoration-none">' . $catname . '</a></h5> <div class="pst_by">Posted by: <span><b>' . $fetch['user_email'] . '</b></span></div> @ <b><span style="color:black; font-size:12px; margin:auto;">' . substr($time, 0, 16) . '</span></b>

<p>' . $desc . '</p>
</div>
</div>';
}
if ($noRes) {

    echo '<div class="jumbotron jumbotron-fluid p-4 mb-4 mt-4 bg-info-subtle rounded-3 container">
<div class="container">
  <h1 class="display-4">No question has been added</h1>
  <p class="lead" style="margin:.75rem auto; color:purple; text-shadow:0 0 12px purple;">Be the Fisrt to start this journey</p>
</div>
</div>';
}
?>