<?php
namespace Drupal\at_merge\Drush;

/**
 * Class to controll the process steps.
 *
 * 1. Create tmp sqlite database, it make coding faster.
 * 2. Parse make file, save projects info to db
 * 3. Download the modules, apply patches, save to tmp directory
 * 4. Make new directories/files: 
 *     new_module/
 *     new_module/modules/
 *     new_module.info
 *     new_module.module
 *     new_module.make << Copy the make file here
 *  5. Copy modules to new_module/modules/
 *  6. Move new_module/modules/xxx/sub_module* to new_module/modules/
 *  7. Rename new_module/modules/*.{info|module} to *.{info|module}~
 *  8. Generate the new_module.info
 *      a. files[]
 *      b. dependencies[]
 *      c. modules[]
 *      d. features[]
 *  9. Generate new_module.module
 *      a. Resolve require_once, include_once in old modules
 *      b. Merge hook implementations
 *  10. Generate new_module.install
 *  11. …
 *  xx. Delete sqlite db
 */
class AtMerge {
  /**
   * Path to make file.
   * @var string
   */
  private $make_file;

  /**
   * Name of new module
   * @var string
   */
  private $new_module_name;

  /**
   * Flag to know which step the process is running.
   * @var string
   */
  private $current_step;

  /**
   * Create DB
   */
  public function createDB() {}

  /**
   * Remove DB
   */
  public function removeDB() {}

  /**
   * Parse make file, save project info to DB
   */
  public function parseMakeFile() {}

  /**
   * Generate the basic structure for new module
   */
  public function generateNewModuleStructure() {
  }

  /**
   * Generate code base, apply patches, move modules to new_module/modules
   * Move new_module/modules/xxx/sub_module* to new_module/modules/
   * Rename new_module/modules/*.{info|module} to *.{info|module}~
   */
  public function makeModules() {}

  /**
   * Generate new_module.info
   */
  public function generateNewModuleInfoFile() {
  }

  /**
   * Generate new_module.module
   */
  public function generateNewModuleFile() {
  }

  /**
   * Generate new_module.module
   */
  public function generateNewModuleInstallFile() {
  }
}
