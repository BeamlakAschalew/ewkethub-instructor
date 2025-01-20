<?php

$sectionSlug = $_GET['section-slug'];
$courseSlug = $_GET['course-slug'];

view("section/index.view.php", ['sectionSlug' => $sectionSlug, 'courseSlug' => $courseSlug]);
