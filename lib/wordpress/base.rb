class Wordpress::Base < ActiveRecord::Base
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