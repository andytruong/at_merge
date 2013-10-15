<?php
namespace Drupal\at_merge\Module;

interface ParserInterface {
    /**
     * Info defined in %module.info file and related one!
     * 
     * @return Info
     */
    public function getModuleInfo();

    /**
     * Get details of specific function.
     */
    public function getFunctionDetails();

    /**
     * Validate info of a module.
     * 
     * - Source code is accessible
     * - Match Drupal core
     * - …
     */
    public function validate(Info $module_info);

    /**
     * Get files of module.
     * 
     * @param string (all|assets|source)
     */
    public function getModuleFiles(string $type);
}
