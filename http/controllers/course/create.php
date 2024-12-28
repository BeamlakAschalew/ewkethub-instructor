<?php

error_log("Starting create.php");

try {
    view("course/create/index.view.php", []);
} catch (Throwable $e) {
    error_log("Caught exception: " . $e->getMessage());
    abort(['error' => $e->getMessage()], 500);
}
