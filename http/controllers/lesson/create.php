<?php

$sectionSlug = $_GET['section-slug'];
$courseSlug = $_GET['course-slug'];

view('lesson/create/index.view.php', ['sectionSlug' => $sectionSlug, 'courseSlug' => $courseSlug]);
