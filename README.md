This is just an idea, not yet implemented

### Benefit?

Features should be written in single module, but too many modules is not good 
for Drupal performance. If there's a tool to merge to all to one single module, 
that would be great.

With a wrapper, we have ability to add more magic to other modules (nothing 
applied yet)

### Test cases:

- Info file of modules are validated
- On new-module enabled/disable, insert/delete fake rows in {system}
  - module_invoke_all(), merged_module must be called
  - module_exists('merged_module'), must be return TRUE
  - drupal_get_path('module', 'merged_module'), must return correct path
- include/include_once/require/require_once(__DIR__) will not break the code
- Support at_config.module
- All PHP files are listed in new_module.info
- If sub-module is available at bootstrap, new_module must be available at 
  bootstrap too
- if module_x depends on module_y, both module are merged to new module, the
  dependency is removed.
- CTools Plugin API

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

````ini
; file merge.yml

name = new_module
projects[module_x][type] = module
projects[module_x][version] = 7.x-1.0
projects[module_y][type] = module
projects[module_y][type] = 7.x-1.2
projects[module_y][patch][] = http://path/to/patch/x
````

### Drush command to merge modules

````bash
drush at-merge
````

### Structure of merged module:

````
/new_module.info
/new_module.module
/includes/new_module.hook.inc
/merged_modules/module_x/*
````

### Issues

- Translation
- Support at_autload.module
- Integrate with Update status
