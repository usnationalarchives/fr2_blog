require "rubygems"
require "bundler/setup"
Bundler.require(:default)
ActiveSupport::Dependencies.load_paths = ['lib']

require 'lib/base_extensions'

module Wordpress
end