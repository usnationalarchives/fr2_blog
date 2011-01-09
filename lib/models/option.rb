class Option < ActiveRecord::Base
  set_table_name 'wp_options'
  set_primary_key 'option_id'
  
  NAMES_TO_SKIP = %w(cron recently_edited rewrite_rules wp_user_roles)
  
  named_scope :dumpable, :conditions => ['NOT (option_name LIKE "\_%" OR option_name IN (?))', NAMES_TO_SKIP], :order => "option_name"
end