<?php
namespace Drupal\at_merge;

use Drupal\at_merge\Module\ParserInterfacer as ModuleParserInterface;
use Drupal\at_merge\Module\Parser as ModuleParser;
use Drupal\at_merge\Module\WriterInterfacer as ModuleWriterInterface;
use Drupal\at_merge\Module\Writer as ModuleWriter;
use Drupal\at_merge\Module\Info as ModuleInfo;

/**
 *
 */
class Merge {
    /**
     * @var ModuleParser
     */
    private $module_paser;

    /**
     * @var ModuleWriter
     */
    private $module_writer;
    
    /**
     * @var array of ModuleInfo
     */
    private $modules = array();
    
    /**
     * @var Controller
     */
    private $controller;

    public function __construc(ModuleParserInterface $module_parser, ModuleWriterInterface $module_writer) {
        $this->module_parser = $module_parser;
        $this->module_writer = $module_writer;
    }
    
    public function getController() {
        if (!$this->controller) {
            $this->controller = new Controller();
        }
        return $this->controller;
    }

    /**
     * Add a module to the merger.
     */
    public function addModule(ModuleInfo $info) {
        $this->modules[] = $info;
    }

    protected function validateModule(ModuleInfo $module) {
        return $this->module_parser->validate($module);
    }

    /**
     * Access the added-modules.
     */
    public function getModules() {
        return $this->modules;
    }

    public function merge() {
        $this->getController($this)->merge();
    }
}
