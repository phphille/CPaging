# CPaging
A class for implementing paging

## About

A very light and simple class that implement paging with mySql.

    PHP 5 >= 5.3.0

## Introduction

First instantiate a paging object like $paginering = new \phpe\paginering\CPaginering(); 
Count ever item in your SQL table eg, "SELECT * FROM VFullViewMovies". 
Then wirte your SQL query, eg "SELECT * FROM VFullViewMovies WHERE genre = action LIMIT ".$_GET['hits']." OFFSET ".(($_GET['page'] - 1) * $_GET['hits'])."

Then set $paginering->setTotalRows($_GET['hits'], $_GET['page'], count($AllTableItems));

You will then get the html code with:
$paginering->GetPageNav();
$paginering->GetNbrOfHitsPerPage();

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/phphille/CPaging/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phphille/CPaging/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/phphille/CPaging/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/phphille/CPaging/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/phphille/CPaging/badges/build.png?b=master)](https://scrutinizer-ci.com/g/phphille/CPaging/build-status/master)
