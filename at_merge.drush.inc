<?php

/**
 * @file
 * The at_merge drush file.
 *
 * 1. Create tmp sqlite database, it make coding faster.
 * 2. Parse make file, save projects info to db
 * 3. Download the modules, apply patching, save to tmp directory
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
 */
