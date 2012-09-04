default_run_options[:pty] = true

# be sure to change these
set :user, 'deployer'
set :domain, 'staging.aktionlab.com'
set :port, '2222'
set :application, 'ugly-sweater-run'

# the rest should be good
set :repository,  "ugly-sweater:AktionLab/ugly-sweater-run.git" 
set :deploy_to, "/home/#{user}/#{application}" 
#set :deploy_via, :remote_cache
set :scm, 'git'
set :branch, 'master'
set :git_shallow_clone, 1
set :scm_verbose, true
set :use_sudo, false

server domain, :app, :web
role :db, domain, :primary => true

set :app_symlinks, ["wp-content/uploads"]
after 'deploy:symlink', 'wordpress:install'
after 'wordpress:install', 'wordpress:symlinks:setup'
after 'wordpress:symlinks:setup', 'wordpress:symlinks:update'
after 'wordpress:symlinks:update', 'nginx:config'
after 'nginx:config', 'nginx:reload'
after 'nginx:reload', 'wordpress:permissions',
after 'wordpress:permissions', 'deploy:cleanup'

namespace :wordpress do
  desc "Download and unpack Wordpress"
  task :install do
    run "cd #{current_path} && wget http://wordpress.org/latest.tar.gz && tar -xzvf latest.tar.gz"
    run "cp -rf #{current_path}/wordpress/* #{current_path}/"
    run "rm -rf #{current_path}/wordpress && rm #{current_path}/latest.tar.gz"
  end

  task :permissions do
    run "sudo chown www-data releases && sudo chown www-data releases/*"
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
        app_symlinks.each { |link| run "ln -nfs #{shared_path}/public/#{link} #{current_path}/#{link}" }
      end
      send(run_method, "rm -f #{current_path}/wp-config.php")
      send(run_method, "ln -nfs #{shared_path}/public/wp-config.php #{current_path}/wp-config.php")
    end
  end
end

namespace :nginx do
  desc "Configure nginx"
  task :config do
    run "sudo ln -nfs #{shared_path}/public/system/nginx.conf /etc/nginx/sites-enabled/#{application}"
    run "sudo /etc/init.d/nginx reload"
  end

  desc "Restart nginx"
  task :reload do
    run "sudo /etc/init.d/nginx reload"
  end
end
