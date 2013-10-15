This is just an idea, not yet implemented

### Benefit?

Features should be written in single module, but too many modules is not good for
Drupal performance. If there's a tool to merge to all to one single module, that
would be great.

### Test cases:

- module_invoke_all(), merged_module must be called
- module_exists('merged_module'), must be return TRUE
- drupal_get_path('module', 'merged_module'), must return correct path
- include/include_once/require/require_once(__DIR__) will not break the code
- Support at_config.module
- All PHP files are listed in new_module.info

### Merge implementation of hook_permission():

- Rename a_permission() to merged_module__permission__a()
- In merged_module_permission()

````php
function new_module_permission() {
  $items = array();
  $items = array_merge($items, merged_module__permission__a());
  return $items;
}
````

````yaml
@file merge.yml

modules:
  - module_x
  - module_y:
    patches:
      - http://path/to/patch/x
  - module_z
name: new_module
````

Structure of merged module:

````
/new_module.info
/new_module.module
/includes/new_module.hook.inc
/merged_modules/module_x/*
````
