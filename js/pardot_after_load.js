
function runGeoIP(){

  var $ = jQuery;

    // code goes here
  var geoService, max, min, serviceIndex;

  var z = _uGC(document.cookie, '__utmz=', ';'); 
  var source  = _uGC(z, 'utmcsr=', '|'); 
  var medium  = _uGC(z, 'utmcmd=', '|'); 
  var term    = _uGC(z, 'utmctr=', '|'); 
  var content = _uGC(z, 'utmcct=', '|'); 
  var campaign = _uGC(z, 'utmccn=', '|'); 
  var gclid   = _uGC(z, 'utmgclid=', '|'); 


   // add new services here
   geoService = [ //120 per minute
     { // geo plugin
      service: 'http://www.geoplugin.net/json.gp?jsoncallback=?',
      type: 'json',
      setLocation: function(location){
          console.log(location);

          jQuery('.swcity input[type=hidden]').attr("value",location.geoplugin_city);
          jQuery('.swstate input[type=hidden]').attr("value",location.geoplugin_regionCode);
          jQuery('.swcountry input[type=hidden]').attr("value",location.geoplugin_countryName);
      }
     },
     { // 10000 requests per hour
      service: '//freegeoip.net/json/',
      type: 'jsonp',
      setLocation: function(location){
          console.log(location);

          jQuery('.swcity input[type=hidden]').attr("value",location.city);
          jQuery('.swstate input[type=hidden]').attr("value",location.region_code);
          jQuery('.swcountry input[type=hidden]').attr("value",location.country_name);
        }
      },
      {
        service: 'http://www.telize.com/geoip?callback=?',
        type: 'jsonp',
        setLocation:function(location){
          //console.log(location);
          jQuery('#20752_19048pi_20752_19048').attr("value",location.city);
          jQuery('#20752_21878pi_20752_21878').attr("value",location.country);
          jQuery('#20752_19050pi_20752_19050').attr("value",location.region_code);
        }
      }


  ];

  min = 0;
  max = 0;
  serviceIndex = Math.floor(Math.random() * (max - min + 1)) + min;

  console.log(serviceIndex,geoService[serviceIndex].service);

  //$("#pi_extra_field").attr('value', $("#pi_extra_field").val() + ' '+ serviceIndex);

  $.ajax({

    url: geoService[serviceIndex].service,
    type: 'get',
    crossDomain: true,
    dataType:geoService[serviceIndex].type,
    success: geoService[serviceIndex].setLocation,
    error: failedService

  });


  /////////  cookies utmz set from browser

 $(".utm_source input[type=hidden]").attr('value', source);
 $(".utm_term input[type=hidden").attr('value', term);
 $(".utm_content input[type=hidden").attr('value', content);
 $(".utm_campaign input[type=hidden").attr('value', campaign);
 $(".utm_gclid input[type=hidden").attr('value', gclid);
 $(".utm_medium input[type=hidden").attr('value', medium);

 /*
 
 $("#20752_19054pi_20752_19054").attr('value', term);
 $("#20752_19056pi_20752_19056").attr('value', content);
 $("#20752_19058pi_20752_19058").attr('value', campaign);
 $("#20752_19060pi_20752_19060").attr('value', gclid);
 $("#20752_19062pi_20752_19062").attr('value', medium);*/

/////////

 function failedService(error)
 {

   console.log(error);


   //$("#pi_extra_field").attr('value', $("#pi_extra_field").val() + geoService[serviceIndex].service);

    serviceIndex = 1;
    $.ajax({

      url: geoService[serviceIndex].service,
      type: 'get',
      crossDomain: true,
      dataType:geoService[serviceIndex].type,
      success: geoService[serviceIndex].setLocation,
      error: function(){

            //console.log(location);
          $('.swcity input[type=hidden]').attr("value",location.city);
          $('.swstate input[type=hidden]').attr("value", location.region_code);
          $('.swcountry input[type=hidden]').attr("value",location.country_name);
      }

    });


 }


 function _uGC(l,n,s) {
// originally from urchin.js

     if (!l || l=="" || !n || n=="" || !s || s=="") return "-";
     var i,i2,i3,c="-";
     i=l.indexOf(n);
     i3=n.indexOf("=")+1;
     if (i > -1) {
        i2=l.indexOf(s,i); if (i2 < 0) { i2=l.length; }
        c=l.substring((i+i3),i2);
     }
     return c;
}




}; // ready


