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
end