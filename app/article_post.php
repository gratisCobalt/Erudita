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


#
#
# Parsedown
# http://parsedown.org
#
# (c) Emanuil Rusev
# http://erusev.com
#
# For the full license information, view the LICENSE file that was distributed
# with this source code.
#
#
// The MIT License (MIT)

// Copyright (c) 2013-2018 Emanuil Rusev, erusev.com

// Permission is hereby granted, free of charge, to any person obtaining a copy of
// this software and associated documentation files (the "Software"), to deal in
// the Software without restriction, including without limitation the rights to
// use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
// the Software, and to permit persons to whom the Software is furnished to do so,
// subject to the following conditions:

// The above copyright notice and this permission notice shall be included in all
// copies or substantial portions of the Software.

// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
// IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
// FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
// COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
// IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
// CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


require_once('./components/navbar.php');
require_once('../vendor/erusev/parsedown/Parsedown.php'); // parsedown importieren

if (!$articleFunctions->isValidArticleId($_GET['id'])) {
  header('Location: index.php');
}


$id = intval($_GET['id']);
$article = $articleFunctions->getArticle($id);
$articleFunctions->incrementViews($id);

// The article data is valid, so we can access its elements
$title = htmlspecialchars($article['title']);
$content = htmlspecialchars($article['content']); // Markdown-Text speichern, ohne HTML-Entities zu escapen
$author_id = intval($article['author_id']);
$category_id = intval($article['category_id']);
$cover_image_url = ($article['cover_image_url']);
$views = intval($article['views']);
$created_at = $article['created_at'];
$updated_at = $article['updated_at'];

$author = $userFunctions->getUserByID($author_id);
$category = $categoryFunctions->getCategoryByID($category_id);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>
    <?php echo $title; ?> - Erudita
  </title>
</head>

<body>
  <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
  <div class="container mt-3">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="row">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-12 text-center">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <img src="<?php echo $cover_image_url; ?>" alt="Cover image" 
        class="mb-3 border border-warning rounded p-1 col-md-4">
      </div>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-12 mt-3">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <h1 class="display-4 mb-3 text-center">
          <?php echo $title; ?>
          <a class="link-warning" href="edit.php?id=<?php echo $id; ?>">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-pencil" viewBox="0 0 16 16">
              <path
                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
          </a>
        </h1>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <p class="lead mb-3 text-center">
          Author: <span class="text-warning">
            <?php echo $author['username']; ?>
          </span>
        </p>

        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <hr class="my-4">

        <div>
          <?php
          #
          #
          # Parsedown
          # http://parsedown.org
          #
          # (c) Emanuil Rusev
          # http://erusev.com
          #
          # For the full license information, view the LICENSE file that was distributed
          # with this source code.
          #
          #
          // Zugriff auf Elemente der Library [ParseDown 1.7.4].
          echo Parsedown::instance()
            ->setSafeMode(true)
            ->text($content);
          ?>
        </div>
      </div>
    </div>

    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <hr class="my-4">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="row mt-3">
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-12 col-md-8">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <span class="badge badge-secondary mr-1">
          <?php echo $category['name']; ?>
        </span>
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <span class="badge badge-secondary mr-1">
          <?php echo $views; ?> views
        </span>
      </div>
      <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
      <div class="col-12 col-md-4 text-right">
        <small>Created at:
          <?php echo date('M j, Y', strtotime($created_at)); ?>
        </small><br>
        <small>Updated at:
          <?php echo date('M j, Y', strtotime($updated_at)); ?>
        </small>
      </div>
    </div>
  </div>
</body>

<?php require_once('./components/footer.php'); ?>

</html>