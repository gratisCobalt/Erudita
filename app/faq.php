<?php

require_once('./components/navbar.php');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        FAQ - Erudita
    </title>
</head>

<body>
<div class="container my-5">
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-clock mx-auto mb-4" src="./assets/v2_round.png" alt="" width="96" height="96">
        <h1 class="display-4 text-center mb-5">Frequently Asked Questions</h1>
    <div id="accordion" class="mt-5">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        What is Erudita Wiki?
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                data-parent="#accordion">
                <div class="card-body">
                    Erudita Wiki is our examination project. Users should be able to open any wiki pages and add
                    information and pictures to them. The software should contribute to a better exchange of
                    information within the intranet.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        How can I contribute to the wiki pages?
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    To contribute to the wiki pages, simply click on the page you want to contribute to, and then
                    click on the "Edit" button. You can add information and pictures to the page, and then save
                    your changes.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        How can I create a new wiki page?
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    To create a new wiki page, log in then click on the "Create a Page" button on the homepage.
</body>
