<?php
class GameConfiguration {
    public static function getInteger($key) : int {
        return intval(self::getString($key));
    }

    public static function getBoolean($key) : boolean {
        return self::getString($key) == "true";
    }

    public static function getString($key) : string {
        // TODO: use model cache
        $setting = Settings::findFirstBySetting($key);

        if (!$setting) {
            throw new Exception('GameConfiguration key ' . $key . ' does not exist in database');
        }

        return $setting->value;
    }
}