<?php
//slashes.php
  // strip_gpc_slashes function created by ferik100@flexis.com.br
  // code found at http://www.php.net/stripslashes
  function strip_gpc_slashes ($input)
   {
    if ( !get_magic_quotes_gpc() || ( !is_string($input) && !is_array($input) ) )
     {
      return $input;
     }
    if ( is_string($input) )
     {
      $output = stripslashes($input);
     }
    elseif ( is_array($input) )
     {
      $output = array();
      foreach ($input as $key => $val)
       {
        $new_key = stripslashes($key);
        $new_val = strip_gpc_slashes($val);
        $output[$new_key] = $new_val;
       }
     }
    return $output;
   }
?>
