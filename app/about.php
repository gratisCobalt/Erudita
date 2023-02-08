<?php

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
    <div class="container">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="./assets/v2_round.png" alt="" width="72" height="57">
            <h1 class="display-5 fw-bold"><span class="text-warning">Erudita</span></h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4"><span class="text-warning">Erudita</span> is our examination project. Users should
                    be able
                    to open any wiki pages and add information and pictures to them. The software should contribute to a
                    better
                    exchange of information within the intranet.
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="https://github.com/EruditaWiki" target="_blank"><button type="button"
                            class="btn btn-outline-warning btn-lg px-4">GitHub Repository</button></a>
                </div>
            </div>
        </div>

        <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 shadow">
        <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4">Who are we?</h1>
            <p class="lead">We are a group of students from the IU International University of Applied Science.
            </p>
            <h2 class="display-4">Our team members:</h2>
            <div class="row">
                <div class="col-lg-3">
                    <img src="./assets/member1.png" class="img-fluid rounded-circle mx-auto d-block" alt="member1">
                    <p class="text-center mt-2">Kevin Tamme</p>
                </div>
                <div class="col-lg-3">
                    <img src="./assets/member2.png" class="img-fluid rounded-circle mx-auto d-block" alt="member2">
                    <p class="text-center mt-2">Rares Velnic</p>
                </div>
                <div class="col-lg-3">
                    <img src="./assets/member3.png" class="img-fluid rounded-circle mx-auto d-block" alt="member3">
                    <p class="text-center mt-2">Dominik Hein</p>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="container my-5">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 shadow">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <h1 class="display-4 fw-bold lh-1">IU International University of Applied Science</h1>
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
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                        <a href="https://iu.de/" target="_blank"><button type="button"
                                class="btn btn-outline-dark btn-lg px-4">Visit</button></a>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow">
                    <img class="rounded-lg-3" src="./assets/iulogo.jpg" alt="" width="350">
                </div>
            </div>
        </div>
    </div>
    <?php require_once('./components/footer.php'); ?>
</body>

</html>
