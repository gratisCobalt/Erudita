<?php

// LEGAL NOTICE

// This project contains software solution.

// Please check the LICENSE OF THIS PROJECT below, to find the license 
// information for this project. This license is just related to the 
// contained software solution and its source code, as far as the 
// software solution was developed by the copyright holder.
// This license bases on [bsd-3], but some modifications make it 
// different from regular BSD-Licences. 

// Errors, changes and deviations are not impossible!

// The project was developed and tested with the software 
// [Apache 2.4 VS16] in connexion with [php 8.1.3].
// [Apache 2.4 VS16] and [php 8.1.3] will not be delivered/distributed 
// as parts of this project. 
// The project uses elements of [Bootstrap 4.5.3].

// LICENSE OF THIS PROJECT

// This license bases on [bsd-3] with fundamental modifications:

// Copyright 2023 Kevin Tamme, IU University of Applied Sciences, 
// Nordring 53, 63517 Rodenbach, Germany

// Copyright 2023 Dominik Hein, IU University of Applied Sciences, 
// Am Bobenhäuserweg 9, 63773 Goldbach, Germany

// Copyright 2023 Rares-Constantin Velnic, IU University of Applied Sciences, 
// Am Melonenberg 6, 65187 Wiesbaden, Germany

// The use of this project is only allowed in the context of 
// the lecture to facilitate the understanding of programming 
// techniques. Redistribution and use in source or binary forms, with 
// or without modification, are not allowed. 

// DISCLAIMER [bsd-3]: 
//  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 
//  "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT 
//  LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS 
//  FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE 
//  COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
//  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
//  BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; 
//  LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER 
//  CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT 
//  LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN 
//  ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
//  POSSIBILITY OF SUCH DAMAGE.

// REFERENCES

// [bsd-3] Open Source Initiative (n. Y.): "The 3-Clause BSD License". 
//    URL: https://opensource.org/licenses/BSD-3-Clause, 
//    accessed 2023-FEB-07.
// [Apache 2.4 VS16] Apache Lounge powered by Apache (2021): 
//    "Apache 2.4 VS16 Windows Binaries and Modules". Version 2.4.52 Win64. 
//    Online available at URL: https://www.apachelounge.com/download/, 
//    accessed 2023-FEB-07. 
//    [License-URL: https://www.apachelounge.com/contact.html].
// [php 8.1.3] The PHP Group (2022): "PHP: Hypertext Preprocessor". 
//    Version 8.1.3. Online available at 
//    URL: https://windows.php.net/download/, accessed 2023-FEB-07. 
//    [License: PHP License v3.01, 
//    License-URL: https://www.php.net/license/3_01.txt].
// [Bootstrap 4.5.3] Mark Otto / Jacob Thornton / XhmikosR / GeoSot / 
//    Rohit Sharma / alpadev / Gael Poupard / Patrick H. Lauke /
//    Martijn Cuppend / Johann-S / Gleb Mazovetskiy (2022): "Bootstrap".
//    Version 4.5.3. Bootstrap is released under the MIT license 
//    and is copyright 2022 Twitter. Online available at
//    URL: https://getbootstrap.com/, accessed 2023-FEB-07.
//    [Bootstrap v4.5.3 (https://getbootstrap.com/), 
//    Copyright 2011-2023 The Bootstrap Authors, 
//    Copyright 2011-2023 Twitter, Inc., 
//    Licensed under MIT 
//    (https://github.com/twbs/bootstrap/blob/main/LICENSE)].

// BOOTSTRAP 4.5.3 LICENSE

// Copyright (c) 2011-2023 The Bootstrap Authors

// Permission is hereby granted, free of charge, to any person obtaining a copy
// of this software and associated documentation files (the "Software"), to deal
// in the Software without restriction, including without limitation the rights
// to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
// copies of the Software, and to permit persons to whom the Software is
// furnished to do so, subject to the following conditions:

// The above copyright notice and this permission notice shall be included in
// all copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
// FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
// AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
// LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
// OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
// THE SOFTWARE.

require_once('./components/navbar.php');


$isEditMode = isset($_GET['id']) ? true : false;
$keyword = $isEditMode ? 'Edit' : 'Create';

if ($isEditMode) {
    if (!$articleFunctions->isValidArticleId($_GET['id'])) {
        // header('Location: index.php');
  echo "<script>window.location.href='index.php'</script>";
    }
}

