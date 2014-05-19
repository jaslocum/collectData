/* ========================================================================
 * Surface Finish Technologies: sft.js v0.0.1
 * ========================================================================
 * Copyright 2011-2014 Surface Finish Technologies, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */

function cbSet($tag){

  $($tag).prop('checked') ? $($tag).val("1") : $($tag).val("0");

}

function deleteURI(url,returnURL){
  $.ajax({
      url: url + '?' + $.param({"returnURL" : returnURL}),
      type: 'DELETE',
      success: function(){
        window.location = returnURL;
      }
  });
}
