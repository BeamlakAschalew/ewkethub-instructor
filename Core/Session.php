<?php

namespace Core;

class Session {
    public static function start() {
        session_start();
    }

    public static function set($key, $value) {
        $_SESSION['custom_session'][$key] = $value;
    }

    public static function get($key) {
        return $_SESSION['custom_session'][$key];
    }

    public static function unset() {
        unset($_SESSION['custom_session']);
    }
}
