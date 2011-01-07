require 'yaml'

class Hash
  # From http://snippets.dzone.com/posts/show/5811
  # Replacing the to_yaml function so it'll serialize hashes sorted (by their keys)
  def to_yaml( opts = {} )
    YAML::quick_emit( object_id, opts ) do |out|
      out.map( taguri, to_yaml_style ) do |map|
        sort.each do |k, v|
          map.add( k, v )
        end
      end
    end
  end
end