if (!isset($_SESSION['user'])) {
    // <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    echo '<div class="alert alert-warning" role="alert">You must be <a href="login.php">logged in</a> to ' . strtolower($keyword) . ' an article.</div>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contains_image = false;
    $article_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : throw new Exception('Invalid article ID');

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $cover_image_url = $_FILES['cover_image_url'];
    $author_id = $user['id'];
    $category_id = $_POST['category_id'];

    try {
        // Validate input
        if (empty($title) || empty($content) || empty($author_id) || empty($category_id)) {
            throw new Exception("All fields are required.");
        }

        // Check if cover image is valid
        if (!empty($cover_image_url['tmp_name']) && (!is_uploaded_file($cover_image_url['tmp_name']) || !exif_imagetype($cover_image_url['tmp_name']))) {
            throw new Exception("Invalid cover image.");
        }

        // Check if author ID is valid
        if (!$userFunctions->isValidAuthorId($author_id)) {
            throw new Exception("Invalid author ID.");
        }

        // Check if category ID is valid
        if (!$categoryFunctions->isValidCategoryId($category_id)) {
            throw new Exception("Invalid category ID.");
        }


        if (!empty($cover_image_url['name'])) {
            // Move cover image to uploads folder and rename it
            $cover_image_name = "./uploads/article-" . uniqid() . '.' . pathinfo($cover_image_url['name'], PATHINFO_EXTENSION);
            move_uploaded_file($cover_image_url['tmp_name'], $cover_image_name);
            $contains_image = true;
        }

        if (!empty($article_id)) {
            if ($contains_image) {
                $articleFunctions->updateArticle($article_id, $title, $content, $cover_image_name, $author_id, $category_id);
            } else {
                $articleFunctions->updateArticleWithoutImage($article_id, $title, $content, $author_id, $category_id);
            }

            echo "<script>window.location.href='article_post.php?id=" . $article_id . "'</script>";
            // header('Location: article_post.php?id=' . $article_id);
            exit;
        } else {
            // Create article
            $article_id = $articleFunctions->createArticle($title, $content, $cover_image_name, $author_id, $category_id);

            echo "<script>window.location.href='article_post.php?id=" . $article_id . "'</script>";
            // header('Location: article_post.php?id=' . $article_id);
            exit;
        }
    } catch (Exception $e) {
        // <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    }

} else {
    if ($isEditMode) {
        $article = $articleFunctions->getArticle(intval($_GET['id']));
        $cover_image_url = $article['cover_image_url'];
        $title = $article['title'];
        $content = $article['content'];
        $category_id = $article['category_id'];
    } else {
        $title = '';
        $content = '';
        $category_id = '';
    }
}

$categories = $categoryFunctions->getCategories();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $keyword ?> Article - Erudita
    </title>
</head>

<body>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="container">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <section class="py-5 text-center container">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="row">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-6 col-md-8 mx-auto">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <h1 class="fw-light">
                        <?php echo $keyword ?> your article
                    </h1>
                </div>
            </div>
        </section>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <form method="post" action="edit.php" class="container" enctype="multipart/form-data">
            <?php if (isset($cover_image_url) && $isEditMode) { ?>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-12 text-center">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <img id="cover-image" src="<?php echo $cover_image_url; ?>" alt="Cover image"
                        class="mb-3 border border-warning rounded p-1 col-md-4">
                </div>
            <?php } ?>

            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="form-group">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <label for="cover_image_url">Cover image</label>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <input type="file" name="cover_image_url" id="cover_image_url" accept="image/*" class="form-control"
                    <?php echo !$isEditMode ? 'required' : null ?>>
            </div>

            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="form-group">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <label for="title">Title</label>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <input type="text" name="title" id="title" value="<?php echo $title; ?>" required class="form-control">
            </div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="form-group">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <label for="content">Content</label>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <textarea name="content" id="content" required class="form-control"><?php echo $content; ?></textarea>
            </div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="form-group">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <label for="category_id">Category</label>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <select name="category_id" id="category_id" required class="form-control">
                    <?php
                    foreach ($categories as $category) {
                        echo '<option value="' . $category['id'] . '" ' . ($category['id'] === $category_id ? 'selected' : '') . '>' . $category['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="form-group">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <input class="form-control" type="hidden" name="post_id"
                    value='<?php echo $isEditMode ? $_GET['id'] : null ?>'>
            </div>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <button type="submit" class="btn btn-warning btn-sm" <?php if (!isset($_SESSION['user'])): ?>disabled<?php
            endif; ?>>
                <?php echo $isEditMode ? 'Update' : 'Create' ?>
            </button>
            <?php
            if ($isEditMode) {
                if (isset($user['role'])) {
                    if (strcmp($user['role'], 'admin') == 0) {
                        // <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                        echo '<a href="index.php"><button type="button" class="btn btn-danger btn-sm"
                        onclick="' . $articleFunctions->deleteArticle($_GET['id']) . '">Delete article</button></a>';
                    }
                }
            }
            ?>
        </form>
    </div>
    </div>

    <script>
        // Get the input field for the cover image
        var coverImageInput = document.getElementById("cover_image_url");
        // Add an event listener for when the file is selected
        coverImageInput.addEventListener("change", function () {
            // Get the selected file
            var file = coverImageInput.files[0];
            // Get the image element to update
            var coverImage = document.getElementById("cover-image");
            // Create a new URL object for the selected file
            var url = URL.createObjectURL(file);
            // Update the image source to the new URL
            coverImage.src = url;
        });
    </script>

    <?php require_once('./components/footer.php'); ?>
</body>

</html>