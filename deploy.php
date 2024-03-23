<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
});

set('repository', 'https://github.com/mai92/cloudraya-deployer.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('202.43.248.163')
    ->set('remote_user', 'deploy')
    ->set('deploy_path', '/var/www/deploylaravel.id');

// Hooks
after('deploy', 'build');
after('deploy:failed', 'deploy:unlock');
