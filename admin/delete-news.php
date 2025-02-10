<?php
include('../includes/dbconfig.php');

if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];

    // Fetch news details
    $sql = "SELECT main_image_url, gallery_images FROM news WHERE news_id = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Error preparing query: " . $mysqli->error);
    }
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $news = $result->fetch_assoc();

    if (!$news) {
        echo "<script>alert('News not found!'); window.location.href='news-list.php';</script>";
        exit();
    }

    // Delete main image if exists
    if (!empty($news['main_image_url']) && file_exists("../images/news/" . $news['main_image_url'])) {
        unlink("../images/news/" . $news['main_image_url']);
    }

    // Delete gallery images if exist
    if (!empty($news['gallery_images'])) {
        $gallery_images = explode(',', $news['gallery_images']);
        foreach ($gallery_images as $image) {
            if (!empty($image) && file_exists("../images/news/n_gallery/" . $image)) {
                unlink("../images/news/n_gallery/" . $image);
            }
        }
    }

    // Delete news from the database
    $query = "DELETE FROM news WHERE news_id = ?";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
        die("Error preparing delete query: " . $mysqli->error);
    }
    $stmt->bind_param("i", $news_id);

    if ($stmt->execute()) {
        echo "<script>alert('News deleted successfully!'); window.location.href='news-list.php';</script>";
    } else {
        echo "<script>alert('Failed to delete news!');</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='news-list.php';</script>";
}
?>
