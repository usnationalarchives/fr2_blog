class Wordpress::Option < Wordpress::Base
  set_table_name 'wp_options'
  set_primary_key 'option_id'
  
  NAMES_TO_SKIP = %w(cron home recently_edited rewrite_rules siteurl upload_path wp_user_roles wpv_clients wpv_host_pattern wpv_secrets)
  
  named_scope :dumpable, :conditions => ['NOT (option_name LIKE "\_%" OR option_name IN (?))', NAMES_TO_SKIP], :order => "option_name"
  
  def self.dump
    options = {}
    self.dumpable.each do |option|
      options[option.option_name] = option.attributes.except("option_id", "option_name", "blog_id")
    end
    File.open('config/wp-options.yml', 'w') {|f| f.write(options.to_yaml) }
  end
  
  def self.load
    yaml_files = ['config/wp-options.yml', 'config/wp-options.local.yml']
    yaml_files.each do |yaml_file|
      if File.exists?(yaml_file)
        YAML::load(File.open(yaml_file)).each_pair do |key, attributes|
          opt = self.find_or_create_by_option_name(key)
          opt.update_attributes(attributes.merge("blog_id" => 0))
        end
      end
    end
  end
  
end