require "rubygems"
require "bundler/setup"
Bundler.require(:default)
ActiveSupport::Dependencies.load_paths = ['lib/models']

require 'lib/base_extensions'

class Wordpress
  def initialize
    config = YAML::load(File.open("config/wp-config.yml"))
    ActiveRecord::Base.establish_connection(
      :adapter => 'mysql',
      :host => config['database']['host'],
      :database => config['database']['name'],
      :username => config['database']['user'],
      :password => config['database']['password'],
      :encoding => config['database']['encoding']
    )
  end
  
  def dump_options
    options = {}
    Option.dumpable.each do |option|
      options[option.option_name] = option.attributes.except("option_id", "option_name", "blog_id")
    end
    File.open('wp-options.yml', 'w') {|f| f.write(options.to_yaml) }
  end
  
  def load_options
    YAML::load(File.open('wp-options.yml')).each_pair do |key, attributes|
      opt = Option.find_or_create_by_option_name(key)
      opt.update_attributes(attributes.merge("blog_id" => 0))
    end
  end
end