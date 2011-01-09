require "lib/wordpress"
namespace :wordpress do
  namespace :options do
    desc "Serialize the wp-options table to config/wp-options.yml"
    task :dump do
      wp = Wordpress.new
      wp.dump_options
    end
    
    desc "Load config/wp-options.yml into to the wp-options table"
    task :load do
      wp = Wordpress.new
      wp.load_options
    end
  end
end