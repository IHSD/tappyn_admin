<?php

require 'recipe/common.php';


/**
 * Set our shared and writeable directories. This is where all the log, cache and
 * release shared files should be placed
 */
set('shared_dirs', ['application/cache', 'application/logs']);
set('writeable_dirs', ['application/cache', 'application/logs']);

/**
 * Setup our server farm
 */
/*----------------
Production
----------------*/
server("app-01", "104.131.49.199", 22)
    ->user('deploy')
    ->identityFile("~/.ssh/id_rsa.pub", "~/.ssh/id_rsa")
    ->stage('production')
    ->env('deploy_path', "/var/www/tappyn_admin");

/* Set the repository URL */
set('repository', 'git@github.com:IHSD/tappyn_admin.git');

// /*
//  * Copy over all of our configuration files
//  */
task('deploy:config', function() {
    run('cp {{deploy_path}}/shared/config/database.php {{release_path}}/application/config/database.php');
    run('cp {{deploy_path}}/shared/config/config.php {{release_path}}/application/config/config.php');
    run('cp {{deploy_path}}/shared/config/secrets.php {{release_path}}/application/config/secrets.php');
    run('cp {{deploy_path}}/shared/config/phinx.yml {{release_path}}/application/phinx.yml');
})->desc("Set configuration");
//
// /*
//  * Run migrations
//  *
//  * This should only execute from one server
//  */
task('deploy:migrate', function() {
    run('cp {{deploy_path}}/shared/config/phinx.yml {{release_path}}/application/phinx.yml');
    run('cd {{release_path}}/application && php vendor/bin/phinx migrate');
})->desc("Run migrations");

// /*
//  * Composer functions
//  */
task('deploy:vendors', function() {
    run('cd {{release_path}}/application && composer install');
})->desc("Install composer dependencies");

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:config',
    'deploy:vendors',
    'deploy:migrate',
    'deploy:shared',
    'deploy:symlink',
    'cleanup'
])->desc('Deploy your project');

after('deploy', 'success');
