<?php
    $json_url = "https://www.thebrand.ai/i/prompt/seo-strategy?mode=categoryView";
    $json = file_get_contents($json_url);
    $dataArray = json_decode($json, true);

    $htmlOutput = '<div class="category">';
    $htmlOutput .= '<h1>' . $dataArray['category']['name'] . '</h1>';
    $htmlOutput .= '<p>' . $dataArray['category']['description'] . '</p>';

    foreach ($dataArray['posts'] as $post) {
        $postTitle = $post['title'];
        $postKeywords = $post['keywords'];
        $postImage = $post['image_default'];

        $htmlOutput .= '<div class="post">';
        $htmlOutput .= '<h2>' . $postTitle . '</h2>';
        $htmlOutput .= '<p>Keywords: ' . $postKeywords . '</p>';
        
        if (!empty($postImage)) {
            $imageUrl = 'https://www.thebrand.ai/i/uploads/blog/202307/img_64afce13320925-40899747-89813831.jpg' . $postImage;
            $htmlOutput .= '<img src="' . $imageUrl . '" alt="Image">';
        }

        $htmlOutput .= '</div>';
    }

    $htmlOutput .= '</div>';  
?>

<!DOCTYPE html>
<html>
<head>
    <title>JSON Visualization</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .category {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    .category h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .category p {
        margin-bottom: 20px;
    }

    .post {
        margin: 20px 0;
        padding: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
    }

    .post h2 {
        font-size: 18px;
        margin: 0 0 5px;
    }

    .post p {
        margin: 0;
    }

    img {
        max-width: 100%;
        height: auto;
        display: block;
        margin-top: 10px;
    }
</style>

</head>
<body>
    <?php echo $htmlOutput; ?>
</body>
</html>
