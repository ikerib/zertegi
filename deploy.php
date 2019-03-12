<?php
namespace Deployer;

(new \Symfony\Component\Dotenv\Dotenv())->load('.env');
array_map(function ($var) { set($var, getenv($var)); }, explode(',', $_SERVER['SYMFONY_DOTENV_VARS']));

require 'recipe/symfony4.php';

// Project name
set('application', 'zertegi');

// Project repository
set('repository', 'git@github.com:ikerib/zertegi.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys 
add('shared_files', ['.env']);

set('shared_dirs', ['var/log', 'var/sessions', 'public/uploads']);

// Writable dirs by web server 
add('writable_dirs', ['var', 'public/uploads']);
set('allow_anonymous_stats', false);


// Hosts
host('172.28.64.69')
    ->user('root')
    ->set('branch', 'master')
    ->set('deploy_path', '/var/www/zertegi');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'database:migrate');



set('bin/yarn', function () {
    return run('which yarn');
});
desc('Install Yarn packages');
task('yarn:install', function () {
    if (has('previous_release')) {
        if (test('[ -d {{previous_release}}/node_modules ]')) {
            run('cp -R {{previous_release}}/node_modules {{release_path}}');
        }
    }
    run("cd {{release_path}} && {{bin/yarn}}");
});

desc('Build my assets');
task('yarn:build', function () {
    if (has('previous_release')) {
        if (test('[ -d {{previous_release}}/node_modules ]')) {
            run('cp -R {{previous_release}}/node_modules {{release_path}}');
        }
    }
    run("cd {{release_path}} && {{bin/yarn}} build");
});

after( 'deploy:symlink', 'yarn:install' );
after( 'yarn:install', 'yarn:build' );
