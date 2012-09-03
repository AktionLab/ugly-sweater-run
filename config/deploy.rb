default_run_options[:pty] = true

# be sure to change these
set :user, 'deployer'
set :domain, 'staging.aktionlab.com'
set :port, '2222'
set :application, 'ugly-sweater-run'

# the rest should be good
set :repository,  "git@github.com:AktionLab/#{application}.git" 
set :deploy_to, "/home/#{user}/#{application}" 
set :deploy_via, :remote_cache
set :scm, 'git'
set :branch, 'master'
set :git_shallow_clone, 1
set :scm_verbose, true
set :use_sudo, false

server domain, :app, :web
role :db, domain, :primary => true

set :app_symlinks, ["wp-content/uploads"]
before  'deploy:update_code', 'wordpress:install'
after 'wordpress:install', 'wordpress:symlinks:setup'
after 'deploy:create_symlink', 'wordpress:symlinks:update'

namespace :wordpress do
  task :install do
    run "cd #{release_path}"
    run "wget http://wordpress.org/latest.tar.gz"
    run "tar xzvf latest.tar.gz"
    run "mv wordpress/* ."
    run "rm -rf wordpress"
    run "rm -rf wp-content"
  end

  namespace :symlinks do
    desc "Setup application symlinks in the public"
    task :setup, :roles => [:web] do
      if app_symlinks
        app_symlinks.each { |link| run "mkdir -p #{shared_path}/public/#{link}" }
      end
    end
  
    desc "Link public directories to shared location."
    task :update, :roles => [:web] do
      if app_symlinks
        app_symlinks.each { |link| run "ln -nfs #{shared_path}/public/#{link} #{current_path}/public/#{link}" }
      end
      send(run_method, "rm -f #{current_path}/public/wp-config.php")
      send(run_method, "ln -nfs #{shared_path}/public/wp-config.php #{current_path}/public/#{wordpress_dir}/wp-config.php")
    end
  end
end
