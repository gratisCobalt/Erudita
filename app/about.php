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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        About us - Erudita
    </title>
</head>

<body>
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="container">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <div class="px-4 py-5 my-5 text-center">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <img class="d-block mx-auto mb-4" src="./assets/v2_round.png" alt="" width="72" height="57">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <h1 class="display-5 fw-bold"><span class="text-warning">Erudita</span></h1>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="col-lg-6 mx-auto">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <p class="lead mb-4"><span class="text-warning">Erudita</span> is our examination project. Users should
                    be able
                    to open any wiki pages and add information and pictures to them. The software should contribute to a
                    better
                    exchange of information within the intranet.
                </p>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <a href="https://github.com/EruditaWiki" target="_blank"><button type="button"
                            class="btn btn-outline-warning btn-lg px-4">GitHub Repository</button></a>
                </div>
            </div>
        </div>

        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <div class="container my-5">
    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 shadow">
        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <h1 class="display-4">Who are we?</h1>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <p class="lead">We are a group of students from the IU International University of Applied Science.
            </p>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <h2 class="display-4">Our team members:</h2>
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="row">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-3">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <img src="./assets/member1.png" class="img-fluid rounded-circle mx-auto d-block" alt="member1">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <p class="text-center mt-2">Kevin Tamme</p>
                </div>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-3">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <img src="./assets/member2.png" class="img-fluid rounded-circle mx-auto d-block" alt="member2">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <p class="text-center mt-2">Rares Velnic</p>
                </div>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-3">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <img src="./assets/member3.png" class="img-fluid rounded-circle mx-auto d-block" alt="member3">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <p class="text-center mt-2">Dominik Hein</p>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
        <div class="container my-5">
            <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 shadow">
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <h1 class="display-4 fw-bold lh-1">IU International University of Applied Science</h1>
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <p class="lead">The IU International University (formerly IUBH International University, until 2017
                        International University of Applied Sciences Bad Honnef / Bonn) is a state-recognized private
                        technical
                        university with headquarters in Erfurt and 28 locations in Germany. It offers English-language
                        on-campus
                        programs, German-language dual study programs, and distance learning and combination models in
                        German and
                        English. With over 100,000 students, the IU International University has been the largest
                        university in
                        Germany since 2021.</p>
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                        <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                        <a href="https://iu.de/" target="_blank"><button type="button"
                                class="btn btn-outline-dark btn-lg px-4">Visit</button></a>
                    </div>
                </div>
                <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow">
                    <!-- Bezugnahme auf Design-Elemente von [Bootstrap 4.5.3]. -->
                    <img class="rounded-lg-3" src="./assets/iulogo.jpg" alt="" width="350">
                </div>
            </div>
        </div>
    </div>
    <?php require_once('./components/footer.php'); ?>
</body>

</html>
