<?php
namespace Kepler;

use \Phalcon\Translate\Exception as Exception;
use \Phalcon\Translate\Adapter as Adapter;
use \Phalcon\Translate\AdapterInterface as AdapterInterface;

class ExternalTextsTranslateAdapter extends Adapter implements \ArrayAccess
{
    private $region;

    /**
     * Adapter constructor
     */
    public function __construct(array $options) {
        parent::__construct($options);

        if (!isset($options["file"])) {
            throw new Exception("File missing from options");
        }

        $this->_load($options["file"]);
    }

    /**
     * Parse external_texts.txt and load into shared memory
     */
    private function _load($file) {
        $this->region = basename($file, ".txt");

        if (apcu_exists("external_texts_" . $this->region . "_loaded")) {
            return;
        }

        $handle = fopen($file, "r");

        if (!$handle) {
            throw new Exception(sprintf("Couldn't open file %s", $key));
        }

        // 2048 has been chosen for max compatibility
        // Execute `wc -L external_texts.txt` to get an more optimized value
        // We store it in APCu to only consume 500KB for all workers, instead of per worker
        while (($buffer = fgets($handle, 2048)) !== false) {
            $line = $buffer; // TODO: $this->_filter_vulnerable_characters($buffer, true);

            $found = mb_strpos($line, "=");

            if ($found) {
                list($key, $value) = explode("=", $line);

                if (!apcu_store("external_texts_" . $this->region . "_" . $key, $value)) {
                    throw new Exception(sprintf("Could not store key %s in APCu cache", $key));
                }
            }
        }

        apcu_add("external_texts_" . $this->region . "_loaded", true);
    }

    /*
     * Fetch key from shared memory
     */
    private function _lookup($index) {
        $val = apcu_fetch("external_texts_" . $this->region . "_" . $index);
        return ($val == null ? $index : $val);
    }

    /**
     * Returns the translation related to the given key
     * If no matches, then it returns the key
     */
    public function query($index, $placeholders = null) {
        return $this->_lookup($index);
    }

    /**
     * Check whether is defined a translation key in the internal array
     */
    public function exists($index) {
        return !strcmp($this->_lookup($index), $index);
    }
}