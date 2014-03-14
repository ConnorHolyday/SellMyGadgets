
var sellmygadgets = (function (smg, w, d, undefined) {

  var _feedback = d.querySelector('.feedback-container'),
    _xhrFactories = [
      function () {return new XMLHttpRequest()},
      function () {return new ActiveXObject("Msxml2.XMLHTTP")},
      function () {return new ActiveXObject("Msxml3.XMLHTTP")},
      function () {return new ActiveXObject("Microsoft.XMLHTTP")}
    ], _errors = [
      'This is a required field',
      'This field contains too many characters. The maximum is ',
      'This is not a valid email address',
      'This contains characters that are not allowed',
      ''
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

  smg.cssClass = (function() {
    var _apiSupport = 'classList' in document.documentElement,
      c = {
        has: function(el, cls) {
          if (_apiSupport) {
            return el.classList.contains(cls);
          } else {
            return ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
          }
        },
        add: function(el, cls) {
          if (_apiSupport) {
            el.classList.add(cls);
          } else {
            if (!this.has(el, cls)) {
              el.className += ' ' + cls;
              el.className.replace(/ +/g, ' ');
            }
          }
        },
        remove: function(el, cls) {
          if (_apiSupport) {
            el.classList.remove(cls);
          } else {
            if (this.has(el, cls)) {
              var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
              el.className = el.className.replace(reg, ' ');
            }
          }
        },
        toggle: function(el, cls) {
          if(_apiSupport) {
            el.classList.toggle(cls);
          } else {
            this.has(el, cls) ? this.remove(el, cls) : this.add(el, cls);
          }
        }
      };
    return c;
  })();

  // Cross browser XMLHttp object
  smg.xhr = function() {
    var xhr = false;
    for (var i = 0, len = _xhrFactories.length; i < len; i++) {
      try {
        xhr = _xhrFactories[i]();
      } catch (e) {
        continue;
      }
      break;
    }
    if(!xhr) {
      throw new Error('Browser does not support XMLHttpRequest');
    } else {
      return xhr;
    }
  };

  smg.loadScript = function (path) {
    var h = d.querySelector('head'),
      s = d.createElement('script');

    s.src = path;
    h.appendChild(s);
  };

  smg.upload = function(files, path) {
    var len = files.length > 5 ? 5 : files.length;

    for(var i = 0; i < len; i++) {
      sendFile(files[i]);
    }

    function sendFile(file) {
      var xhr = smg.xhr(),
        fd = new FormData();

      smg.addEvent(xhr, 'load', function() {
        if (xhr.status >= 200 && xhr.status < 400) {
          console.log(xhr.responseText);
        } else {
          console.log(xhr.responseText);
        }
      });

      xhr.open('POST', path, true);

      fd.append('uploads[]', file);
      fd.append('isAsync', 'true');
      xhr.send(fd);
    }
  };

  // AddEvent IE7+ support - (element, event, callback function)
  smg.addEvent = function(el, e, callback) {
    if (el.addEventListener) {
      el.addEventListener(e, callback, false);
    } else if (el.attachEvent) {
      el.attachEvent('on' + e, callback);
    }
  };

  // XHR include file - (file path, container element to add to)
  smg.include = function(path, el) {
    if(el != undefined && 'included' in el.dataset === false) {
      var xhr = smg.xhr();
      smg.cssClass.add(el, 'loading');

      smg.addEvent(xhr, 'load', function() {
        smg.fade('in', el, 800);
        el.innerHTML = this.responseText;
        smg.cssClass.remove(el, 'loading');
      });

      xhr.open('GET', path, true);
      xhr.send();
      el.dataset.included = 'true';
    }
  };

  // IE7+ check if element is within viewport
  smg.inViewport = function(el) {
    var r = el.getBoundingClientRect();

    return (
      r.top >= 0 &&
      r.left >= 0 &&
      r.bottom <= (w.innerHeight || d.documentElement.clientHeight) &&
      r.right <= (w.innerWidth || d.documentElement.clientWidth)
    );
  };

  // IE8+ element fade in and out
  smg.fade = function(dir, el, dur) {
    if(el != undefined) {
      var i = (dir == 'in' || dir == 0) ? true : false,
        opacity = (i) ? 0 : 1,
        last = +new Date();
      el.style.opacity = opacity;
      el.style.filter = '';

      (function t() {
        if(i) {
          opacity += (new Date() - last) / dur;
        } else {
          opacity -= (new Date() - last) / dur;
        }
        el.style.opacity = opacity;
        el.style.filter = 'alpha(opacity=' + (100 * opacity)|0 + ')';
        last = +new Date();

        if(i && opacity < 1) {
          requestAnimationFrame(t);
        } else if(!i && opacity > 0) {
          requestAnimationFrame(t);
        }
      })();
    }
  };

  smg.feedback = function(message) {
    _feedback.appendChild(message);
  };

  smg.validate = (function () {
    var e = 'error',
      v = {
        isEmpty : function(el) {
          if(el.value.length < 1) {
            smg.cssClass.add(el, e);
            return _errors[0];
          } else {

          }
        },
        length : function(el, len) {
          if(el.value.length > len) {
            return _errors[1] + len;
          }
        },
        email : function(el) {
          var val = el.value.replace(/^\s+|\s+$/, ''),
            email = /^[^@]+@[^@.]+\.[^@]*\w\w$/,
            illegal = /[\(\)\<\>\,\;\:\\\"\[\]]/;

          if(val == '') {
            return _errors[0];
          } else if(!email.test(val)) {
            return _errors[2]
          } else if(el.val.match(illegal)) {
            return _errors[3];
          }
        }
      };
    return v;
  })();

  return (window.sellmygadgets = window._ = smg);

})(sellmygadgets || { }, window, document);
