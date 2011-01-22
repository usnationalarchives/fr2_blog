require "lib/wordpress"
namespace :wordpress do
  namespace :options do
    desc "Serialize the wp-options table to config/wp-options.yml"
    task :dump do
      Wordpress::Option.dump
    end
    
    desc "Load config/wp-options.yml into to the wp-options table"
    task :load do
      Wordpress::Option.load
    end
  end
  
  desc "download the latest wordpress and load it in place"
  task :update_core do
    `curl -0 http://wordpress.org/latest.tar.gz > latest.tar.gz && gzip -d latest.tar.gz && mv public wordpress && tar -xf latest.tar && mv wordpress public && rm latest.tar`
  end
end