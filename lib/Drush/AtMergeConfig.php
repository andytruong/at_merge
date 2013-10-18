<?php
namespace Drupal\at_merge\Drush;

class AtMergeConfig {
  /**
   * Path to make file.
   * @var string
   */
  public $make_file;

  /**
   * Name of new module
   * @var string
   */
  public $new_module_name;
  
  /**
   * Connection string to the temp database. Should be SQLite.
   * @var string
   */
  public $tmp_db_connect;
}
