require "lib/wordpress"
namespace :wordpress do
  namespace :options do
    task :dump do
      wp = Wordpress.new
      wp.dump_options
    end
    
    task :load do
      wp = Wordpress.new
      wp.load_options
    end
  end
end