
var sellmygadgets = (function (smg, w, d, undefined) {

  var _xhrFactories = [
    function () {return new XMLHttpRequest()},
    function () {return new ActiveXObject("Msxml2.XMLHTTP")},
    function () {return new ActiveXObject("Msxml3.XMLHTTP")},
    function () {return new ActiveXObject("Microsoft.XMLHTTP")}
  ];

  // Request  animation frame polyfills
  w.requestAnimationFrame = (function() {
    return w.requestAnimationFrame ||
      w.webkitRequestAnimationFrame ||
      w.mozRequestAnimationFrame ||
      function(callback) {
        w.setTimeout(callback, 1000 / 60);
      };
  })();

  w.cancelAnimationFrame = (function() {
    return w.cancelAnimationFrame ||
      w.webkitCancelAnimationFrame ||
      w.mozCancelAnimationFrame ||
      function(id) {
        w.clearTimeout(id);
      };
  })();

  // Cross browser XMLHttp object
  smg.xhr = function () {
    var xhr = false;
    for (var i = 0; i < _xhrFactories.length; i++) {
      try {
        xhr = _xhrFactories[i]();
      } catch (e) {
        continue;
      }
      break;
    }

    if(!xhr){
      throw new Error('Browser does not support XMLHttpRequests');
    } else {
      return xhr;
    }
  };

  // AddEvent IE7+ support - (element, event, callback function)
  smg.addEvent = function (el, e, callback) {
    if (el.addEventListener) {
      el.addEventListener(e, callback, false);
    } else if (el.attachEvent) {
      el.attachEvent('on' + e, callback);
    }
  };

  // XHR include file - (file path, container element to add to)
  smg.include = function (path, el) {
    if(el != undefined) {
      var xhr = smg.xhr();

      xhr.addEventListener('load', function() {
        el.innerHTML = this.responseText;
      }, false);

      xhr.open('GET', path, true);
      xhr.send();
    }
  };

  // IE7+ check if element is within viewport
  smg.inViewport = function (el) {
    var r = el.getBoundingClientRect();

    return (
      r.top >= 0 &&
      r.left >= 0 &&
      r.bottom <= (w.innerHeight || d.documentElement.clientHeight) &&
      r.right <= (w.innerWidth || d.documentElement.clientWidth)
    );
  };

  smg.fade = function (dir, el) {

    if(dir == 'in' || dir == 0) {

    } else {

    }

  };

  return (window.sellmygadgets = window._ = smg);

})(sellmygadgets || { }, window, document);
