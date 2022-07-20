(function(){/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
'use strict';var l;function ba(a){var b=0;return function(){return b<a.length?{done:!1,value:a[b++]}:{done:!0}}}
var da="function"==typeof Object.defineProperties?Object.defineProperty:function(a,b,c){if(a==Array.prototype||a==Object.prototype)return a;a[b]=c.value;return a};
function ea(a){a=["object"==typeof globalThis&&globalThis,a,"object"==typeof window&&window,"object"==typeof self&&self,"object"==typeof global&&global];for(var b=0;b<a.length;++b){var c=a[b];if(c&&c.Math==Math)return c}throw Error("Cannot find global object");}
var fa=ea(this);function n(a,b){if(b)a:{var c=fa;a=a.split(".");for(var d=0;d<a.length-1;d++){var e=a[d];if(!(e in c))break a;c=c[e]}a=a[a.length-1];d=c[a];b=b(d);b!=d&&null!=b&&da(c,a,{configurable:!0,writable:!0,value:b})}}
n("Symbol",function(a){function b(f){if(this instanceof b)throw new TypeError("Symbol is not a constructor");return new c(d+(f||"")+"_"+e++,f)}
function c(f,g){this.i=f;da(this,"description",{configurable:!0,writable:!0,value:g})}
if(a)return a;c.prototype.toString=function(){return this.i};
var d="jscomp_symbol_"+(1E9*Math.random()>>>0)+"_",e=0;return b});
n("Symbol.iterator",function(a){if(a)return a;a=Symbol("Symbol.iterator");for(var b="Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "),c=0;c<b.length;c++){var d=fa[b[c]];"function"===typeof d&&"function"!=typeof d.prototype[a]&&da(d.prototype,a,{configurable:!0,writable:!0,value:function(){return ha(ba(this))}})}return a});
function ha(a){a={next:a};a[Symbol.iterator]=function(){return this};
return a}
function p(a){var b="undefined"!=typeof Symbol&&Symbol.iterator&&a[Symbol.iterator];return b?b.call(a):{next:ba(a)}}
function ia(a){if(!(a instanceof Array)){a=p(a);for(var b,c=[];!(b=a.next()).done;)c.push(b.value);a=c}return a}
function ka(a,b){return Object.prototype.hasOwnProperty.call(a,b)}
var oa="function"==typeof Object.assign?Object.assign:function(a,b){for(var c=1;c<arguments.length;c++){var d=arguments[c];if(d)for(var e in d)ka(d,e)&&(a[e]=d[e])}return a};
n("Object.assign",function(a){return a||oa});
var pa="function"==typeof Object.create?Object.create:function(a){function b(){}
b.prototype=a;return new b},qa=function(){function a(){function c(){}
new c;Reflect.construct(c,[],function(){});
return new c instanceof c}
if("undefined"!=typeof Reflect&&Reflect.construct){if(a())return Reflect.construct;var b=Reflect.construct;return function(c,d,e){c=b(c,d);e&&Reflect.setPrototypeOf(c,e.prototype);return c}}return function(c,d,e){void 0===e&&(e=c);
e=pa(e.prototype||Object.prototype);return Function.prototype.apply.call(c,e,d)||e}}(),ra;
if("function"==typeof Object.setPrototypeOf)ra=Object.setPrototypeOf;else{var ta;a:{var ua={a:!0},va={};try{va.__proto__=ua;ta=va.a;break a}catch(a){}ta=!1}ra=ta?function(a,b){a.__proto__=b;if(a.__proto__!==b)throw new TypeError(a+" is not extensible");return a}:null}var wa=ra;
function r(a,b){a.prototype=pa(b.prototype);a.prototype.constructor=a;if(wa)wa(a,b);else for(var c in b)if("prototype"!=c)if(Object.defineProperties){var d=Object.getOwnPropertyDescriptor(b,c);d&&Object.defineProperty(a,c,d)}else a[c]=b[c];a.Y=b.prototype}
function ya(){this.B=!1;this.m=null;this.j=void 0;this.i=1;this.o=this.s=0;this.v=this.l=null}
function za(a){if(a.B)throw new TypeError("Generator is already running");a.B=!0}
ya.prototype.N=function(a){this.j=a};
function Aa(a,b){a.l={Qb:b,Wb:!0};a.i=a.s||a.o}
ya.prototype.return=function(a){this.l={return:a};this.i=this.o};
function v(a,b,c){a.i=c;return{value:b}}
ya.prototype.u=function(a){this.i=a};
function Ba(a,b,c){a.s=b;void 0!=c&&(a.o=c)}
function Ca(a,b){a.i=b;a.s=0}
function Da(a){a.s=0;var b=a.l.Qb;a.l=null;return b}
function Ea(a){a.v=[a.l];a.s=0;a.o=0}
function Fa(a){var b=a.v.splice(0)[0];(b=a.l=a.l||b)?b.Wb?a.i=a.s||a.o:void 0!=b.u&&a.o<b.u?(a.i=b.u,a.l=null):a.i=a.o:a.i=0}
function Ga(a){this.i=new ya;this.j=a}
function Ha(a,b){za(a.i);var c=a.i.m;if(c)return Ia(a,"return"in c?c["return"]:function(d){return{value:d,done:!0}},b,a.i.return);
a.i.return(b);return Ja(a)}
function Ia(a,b,c,d){try{var e=b.call(a.i.m,c);if(!(e instanceof Object))throw new TypeError("Iterator result "+e+" is not an object");if(!e.done)return a.i.B=!1,e;var f=e.value}catch(g){return a.i.m=null,Aa(a.i,g),Ja(a)}a.i.m=null;d.call(a.i,f);return Ja(a)}
function Ja(a){for(;a.i.i;)try{var b=a.j(a.i);if(b)return a.i.B=!1,{value:b.value,done:!1}}catch(c){a.i.j=void 0,Aa(a.i,c)}a.i.B=!1;if(a.i.l){b=a.i.l;a.i.l=null;if(b.Wb)throw b.Qb;return{value:b.return,done:!0}}return{value:void 0,done:!0}}
function Ka(a){this.next=function(b){za(a.i);a.i.m?b=Ia(a,a.i.m.next,b,a.i.N):(a.i.N(b),b=Ja(a));return b};
this.throw=function(b){za(a.i);a.i.m?b=Ia(a,a.i.m["throw"],b,a.i.N):(Aa(a.i,b),b=Ja(a));return b};
this.return=function(b){return Ha(a,b)};
this[Symbol.iterator]=function(){return this}}
function La(a){function b(d){return a.next(d)}
function c(d){return a.throw(d)}
return new Promise(function(d,e){function f(g){g.done?d(g.value):Promise.resolve(g.value).then(b,c).then(f,e)}
f(a.next())})}
function w(a){return La(new Ka(new Ga(a)))}
function Ma(){for(var a=Number(this),b=[],c=a;c<arguments.length;c++)b[c-a]=arguments[c];return b}
n("Reflect",function(a){return a?a:{}});
n("Reflect.construct",function(){return qa});
n("Reflect.setPrototypeOf",function(a){return a?a:wa?function(b,c){try{return wa(b,c),!0}catch(d){return!1}}:null});
n("Promise",function(a){function b(g){this.i=0;this.l=void 0;this.j=[];this.B=!1;var h=this.m();try{g(h.resolve,h.reject)}catch(k){h.reject(k)}}
function c(){this.i=null}
function d(g){return g instanceof b?g:new b(function(h){h(g)})}
if(a)return a;c.prototype.j=function(g){if(null==this.i){this.i=[];var h=this;this.l(function(){h.o()})}this.i.push(g)};
var e=fa.setTimeout;c.prototype.l=function(g){e(g,0)};
c.prototype.o=function(){for(;this.i&&this.i.length;){var g=this.i;this.i=[];for(var h=0;h<g.length;++h){var k=g[h];g[h]=null;try{k()}catch(m){this.m(m)}}}this.i=null};
c.prototype.m=function(g){this.l(function(){throw g;})};
b.prototype.m=function(){function g(m){return function(q){k||(k=!0,m.call(h,q))}}
var h=this,k=!1;return{resolve:g(this.K),reject:g(this.o)}};
b.prototype.K=function(g){if(g===this)this.o(new TypeError("A Promise cannot resolve to itself"));else if(g instanceof b)this.R(g);else{a:switch(typeof g){case "object":var h=null!=g;break a;case "function":h=!0;break a;default:h=!1}h?this.J(g):this.s(g)}};
b.prototype.J=function(g){var h=void 0;try{h=g.then}catch(k){this.o(k);return}"function"==typeof h?this.T(h,g):this.s(g)};
b.prototype.o=function(g){this.N(2,g)};
b.prototype.s=function(g){this.N(1,g)};
b.prototype.N=function(g,h){if(0!=this.i)throw Error("Cannot settle("+g+", "+h+"): Promise already settled in state"+this.i);this.i=g;this.l=h;2===this.i&&this.P();this.v()};
b.prototype.P=function(){var g=this;e(function(){if(g.F()){var h=fa.console;"undefined"!==typeof h&&h.error(g.l)}},1)};
b.prototype.F=function(){if(this.B)return!1;var g=fa.CustomEvent,h=fa.Event,k=fa.dispatchEvent;if("undefined"===typeof k)return!0;"function"===typeof g?g=new g("unhandledrejection",{cancelable:!0}):"function"===typeof h?g=new h("unhandledrejection",{cancelable:!0}):(g=fa.document.createEvent("CustomEvent"),g.initCustomEvent("unhandledrejection",!1,!0,g));g.promise=this;g.reason=this.l;return k(g)};
b.prototype.v=function(){if(null!=this.j){for(var g=0;g<this.j.length;++g)f.j(this.j[g]);this.j=null}};
var f=new c;b.prototype.R=function(g){var h=this.m();g.Ua(h.resolve,h.reject)};
b.prototype.T=function(g,h){var k=this.m();try{g.call(h,k.resolve,k.reject)}catch(m){k.reject(m)}};
b.prototype.then=function(g,h){function k(x,u){return"function"==typeof x?function(A){try{m(x(A))}catch(E){q(E)}}:u}
var m,q,t=new b(function(x,u){m=x;q=u});
this.Ua(k(g,m),k(h,q));return t};
b.prototype.catch=function(g){return this.then(void 0,g)};
b.prototype.Ua=function(g,h){function k(){switch(m.i){case 1:g(m.l);break;case 2:h(m.l);break;default:throw Error("Unexpected state: "+m.i);}}
var m=this;null==this.j?f.j(k):this.j.push(k);this.B=!0};
b.resolve=d;b.reject=function(g){return new b(function(h,k){k(g)})};
b.race=function(g){return new b(function(h,k){for(var m=p(g),q=m.next();!q.done;q=m.next())d(q.value).Ua(h,k)})};
b.all=function(g){var h=p(g),k=h.next();return k.done?d([]):new b(function(m,q){function t(A){return function(E){x[A]=E;u--;0==u&&m(x)}}
var x=[],u=0;do x.push(void 0),u++,d(k.value).Ua(t(x.length-1),q),k=h.next();while(!k.done)})};
return b});
n("WeakMap",function(a){function b(k){this.i=(h+=Math.random()+1).toString();if(k){k=p(k);for(var m;!(m=k.next()).done;)m=m.value,this.set(m[0],m[1])}}
function c(){}
function d(k){var m=typeof k;return"object"===m&&null!==k||"function"===m}
function e(k){if(!ka(k,g)){var m=new c;da(k,g,{value:m})}}
function f(k){var m=Object[k];m&&(Object[k]=function(q){if(q instanceof c)return q;Object.isExtensible(q)&&e(q);return m(q)})}
if(function(){if(!a||!Object.seal)return!1;try{var k=Object.seal({}),m=Object.seal({}),q=new a([[k,2],[m,3]]);if(2!=q.get(k)||3!=q.get(m))return!1;q.delete(k);q.set(m,4);return!q.has(k)&&4==q.get(m)}catch(t){return!1}}())return a;
var g="$jscomp_hidden_"+Math.random();f("freeze");f("preventExtensions");f("seal");var h=0;b.prototype.set=function(k,m){if(!d(k))throw Error("Invalid WeakMap key");e(k);if(!ka(k,g))throw Error("WeakMap key fail: "+k);k[g][this.i]=m;return this};
b.prototype.get=function(k){return d(k)&&ka(k,g)?k[g][this.i]:void 0};
b.prototype.has=function(k){return d(k)&&ka(k,g)&&ka(k[g],this.i)};
b.prototype.delete=function(k){return d(k)&&ka(k,g)&&ka(k[g],this.i)?delete k[g][this.i]:!1};
return b});
n("Map",function(a){function b(){var h={};return h.previous=h.next=h.head=h}
function c(h,k){var m=h.i;return ha(function(){if(m){for(;m.head!=h.i;)m=m.previous;for(;m.next!=m.head;)return m=m.next,{done:!1,value:k(m)};m=null}return{done:!0,value:void 0}})}
function d(h,k){var m=k&&typeof k;"object"==m||"function"==m?f.has(k)?m=f.get(k):(m=""+ ++g,f.set(k,m)):m="p_"+k;var q=h.data_[m];if(q&&ka(h.data_,m))for(h=0;h<q.length;h++){var t=q[h];if(k!==k&&t.key!==t.key||k===t.key)return{id:m,list:q,index:h,entry:t}}return{id:m,list:q,index:-1,entry:void 0}}
function e(h){this.data_={};this.i=b();this.size=0;if(h){h=p(h);for(var k;!(k=h.next()).done;)k=k.value,this.set(k[0],k[1])}}
if(function(){if(!a||"function"!=typeof a||!a.prototype.entries||"function"!=typeof Object.seal)return!1;try{var h=Object.seal({x:4}),k=new a(p([[h,"s"]]));if("s"!=k.get(h)||1!=k.size||k.get({x:4})||k.set({x:4},"t")!=k||2!=k.size)return!1;var m=k.entries(),q=m.next();if(q.done||q.value[0]!=h||"s"!=q.value[1])return!1;q=m.next();return q.done||4!=q.value[0].x||"t"!=q.value[1]||!m.next().done?!1:!0}catch(t){return!1}}())return a;
var f=new WeakMap;e.prototype.set=function(h,k){h=0===h?0:h;var m=d(this,h);m.list||(m.list=this.data_[m.id]=[]);m.entry?m.entry.value=k:(m.entry={next:this.i,previous:this.i.previous,head:this.i,key:h,value:k},m.list.push(m.entry),this.i.previous.next=m.entry,this.i.previous=m.entry,this.size++);return this};
e.prototype.delete=function(h){h=d(this,h);return h.entry&&h.list?(h.list.splice(h.index,1),h.list.length||delete this.data_[h.id],h.entry.previous.next=h.entry.next,h.entry.next.previous=h.entry.previous,h.entry.head=null,this.size--,!0):!1};
e.prototype.clear=function(){this.data_={};this.i=this.i.previous=b();this.size=0};
e.prototype.has=function(h){return!!d(this,h).entry};
e.prototype.get=function(h){return(h=d(this,h).entry)&&h.value};
e.prototype.entries=function(){return c(this,function(h){return[h.key,h.value]})};
e.prototype.keys=function(){return c(this,function(h){return h.key})};
e.prototype.values=function(){return c(this,function(h){return h.value})};
e.prototype.forEach=function(h,k){for(var m=this.entries(),q;!(q=m.next()).done;)q=q.value,h.call(k,q[1],q[0],this)};
e.prototype[Symbol.iterator]=e.prototype.entries;var g=0;return e});
function Na(a,b,c){if(null==a)throw new TypeError("The 'this' value for String.prototype."+c+" must not be null or undefined");if(b instanceof RegExp)throw new TypeError("First argument to String.prototype."+c+" must not be a regular expression");return a+""}
n("String.prototype.endsWith",function(a){return a?a:function(b,c){var d=Na(this,b,"endsWith");b+="";void 0===c&&(c=d.length);c=Math.max(0,Math.min(c|0,d.length));for(var e=b.length;0<e&&0<c;)if(d[--c]!=b[--e])return!1;return 0>=e}});
n("Array.prototype.find",function(a){return a?a:function(b,c){a:{var d=this;d instanceof String&&(d=String(d));for(var e=d.length,f=0;f<e;f++){var g=d[f];if(b.call(c,g,f,d)){b=g;break a}}b=void 0}return b}});
n("String.prototype.startsWith",function(a){return a?a:function(b,c){var d=Na(this,b,"startsWith");b+="";var e=d.length,f=b.length;c=Math.max(0,Math.min(c|0,d.length));for(var g=0;g<f&&c<e;)if(d[c++]!=b[g++])return!1;return g>=f}});
n("Number.isFinite",function(a){return a?a:function(b){return"number"!==typeof b?!1:!isNaN(b)&&Infinity!==b&&-Infinity!==b}});
n("Number.isInteger",function(a){return a?a:function(b){return Number.isFinite(b)?b===Math.floor(b):!1}});
n("Number.MAX_SAFE_INTEGER",function(){return 9007199254740991});
function Oa(a,b){a instanceof String&&(a+="");var c=0,d=!1,e={next:function(){if(!d&&c<a.length){var f=c++;return{value:b(f,a[f]),done:!1}}d=!0;return{done:!0,value:void 0}}};
e[Symbol.iterator]=function(){return e};
return e}
n("Array.prototype.entries",function(a){return a?a:function(){return Oa(this,function(b,c){return[b,c]})}});
n("Number.isNaN",function(a){return a?a:function(b){return"number"===typeof b&&isNaN(b)}});
n("Array.prototype.keys",function(a){return a?a:function(){return Oa(this,function(b){return b})}});
n("Set",function(a){function b(c){this.i=new Map;if(c){c=p(c);for(var d;!(d=c.next()).done;)this.add(d.value)}this.size=this.i.size}
if(function(){if(!a||"function"!=typeof a||!a.prototype.entries||"function"!=typeof Object.seal)return!1;try{var c=Object.seal({x:4}),d=new a(p([c]));if(!d.has(c)||1!=d.size||d.add(c)!=d||1!=d.size||d.add({x:4})!=d||2!=d.size)return!1;var e=d.entries(),f=e.next();if(f.done||f.value[0]!=c||f.value[1]!=c)return!1;f=e.next();return f.done||f.value[0]==c||4!=f.value[0].x||f.value[1]!=f.value[0]?!1:e.next().done}catch(g){return!1}}())return a;
b.prototype.add=function(c){c=0===c?0:c;this.i.set(c,c);this.size=this.i.size;return this};
b.prototype.delete=function(c){c=this.i.delete(c);this.size=this.i.size;return c};
b.prototype.clear=function(){this.i.clear();this.size=0};
b.prototype.has=function(c){return this.i.has(c)};
b.prototype.entries=function(){return this.i.entries()};
b.prototype.values=function(){return this.i.values()};
b.prototype.keys=b.prototype.values;b.prototype[Symbol.iterator]=b.prototype.values;b.prototype.forEach=function(c,d){var e=this;this.i.forEach(function(f){return c.call(d,f,f,e)})};
return b});
n("Array.prototype.values",function(a){return a?a:function(){return Oa(this,function(b,c){return c})}});
n("Array.from",function(a){return a?a:function(b,c,d){c=null!=c?c:function(h){return h};
var e=[],f="undefined"!=typeof Symbol&&Symbol.iterator&&b[Symbol.iterator];if("function"==typeof f){b=f.call(b);for(var g=0;!(f=b.next()).done;)e.push(c.call(d,f.value,g++))}else for(f=b.length,g=0;g<f;g++)e.push(c.call(d,b[g],g));return e}});
n("Object.setPrototypeOf",function(a){return a||wa});
n("Object.is",function(a){return a?a:function(b,c){return b===c?0!==b||1/b===1/c:b!==b&&c!==c}});
n("Array.prototype.includes",function(a){return a?a:function(b,c){var d=this;d instanceof String&&(d=String(d));var e=d.length;c=c||0;for(0>c&&(c=Math.max(c+e,0));c<e;c++){var f=d[c];if(f===b||Object.is(f,b))return!0}return!1}});
n("String.prototype.includes",function(a){return a?a:function(b,c){return-1!==Na(this,b,"includes").indexOf(b,c||0)}});
n("globalThis",function(a){return a||fa});
n("Object.entries",function(a){return a?a:function(b){var c=[],d;for(d in b)ka(b,d)&&c.push([d,b[d]]);return c}});
n("Object.values",function(a){return a?a:function(b){var c=[],d;for(d in b)ka(b,d)&&c.push(b[d]);return c}});
var Pa=Pa||{},y=this||self;function z(a,b,c){a=a.split(".");c=c||y;a[0]in c||"undefined"==typeof c.execScript||c.execScript("var "+a[0]);for(var d;a.length&&(d=a.shift());)a.length||void 0===b?c[d]&&c[d]!==Object.prototype[d]?c=c[d]:c=c[d]={}:c[d]=b}
function B(a,b){a=a.split(".");b=b||y;for(var c=0;c<a.length;c++)if(b=b[a[c]],null==b)return null;return b}
function Qa(a){a.sb=void 0;a.getInstance=function(){return a.sb?a.sb:a.sb=new a}}
function Ra(a){var b=typeof a;return"object"!=b?b:a?Array.isArray(a)?"array":b:"null"}
function Sa(a){var b=Ra(a);return"array"==b||"object"==b&&"number"==typeof a.length}
function Ta(a){var b=typeof a;return"object"==b&&null!=a||"function"==b}
function Ua(a){return Object.prototype.hasOwnProperty.call(a,Va)&&a[Va]||(a[Va]=++Wa)}
var Va="closure_uid_"+(1E9*Math.random()>>>0),Wa=0;function Xa(a,b,c){return a.call.apply(a.bind,arguments)}
function Ya(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var e=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(e,d);return a.apply(b,e)}}return function(){return a.apply(b,arguments)}}
function Za(a,b,c){Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?Za=Xa:Za=Ya;return Za.apply(null,arguments)}
function $a(a,b){var c=Array.prototype.slice.call(arguments,1);return function(){var d=c.slice();d.push.apply(d,arguments);return a.apply(this,d)}}
function ab(a,b){function c(){}
c.prototype=b.prototype;a.Y=b.prototype;a.prototype=new c;a.prototype.constructor=a;a.lq=function(d,e,f){for(var g=Array(arguments.length-2),h=2;h<arguments.length;h++)g[h-2]=arguments[h];return b.prototype[e].apply(d,g)}}
function bb(a){return a}
;function cb(a,b){if(Error.captureStackTrace)Error.captureStackTrace(this,cb);else{var c=Error().stack;c&&(this.stack=c)}a&&(this.message=String(a));void 0!==b&&(this.cause=b)}
ab(cb,Error);cb.prototype.name="CustomError";function db(a){a=a.url;var b=/[?&]dsh=1(&|$)/.test(a);this.l=!b&&/[?&]ae=1(&|$)/.test(a);this.m=!b&&/[?&]ae=2(&|$)/.test(a);if((this.i=/[?&]adurl=([^&]*)/.exec(a))&&this.i[1]){try{var c=decodeURIComponent(this.i[1])}catch(d){c=null}this.j=c}}
;function eb(){}
function fb(a){var b=!1,c;return function(){b||(c=a(),b=!0);return c}}
;var gb=Array.prototype.indexOf?function(a,b){return Array.prototype.indexOf.call(a,b,void 0)}:function(a,b){if("string"===typeof a)return"string"!==typeof b||1!=b.length?-1:a.indexOf(b,0);
for(var c=0;c<a.length;c++)if(c in a&&a[c]===b)return c;return-1},hb=Array.prototype.forEach?function(a,b,c){Array.prototype.forEach.call(a,b,c)}:function(a,b,c){for(var d=a.length,e="string"===typeof a?a.split(""):a,f=0;f<d;f++)f in e&&b.call(c,e[f],f,a)},ib=Array.prototype.filter?function(a,b){return Array.prototype.filter.call(a,b,void 0)}:function(a,b){for(var c=a.length,d=[],e=0,f="string"===typeof a?a.split(""):a,g=0;g<c;g++)if(g in f){var h=f[g];
b.call(void 0,h,g,a)&&(d[e++]=h)}return d},jb=Array.prototype.map?function(a,b){return Array.prototype.map.call(a,b,void 0)}:function(a,b){for(var c=a.length,d=Array(c),e="string"===typeof a?a.split(""):a,f=0;f<c;f++)f in e&&(d[f]=b.call(void 0,e[f],f,a));
return d},kb=Array.prototype.reduce?function(a,b,c){return Array.prototype.reduce.call(a,b,c)}:function(a,b,c){var d=c;
hb(a,function(e,f){d=b.call(void 0,d,e,f,a)});
return d};
function lb(a,b){a:{for(var c=a.length,d="string"===typeof a?a.split(""):a,e=0;e<c;e++)if(e in d&&b.call(void 0,d[e],e,a)){b=e;break a}b=-1}return 0>b?null:"string"===typeof a?a.charAt(b):a[b]}
function mb(a,b){b=gb(a,b);var c;(c=0<=b)&&Array.prototype.splice.call(a,b,1);return c}
function nb(a,b){for(var c=1;c<arguments.length;c++){var d=arguments[c];if(Sa(d)){var e=a.length||0,f=d.length||0;a.length=e+f;for(var g=0;g<f;g++)a[e+g]=d[g]}else a.push(d)}}
;function ob(a,b){for(var c in a)b.call(void 0,a[c],c,a)}
function pb(a){var b=qb,c;for(c in b)if(a.call(void 0,b[c],c,b))return c}
function rb(a){for(var b in a)return!1;return!0}
function sb(a,b){if(null!==a&&b in a)throw Error('The object already contains the key "'+b+'"');a[b]=!0}
function tb(a){return null!==a&&"privembed"in a?a.privembed:!1}
function ub(a,b){for(var c in a)if(!(c in b)||a[c]!==b[c])return!1;for(var d in b)if(!(d in a))return!1;return!0}
function vb(a){var b={},c;for(c in a)b[c]=a[c];return b}
function wb(a){if(!a||"object"!==typeof a)return a;if("function"===typeof a.clone)return a.clone();if("undefined"!==typeof Map&&a instanceof Map)return new Map(a);if("undefined"!==typeof Set&&a instanceof Set)return new Set(a);var b=Array.isArray(a)?[]:"function"!==typeof ArrayBuffer||"function"!==typeof ArrayBuffer.isView||!ArrayBuffer.isView(a)||a instanceof DataView?{}:new a.constructor(a.length),c;for(c in a)b[c]=wb(a[c]);return b}
var xb="constructor hasOwnProperty isPrototypeOf propertyIsEnumerable toLocaleString toString valueOf".split(" ");function yb(a,b){for(var c,d,e=1;e<arguments.length;e++){d=arguments[e];for(c in d)a[c]=d[c];for(var f=0;f<xb.length;f++)c=xb[f],Object.prototype.hasOwnProperty.call(d,c)&&(a[c]=d[c])}}
;var zb;function Ab(){if(void 0===zb){var a=null,b=y.trustedTypes;if(b&&b.createPolicy){try{a=b.createPolicy("goog#html",{createHTML:bb,createScript:bb,createScriptURL:bb})}catch(c){y.console&&y.console.error(c.message)}zb=a}else zb=a}return zb}
;function Bb(a,b){this.l=a===Cb&&b||""}
Bb.prototype.j=!0;Bb.prototype.i=function(){return this.l};
function Db(a){return new Bb(Cb,a)}
var Cb={};Db("");var Eb={};function Fb(a){this.l=Eb===Eb?a:"";this.j=!0}
Fb.prototype.toString=function(){return this.l.toString()};
Fb.prototype.i=function(){return this.l.toString()};function Gb(a,b){this.l=b===Jb?a:""}
Gb.prototype.toString=function(){return this.l+""};
Gb.prototype.j=!0;Gb.prototype.i=function(){return this.l.toString()};
function Kb(a){if(a instanceof Gb&&a.constructor===Gb)return a.l;Ra(a);return"type_error:TrustedResourceUrl"}
var Jb={};function Lb(a){var b=Ab();a=b?b.createScriptURL(a):a;return new Gb(a,Jb)}
;var Mb=String.prototype.trim?function(a){return a.trim()}:function(a){return/^[\s\xa0]*([\s\S]*?)[\s\xa0]*$/.exec(a)[1]};
function Nb(a,b){return a<b?-1:a>b?1:0}
;function Ob(a,b){this.l=b===Pb?a:""}
Ob.prototype.toString=function(){return this.l.toString()};
Ob.prototype.j=!0;Ob.prototype.i=function(){return this.l.toString()};
function Qb(a){if(a instanceof Ob&&a.constructor===Ob)return a.l;Ra(a);return"type_error:SafeUrl"}
var Rb=/^(?:(?:https?|mailto|ftp):|[^:/?#]*(?:[/?#]|$))/i,Pb={},Sb=new Ob("about:invalid#zClosurez",Pb);function Tb(){var a=y.navigator;return a&&(a=a.userAgent)?a:""}
function C(a){return-1!=Tb().indexOf(a)}
;function Ub(){return C("Trident")||C("MSIE")}
function Vb(){return C("Firefox")||C("FxiOS")}
function Wb(){return C("Safari")&&!(Xb()||C("Coast")||C("Opera")||C("Edge")||C("Edg/")||C("OPR")||Vb()||C("Silk")||C("Android"))}
function Xb(){return(C("Chrome")||C("CriOS"))&&!C("Edge")||C("Silk")}
function Yb(){return C("Android")&&!(Xb()||Vb()||C("Opera")||C("Silk"))}
function Zb(a){var b={};a.forEach(function(c){b[c[0]]=c[1]});
return function(c){return b[c.find(function(d){return d in b})]||""}}
function bc(a){var b=Tb();if("Internet Explorer"===a){if(Ub())if((a=/rv: *([\d\.]*)/.exec(b))&&a[1])b=a[1];else{a="";var c=/MSIE +([\d\.]+)/.exec(b);if(c&&c[1])if(b=/Trident\/(\d.\d)/.exec(b),"7.0"==c[1])if(b&&b[1])switch(b[1]){case "4.0":a="8.0";break;case "5.0":a="9.0";break;case "6.0":a="10.0";break;case "7.0":a="11.0"}else a="7.0";else a=c[1];b=a}else b="";return b}var d=RegExp("([A-Z][\\w ]+)/([^\\s]+)\\s*(?:\\((.*?)\\))?","g");c=[];for(var e;e=d.exec(b);)c.push([e[1],e[2],e[3]||void 0]);b=Zb(c);
switch(a){case "Opera":if(C("Opera"))return b(["Version","Opera"]);if(C("OPR"))return b(["OPR"]);break;case "Microsoft Edge":if(C("Edge"))return b(["Edge"]);if(C("Edg/"))return b(["Edg"]);break;case "Chromium":if(Xb())return b(["Chrome","CriOS","HeadlessChrome"])}return"Firefox"===a&&Vb()||"Safari"===a&&Wb()||"Android Browser"===a&&Yb()||"Silk"===a&&C("Silk")?(b=c[2])&&b[1]||"":""}
function cc(a){a=bc(a);if(""===a)return NaN;a=a.split(".");return 0===a.length?NaN:Number(a[0])}
;var dc={};function ec(a){this.l=dc===dc?a:"";this.j=!0}
ec.prototype.i=function(){return this.l.toString()};
ec.prototype.toString=function(){return this.l.toString()};function fc(a,b){b instanceof Ob||b instanceof Ob||(b="object"==typeof b&&b.j?b.i():String(b),Rb.test(b)||(b="about:invalid#zClosurez"),b=new Ob(b,Pb));a.href=Qb(b)}
function gc(a,b){a.rel="stylesheet";a.href=Kb(b).toString();(b=hc('style[nonce],link[rel="stylesheet"][nonce]',a.ownerDocument&&a.ownerDocument.defaultView))&&a.setAttribute("nonce",b)}
function ic(){return hc("script[nonce]")}
var jc=/^[\w+/_-]+[=]{0,2}$/;function hc(a,b){b=(b||y).document;return b.querySelector?(a=b.querySelector(a))&&(a=a.nonce||a.getAttribute("nonce"))&&jc.test(a)?a:"":""}
;function kc(a){for(var b=0,c=0;c<a.length;++c)b=31*b+a.charCodeAt(c)>>>0;return b}
;var lc=RegExp("^(?:([^:/?#.]+):)?(?://(?:([^\\\\/?#]*)@)?([^\\\\/?#]*?)(?::([0-9]+))?(?=[\\\\/?#]|$))?([^?#]+)?(?:\\?([^#]*))?(?:#([\\s\\S]*))?$");function mc(a){return a?decodeURI(a):a}
function nc(a,b){return b.match(lc)[a]||null}
function oc(a){return mc(nc(3,a))}
function pc(a){var b=a.match(lc);a=b[5];var c=b[6];b=b[7];var d="";a&&(d+=a);c&&(d+="?"+c);b&&(d+="#"+b);return d}
function qc(a,b){if(!b)return a;var c=a.indexOf("#");0>c&&(c=a.length);var d=a.indexOf("?");if(0>d||d>c){d=c;var e=""}else e=a.substring(d+1,c);a=[a.slice(0,d),e,a.slice(c)];c=a[1];a[1]=b?c?c+"&"+b:b:c;return a[0]+(a[1]?"?"+a[1]:"")+a[2]}
function rc(a,b,c){if(Array.isArray(b))for(var d=0;d<b.length;d++)rc(a,String(b[d]),c);else null!=b&&c.push(a+(""===b?"":"="+encodeURIComponent(String(b))))}
function sc(a,b){var c=[];for(b=b||0;b<a.length;b+=2)rc(a[b],a[b+1],c);return c.join("&")}
function tc(a){var b=[],c;for(c in a)rc(c,a[c],b);return b.join("&")}
function uc(a,b){var c=2==arguments.length?sc(arguments[1],0):sc(arguments,1);return qc(a,c)}
function vc(a,b){b=tc(b);return qc(a,b)}
function wc(a,b,c){c=null!=c?"="+encodeURIComponent(String(c)):"";return qc(a,b+c)}
function xc(a,b,c,d){for(var e=c.length;0<=(b=a.indexOf(c,b))&&b<d;){var f=a.charCodeAt(b-1);if(38==f||63==f)if(f=a.charCodeAt(b+e),!f||61==f||38==f||35==f)return b;b+=e+1}return-1}
var yc=/#|$/,Cc=/[?&]($|#)/;function Dc(a,b){for(var c=a.search(yc),d=0,e,f=[];0<=(e=xc(a,d,b,c));)f.push(a.substring(d,e)),d=Math.min(a.indexOf("&",e)+1||c,c);f.push(a.slice(d));return f.join("").replace(Cc,"$1")}
;var Ec={};function Fc(a){if(a!==Ec)throw Error("requires a valid immutable API token");}
;function Gc(){return C("iPhone")&&!C("iPod")&&!C("iPad")}
function Hc(){var a=Tb();if(C("Windows")){var b=/Windows (?:NT|Phone) ([0-9.]+)/;b.exec(a)}else Gc()||C("iPad")||C("iPod")?(b=/(?:iPhone|iPod|iPad|CPU)\s+OS\s+(\S+)/,(a=b.exec(a))&&a[1].replace(/_/g,".")):C("Macintosh")?(b=/Mac OS X ([0-9_.]+)/,(a=b.exec(a))&&a[1].replace(/_/g,".")):-1!=Tb().toLowerCase().indexOf("kaios")?(b=/(?:KaiOS)\/(\S+)/i,b.exec(a)):C("Android")?(b=/Android\s+([^\);]+)(\)|;)/,b.exec(a)):C("CrOS")&&(b=/(?:CrOS\s+(?:i686|x86_64)\s+([0-9.]+))/,b.exec(a))}
;function Ic(a){Ic[" "](a);return a}
Ic[" "]=function(){};
function Jc(a){var b=Kc;return Object.prototype.hasOwnProperty.call(b,9)?b[9]:b[9]=a(9)}
;var Lc=C("Opera"),Mc=Ub(),Nc=C("Edge"),Oc=C("Gecko")&&!(-1!=Tb().toLowerCase().indexOf("webkit")&&!C("Edge"))&&!(C("Trident")||C("MSIE"))&&!C("Edge"),Pc=-1!=Tb().toLowerCase().indexOf("webkit")&&!C("Edge"),Qc=C("Android");function Rc(){var a=y.document;return a?a.documentMode:void 0}
var Sc;a:{var Tc="",Uc=function(){var a=Tb();if(Oc)return/rv:([^\);]+)(\)|;)/.exec(a);if(Nc)return/Edge\/([\d\.]+)/.exec(a);if(Mc)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(Pc)return/WebKit\/(\S+)/.exec(a);if(Lc)return/(?:Version)[ \/]?(\S+)/.exec(a)}();
Uc&&(Tc=Uc?Uc[1]:"");if(Mc){var Vc=Rc();if(null!=Vc&&Vc>parseFloat(Tc)){Sc=String(Vc);break a}}Sc=Tc}var Wc=Sc,Kc={};
function Xc(){return Jc(function(){for(var a=0,b=Mb(String(Wc)).split("."),c=Mb("9").split("."),d=Math.max(b.length,c.length),e=0;0==a&&e<d;e++){var f=b[e]||"",g=c[e]||"";do{f=/(\d*)(\D*)(.*)/.exec(f)||["","","",""];g=/(\d*)(\D*)(.*)/.exec(g)||["","","",""];if(0==f[0].length&&0==g[0].length)break;a=Nb(0==f[1].length?0:parseInt(f[1],10),0==g[1].length?0:parseInt(g[1],10))||Nb(0==f[2].length,0==g[2].length)||Nb(f[2],g[2]);f=f[3];g=g[3]}while(0==a)}return 0<=a})}
var Yc;if(y.document&&Mc){var Zc=Rc();Yc=Zc?Zc:parseInt(Wc,10)||void 0}else Yc=void 0;var $c=Yc;var ad=Gc()||C("iPod"),bd=C("iPad");Yb();Xb();var cd=Wb()&&!(Gc()||C("iPad")||C("iPod"));var dd={},ed=null;
function fd(a,b){Sa(a);void 0===b&&(b=0);if(!ed){ed={};for(var c="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".split(""),d=["+/=","+/","-_=","-_.","-_"],e=0;5>e;e++){var f=c.concat(d[e].split(""));dd[e]=f;for(var g=0;g<f.length;g++){var h=f[g];void 0===ed[h]&&(ed[h]=g)}}}b=dd[b];c=Array(Math.floor(a.length/3));d=b[64]||"";for(e=f=0;f<a.length-2;f+=3){var k=a[f],m=a[f+1];h=a[f+2];g=b[k>>2];k=b[(k&3)<<4|m>>4];m=b[(m&15)<<2|h>>6];h=b[h&63];c[e++]=""+g+k+m+h}g=0;h=d;switch(a.length-
f){case 2:g=a[f+1],h=b[(g&15)<<2]||d;case 1:a=a[f],c[e]=""+b[a>>2]+b[(a&3)<<4|g>>4]+h+d}return c.join("")}
;var gd="undefined"!==typeof Uint8Array,hd={};var id;function jd(){if(hd!==hd)throw Error("illegal external caller");}
function kd(a){jd();this.ja=a;if(null!=a&&0===a.length)throw Error("ByteString should be constructed with non-empty values");}
kd.prototype.isEmpty=function(){return null==this.ja};var ld="function"===typeof Symbol&&"symbol"===typeof Symbol()?Symbol(void 0):void 0;function md(a,b){Object.isFrozen(a)||(ld?a[ld]|=b:void 0!==a.ta?a.ta|=b:Object.defineProperties(a,{ta:{value:b,configurable:!0,writable:!0,enumerable:!1}}))}
function nd(a){var b;ld?b=a[ld]:b=a.ta;return null==b?0:b}
function od(a){return Array.isArray(a)?!!(nd(a)&1):!1}
function pd(a){md(a,1);return a}
function qd(a){return Array.isArray(a)?!!(nd(a)&2):!1}
function rd(a){if(!Array.isArray(a))throw Error("cannot mark non-array as immutable");md(a,2)}
function sd(a,b){if(!Array.isArray(a))throw Error("cannot mark non-array as mutable");b?md(a,8):Object.isFrozen(a)||(ld?a[ld]&=-9:void 0!==a.ta&&(a.ta&=-9))}
;function td(a){return qd(a.I)}
function ud(a){return null!==a&&"object"===typeof a&&!Array.isArray(a)&&a.constructor===Object}
var Ad,Bd=Object.freeze(pd([]));function Cd(a){if(td(a))throw Error("Cannot mutate an immutable Message");}
var Dd="undefined"!=typeof Symbol&&"undefined"!=typeof Symbol.hasInstance;function Ed(a){return{value:a,configurable:!1,writable:!1,enumerable:!1}}
;function Fd(a){return a.displayName||a.name||"unknown type name"}
function Gd(a,b){if(!(a instanceof b))throw Error("Expected instanceof "+Fd(b)+" but got "+(a&&Fd(a.constructor)));return a}
function Hd(a,b,c){c=void 0===c?!1:c;if(Array.isArray(a))return new b(a);if(c)return new b}
;function Id(a){switch(typeof a){case "number":return isFinite(a)?a:String(a);case "object":if(a&&!Array.isArray(a)){if(gd&&null!=a&&a instanceof Uint8Array)return fd(a);if(a instanceof kd){var b=a.ja;null!=b&&"string"!==typeof b&&(gd&&b instanceof Uint8Array?b=fd(b):(Ra(b),b=null));return null==b?"":a.ja=b}}}return a}
;function Jd(a,b){b=void 0===b?Kd:b;return Ld(a,b)}
function Md(a,b){if(null!=a){if(Array.isArray(a))a=Ld(a,b);else if(ud(a)){var c={},d;for(d in a)c[d]=Md(a[d],b);a=c}else a=b(a);return a}}
function Ld(a,b){for(var c=a.slice(),d=0;d<c.length;d++)c[d]=Md(c[d],b);od(a)&&pd(c);return c}
function Nd(a){if(a&&"object"==typeof a&&a.toJSON)return a.toJSON();a=Id(a);return Array.isArray(a)?Jd(a,Nd):a}
function Kd(a){return gd&&null!=a&&a instanceof Uint8Array?new Uint8Array(a):a}
;function Od(a){return a.j||(a.j=a.I[a.l+a.ra]={})}
function Pd(a,b,c){return-1===b?null:b>=a.l?a.j?a.j[b]:void 0:(void 0===c?0:c)&&a.j&&(c=a.j[b],null!=c)?c:a.I[b+a.ra]}
function D(a,b,c,d,e){d=void 0===d?!1:d;(void 0===e?0:e)||Cd(a);b<a.l&&!d?(a.I[b+a.ra]=c,void 0!==a.j&&b in a.j&&delete a.j[b]):Od(a)[b]=c;return a}
function Qd(a,b,c,d){c=void 0===c?!0:c;var e=Pd(a,b,d);Array.isArray(e)||(e=Bd);if(td(a))c&&(rd(e),Object.freeze(e));else if(e===Bd||qd(e))e=pd(e.slice()),D(a,b,e,d);return e}
function Rd(a,b,c){a=Pd(a,b);return null==a?c:a}
function Sd(a,b,c){null==c?c=Bd:pd(c);return D(a,b,c)}
function Td(a,b,c,d){Cd(a);(c=Ud(a,c))&&c!==b&&null!=d&&(a.i&&c in a.i&&(a.i[c]=void 0),D(a,c));return D(a,b,d)}
function Ud(a,b){for(var c=0,d=0;d<b.length;d++){var e=b[d];null!=Pd(a,e)&&(0!==c&&D(a,c,void 0,!1,!0),c=e)}return c}
function Vd(a,b,c,d,e){e=void 0===e?!1:e;var f=e;if(-1===c)d=null;else{a.i||(a.i={});var g=a.i[c];if(g)d=g;else{var h=Pd(a,c,f);b=Hd(h,b,d);void 0==b?d=g:(d&&b.I!==h&&D(a,c,b.I,f,!0),a.i[c]=b,td(a)&&rd(b.I),d=b)}}if(null==d)return d;td(d)&&!td(a)&&(d=d.Bb(Ec),D(a,c,d.I,e),a.i[c]=d);return d}
function Wd(a,b,c,d,e){e=void 0===e?!0:e;a.i||(a.i={});var f=td(a),g=a.i[c];d=Qd(a,c,!0,d);var h=f||qd(d);if(!g){g=[];f=f||h;for(var k=0;k<d.length;k++){var m=d[k];f=f||qd(m);m=Hd(m,b);void 0!==m&&(g.push(m),h&&rd(m.I))}a.i[c]=g;sd(d,!f)}b=h||e;e=qd(g);b&&!e&&(Object.isFrozen(g)&&(a.i[c]=g=g.slice()),rd(g),Object.freeze(g));!b&&e&&(a.i[c]=g=g.slice());return g}
function Xd(a,b,c,d){d=void 0===d?!1:d;var e=td(a);b=Wd(a,b,c,d,e);a=Qd(a,c,d);if(!(c=e)&&(c=a)){if(!Array.isArray(a))throw Error("cannot check mutability state of non-array");c=!(nd(a)&8)}if(c){for(c=0;c<b.length;c++)(d=b[c])&&td(d)&&!e&&(b[c]=b[c].Bb(Ec),a[c]=b[c].I);sd(a,!0)}return b}
function G(a,b,c,d){Cd(a);a.i||(a.i={});b=null!=d?Gd(d,b).I:d;a.i[c]=d;return D(a,c,b)}
function Yd(a,b,c,d,e){Cd(a);a.i||(a.i={});b=null!=e?Gd(e,b).I:e;a.i[c]=e;Td(a,c,d,b)}
function Zd(a,b,c,d){Cd(a);if(null!=d){var e=pd([]);for(var f=!1,g=0;g<d.length;g++)e[g]=Gd(d[g],b).I,f=f||qd(e[g]);a.i||(a.i={});a.i[c]=d;sd(e,!f)}else a.i&&(a.i[c]=void 0),e=Bd;return D(a,c,e)}
function $d(a,b,c,d){Cd(a);var e=Wd(a,c,b,void 0,!1);c=null!=d?Gd(d,c):new c;a=Qd(a,b);e.push(c);a.push(c.I);Fc(Ec);td(c)&&sd(a,!1)}
;function ae(a,b,c){a||(a=be);be=null;var d=this.constructor.j;a||(a=d?[d]:[]);this.ra=(d?0:-1)-(this.constructor.i||0);this.i=void 0;this.I=a;a:{d=this.I.length;a=d-1;if(d&&(d=this.I[a],ud(d))){this.l=a-this.ra;this.j=d;break a}void 0!==b&&-1<b?(this.l=Math.max(b,a+1-this.ra),this.j=void 0):this.l=Number.MAX_VALUE}if(c)for(b=0;b<c.length;b++)if(a=c[b],a<this.l)a+=this.ra,(d=this.I[a])?Array.isArray(d)&&pd(d):this.I[a]=Bd;else{d=Od(this);var e=d[a];e?Array.isArray(e)&&pd(e):d[a]=Bd}}
ae.prototype.toJSON=function(){var a=this.I;return Ad?a:Jd(a,Nd)};
function ce(a){Ad=!0;try{return JSON.stringify(a.toJSON(),de)}finally{Ad=!1}}
ae.prototype.clone=function(){var a=Jd(this.I);be=a;a=new this.constructor(a);be=null;ee(a,this);return a};
ae.prototype.isMutable=function(a){Fc(a);return!td(this)};
ae.prototype.toString=function(){return this.I.toString()};
function de(a,b){return Id(b)}
function ee(a,b){b.Ha&&(a.Ha=b.Ha.slice());var c=b.i;if(c){b=b.j;for(var d in c){var e=c[d];if(e){var f=!(!b||!b[d]),g=+d;if(Array.isArray(e)){if(e.length)for(f=Xd(a,e[0].constructor,g,f),g=0;g<Math.min(f.length,e.length);g++)ee(f[g],e[g])}else(f=Vd(a,e.constructor,g,void 0,f))&&ee(f,e)}}}}
var be;function fe(){ae.apply(this,arguments)}
r(fe,ae);fe.prototype.Bb=function(){return this};
if(Dd){var ge={};Object.defineProperties(fe,(ge[Symbol.hasInstance]=Ed(function(){throw Error("Cannot perform instanceof checks for MutableMessage");}),ge))};function he(a){var b=this.i,c=this.j;return this.isRepeated?Xd(a,b,c,!0):Vd(a,b,c,void 0,!0)}
;function ie(a,b,c,d,e,f){(a=a.i&&a.i[c])?Array.isArray(a)?(e=f.kb?pd(a.slice()):a,Zd(b,0<e.length?e[0].constructor:void 0,c,e)):G(b,a.constructor,c,a):(gd&&d instanceof Uint8Array?e=d.length?new kd(new Uint8Array(d)):id||(id=new kd(null)):(Array.isArray(d)&&(e?rd(d):od(d)&&f.kb&&(d=d.slice())),e=d),D(b,c,e))}
;function I(){fe.apply(this,arguments)}
r(I,fe);I.prototype.Bb=function(a){Fc(a);if(td(this)){a={kb:!0};var b=td(this);if(b&&!a.kb)throw Error("copyRepeatedFields must be true for frozen messages");var c=new this.constructor;this.Ha&&(c.Ha=this.Ha.slice());for(var d=this.I,e=0;e<d.length;e++){var f=d[e];if(e===d.length-1&&ud(f))for(h in f){var g=+h;Number.isNaN(g)?Od(c)[h]=f[h]:ie(this,c,g,f[h],b,a)}else ie(this,c,e-this.ra,f,b,a)}var h=c}else h=this;return h};
if(Dd){var je={};Object.defineProperties(I,(je[Symbol.hasInstance]=Ed(Object[Symbol.hasInstance]),je))};function ke(a){this.Kb=a}
;function le(a,b,c){this.j=a;this.m=b;this.i=c||[];this.xa=new Map}
l=le.prototype;l.vc=function(a){var b=Ma.apply(1,arguments),c=this.nb(b);c?c.push(new ke(a)):this.jc(a,b)};
l.jc=function(a){this.xa.set(this.Rb(Ma.apply(1,arguments)),[new ke(a)])};
l.nb=function(){var a=this.Rb(Ma.apply(0,arguments));return this.xa.has(a)?this.xa.get(a):void 0};
l.Ic=function(){var a=this.nb(Ma.apply(0,arguments));return a&&a.length?a[0]:void 0};
l.clear=function(){this.xa.clear()};
l.Rb=function(){var a=Ma.apply(0,arguments);return a?a.join(","):"key"};function me(a,b){le.call(this,a,3,b)}
r(me,le);me.prototype.l=function(a){var b=Ma.apply(1,arguments),c=0,d=this.Ic(b);d&&(c=d.Kb);this.jc(c+a,b)};function ne(a,b){le.call(this,a,2,b)}
r(ne,le);ne.prototype.l=function(a){this.vc(a,Ma.apply(1,arguments))};function oe(a){a&&"function"==typeof a.dispose&&a.dispose()}
;function pe(a){for(var b=0,c=arguments.length;b<c;++b){var d=arguments[b];Sa(d)?pe.apply(null,d):oe(d)}}
;function J(){this.N=this.N;this.B=this.B}
J.prototype.N=!1;J.prototype.i=function(){return this.N};
J.prototype.dispose=function(){this.N||(this.N=!0,this.C())};
function qe(a,b){re(a,$a(oe,b))}
function re(a,b){a.N?b():(a.B||(a.B=[]),a.B.push(b))}
J.prototype.C=function(){if(this.B)for(;this.B.length;)this.B.shift()()};function se(a,b){this.type=a;this.i=this.target=b;this.defaultPrevented=this.l=!1}
se.prototype.stopPropagation=function(){this.l=!0};
se.prototype.preventDefault=function(){this.defaultPrevented=!0};function te(a){var b=B("window.location.href");null==a&&(a='Unknown Error of type "null/undefined"');if("string"===typeof a)return{message:a,name:"Unknown error",lineNumber:"Not available",fileName:b,stack:"Not available"};var c=!1;try{var d=a.lineNumber||a.line||"Not available"}catch(g){d="Not available",c=!0}try{var e=a.fileName||a.filename||a.sourceURL||y.$googDebugFname||b}catch(g){e="Not available",c=!0}b=ue(a);if(!(!c&&a.lineNumber&&a.fileName&&a.stack&&a.message&&a.name)){c=a.message;if(null==
c){if(a.constructor&&a.constructor instanceof Function){if(a.constructor.name)c=a.constructor.name;else if(c=a.constructor,ve[c])c=ve[c];else{c=String(c);if(!ve[c]){var f=/function\s+([^\(]+)/m.exec(c);ve[c]=f?f[1]:"[Anonymous]"}c=ve[c]}c='Unknown Error of type "'+c+'"'}else c="Unknown Error of unknown type";"function"===typeof a.toString&&Object.prototype.toString!==a.toString&&(c+=": "+a.toString())}return{message:c,name:a.name||"UnknownError",lineNumber:d,fileName:e,stack:b||"Not available"}}a.stack=
b;return{message:a.message,name:a.name,lineNumber:a.lineNumber,fileName:a.fileName,stack:a.stack}}
function ue(a,b){b||(b={});b[we(a)]=!0;var c=a.stack||"";(a=a.cause)&&!b[we(a)]&&(c+="\nCaused by: ",a.stack&&0==a.stack.indexOf(a.toString())||(c+="string"===typeof a?a:a.message+"\n"),c+=ue(a,b));return c}
function we(a){var b="";"function"===typeof a.toString&&(b=""+a);return b+a.stack}
var ve={};var xe=function(){if(!y.addEventListener||!Object.defineProperty)return!1;var a=!1,b=Object.defineProperty({},"passive",{get:function(){a=!0}});
try{y.addEventListener("test",function(){},b),y.removeEventListener("test",function(){},b)}catch(c){}return a}();function ye(a,b){se.call(this,a?a.type:"");this.relatedTarget=this.i=this.target=null;this.button=this.screenY=this.screenX=this.clientY=this.clientX=0;this.key="";this.charCode=this.keyCode=0;this.metaKey=this.shiftKey=this.altKey=this.ctrlKey=!1;this.state=null;this.pointerId=0;this.pointerType="";this.j=null;a&&this.init(a,b)}
ab(ye,se);var ze={2:"touch",3:"pen",4:"mouse"};
ye.prototype.init=function(a,b){var c=this.type=a.type,d=a.changedTouches&&a.changedTouches.length?a.changedTouches[0]:null;this.target=a.target||a.srcElement;this.i=b;if(b=a.relatedTarget){if(Oc){a:{try{Ic(b.nodeName);var e=!0;break a}catch(f){}e=!1}e||(b=null)}}else"mouseover"==c?b=a.fromElement:"mouseout"==c&&(b=a.toElement);this.relatedTarget=b;d?(this.clientX=void 0!==d.clientX?d.clientX:d.pageX,this.clientY=void 0!==d.clientY?d.clientY:d.pageY,this.screenX=d.screenX||0,this.screenY=d.screenY||
0):(this.clientX=void 0!==a.clientX?a.clientX:a.pageX,this.clientY=void 0!==a.clientY?a.clientY:a.pageY,this.screenX=a.screenX||0,this.screenY=a.screenY||0);this.button=a.button;this.keyCode=a.keyCode||0;this.key=a.key||"";this.charCode=a.charCode||("keypress"==c?a.keyCode:0);this.ctrlKey=a.ctrlKey;this.altKey=a.altKey;this.shiftKey=a.shiftKey;this.metaKey=a.metaKey;this.pointerId=a.pointerId||0;this.pointerType="string"===typeof a.pointerType?a.pointerType:ze[a.pointerType]||"";this.state=a.state;
this.j=a;a.defaultPrevented&&ye.Y.preventDefault.call(this)};
ye.prototype.stopPropagation=function(){ye.Y.stopPropagation.call(this);this.j.stopPropagation?this.j.stopPropagation():this.j.cancelBubble=!0};
ye.prototype.preventDefault=function(){ye.Y.preventDefault.call(this);var a=this.j;a.preventDefault?a.preventDefault():a.returnValue=!1};var Ae="closure_listenable_"+(1E6*Math.random()|0);var Be=0;function Ce(a,b,c,d,e){this.listener=a;this.proxy=null;this.src=b;this.type=c;this.capture=!!d;this.Ya=e;this.key=++Be;this.Ja=this.Ta=!1}
function De(a){a.Ja=!0;a.listener=null;a.proxy=null;a.src=null;a.Ya=null}
;function Ee(a){this.src=a;this.listeners={};this.i=0}
Ee.prototype.add=function(a,b,c,d,e){var f=a.toString();a=this.listeners[f];a||(a=this.listeners[f]=[],this.i++);var g=Ie(a,b,d,e);-1<g?(b=a[g],c||(b.Ta=!1)):(b=new Ce(b,this.src,f,!!d,e),b.Ta=c,a.push(b));return b};
Ee.prototype.remove=function(a,b,c,d){a=a.toString();if(!(a in this.listeners))return!1;var e=this.listeners[a];b=Ie(e,b,c,d);return-1<b?(De(e[b]),Array.prototype.splice.call(e,b,1),0==e.length&&(delete this.listeners[a],this.i--),!0):!1};
function Je(a,b){var c=b.type;c in a.listeners&&mb(a.listeners[c],b)&&(De(b),0==a.listeners[c].length&&(delete a.listeners[c],a.i--))}
function Ie(a,b,c,d){for(var e=0;e<a.length;++e){var f=a[e];if(!f.Ja&&f.listener==b&&f.capture==!!c&&f.Ya==d)return e}return-1}
;var Ke="closure_lm_"+(1E6*Math.random()|0),Le={},Me=0;function Ne(a,b,c,d,e){if(d&&d.once)Oe(a,b,c,d,e);else if(Array.isArray(b))for(var f=0;f<b.length;f++)Ne(a,b[f],c,d,e);else c=Pe(c),a&&a[Ae]?a.aa(b,c,Ta(d)?!!d.capture:!!d,e):Qe(a,b,c,!1,d,e)}
function Qe(a,b,c,d,e,f){if(!b)throw Error("Invalid event type");var g=Ta(e)?!!e.capture:!!e,h=Re(a);h||(a[Ke]=h=new Ee(a));c=h.add(b,c,d,g,f);if(!c.proxy){d=Se();c.proxy=d;d.src=a;d.listener=c;if(a.addEventListener)xe||(e=g),void 0===e&&(e=!1),a.addEventListener(b.toString(),d,e);else if(a.attachEvent)a.attachEvent(Te(b.toString()),d);else if(a.addListener&&a.removeListener)a.addListener(d);else throw Error("addEventListener and attachEvent are unavailable.");Me++}}
function Se(){function a(c){return b.call(a.src,a.listener,c)}
var b=Ue;return a}
function Oe(a,b,c,d,e){if(Array.isArray(b))for(var f=0;f<b.length;f++)Oe(a,b[f],c,d,e);else c=Pe(c),a&&a[Ae]?a.m.add(String(b),c,!0,Ta(d)?!!d.capture:!!d,e):Qe(a,b,c,!0,d,e)}
function Ve(a,b,c,d,e){if(Array.isArray(b))for(var f=0;f<b.length;f++)Ve(a,b[f],c,d,e);else(d=Ta(d)?!!d.capture:!!d,c=Pe(c),a&&a[Ae])?a.m.remove(String(b),c,d,e):a&&(a=Re(a))&&(b=a.listeners[b.toString()],a=-1,b&&(a=Ie(b,c,d,e)),(c=-1<a?b[a]:null)&&We(c))}
function We(a){if("number"!==typeof a&&a&&!a.Ja){var b=a.src;if(b&&b[Ae])Je(b.m,a);else{var c=a.type,d=a.proxy;b.removeEventListener?b.removeEventListener(c,d,a.capture):b.detachEvent?b.detachEvent(Te(c),d):b.addListener&&b.removeListener&&b.removeListener(d);Me--;(c=Re(b))?(Je(c,a),0==c.i&&(c.src=null,b[Ke]=null)):De(a)}}}
function Te(a){return a in Le?Le[a]:Le[a]="on"+a}
function Ue(a,b){if(a.Ja)a=!0;else{b=new ye(b,this);var c=a.listener,d=a.Ya||a.src;a.Ta&&We(a);a=c.call(d,b)}return a}
function Re(a){a=a[Ke];return a instanceof Ee?a:null}
var Xe="__closure_events_fn_"+(1E9*Math.random()>>>0);function Pe(a){if("function"===typeof a)return a;a[Xe]||(a[Xe]=function(b){return a.handleEvent(b)});
return a[Xe]}
;function K(){J.call(this);this.m=new Ee(this);this.sc=this;this.ka=null}
ab(K,J);K.prototype[Ae]=!0;K.prototype.addEventListener=function(a,b,c,d){Ne(this,a,b,c,d)};
K.prototype.removeEventListener=function(a,b,c,d){Ve(this,a,b,c,d)};
function Ye(a,b){var c=a.ka;if(c){var d=[];for(var e=1;c;c=c.ka)d.push(c),++e}a=a.sc;c=b.type||b;"string"===typeof b?b=new se(b,a):b instanceof se?b.target=b.target||a:(e=b,b=new se(c,a),yb(b,e));e=!0;if(d)for(var f=d.length-1;!b.l&&0<=f;f--){var g=b.i=d[f];e=Ze(g,c,!0,b)&&e}b.l||(g=b.i=a,e=Ze(g,c,!0,b)&&e,b.l||(e=Ze(g,c,!1,b)&&e));if(d)for(f=0;!b.l&&f<d.length;f++)g=b.i=d[f],e=Ze(g,c,!1,b)&&e}
K.prototype.C=function(){K.Y.C.call(this);if(this.m){var a=this.m,b=0,c;for(c in a.listeners){for(var d=a.listeners[c],e=0;e<d.length;e++)++b,De(d[e]);delete a.listeners[c];a.i--}}this.ka=null};
K.prototype.aa=function(a,b,c,d){return this.m.add(String(a),b,!1,c,d)};
function Ze(a,b,c,d){b=a.m.listeners[String(b)];if(!b)return!0;b=b.concat();for(var e=!0,f=0;f<b.length;++f){var g=b[f];if(g&&!g.Ja&&g.capture==c){var h=g.listener,k=g.Ya||g.src;g.Ta&&Je(a.m,g);e=!1!==h.call(k,d)&&e}}return e&&!d.defaultPrevented}
;function $e(a,b){this.l=a;this.m=b;this.j=0;this.i=null}
$e.prototype.get=function(){if(0<this.j){this.j--;var a=this.i;this.i=a.next;a.next=null}else a=this.l();return a};
function af(a,b){a.m(b);100>a.j&&(a.j++,b.next=a.i,a.i=b)}
;function bf(a,b){return a+Math.random()*(b-a)}
;function cf(a,b){this.x=void 0!==a?a:0;this.y=void 0!==b?b:0}
l=cf.prototype;l.clone=function(){return new cf(this.x,this.y)};
l.equals=function(a){return a instanceof cf&&(this==a?!0:this&&a?this.x==a.x&&this.y==a.y:!1)};
l.ceil=function(){this.x=Math.ceil(this.x);this.y=Math.ceil(this.y);return this};
l.floor=function(){this.x=Math.floor(this.x);this.y=Math.floor(this.y);return this};
l.round=function(){this.x=Math.round(this.x);this.y=Math.round(this.y);return this};
l.scale=function(a,b){this.x*=a;this.y*="number"===typeof b?b:a;return this};function df(a,b){this.width=a;this.height=b}
l=df.prototype;l.clone=function(){return new df(this.width,this.height)};
l.aspectRatio=function(){return this.width/this.height};
l.isEmpty=function(){return!(this.width*this.height)};
l.ceil=function(){this.width=Math.ceil(this.width);this.height=Math.ceil(this.height);return this};
l.floor=function(){this.width=Math.floor(this.width);this.height=Math.floor(this.height);return this};
l.round=function(){this.width=Math.round(this.width);this.height=Math.round(this.height);return this};
l.scale=function(a,b){this.width*=a;this.height*="number"===typeof b?b:a;return this};function ef(a){var b=document;return"string"===typeof a?b.getElementById(a):a}
function ff(a){var b=document;a=String(a);"application/xhtml+xml"===b.contentType&&(a=a.toLowerCase());return b.createElement(a)}
function gf(a,b){for(var c=0;a;){if(b(a))return a;a=a.parentNode;c++}return null}
;var hf;function jf(){var a=y.MessageChannel;"undefined"===typeof a&&"undefined"!==typeof window&&window.postMessage&&window.addEventListener&&!C("Presto")&&(a=function(){var e=ff("IFRAME");e.style.display="none";document.documentElement.appendChild(e);var f=e.contentWindow;e=f.document;e.open();e.close();var g="callImmediate"+Math.random(),h="file:"==f.location.protocol?"*":f.location.protocol+"//"+f.location.host;e=Za(function(k){if(("*"==h||k.origin==h)&&k.data==g)this.port1.onmessage()},this);
f.addEventListener("message",e,!1);this.port1={};this.port2={postMessage:function(){f.postMessage(g,h)}}});
if("undefined"!==typeof a&&!Ub()){var b=new a,c={},d=c;b.port1.onmessage=function(){if(void 0!==c.next){c=c.next;var e=c.Jb;c.Jb=null;e()}};
return function(e){d.next={Jb:e};d=d.next;b.port2.postMessage(0)}}return function(e){y.setTimeout(e,0)}}
;function kf(a){y.setTimeout(function(){throw a;},0)}
;function lf(){this.j=this.i=null}
lf.prototype.add=function(a,b){var c=mf.get();c.set(a,b);this.j?this.j.next=c:this.i=c;this.j=c};
lf.prototype.remove=function(){var a=null;this.i&&(a=this.i,this.i=this.i.next,this.i||(this.j=null),a.next=null);return a};
var mf=new $e(function(){return new nf},function(a){return a.reset()});
function nf(){this.next=this.scope=this.i=null}
nf.prototype.set=function(a,b){this.i=a;this.scope=b;this.next=null};
nf.prototype.reset=function(){this.next=this.scope=this.i=null};var of,pf=!1,qf=new lf;function rf(a,b){of||sf();pf||(of(),pf=!0);qf.add(a,b)}
function sf(){if(y.Promise&&y.Promise.resolve){var a=y.Promise.resolve(void 0);of=function(){a.then(tf)}}else of=function(){var b=tf;
"function"!==typeof y.setImmediate||y.Window&&y.Window.prototype&&!C("Edge")&&y.Window.prototype.setImmediate==y.setImmediate?(hf||(hf=jf()),hf(b)):y.setImmediate(b)}}
function tf(){for(var a;a=qf.remove();){try{a.i.call(a.scope)}catch(b){kf(b)}af(mf,a)}pf=!1}
;function uf(a){this.i=0;this.B=void 0;this.m=this.j=this.l=null;this.o=this.s=!1;if(a!=eb)try{var b=this;a.call(void 0,function(c){vf(b,2,c)},function(c){vf(b,3,c)})}catch(c){vf(this,3,c)}}
function wf(){this.next=this.context=this.onRejected=this.j=this.i=null;this.l=!1}
wf.prototype.reset=function(){this.context=this.onRejected=this.j=this.i=null;this.l=!1};
var xf=new $e(function(){return new wf},function(a){a.reset()});
function yf(a,b,c){var d=xf.get();d.j=a;d.onRejected=b;d.context=c;return d}
function zf(a){return new uf(function(b,c){c(a)})}
uf.prototype.then=function(a,b,c){return Af(this,"function"===typeof a?a:null,"function"===typeof b?b:null,c)};
uf.prototype.$goog_Thenable=!0;l=uf.prototype;l.gb=function(a,b){return Af(this,null,a,b)};
l.catch=uf.prototype.gb;l.cancel=function(a){if(0==this.i){var b=new Bf(a);rf(function(){Cf(this,b)},this)}};
function Cf(a,b){if(0==a.i)if(a.l){var c=a.l;if(c.j){for(var d=0,e=null,f=null,g=c.j;g&&(g.l||(d++,g.i==a&&(e=g),!(e&&1<d)));g=g.next)e||(f=g);e&&(0==c.i&&1==d?Cf(c,b):(f?(d=f,d.next==c.m&&(c.m=d),d.next=d.next.next):Df(c),Ef(c,e,3,b)))}a.l=null}else vf(a,3,b)}
function Ff(a,b){a.j||2!=a.i&&3!=a.i||Gf(a);a.m?a.m.next=b:a.j=b;a.m=b}
function Af(a,b,c,d){var e=yf(null,null,null);e.i=new uf(function(f,g){e.j=b?function(h){try{var k=b.call(d,h);f(k)}catch(m){g(m)}}:f;
e.onRejected=c?function(h){try{var k=c.call(d,h);void 0===k&&h instanceof Bf?g(h):f(k)}catch(m){g(m)}}:g});
e.i.l=a;Ff(a,e);return e.i}
l.qd=function(a){this.i=0;vf(this,2,a)};
l.rd=function(a){this.i=0;vf(this,3,a)};
function vf(a,b,c){if(0==a.i){a===c&&(b=3,c=new TypeError("Promise cannot resolve to itself"));a.i=1;a:{var d=c,e=a.qd,f=a.rd;if(d instanceof uf){Ff(d,yf(e||eb,f||null,a));var g=!0}else{if(d)try{var h=!!d.$goog_Thenable}catch(m){h=!1}else h=!1;if(h)d.then(e,f,a),g=!0;else{if(Ta(d))try{var k=d.then;if("function"===typeof k){Hf(d,k,e,f,a);g=!0;break a}}catch(m){f.call(a,m);g=!0;break a}g=!1}}}g||(a.B=c,a.i=b,a.l=null,Gf(a),3!=b||c instanceof Bf||If(a,c))}}
function Hf(a,b,c,d,e){function f(k){h||(h=!0,d.call(e,k))}
function g(k){h||(h=!0,c.call(e,k))}
var h=!1;try{b.call(a,g,f)}catch(k){f(k)}}
function Gf(a){a.s||(a.s=!0,rf(a.Gc,a))}
function Df(a){var b=null;a.j&&(b=a.j,a.j=b.next,b.next=null);a.j||(a.m=null);return b}
l.Gc=function(){for(var a;a=Df(this);)Ef(this,a,this.i,this.B);this.s=!1};
function Ef(a,b,c,d){if(3==c&&b.onRejected&&!b.l)for(;a&&a.o;a=a.l)a.o=!1;if(b.i)b.i.l=null,Jf(b,c,d);else try{b.l?b.j.call(b.context):Jf(b,c,d)}catch(e){Kf.call(null,e)}af(xf,b)}
function Jf(a,b,c){2==b?a.j.call(a.context,c):a.onRejected&&a.onRejected.call(a.context,c)}
function If(a,b){a.o=!0;rf(function(){a.o&&Kf.call(null,b)})}
var Kf=kf;function Bf(a){cb.call(this,a)}
ab(Bf,cb);Bf.prototype.name="cancel";function Lf(a,b){K.call(this);this.l=a||1;this.j=b||y;this.o=Za(this.od,this);this.s=Date.now()}
ab(Lf,K);l=Lf.prototype;l.enabled=!1;l.ca=null;function Mf(a,b){a.l=b;a.ca&&a.enabled?(a.stop(),a.start()):a.ca&&a.stop()}
l.od=function(){if(this.enabled){var a=Date.now()-this.s;0<a&&a<.8*this.l?this.ca=this.j.setTimeout(this.o,this.l-a):(this.ca&&(this.j.clearTimeout(this.ca),this.ca=null),Ye(this,"tick"),this.enabled&&(this.stop(),this.start()))}};
l.start=function(){this.enabled=!0;this.ca||(this.ca=this.j.setTimeout(this.o,this.l),this.s=Date.now())};
l.stop=function(){this.enabled=!1;this.ca&&(this.j.clearTimeout(this.ca),this.ca=null)};
l.C=function(){Lf.Y.C.call(this);this.stop();delete this.j};
function Nf(a,b,c){if("function"===typeof a)c&&(a=Za(a,c));else if(a&&"function"==typeof a.handleEvent)a=Za(a.handleEvent,a);else throw Error("Invalid listener argument");return 2147483647<Number(b)?-1:y.setTimeout(a,b||0)}
;function Of(a){this.B=a;this.i=new Map;this.s=new Set;this.l=0;this.m=100;this.flushInterval=3E4;this.j=new Lf(this.flushInterval);this.j.aa("tick",this.ib,!1,this);this.o=!1}
l=Of.prototype;l.hc=function(a){this.o=a;this.m=1};
function Pf(a){a.j.enabled||a.j.start();a.l++;a.l>=a.m&&a.ib()}
l.ib=function(){var a=this.i.values();a=[].concat(ia(a)).filter(function(b){return b.xa.size});
a.length&&this.B.flush(a,this.o);Qf(a);this.l=0;this.j.enabled&&this.j.stop()};
l.wc=function(a){var b=Ma.apply(1,arguments);this.i.has(a)||this.i.set(a,new me(a,b))};
l.Hb=function(a){var b=Ma.apply(1,arguments);this.i.has(a)||this.i.set(a,new ne(a,b))};
function Rf(a,b){return a.s.has(b)?void 0:a.i.get(b)}
l.Cb=function(a){this.pc.apply(this,[a,1].concat(ia(Ma.apply(1,arguments))))};
l.pc=function(a,b){var c=Ma.apply(2,arguments),d=Rf(this,a);d&&d instanceof me&&(d.l(b,c),Pf(this))};
l.hb=function(a,b){var c=Ma.apply(2,arguments),d=Rf(this,a);d&&d instanceof ne&&(d.l(b,c),Pf(this))};
function Qf(a){for(var b=0;b<a.length;b++)a[b].clear()}
;function Sf(a){this.i=a;this.i.Hb("/client_streamz/bg/fil",{mb:3,lb:"rk"})}
function Tf(a){this.i=a;this.i.wc("/client_streamz/bg/fsc",{mb:3,lb:"rk"})}
function Uf(a){this.i=a;this.i.Hb("/client_streamz/bg/fsl",{mb:3,lb:"rk"})}
;function Vf(a){I.call(this,a,-1,Wf)}
r(Vf,I);function Xf(a){I.call(this,a,-1,Yf)}
r(Xf,I);function Zf(a){I.call(this,a)}
r(Zf,I);function $f(a){I.call(this,a)}
r($f,I);var Wf=[3,6,4],Yf=[1],ag=[1,2,3],bg=[1,2,3];function cg(a){I.call(this,a,-1,dg)}
r(cg,I);var dg=[1];function eg(a){if(!a)return"";if(/^about:(?:blank|srcdoc)$/.test(a))return window.origin||"";a=a.split("#")[0].split("?")[0];a=a.toLowerCase();0==a.indexOf("//")&&(a=window.location.protocol+a);/^[\w\-]*:\/\//.test(a)||(a=window.location.href);var b=a.substring(a.indexOf("://")+3),c=b.indexOf("/");-1!=c&&(b=b.substring(0,c));c=a.substring(0,a.indexOf("://"));if(!c)throw Error("URI is missing protocol: "+a);if("http"!==c&&"https"!==c&&"chrome-extension"!==c&&"moz-extension"!==c&&"file"!==c&&"android-app"!==
c&&"chrome-search"!==c&&"chrome-untrusted"!==c&&"chrome"!==c&&"app"!==c&&"devtools"!==c)throw Error("Invalid URI scheme in origin: "+c);a="";var d=b.indexOf(":");if(-1!=d){var e=b.substring(d+1);b=b.substring(0,d);if("http"===c&&"80"!==e||"https"===c&&"443"!==e)a=":"+e}return c+"://"+b+a}
;function fg(){function a(){e[0]=1732584193;e[1]=4023233417;e[2]=2562383102;e[3]=271733878;e[4]=3285377520;q=m=0}
function b(t){for(var x=g,u=0;64>u;u+=4)x[u/4]=t[u]<<24|t[u+1]<<16|t[u+2]<<8|t[u+3];for(u=16;80>u;u++)t=x[u-3]^x[u-8]^x[u-14]^x[u-16],x[u]=(t<<1|t>>>31)&4294967295;t=e[0];var A=e[1],E=e[2],F=e[3],N=e[4];for(u=0;80>u;u++){if(40>u)if(20>u){var O=F^A&(E^F);var Q=1518500249}else O=A^E^F,Q=1859775393;else 60>u?(O=A&E|F&(A|E),Q=2400959708):(O=A^E^F,Q=3395469782);O=((t<<5|t>>>27)&4294967295)+O+N+Q+x[u]&4294967295;N=F;F=E;E=(A<<30|A>>>2)&4294967295;A=t;t=O}e[0]=e[0]+t&4294967295;e[1]=e[1]+A&4294967295;e[2]=
e[2]+E&4294967295;e[3]=e[3]+F&4294967295;e[4]=e[4]+N&4294967295}
function c(t,x){if("string"===typeof t){t=unescape(encodeURIComponent(t));for(var u=[],A=0,E=t.length;A<E;++A)u.push(t.charCodeAt(A));t=u}x||(x=t.length);u=0;if(0==m)for(;u+64<x;)b(t.slice(u,u+64)),u+=64,q+=64;for(;u<x;)if(f[m++]=t[u++],q++,64==m)for(m=0,b(f);u+64<x;)b(t.slice(u,u+64)),u+=64,q+=64}
function d(){var t=[],x=8*q;56>m?c(h,56-m):c(h,64-(m-56));for(var u=63;56<=u;u--)f[u]=x&255,x>>>=8;b(f);for(u=x=0;5>u;u++)for(var A=24;0<=A;A-=8)t[x++]=e[u]>>A&255;return t}
for(var e=[],f=[],g=[],h=[128],k=1;64>k;++k)h[k]=0;var m,q;a();return{reset:a,update:c,digest:d,Cc:function(){for(var t=d(),x="",u=0;u<t.length;u++)x+="0123456789ABCDEF".charAt(Math.floor(t[u]/16))+"0123456789ABCDEF".charAt(t[u]%16);return x}}}
;function gg(a,b,c){var d=String(y.location.href);return d&&a&&b?[b,hg(eg(d),a,c||null)].join(" "):null}
function hg(a,b,c){var d=[],e=[];if(1==(Array.isArray(c)?2:1))return e=[b,a],hb(d,function(h){e.push(h)}),ig(e.join(" "));
var f=[],g=[];hb(c,function(h){g.push(h.key);f.push(h.value)});
c=Math.floor((new Date).getTime()/1E3);e=0==f.length?[c,b,a]:[f.join(":"),c,b,a];hb(d,function(h){e.push(h)});
a=ig(e.join(" "));a=[c,a];0==g.length||a.push(g.join(""));return a.join("_")}
function ig(a){var b=fg();b.update(a);return b.Cc().toLowerCase()}
;var jg={};function kg(a){this.i=a||{cookie:""}}
l=kg.prototype;l.isEnabled=function(){if(!y.navigator.cookieEnabled)return!1;if(!this.isEmpty())return!0;this.set("TESTCOOKIESENABLED","1",{ab:60});if("1"!==this.get("TESTCOOKIESENABLED"))return!1;this.remove("TESTCOOKIESENABLED");return!0};
l.set=function(a,b,c){var d=!1;if("object"===typeof c){var e=c.Bq;d=c.secure||!1;var f=c.domain||void 0;var g=c.path||void 0;var h=c.ab}if(/[;=\s]/.test(a))throw Error('Invalid cookie name "'+a+'"');if(/[;\r\n]/.test(b))throw Error('Invalid cookie value "'+b+'"');void 0===h&&(h=-1);c=f?";domain="+f:"";g=g?";path="+g:"";d=d?";secure":"";h=0>h?"":0==h?";expires="+(new Date(1970,1,1)).toUTCString():";expires="+(new Date(Date.now()+1E3*h)).toUTCString();this.i.cookie=a+"="+b+c+g+h+d+(null!=e?";samesite="+
e:"")};
l.get=function(a,b){for(var c=a+"=",d=(this.i.cookie||"").split(";"),e=0,f;e<d.length;e++){f=Mb(d[e]);if(0==f.lastIndexOf(c,0))return f.slice(c.length);if(f==a)return""}return b};
l.remove=function(a,b,c){var d=void 0!==this.get(a);this.set(a,"",{ab:0,path:b,domain:c});return d};
l.qb=function(){return lg(this).keys};
l.isEmpty=function(){return!this.i.cookie};
l.clear=function(){for(var a=lg(this).keys,b=a.length-1;0<=b;b--)this.remove(a[b])};
function lg(a){a=(a.i.cookie||"").split(";");for(var b=[],c=[],d,e,f=0;f<a.length;f++)e=Mb(a[f]),d=e.indexOf("="),-1==d?(b.push(""),c.push(e)):(b.push(e.substring(0,d)),c.push(e.substring(d+1)));return{keys:b,values:c}}
var mg=new kg("undefined"==typeof document?null:document);function ng(a){return!!jg.FPA_SAMESITE_PHASE2_MOD||!(void 0===a||!a)}
function og(a){a=void 0===a?!1:a;var b=y.__SAPISID||y.__APISID||y.__3PSAPISID||y.__OVERRIDE_SID;ng(a)&&(b=b||y.__1PSAPISID);if(b)return!0;var c=new kg(document);b=c.get("SAPISID")||c.get("APISID")||c.get("__Secure-3PAPISID")||c.get("SID");ng(a)&&(b=b||c.get("__Secure-1PAPISID"));return!!b}
function pg(a,b,c,d){(a=y[a])||(a=(new kg(document)).get(b));return a?gg(a,c,d):null}
function qg(a,b){b=void 0===b?!1:b;var c=eg(String(y.location.href)),d=[];if(og(b)){c=0==c.indexOf("https:")||0==c.indexOf("chrome-extension:")||0==c.indexOf("moz-extension:");var e=c?y.__SAPISID:y.__APISID;e||(e=new kg(document),e=e.get(c?"SAPISID":"APISID")||e.get("__Secure-3PAPISID"));(e=e?gg(e,c?"SAPISIDHASH":"APISIDHASH",a):null)&&d.push(e);c&&ng(b)&&((b=pg("__1PSAPISID","__Secure-1PAPISID","SAPISID1PHASH",a))&&d.push(b),(a=pg("__3PSAPISID","__Secure-3PAPISID","SAPISID3PHASH",a))&&d.push(a))}return 0==
d.length?null:d.join(" ")}
;function rg(a){I.call(this,a,-1,sg)}
r(rg,I);var sg=[2];function tg(a){this.i=this.j=this.l=a}
tg.prototype.reset=function(){this.i=this.j=this.l};
tg.prototype.getValue=function(){return this.j};function ug(a){var b=[];vg(new wg,a,b);return b.join("")}
function wg(){}
function vg(a,b,c){if(null==b)c.push("null");else{if("object"==typeof b){if(Array.isArray(b)){var d=b;b=d.length;c.push("[");for(var e="",f=0;f<b;f++)c.push(e),vg(a,d[f],c),e=",";c.push("]");return}if(b instanceof String||b instanceof Number||b instanceof Boolean)b=b.valueOf();else{c.push("{");e="";for(d in b)Object.prototype.hasOwnProperty.call(b,d)&&(f=b[d],"function"!=typeof f&&(c.push(e),xg(d,c),c.push(":"),vg(a,f,c),e=","));c.push("}");return}}switch(typeof b){case "string":xg(b,c);break;case "number":c.push(isFinite(b)&&
!isNaN(b)?String(b):"null");break;case "boolean":c.push(String(b));break;case "function":c.push("null");break;default:throw Error("Unknown type: "+typeof b);}}}
var yg={'"':'\\"',"\\":"\\\\","/":"\\/","\b":"\\b","\f":"\\f","\n":"\\n","\r":"\\r","\t":"\\t","\v":"\\u000b"},zg=/\uffff/.test("\uffff")?/[\\"\x00-\x1f\x7f-\uffff]/g:/[\\"\x00-\x1f\x7f-\xff]/g;function xg(a,b){b.push('"',a.replace(zg,function(c){var d=yg[c];d||(d="\\u"+(c.charCodeAt(0)|65536).toString(16).slice(1),yg[c]=d);return d}),'"')}
;function Ag(){}
Ag.prototype.i=null;Ag.prototype.getOptions=function(){var a;(a=this.i)||(a={},Bg(this)&&(a[0]=!0,a[1]=!0),a=this.i=a);return a};var Cg;function Dg(){}
ab(Dg,Ag);function Eg(a){return(a=Bg(a))?new ActiveXObject(a):new XMLHttpRequest}
function Bg(a){if(!a.j&&"undefined"==typeof XMLHttpRequest&&"undefined"!=typeof ActiveXObject){for(var b=["MSXML2.XMLHTTP.6.0","MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP","Microsoft.XMLHTTP"],c=0;c<b.length;c++){var d=b[c];try{return new ActiveXObject(d),a.j=d}catch(e){}}throw Error("Could not create ActiveXObject. ActiveX might be disabled, or MSXML might not be installed");}return a.j}
Cg=new Dg;function Fg(a){K.call(this);this.headers=new Map;this.K=a||null;this.j=!1;this.J=this.A=null;this.o=this.T="";this.l=this.R=this.v=this.P=!1;this.s=0;this.F=null;this.da="";this.W=this.X=!1}
ab(Fg,K);var Gg=/^https?$/i,Hg=["POST","PUT"],Ig=[];function Jg(a,b,c,d,e,f,g){var h=new Fg;Ig.push(h);b&&h.aa("complete",b);h.m.add("ready",h.Ac,!0,void 0,void 0);f&&(h.s=Math.max(0,f));g&&(h.X=g);h.send(a,c,d,e)}
l=Fg.prototype;l.Ac=function(){this.dispose();mb(Ig,this)};
l.send=function(a,b,c,d){if(this.A)throw Error("[goog.net.XhrIo] Object is active with another request="+this.T+"; newUri="+a);b=b?b.toUpperCase():"GET";this.T=a;this.o="";this.P=!1;this.j=!0;this.A=this.K?Eg(this.K):Eg(Cg);this.J=this.K?this.K.getOptions():Cg.getOptions();this.A.onreadystatechange=Za(this.Yb,this);try{this.getStatus(),this.R=!0,this.A.open(b,String(a),!0),this.R=!1}catch(g){this.getStatus();Kg(this,g);return}a=c||"";c=new Map(this.headers);if(d)if(Object.getPrototypeOf(d)===Object.prototype)for(var e in d)c.set(e,
d[e]);else if("function"===typeof d.keys&&"function"===typeof d.get){e=p(d.keys());for(var f=e.next();!f.done;f=e.next())f=f.value,c.set(f,d.get(f))}else throw Error("Unknown input type for opt_headers: "+String(d));d=Array.from(c.keys()).find(function(g){return"content-type"==g.toLowerCase()});
e=y.FormData&&a instanceof y.FormData;!(0<=gb(Hg,b))||d||e||c.set("Content-Type","application/x-www-form-urlencoded;charset=utf-8");b=p(c);for(d=b.next();!d.done;d=b.next())c=p(d.value),d=c.next().value,c=c.next().value,this.A.setRequestHeader(d,c);this.da&&(this.A.responseType=this.da);"withCredentials"in this.A&&this.A.withCredentials!==this.X&&(this.A.withCredentials=this.X);try{Lg(this),0<this.s&&(this.W=Mg(this.A),this.getStatus(),this.W?(this.A.timeout=this.s,this.A.ontimeout=Za(this.lc,this)):
this.F=Nf(this.lc,this.s,this)),this.getStatus(),this.v=!0,this.A.send(a),this.v=!1}catch(g){this.getStatus(),Kg(this,g)}};
function Mg(a){return Mc&&Xc()&&"number"===typeof a.timeout&&void 0!==a.ontimeout}
l.lc=function(){"undefined"!=typeof Pa&&this.A&&(this.o="Timed out after "+this.s+"ms, aborting",this.getStatus(),Ye(this,"timeout"),this.abort(8))};
function Kg(a,b){a.j=!1;a.A&&(a.l=!0,a.A.abort(),a.l=!1);a.o=b;Ng(a);Og(a)}
function Ng(a){a.P||(a.P=!0,Ye(a,"complete"),Ye(a,"error"))}
l.abort=function(){this.A&&this.j&&(this.getStatus(),this.j=!1,this.l=!0,this.A.abort(),this.l=!1,Ye(this,"complete"),Ye(this,"abort"),Og(this))};
l.C=function(){this.A&&(this.j&&(this.j=!1,this.l=!0,this.A.abort(),this.l=!1),Og(this,!0));Fg.Y.C.call(this)};
l.Yb=function(){this.i()||(this.R||this.v||this.l?Pg(this):this.Rc())};
l.Rc=function(){Pg(this)};
function Pg(a){if(a.j&&"undefined"!=typeof Pa)if(a.J[1]&&4==Qg(a)&&2==a.getStatus())a.getStatus();else if(a.v&&4==Qg(a))Nf(a.Yb,0,a);else if(Ye(a,"readystatechange"),a.isComplete()){a.getStatus();a.j=!1;try{if(Tg(a))Ye(a,"complete"),Ye(a,"success");else{try{var b=2<Qg(a)?a.A.statusText:""}catch(c){b=""}a.o=b+" ["+a.getStatus()+"]";Ng(a)}}finally{Og(a)}}}
function Og(a,b){if(a.A){Lg(a);var c=a.A,d=a.J[0]?function(){}:null;
a.A=null;a.J=null;b||Ye(a,"ready");try{c.onreadystatechange=d}catch(e){}}}
function Lg(a){a.A&&a.W&&(a.A.ontimeout=null);a.F&&(y.clearTimeout(a.F),a.F=null)}
l.isActive=function(){return!!this.A};
l.isComplete=function(){return 4==Qg(this)};
function Tg(a){var b=a.getStatus();a:switch(b){case 200:case 201:case 202:case 204:case 206:case 304:case 1223:var c=!0;break a;default:c=!1}if(!c){if(b=0===b)a=nc(1,String(a.T)),!a&&y.self&&y.self.location&&(a=y.self.location.protocol.slice(0,-1)),b=!Gg.test(a?a.toLowerCase():"");c=b}return c}
function Qg(a){return a.A?a.A.readyState:0}
l.getStatus=function(){try{return 2<Qg(this)?this.A.status:-1}catch(a){return-1}};
l.getLastError=function(){return"string"===typeof this.o?this.o:String(this.o)};function Ug(a){I.call(this,a)}
r(Ug,I);function Vg(a){I.call(this,a,-1,Wg)}
r(Vg,I);var Wg=[1];var Xg=["platform","platformVersion","architecture","model","uaFullVersion"];new Vg;function Yg(a){I.call(this,a)}
r(Yg,I);function Zg(a){I.call(this,a,31,$g)}
r(Zg,I);var $g=[3,20,27];function ah(a){I.call(this,a,17,bh)}
r(ah,I);var bh=[3,5];function ch(a){I.call(this,a,6,dh)}
r(ch,I);var dh=[5];function eh(a){I.call(this,a)}
r(eh,I);var fh;fh=new function(a,b,c){this.j=a;this.fieldName=b;this.i=c;this.isRepeated=0;this.l=he}(175237375,{rq:0},eh);function gh(a,b,c,d,e,f,g,h,k,m,q){K.call(this);var t=this;this.P="";this.l=[];this.Fb="";this.Gb=this.qa=-1;this.Qa=!1;this.J=this.o=null;this.F=0;this.tc=1;this.timeoutMillis=0;this.da=!1;K.call(this);this.Eb=b||function(){};
this.v=new hh(a,f);this.qc=d;this.Pa=q;this.uc=$a(bf,0,1);this.T=e||null;this.K=c||null;this.W=g||!1;this.pageId=k||null;this.logger=null;this.withCredentials=!h;this.Ea=f||!1;!this.Ea&&(65<=cc("Chromium")||45<=cc("Firefox")||12<=cc("Safari")||(Gc()||C("iPad")||C("iPod"))&&Hc());a=D(new Yg,1,1);ih(this.v,a);this.s=new tg(1E4);this.j=new Lf(this.s.getValue());qe(this,this.j);m=jh(this,m);Ne(this.j,"tick",m,!1,this);this.R=new Lf(6E5);qe(this,this.R);Ne(this.R,"tick",m,!1,this);this.W||this.R.start();
this.Ea||(Ne(document,"visibilitychange",function(){"hidden"===document.visibilityState&&t.X()}),Ne(document,"pagehide",this.X,!1,this))}
r(gh,K);function jh(a,b){return b?function(){b().then(function(){a.flush()})}:function(){a.flush()}}
gh.prototype.C=function(){this.X();K.prototype.C.call(this)};
function kh(a){a.T||(a.T=.01>a.uc()?"https://www.google.com/log?format=json&hasfast=true":"https://play.google.com/log?format=json&hasfast=true");return a.T}
function lh(a,b){a.s=new tg(1>b?1:b);Mf(a.j,a.s.getValue())}
gh.prototype.log=function(a){a=a.clone();var b=this.tc++;D(a,21,b);this.P&&D(a,26,this.P);if(!Pd(a,1)){b=a;var c=Date.now().toString();D(b,1,c)}null!=Pd(a,15)||D(a,15,60*(new Date).getTimezoneOffset());this.o&&(b=this.o.clone(),G(a,rg,16,b));for(;1E3<=this.l.length;)this.l.shift(),++this.F;this.l.push(a);Ye(this,new mh(a));this.W||this.j.enabled||this.j.start()};
gh.prototype.flush=function(a,b){var c=this;if(0===this.l.length)a&&a();else if(this.da)nh(this);else{var d=Date.now();if(this.Gb>d&&this.qa<d)b&&b("throttled");else{var e=oh(this.v,this.l,this.F);d={};var f=this.Eb();f&&(d.Authorization=f);var g=kh(this);this.K&&(d["X-Goog-AuthUser"]=this.K,g=wc(g,"authuser",this.K));this.pageId&&(d["X-Goog-PageId"]=this.pageId,g=wc(g,"pageId",this.pageId));if(f&&this.Fb===f)b&&b("stale-auth-token");else{this.l=[];this.j.enabled&&this.j.stop();this.F=0;var h=ce(e),
k;this.J&&this.J.isSupported(h.length)&&(k=this.J.compress(h));var m={url:g,body:h,yc:1,yb:d,requestType:"POST",withCredentials:this.withCredentials,timeoutMillis:this.timeoutMillis},q=function(u){c.s.reset();Mf(c.j,c.s.getValue());if(u){var A=null;try{var E=JSON.parse(u.replace(")]}'\n",""));A=new ch(E)}catch(F){}A&&(u=Number(Rd(A,1,"-1")),0<u&&(c.qa=Date.now(),c.Gb=c.qa+u),A=fh.l(A))&&(A=Rd(A,1,-1),-1!=A&&(c.Qa||lh(c,A)))}a&&a()},t=function(u,A){var E=Xd(e,Zg,3),F=c.s;
F.i=Math.min(3E5,2*F.i);F.j=Math.min(3E5,F.i+Math.round(.2*(Math.random()-.5)*F.i));Mf(c.j,c.s.getValue());401===u&&f&&(c.Fb=f);void 0===A&&(A=500<=u&&600>u||401===u||0===u);A&&(c.l=E.concat(c.l),c.W||c.j.enabled||c.j.start());b&&b("net-send-failed",u)},x=function(){c.Pa?c.Pa.send(m,q,t):c.qc(m,q,t)};
k?k.then(function(u){m.yb["Content-Encoding"]="gzip";m.yb["Content-Type"]="application/binary";m.body=u;m.yc=2;x()},function(){x()}):x()}}}};
gh.prototype.X=function(){this.flush()};
function nh(a){ph(a,function(b,c){b=wc(b,"format","json");b=window.navigator.sendBeacon(b,ce(c));a.da&&!b&&(a.da=!1);return b})}
function ph(a,b){if(0!==a.l.length){var c=Dc(kh(a),"format");c=uc(c,"auth",a.Eb(),"authuser",a.K||"0");for(var d=0;10>d&&a.l.length;++d){var e=a.l.slice(0,32),f=oh(a.v,e,a.F);if(!b(c,f))break;a.F=0;a.l=a.l.slice(e.length)}a.j.enabled&&a.j.stop()}}
function mh(){se.call(this,"event-logged",void 0)}
r(mh,se);function hh(a,b){this.j=b=void 0===b?!1:b;this.uach=this.locale=null;this.i=new ah;D(this.i,2,a);b||(this.locale=document.documentElement.getAttribute("lang"));ih(this,new Yg)}
function ih(a,b){G(a.i,Yg,1,b);Pd(b,1)||D(b,1,1);a.j||(b=qh(a),Pd(b,5)||D(b,5,a.locale));a.uach&&(b=qh(a),Vd(b,Vg,9)||G(b,Vg,9,a.uach))}
function rh(a,b){var c=void 0===c?Xg:c;b(window,c).then(function(d){a.uach=d;d=qh(a);G(d,Vg,9,a.uach);return!0}).catch(function(){return!1})}
function qh(a){a=Vd(a.i,Yg,1);var b=Vd(a,Ug,11);b||(b=new Ug,G(a,Ug,11,b));return b}
function oh(a,b,c){c=void 0===c?0:c;a=a.i.clone();var d=Date.now().toString();a=D(a,4,d);b=Zd(a,Zg,3,b);c&&D(b,14,c);return b}
;function sh(a,b,c){Jg(a.url,function(d){d=d.target;if(Tg(d)){try{var e=d.A?d.A.responseText:""}catch(f){e=""}b(e)}else c(d.getStatus())},a.requestType,a.body,a.yb,a.timeoutMillis,a.withCredentials)}
;function th(){this.l="https://play.google.com/log?format=json&hasfast=true";this.m=!1;this.s=sh;this.i=""}
;function uh(){var a=void 0===a?"":a;var b=void 0===b?!1:b;var c=void 0===c?"":c;var d=new th;d.i="";""!=a&&(d.l=a);b&&(d.m=!0);c&&(d.j=c);a=new gh(1828,d.J?d.J:qg,"0",d.s,d.l,d.m,!1,d.R,void 0,void 0,d.B?d.B:void 0);d.v&&ih(a.v,d.v);d.j&&(b=d.j,c=qh(a.v),D(c,7,b));d.o&&(a.J=d.o);d.i&&(a.P=d.i);d.N&&((b=d.N)?(a.o||(a.o=new rg),b=ce(b),D(a.o,4,b)):a.o&&D(a.o,4,void 0,!1));d.K&&(b=d.K,a.o||(a.o=new rg),Sd(a.o,2,b));d.F&&(b=d.F,a.Qa=!0,lh(a,b));d.P&&rh(a.v,d.P);this.i=a}
uh.prototype.flush=function(a){var b=a||[];if(b.length){a=new cg;for(var c=[],d=0;d<b.length;d++){var e=b[d],f=e;var g=new Vf;g=D(g,1,f.j);for(var h=f,k=[],m=0;m<h.i.length;m++)k.push(h.i[m].lb);g=Sd(g,3,k);h=[];k=[];m=p(f.xa.keys());for(var q=m.next();!q.done;q=m.next())k.push(q.value.split(","));for(m=0;m<k.length;m++){q=k[m];var t=f.m;for(var x=f.nb(q)||[],u=[],A=0;A<x.length;A++){var E=x[A];E=E&&E.Kb;var F=new $f;switch(t){case 3:Td(F,1,bg,Number(E));break;case 2:Td(F,2,bg,Number(E))}u.push(F)}t=
u;for(x=0;x<t.length;x++){u=t[x];A=new Xf;u=G(A,$f,2,u);A=q;E=[];F=f;for(var N=[],O=0;O<F.i.length;O++)N.push(F.i[O].mb);F=N;for(N=0;N<F.length;N++){O=F[N];var Q=A[N],ca=new Zf;switch(O){case 3:Td(ca,1,ag,String(Q));break;case 2:Td(ca,2,ag,Number(Q));break;case 1:Td(ca,3,ag,"true"==Q)}E.push(ca)}Zd(u,Zf,1,E);h.push(u)}}Zd(g,Xf,4,h);c.push(g);e.clear()}Zd(a,Vf,1,c);b=this.i;a instanceof Zg?b.log(a):(c=new Zg,a=ce(a),a=D(c,8,a),b.log(a));this.i.flush()}};function vh(){this.o=wh();this.transport=new uh;this.i=new Of(this.transport);this.m=new Sf(this.i);this.j=new Tf(this.i);this.l=new Uf(this.i);this.Aa=window.document.location.hostname}
function wh(){var a,b,c;return null!=(c=null==(a=globalThis.performance)?void 0:null==(b=a.now)?void 0:b.call(a))?c:Date.now()}
;function xh(){var a=this;this.promise=new Promise(function(b,c){a.resolve=b;a.reject=c})}
;function yh(a){var b=this;this.Wa=!1;if(a.zq){var c;this.sa=null!=(c=a.sa)?c:new vh}c=a.program;a=a.globalName;var d=new xh;this.j=d.promise;this.md=p((0,y[a].a)(c,function(e,f){Promise.resolve().then(function(){var g;if(null!=(g=b.sa)){var h=wh()-g.o;g.m.i.hb("/client_streamz/bg/fil",h,g.Aa)}d.resolve({xc:e,jd:f})})},!0)).next().value;
this.hd=d.promise.then(function(){})}
yh.prototype.snapshot=function(a){var b=this;if(this.Wa)throw Error("Already disposed");var c=wh(),d;null!=(d=this.sa)&&d.j.i.Cb("/client_streamz/bg/fsc",d.Aa);return this.j.then(function(e){var f=e.xc;return new Promise(function(g){f(function(h){var k;if(null!=(k=b.sa)){var m=wh()-c;k.l.i.hb("/client_streamz/bg/fsl",m,k.Aa)}g(h)},[a.Mb,
a.kd])})})};
yh.prototype.dispose=function(){var a;null!=(a=this.sa)&&a.i.ib();this.Wa=!0;this.j.then(function(b){(b=b.jd)&&b()})};
yh.prototype.i=function(){return this.Wa};var zh=window;Db("csi.gstatic.com");Db("googleads.g.doubleclick.net");Db("partner.googleadservices.com");Db("pubads.g.doubleclick.net");Db("securepubads.g.doubleclick.net");Db("tpc.googlesyndication.com");/*

 SPDX-License-Identifier: Apache-2.0
*/
function Ah(a,b){a.src=Kb(b);var c,d;(c=(b=null==(d=(c=(a.ownerDocument&&a.ownerDocument.defaultView||window).document).querySelector)?void 0:d.call(c,"script[nonce]"))?b.nonce||b.getAttribute("nonce")||"":"")&&a.setAttribute("nonce",c)}
;function Bh(a){var b=Ch;if(b)for(var c in b)Object.prototype.hasOwnProperty.call(b,c)&&a(b[c],c,b)}
function Dh(){var a=[];Bh(function(b){a.push(b)});
return a}
var Ch={Ed:"allow-forms",Fd:"allow-modals",Gd:"allow-orientation-lock",Hd:"allow-pointer-lock",Id:"allow-popups",Jd:"allow-popups-to-escape-sandbox",Kd:"allow-presentation",Ld:"allow-same-origin",Md:"allow-scripts",Nd:"allow-top-navigation",Od:"allow-top-navigation-by-user-activation"},Eh=fb(function(){return Dh()});
function Fh(){var a=Gh(),b={};hb(Eh(),function(c){a.sandbox&&a.sandbox.supports&&a.sandbox.supports(c)&&(b[c]=!0)});
return b}
function Gh(){var a=void 0===a?document:a;return a.createElement("iframe")}
;function Hh(a){this.isValid=a}
function Ih(a){return new Hh(function(b){return b.substr(0,a.length+1).toLowerCase()===a+":"})}
var Jh=[Ih("data"),Ih("http"),Ih("https"),Ih("mailto"),Ih("ftp"),new Hh(function(a){return/^[^:]*([/?#]|$)/.test(a)})];function Kh(a){"number"==typeof a&&(a=Math.round(a)+"px");return a}
;var Lh=(new Date).getTime();var Mh="client_dev_domain client_dev_regex_map client_dev_root_url client_rollout_override expflag forcedCapability jsfeat jsmode mods".split(" ");ia(Mh);function Nh(a){K.call(this);var b=this;this.v=this.l=0;this.Z=null!=a?a:{S:function(e,f){return setTimeout(e,f)},
fa:function(e){clearTimeout(e)}};
var c,d;this.j=null!=(d=null==(c=window.navigator)?void 0:c.onLine)?d:!0;this.o=function(){return w(function(e){return v(e,Oh(b),0)})};
window.addEventListener("offline",this.o);window.addEventListener("online",this.o);this.v||Ph(this)}
r(Nh,K);function Qh(){var a=Rh;Nh.i||(Nh.i=new Nh(a));return Nh.i}
Nh.prototype.dispose=function(){window.removeEventListener("offline",this.o);window.removeEventListener("online",this.o);this.Z.fa(this.v);delete Nh.i};
Nh.prototype.L=function(){return this.j};
function Ph(a){a.v=a.Z.S(function(){var b;return w(function(c){if(1==c.i)return a.j?(null==(b=window.navigator)?0:b.onLine)?c.u(3):v(c,Oh(a),3):v(c,Oh(a),3);Ph(a);c.i=0})},3E4)}
function Oh(a,b){return a.s?a.s:a.s=new Promise(function(c){var d,e,f,g;return w(function(h){switch(h.i){case 1:return d=window.AbortController?new window.AbortController:void 0,f=null==(e=d)?void 0:e.signal,g=!1,Ba(h,2,3),d&&(a.l=a.Z.S(function(){d.abort()},b||2E4)),v(h,fetch("/generate_204",{method:"HEAD",
signal:f}),5);case 5:g=!0;case 3:Ea(h);a.s=void 0;a.l&&(a.Z.fa(a.l),a.l=0);g!==a.j&&(a.j=g,a.j?Ye(a,"networkstatus-online"):Ye(a,"networkstatus-offline"));c(g);Fa(h);break;case 2:Da(h),g=!1,h.u(3)}})})}
;var Sh={Mh:"EMBEDDED_PLAYER_MODE_UNKNOWN",Jh:"EMBEDDED_PLAYER_MODE_DEFAULT",Lh:"EMBEDDED_PLAYER_MODE_PFP",Kh:"EMBEDDED_PLAYER_MODE_PFL"},Th={Rp:"WEB_DISPLAY_MODE_UNKNOWN",Np:"WEB_DISPLAY_MODE_BROWSER",Pp:"WEB_DISPLAY_MODE_MINIMAL_UI",Qp:"WEB_DISPLAY_MODE_STANDALONE",Op:"WEB_DISPLAY_MODE_FULLSCREEN"};function Uh(){this.data_=[];this.i=-1}
Uh.prototype.set=function(a,b){b=void 0===b?!0:b;0<=a&&52>a&&Number.isInteger(a)&&this.data_[a]!==b&&(this.data_[a]=b,this.i=-1)};
Uh.prototype.get=function(a){return!!this.data_[a]};
function Vh(a){-1===a.i&&(a.i=kb(a.data_,function(b,c,d){return c?b+Math.pow(2,d):b},0));
return a.i}
;function Wh(a,b){this.i=a[y.Symbol.iterator]();this.j=b}
Wh.prototype[Symbol.iterator]=function(){return this};
Wh.prototype.next=function(){var a=this.i.next();return{value:a.done?void 0:this.j.call(void 0,a.value),done:a.done}};
function Xh(a,b){return new Wh(a,b)}
;function Yh(){this.blockSize=-1}
;function Zh(){this.blockSize=-1;this.blockSize=64;this.i=[];this.o=[];this.s=[];this.l=[];this.l[0]=128;for(var a=1;a<this.blockSize;++a)this.l[a]=0;this.m=this.j=0;this.reset()}
ab(Zh,Yh);Zh.prototype.reset=function(){this.i[0]=1732584193;this.i[1]=4023233417;this.i[2]=2562383102;this.i[3]=271733878;this.i[4]=3285377520;this.m=this.j=0};
function $h(a,b,c){c||(c=0);var d=a.s;if("string"===typeof b)for(var e=0;16>e;e++)d[e]=b.charCodeAt(c)<<24|b.charCodeAt(c+1)<<16|b.charCodeAt(c+2)<<8|b.charCodeAt(c+3),c+=4;else for(e=0;16>e;e++)d[e]=b[c]<<24|b[c+1]<<16|b[c+2]<<8|b[c+3],c+=4;for(e=16;80>e;e++){var f=d[e-3]^d[e-8]^d[e-14]^d[e-16];d[e]=(f<<1|f>>>31)&4294967295}b=a.i[0];c=a.i[1];var g=a.i[2],h=a.i[3],k=a.i[4];for(e=0;80>e;e++){if(40>e)if(20>e){f=h^c&(g^h);var m=1518500249}else f=c^g^h,m=1859775393;else 60>e?(f=c&g|h&(c|g),m=2400959708):
(f=c^g^h,m=3395469782);f=(b<<5|b>>>27)+f+k+m+d[e]&4294967295;k=h;h=g;g=(c<<30|c>>>2)&4294967295;c=b;b=f}a.i[0]=a.i[0]+b&4294967295;a.i[1]=a.i[1]+c&4294967295;a.i[2]=a.i[2]+g&4294967295;a.i[3]=a.i[3]+h&4294967295;a.i[4]=a.i[4]+k&4294967295}
Zh.prototype.update=function(a,b){if(null!=a){void 0===b&&(b=a.length);for(var c=b-this.blockSize,d=0,e=this.o,f=this.j;d<b;){if(0==f)for(;d<=c;)$h(this,a,d),d+=this.blockSize;if("string"===typeof a)for(;d<b;){if(e[f]=a.charCodeAt(d),++f,++d,f==this.blockSize){$h(this,e);f=0;break}}else for(;d<b;)if(e[f]=a[d],++f,++d,f==this.blockSize){$h(this,e);f=0;break}}this.j=f;this.m+=b}};
Zh.prototype.digest=function(){var a=[],b=8*this.m;56>this.j?this.update(this.l,56-this.j):this.update(this.l,this.blockSize-(this.j-56));for(var c=this.blockSize-1;56<=c;c--)this.o[c]=b&255,b/=256;$h(this,this.o);for(c=b=0;5>c;c++)for(var d=24;0<=d;d-=8)a[b]=this.i[c]>>d&255,++b;return a};function ai(a){return"string"==typeof a.className?a.className:a.getAttribute&&a.getAttribute("class")||""}
function bi(a,b){"string"==typeof a.className?a.className=b:a.setAttribute&&a.setAttribute("class",b)}
function ci(a,b){a.classList?b=a.classList.contains(b):(a=a.classList?a.classList:ai(a).match(/\S+/g)||[],b=0<=gb(a,b));return b}
function di(){var a=document.body;a.classList?a.classList.remove("inverted-hdpi"):ci(a,"inverted-hdpi")&&bi(a,Array.prototype.filter.call(a.classList?a.classList:ai(a).match(/\S+/g)||[],function(b){return"inverted-hdpi"!=b}).join(" "))}
;function ei(){}
ei.prototype.next=function(){return fi};
var fi={done:!0,value:void 0};function gi(a){return{value:a,done:!1}}
ei.prototype.ea=function(){return this};function hi(a){if(a instanceof ii||a instanceof ji||a instanceof ki)return a;if("function"==typeof a.next)return new ii(function(){return a});
if("function"==typeof a[Symbol.iterator])return new ii(function(){return a[Symbol.iterator]()});
if("function"==typeof a.ea)return new ii(function(){return a.ea()});
throw Error("Not an iterator or iterable.");}
function ii(a){this.j=a}
ii.prototype.ea=function(){return new ji(this.j())};
ii.prototype[Symbol.iterator]=function(){return new ki(this.j())};
ii.prototype.i=function(){return new ki(this.j())};
function ji(a){this.j=a}
r(ji,ei);ji.prototype.next=function(){return this.j.next()};
ji.prototype[Symbol.iterator]=function(){return new ki(this.j)};
ji.prototype.i=function(){return new ki(this.j)};
function ki(a){ii.call(this,function(){return a});
this.l=a}
r(ki,ii);ki.prototype.next=function(){return this.l.next()};function li(a,b){this.j={};this.i=[];this.na=this.size=0;var c=arguments.length;if(1<c){if(c%2)throw Error("Uneven number of arguments");for(var d=0;d<c;d+=2)this.set(arguments[d],arguments[d+1])}else if(a)if(a instanceof li)for(c=a.qb(),d=0;d<c.length;d++)this.set(c[d],a.get(c[d]));else for(d in a)this.set(d,a[d])}
l=li.prototype;l.qb=function(){mi(this);return this.i.concat()};
l.has=function(a){return ni(this.j,a)};
l.equals=function(a,b){if(this===a)return!0;if(this.size!=a.size)return!1;b=b||oi;mi(this);for(var c,d=0;c=this.i[d];d++)if(!b(this.get(c),a.get(c)))return!1;return!0};
function oi(a,b){return a===b}
l.isEmpty=function(){return 0==this.size};
l.clear=function(){this.j={};this.na=this.size=this.i.length=0};
l.remove=function(a){return this.delete(a)};
l.delete=function(a){return ni(this.j,a)?(delete this.j[a],--this.size,this.na++,this.i.length>2*this.size&&mi(this),!0):!1};
function mi(a){if(a.size!=a.i.length){for(var b=0,c=0;b<a.i.length;){var d=a.i[b];ni(a.j,d)&&(a.i[c++]=d);b++}a.i.length=c}if(a.size!=a.i.length){var e={};for(c=b=0;b<a.i.length;)d=a.i[b],ni(e,d)||(a.i[c++]=d,e[d]=1),b++;a.i.length=c}}
l.get=function(a,b){return ni(this.j,a)?this.j[a]:b};
l.set=function(a,b){ni(this.j,a)||(this.size+=1,this.i.push(a),this.na++);this.j[a]=b};
l.forEach=function(a,b){for(var c=this.qb(),d=0;d<c.length;d++){var e=c[d],f=this.get(e);a.call(b,f,e,this)}};
l.clone=function(){return new li(this)};
l.keys=function(){return hi(this.ea(!0)).i()};
l.values=function(){return hi(this.ea(!1)).i()};
l.entries=function(){var a=this;return Xh(this.keys(),function(b){return[b,a.get(b)]})};
l.ea=function(a){mi(this);var b=0,c=this.na,d=this,e=new ei;e.next=function(){if(c!=d.na)throw Error("The map has changed since the iterator was created");if(b>=d.i.length)return fi;var f=d.i[b++];return gi(a?f:d.j[f])};
return e};
function ni(a,b){return Object.prototype.hasOwnProperty.call(a,b)}
;function L(a){J.call(this);this.s=1;this.m=[];this.o=0;this.j=[];this.l={};this.v=!!a}
ab(L,J);l=L.prototype;l.subscribe=function(a,b,c){var d=this.l[a];d||(d=this.l[a]=[]);var e=this.s;this.j[e]=a;this.j[e+1]=b;this.j[e+2]=c;this.s=e+3;d.push(e);return e};
function pi(a,b,c,d){if(b=a.l[b]){var e=a.j;(b=b.find(function(f){return e[f+1]==c&&e[f+2]==d}))&&a.Da(b)}}
l.Da=function(a){var b=this.j[a];if(b){var c=this.l[b];0!=this.o?(this.m.push(a),this.j[a+1]=function(){}):(c&&mb(c,a),delete this.j[a],delete this.j[a+1],delete this.j[a+2])}return!!b};
l.oa=function(a,b){var c=this.l[a];if(c){for(var d=Array(arguments.length-1),e=1,f=arguments.length;e<f;e++)d[e-1]=arguments[e];if(this.v)for(e=0;e<c.length;e++){var g=c[e];qi(this.j[g+1],this.j[g+2],d)}else{this.o++;try{for(e=0,f=c.length;e<f&&!this.i();e++)g=c[e],this.j[g+1].apply(this.j[g+2],d)}finally{if(this.o--,0<this.m.length&&0==this.o)for(;c=this.m.pop();)this.Da(c)}}return 0!=e}return!1};
function qi(a,b,c){rf(function(){a.apply(b,c)})}
l.clear=function(a){if(a){var b=this.l[a];b&&(b.forEach(this.Da,this),delete this.l[a])}else this.j.length=0,this.l={}};
l.C=function(){L.Y.C.call(this);this.clear();this.m.length=0};function ri(a){this.i=a}
ri.prototype.set=function(a,b){void 0===b?this.i.remove(a):this.i.set(a,ug(b))};
ri.prototype.get=function(a){try{var b=this.i.get(a)}catch(c){return}if(null!==b)try{return JSON.parse(b)}catch(c){throw"Storage: Invalid value was encountered";}};
ri.prototype.remove=function(a){this.i.remove(a)};function si(a){this.i=a}
ab(si,ri);function ti(a){this.data=a}
function ui(a){return void 0===a||a instanceof ti?a:new ti(a)}
si.prototype.set=function(a,b){si.Y.set.call(this,a,ui(b))};
si.prototype.j=function(a){a=si.Y.get.call(this,a);if(void 0===a||a instanceof Object)return a;throw"Storage: Invalid value was encountered";};
si.prototype.get=function(a){if(a=this.j(a)){if(a=a.data,void 0===a)throw"Storage: Invalid value was encountered";}else a=void 0;return a};function vi(a){this.i=a}
ab(vi,si);vi.prototype.set=function(a,b,c){if(b=ui(b)){if(c){if(c<Date.now()){vi.prototype.remove.call(this,a);return}b.expiration=c}b.creation=Date.now()}vi.Y.set.call(this,a,b)};
vi.prototype.j=function(a){var b=vi.Y.j.call(this,a);if(b){var c=b.creation,d=b.expiration;if(d&&d<Date.now()||c&&c>Date.now())vi.prototype.remove.call(this,a);else return b}};function wi(){}
;function xi(){}
ab(xi,wi);xi.prototype[Symbol.iterator]=function(){return hi(this.ea(!0)).i()};
xi.prototype.clear=function(){var a=Array.from(this);a=p(a);for(var b=a.next();!b.done;b=a.next())this.remove(b.value)};function yi(a){this.i=a}
ab(yi,xi);l=yi.prototype;l.isAvailable=function(){if(!this.i)return!1;try{return this.i.setItem("__sak","1"),this.i.removeItem("__sak"),!0}catch(a){return!1}};
l.set=function(a,b){try{this.i.setItem(a,b)}catch(c){if(0==this.i.length)throw"Storage mechanism: Storage disabled";throw"Storage mechanism: Quota exceeded";}};
l.get=function(a){a=this.i.getItem(a);if("string"!==typeof a&&null!==a)throw"Storage mechanism: Invalid value was encountered";return a};
l.remove=function(a){this.i.removeItem(a)};
l.ea=function(a){var b=0,c=this.i,d=new ei;d.next=function(){if(b>=c.length)return fi;var e=c.key(b++);if(a)return gi(e);e=c.getItem(e);if("string"!==typeof e)throw"Storage mechanism: Invalid value was encountered";return gi(e)};
return d};
l.clear=function(){this.i.clear()};
l.key=function(a){return this.i.key(a)};function zi(){var a=null;try{a=window.localStorage||null}catch(b){}this.i=a}
ab(zi,yi);function Ai(a,b){this.j=a;this.i=null;var c;if(c=Mc)c=!(9<=Number($c));if(c){Bi||(Bi=new li);this.i=Bi.get(a);this.i||(b?this.i=document.getElementById(b):(this.i=document.createElement("userdata"),this.i.addBehavior("#default#userData"),document.body.appendChild(this.i)),Bi.set(a,this.i));try{this.i.load(this.j)}catch(d){this.i=null}}}
ab(Ai,xi);var Ci={".":".2E","!":".21","~":".7E","*":".2A","'":".27","(":".28",")":".29","%":"."},Bi=null;function Di(a){return"_"+encodeURIComponent(a).replace(/[.!~*'()%]/g,function(b){return Ci[b]})}
l=Ai.prototype;l.isAvailable=function(){return!!this.i};
l.set=function(a,b){this.i.setAttribute(Di(a),b);Ei(this)};
l.get=function(a){a=this.i.getAttribute(Di(a));if("string"!==typeof a&&null!==a)throw"Storage mechanism: Invalid value was encountered";return a};
l.remove=function(a){this.i.removeAttribute(Di(a));Ei(this)};
l.ea=function(a){var b=0,c=this.i.XMLDocument.documentElement.attributes,d=new ei;d.next=function(){if(b>=c.length)return fi;var e=c[b++];if(a)return gi(decodeURIComponent(e.nodeName.replace(/\./g,"%")).slice(1));e=e.nodeValue;if("string"!==typeof e)throw"Storage mechanism: Invalid value was encountered";return gi(e)};
return d};
l.clear=function(){for(var a=this.i.XMLDocument.documentElement,b=a.attributes.length;0<b;b--)a.removeAttribute(a.attributes[b-1].nodeName);Ei(this)};
function Ei(a){try{a.i.save(a.j)}catch(b){throw"Storage mechanism: Quota exceeded";}}
;function Fi(a,b){this.j=a;this.i=b+"::"}
ab(Fi,xi);Fi.prototype.set=function(a,b){this.j.set(this.i+a,b)};
Fi.prototype.get=function(a){return this.j.get(this.i+a)};
Fi.prototype.remove=function(a){this.j.remove(this.i+a)};
Fi.prototype.ea=function(a){var b=this.j[Symbol.iterator](),c=this,d=new ei;d.next=function(){var e=b.next();if(e.done)return e;for(e=e.value;e.slice(0,c.i.length)!=c.i;){e=b.next();if(e.done)return e;e=e.value}return gi(a?e.slice(c.i.length):c.j.get(e))};
return d};function Gi(a){I.call(this,a)}
r(Gi,I);function Hi(a){I.call(this,a)}
r(Hi,I);Hi.prototype.getKey=function(){return Pd(this,1)};
Hi.prototype.getValue=function(){return Pd(this,2===Ud(this,Ii)?2:-1)};
Hi.prototype.setValue=function(a){return Td(this,2,Ii,a)};
var Ii=[2,3,4,5,6];function Ji(a){I.call(this,a)}
r(Ji,I);function Ki(a){I.call(this,a)}
r(Ki,I);function Li(a){I.call(this,a,-1,Mi)}
r(Li,I);var Mi=[2];function Ni(a){I.call(this,a,-1,Oi)}
r(Ni,I);Ni.prototype.getPlayerType=function(){return Pd(this,36)};
Ni.prototype.setHomeGroupInfo=function(a){return G(this,Li,81,a)};
var Oi=[9,66,24,32,86,100,101];function Pi(a){I.call(this,a,-1,Qi)}
r(Pi,I);var Qi=[15,26,28];function Ri(a){I.call(this,a)}
r(Ri,I);Ri.prototype.setToken=function(a){return D(this,2,a)};function Si(a){I.call(this,a,-1,Ti)}
r(Si,I);Si.prototype.setSafetyMode=function(a){return D(this,5,a)};
var Ti=[12];function Ui(a){I.call(this,a,-1,Vi)}
r(Ui,I);Ui.prototype.s=function(a){G(this,Ni,1,a)};
var Vi=[12];function Wi(a){this.name=a}
;var Xi=new Wi("continuationCommand");var Yi=new Wi("signalServiceEndpoint");var Zi=new Wi("feedbackEndpoint");function $i(a){I.call(this,a,-1,aj)}
r($i,I);function bj(a){I.call(this,a)}
r(bj,I);bj.prototype.getKey=function(){return Rd(this,1,"")};
bj.prototype.getValue=function(){return Rd(this,2,"")};
bj.prototype.setValue=function(a){return D(this,2,a)};
var aj=[4,5];function cj(a){I.call(this,a)}
r(cj,I);function dj(a){I.call(this,a)}
r(dj,I);var ej=[2,3,4];function fj(a){I.call(this,a)}
r(fj,I);fj.prototype.getMessage=function(){return Rd(this,1,"")};function gj(a){I.call(this,a)}
r(gj,I);function hj(a){I.call(this,a)}
r(hj,I);function ij(a){I.call(this,a,-1,jj)}
r(ij,I);var jj=[10,17];function kj(a){I.call(this,a)}
r(kj,I);function lj(a){I.call(this,a)}
r(lj,I);lj.prototype.V=function(a){D(this,1,a)};function mj(a){I.call(this,a)}
r(mj,I);function nj(a){I.call(this,a)}
r(nj,I);function oj(a){I.call(this,a)}
r(oj,I);function pj(a){I.call(this,a,-1,qj)}
r(pj,I);pj.prototype.getVideoData=function(){return Vd(this,oj,15)};
var qj=[4];function rj(a){I.call(this,a)}
r(rj,I);function sj(a,b){G(a,mj,1,b)}
rj.prototype.V=function(a){D(this,2,a)};
function tj(a){I.call(this,a)}
r(tj,I);function uj(a,b){G(a,mj,1,b)}
;function vj(a){I.call(this,a,-1,wj)}
r(vj,I);vj.prototype.V=function(a){D(this,1,a)};
function xj(a,b){G(a,mj,2,b)}
var wj=[3];function yj(a){I.call(this,a)}
r(yj,I);yj.prototype.V=function(a){D(this,1,a)};function zj(a){I.call(this,a)}
r(zj,I);zj.prototype.V=function(a){D(this,1,a)};function Aj(a){I.call(this,a)}
r(Aj,I);Aj.prototype.V=function(a){D(this,1,a)};function Bj(a){I.call(this,a)}
r(Bj,I);Bj.prototype.V=function(a){D(this,1,a)};function Cj(a){I.call(this,a)}
r(Cj,I);function Dj(a){I.call(this,a)}
r(Dj,I);function Ej(a){I.call(this,a,-1,Fj)}
r(Ej,I);function Gj(a,b){return D(a,1,b)}
Ej.prototype.getPlayerType=function(){return Rd(this,7,0)};
Ej.prototype.setVideoId=function(a){return D(this,19,a)};
function Hj(a,b){return D(a,25,b)}
function Ij(a,b){$d(a,68,Jj,b)}
function Jj(a){I.call(this,a)}
r(Jj,I);Jj.prototype.getId=function(){return Rd(this,2,"")};
var Fj=[83,68];function Kj(a){I.call(this,a)}
r(Kj,I);function Lj(a){I.call(this,a)}
r(Lj,I);function Mj(a){I.call(this,a)}
r(Mj,I);function Nj(a){I.call(this,a,432)}
r(Nj,I);
var Oj=[23,24,11,6,7,5,2,3,13,20,21,22,28,32,37,229,241,45,59,225,288,72,73,78,208,156,202,215,74,76,79,80,111,85,91,97,100,102,105,119,126,127,136,146,148,151,157,158,159,163,164,168,176,222,383,177,178,179,411,184,188,189,190,191,193,194,195,196,197,198,199,200,201,402,320,203,204,205,206,258,259,260,261,327,209,219,226,227,232,233,234,240,244,247,248,249,251,256,257,266,254,255,270,272,278,291,293,300,304,308,309,310,311,313,314,319,321,323,324,328,330,331,332,334,337,338,340,344,348,350,351,352,
353,354,355,356,357,358,361,363,364,368,369,370,373,374,375,378,380,381,388,389,403,410,412,429,413,414,415,416,417,418,430,423,424,425,426,427,431,117];var Pj={Mi:0,xi:1,Di:2,Ei:4,Ji:8,Fi:16,Gi:32,Li:64,Ki:128,zi:256,Bi:512,Ii:1024,Ai:2048,Ci:4096,yi:8192,Hi:16384};function Qj(a){I.call(this,a)}
r(Qj,I);function Rj(a){I.call(this,a)}
r(Rj,I);Rj.prototype.setVideoId=function(a){return Td(this,1,Sj,a)};
Rj.prototype.getPlaylistId=function(){return Pd(this,2===Ud(this,Sj)?2:-1)};
var Sj=[1,2];function Tj(a){I.call(this,a,-1,Uj)}
r(Tj,I);var Uj=[3];var Vj=new Wi("playlistEditEndpoint");var Wj=new Wi("modifyChannelNotificationPreferenceEndpoint");var rk=new Wi("unsubscribeEndpoint");var sk=new Wi("subscribeEndpoint");function tk(a,b){1<b.length?a[b[0]]=b[1]:1===b.length&&Object.assign(a,b[0])}
;var uk=y.window,vk,wk,xk=(null==uk?void 0:null==(vk=uk.yt)?void 0:vk.config_)||(null==uk?void 0:null==(wk=uk.ytcfg)?void 0:wk.data_)||{};z("yt.config_",xk);function yk(){tk(xk,arguments)}
function M(a,b){return a in xk?xk[a]:b}
function zk(){var a=xk.EXPERIMENT_FLAGS;return a?a.web_disable_gel_stp_ecatcher_killswitch:void 0}
;function P(a){a=Ak(a);return"string"===typeof a&&"false"===a?!1:!!a}
function Bk(a,b){a=Ak(a);return void 0===a&&void 0!==b?b:Number(a||0)}
function Ck(){return M("EXPERIMENTS_TOKEN","")}
function Ak(a){var b=M("EXPERIMENTS_FORCED_FLAGS",{});return void 0!==b[a]?b[a]:M("EXPERIMENT_FLAGS",{})[a]}
function Dk(){var a=[],b=M("EXPERIMENTS_FORCED_FLAGS",{});for(c in b)a.push({key:c,value:String(b[c])});var c=M("EXPERIMENT_FLAGS",{});for(var d in c)d.startsWith("force_")&&void 0===b[d]&&a.push({key:d,value:String(c[d])});return a}
;var Ek=[];function Fk(a){Ek.forEach(function(b){return b(a)})}
function Gk(a){return a&&window.yterr?function(){try{return a.apply(this,arguments)}catch(b){Hk(b)}}:a}
function Hk(a,b,c,d){var e=B("yt.logging.errors.log");e?e(a,"ERROR",b,c,d):(e=M("ERRORS",[]),e.push([a,"ERROR",b,c,d]),yk("ERRORS",e));Fk(a)}
function Ik(a,b,c,d){var e=B("yt.logging.errors.log");e?e(a,"WARNING",b,c,d):(e=M("ERRORS",[]),e.push([a,"WARNING",b,c,d]),yk("ERRORS",e))}
;function Jk(){var a=Kk;B("yt.ads.biscotti.getId_")||z("yt.ads.biscotti.getId_",a)}
function Lk(a){z("yt.ads.biscotti.lastId_",a)}
;var Mk=/^[\w.]*$/,Nk={q:!0,search_query:!0};function Ok(a,b){b=a.split(b);for(var c={},d=0,e=b.length;d<e;d++){var f=b[d].split("=");if(1==f.length&&f[0]||2==f.length)try{var g=Pk(f[0]||""),h=Pk(f[1]||"");g in c?Array.isArray(c[g])?nb(c[g],h):c[g]=[c[g],h]:c[g]=h}catch(t){var k=t,m=f[0],q=String(Ok);k.args=[{key:m,value:f[1],query:a,method:Qk==q?"unchanged":q}];Nk.hasOwnProperty(m)||Ik(k)}}return c}
var Qk=String(Ok);function Rk(a){var b=[];ob(a,function(c,d){var e=encodeURIComponent(String(d)),f;Array.isArray(c)?f=c:f=[c];hb(f,function(g){""==g?b.push(e):b.push(e+"="+encodeURIComponent(String(g)))})});
return b.join("&")}
function Sk(a){"?"==a.charAt(0)&&(a=a.substr(1));return Ok(a,"&")}
function Tk(a){return-1!=a.indexOf("?")?(a=(a||"").split("#")[0],a=a.split("?",2),Sk(1<a.length?a[1]:a[0])):{}}
function Uk(a,b,c){var d=a.split("#",2);a=d[0];d=1<d.length?"#"+d[1]:"";var e=a.split("?",2);a=e[0];e=Sk(e[1]||"");for(var f in b)!c&&null!==e&&f in e||(e[f]=b[f]);return vc(a,e)+d}
function Vk(a){if(!b)var b=window.location.href;var c=nc(1,a),d=oc(a);c&&d?(a=a.match(lc),b=b.match(lc),a=a[3]==b[3]&&a[1]==b[1]&&a[4]==b[4]):a=d?oc(b)==d&&(Number(nc(4,b))||null)==(Number(nc(4,a))||null):!0;return a}
function Pk(a){return a&&a.match(Mk)?a:decodeURIComponent(a.replace(/\+/g," "))}
;function Wk(a){var b=Xk;a=void 0===a?B("yt.ads.biscotti.lastId_")||"":a;var c=Object,d=c.assign,e={};e.dt=Lh;e.flash="0";a:{try{var f=b.i.top.location.href}catch(la){f=2;break a}f=f?f===b.j.location.href?0:1:2}e=(e.frm=f,e);try{e.u_tz=-(new Date).getTimezoneOffset();var g=void 0===g?zh:g;try{var h=g.history.length}catch(la){h=0}e.u_his=h;var k;e.u_h=null==(k=zh.screen)?void 0:k.height;var m;e.u_w=null==(m=zh.screen)?void 0:m.width;var q;e.u_ah=null==(q=zh.screen)?void 0:q.availHeight;var t;e.u_aw=
null==(t=zh.screen)?void 0:t.availWidth;var x;e.u_cd=null==(x=zh.screen)?void 0:x.colorDepth}catch(la){}h=b.i;try{var u=h.screenX;var A=h.screenY}catch(la){}try{var E=h.outerWidth;var F=h.outerHeight}catch(la){}try{var N=h.innerWidth;var O=h.innerHeight}catch(la){}try{var Q=h.screenLeft;var ca=h.screenTop}catch(la){}try{N=h.innerWidth,O=h.innerHeight}catch(la){}try{var aa=h.screen.availWidth;var ja=h.screen.availTop}catch(la){}u=[Q,ca,u,A,aa,ja,E,F,N,O];try{var ma=(b.i.top||window).document,na="CSS1Compat"==
ma.compatMode?ma.documentElement:ma.body;var H=(new df(na.clientWidth,na.clientHeight)).round()}catch(la){H=new df(-12245933,-12245933)}ma=H;H={};var sa=void 0===sa?y:sa;na=new Uh;sa.SVGElement&&sa.document.createElementNS&&na.set(0);A=Fh();A["allow-top-navigation-by-user-activation"]&&na.set(1);A["allow-popups-to-escape-sandbox"]&&na.set(2);sa.crypto&&sa.crypto.subtle&&na.set(3);sa.TextDecoder&&sa.TextEncoder&&na.set(4);sa=Vh(na);H.bc=sa;H.bih=ma.height;H.biw=ma.width;H.brdim=u.join();b=b.j;b=(H.vis=
b.prerendering?3:{visible:1,hidden:2,prerender:3,preview:4,unloaded:5}[b.visibilityState||b.webkitVisibilityState||b.mozVisibilityState||""]||0,H.wgl=!!zh.WebGLRenderingContext,H);c=d.call(c,e,b);c.ca_type="image";a&&(c.bid=a);return c}
var Xk=new function(){var a=window.document;this.i=window;this.j=a};
z("yt.ads_.signals_.getAdSignalsString",function(a){return Rk(Wk(a))});Date.now();var Yk="XMLHttpRequest"in y?function(){return new XMLHttpRequest}:null;
function Zk(){if(!Yk)return null;var a=Yk();return"open"in a?a:null}
function $k(a){switch(a&&"status"in a?a.status:-1){case 200:case 201:case 202:case 203:case 204:case 205:case 206:case 304:return!0;default:return!1}}
;function al(a,b){"function"===typeof a&&(a=Gk(a));return window.setTimeout(a,b)}
function bl(a){window.clearTimeout(a)}
;var cl={Authorization:"AUTHORIZATION","X-Goog-EOM-Visitor-Id":"EOM_VISITOR_DATA","X-Goog-Visitor-Id":"SANDBOXED_VISITOR_ID","X-Youtube-Domain-Admin-State":"DOMAIN_ADMIN_STATE","X-Youtube-Chrome-Connected":"CHROME_CONNECTED_HEADER","X-YouTube-Client-Name":"INNERTUBE_CONTEXT_CLIENT_NAME","X-YouTube-Client-Version":"INNERTUBE_CONTEXT_CLIENT_VERSION","X-YouTube-Delegation-Context":"INNERTUBE_CONTEXT_SERIALIZED_DELEGATION_CONTEXT","X-YouTube-Device":"DEVICE","X-Youtube-Identity-Token":"ID_TOKEN","X-YouTube-Page-CL":"PAGE_CL",
"X-YouTube-Page-Label":"PAGE_BUILD_LABEL","X-YouTube-Variants-Checksum":"VARIANTS_CHECKSUM"},dl="app debugcss debugjs expflag force_ad_params force_ad_encrypted force_viral_ad_response_params forced_experiments innertube_snapshots innertube_goldens internalcountrycode internalipoverride absolute_experiments conditional_experiments sbb sr_bns_address".split(" ").concat(ia(Mh)),el=!1;
function fl(a,b){b=void 0===b?{}:b;var c=Vk(a),d=P("web_ajax_ignore_global_headers_if_set"),e;for(e in cl){var f=M(cl[e]);P("enable_visitor_header_for_vss")&&"X-Goog-Visitor-Id"===e&&!f&&(f=M("VISITOR_DATA"));!f||!c&&oc(a)||d&&void 0!==b[e]||!P("enable_web_eom_visitor_data")&&"X-Goog-EOM-Visitor-Id"===e||(b[e]=f)}"X-Goog-EOM-Visitor-Id"in b&&"X-Goog-Visitor-Id"in b&&delete b["X-Goog-Visitor-Id"];if(c||!oc(a))b["X-YouTube-Utc-Offset"]=String(-(new Date).getTimezoneOffset());if(c||!oc(a)){try{var g=
(new Intl.DateTimeFormat).resolvedOptions().timeZone}catch(h){}g&&(b["X-YouTube-Time-Zone"]=g)}if(c||!oc(a))b["X-YouTube-Ad-Signals"]=Rk(Wk());return b}
function gl(a){var b=window.location.search,c=oc(a);P("debug_handle_relative_url_for_query_forward_killswitch")||c||!Vk(a)||(c=document.location.hostname);var d=mc(nc(5,a));d=(c=c&&(c.endsWith("youtube.com")||c.endsWith("youtube-nocookie.com")))&&d&&d.startsWith("/api/");if(!c||d)return a;var e=Sk(b),f={};hb(dl,function(g){e[g]&&(f[g]=e[g])});
return Uk(a,f||{},!1)}
function hl(a,b){var c=b.format||"JSON";a=il(a,b);var d=jl(a,b),e=!1,f=kl(a,function(k){if(!e){e=!0;h&&bl(h);var m=$k(k),q=null,t=400<=k.status&&500>k.status,x=500<=k.status&&600>k.status;if(m||t||x)q=ll(a,c,k,b.convertToSafeHtml);if(m)a:if(k&&204==k.status)m=!0;else{switch(c){case "XML":m=0==parseInt(q&&q.return_code,10);break a;case "RAW":m=!0;break a}m=!!q}q=q||{};t=b.context||y;m?b.onSuccess&&b.onSuccess.call(t,k,q):b.onError&&b.onError.call(t,k,q);b.onFinish&&b.onFinish.call(t,k,q)}},b.method,
d,b.headers,b.responseType,b.withCredentials);
d=b.timeout||0;if(b.onTimeout&&0<d){var g=b.onTimeout;var h=al(function(){e||(e=!0,f.abort(),bl(h),g.call(b.context||y,f))},d)}return f}
function il(a,b){b.includeDomain&&(a=document.location.protocol+"//"+document.location.hostname+(document.location.port?":"+document.location.port:"")+a);var c=M("XSRF_FIELD_NAME");if(b=b.urlParams)b[c]&&delete b[c],a=Uk(a,b||{},!0);return a}
function jl(a,b){var c=M("XSRF_FIELD_NAME"),d=M("XSRF_TOKEN"),e=b.postBody||"",f=b.postParams,g=M("XSRF_FIELD_NAME"),h;b.headers&&(h=b.headers["Content-Type"]);b.excludeXsrf||oc(a)&&!b.withCredentials&&oc(a)!=document.location.hostname||"POST"!=b.method||h&&"application/x-www-form-urlencoded"!=h||b.postParams&&b.postParams[g]||(f||(f={}),f[c]=d);f&&"string"===typeof e&&(e=Sk(e),yb(e,f),e=b.postBodyFormat&&"JSON"==b.postBodyFormat?JSON.stringify(e):tc(e));f=e||f&&!rb(f);!el&&f&&"POST"!=b.method&&(el=
!0,Hk(Error("AJAX request with postData should use POST")));return e}
function ll(a,b,c,d){var e=null;switch(b){case "JSON":try{var f=c.responseText}catch(g){throw d=Error("Error reading responseText"),d.params=a,Ik(d),g;}a=c.getResponseHeader("Content-Type")||"";f&&0<=a.indexOf("json")&&(")]}'\n"===f.substring(0,5)&&(f=f.substring(5)),e=JSON.parse(f));break;case "XML":if(a=(a=c.responseXML)?ml(a):null)e={},hb(a.getElementsByTagName("*"),function(g){e[g.tagName]=nl(g)})}d&&ol(e);
return e}
function ol(a){if(Ta(a))for(var b in a){var c;(c="html_content"==b)||(c=b.length-5,c=0<=c&&b.indexOf("_html",c)==c);if(c){c=b;Db("HTML that is escaped and sanitized server-side and passed through yt.net.ajax");var d=a[b],e=Ab();d=e?e.createHTML(d):d;a[c]=new ec(d)}else ol(a[b])}}
function ml(a){return a?(a=("responseXML"in a?a.responseXML:a).getElementsByTagName("root"))&&0<a.length?a[0]:null:null}
function nl(a){var b="";hb(a.childNodes,function(c){b+=c.nodeValue});
return b}
function kl(a,b,c,d,e,f,g){function h(){4==(k&&"readyState"in k?k.readyState:0)&&b&&Gk(b)(k)}
c=void 0===c?"GET":c;d=void 0===d?"":d;var k=Zk();if(!k)return null;"onloadend"in k?k.addEventListener("loadend",h,!1):k.onreadystatechange=h;P("debug_forward_web_query_parameters")&&(a=gl(a));k.open(c,a,!0);f&&(k.responseType=f);g&&(k.withCredentials=!0);c="POST"==c&&(void 0===window.FormData||!(d instanceof FormData));if(e=fl(a,e))for(var m in e)k.setRequestHeader(m,e[m]),"content-type"==m.toLowerCase()&&(c=!1);c&&k.setRequestHeader("Content-Type","application/x-www-form-urlencoded");k.send(d);
return k}
;function pl(a){var b=this;this.j=void 0;this.i=!1;a.addEventListener("beforeinstallprompt",function(c){c.preventDefault();b.j=c});
a.addEventListener("appinstalled",function(){b.i=!0},{once:!0})}
function ql(){if(!y.matchMedia)return"WEB_DISPLAY_MODE_UNKNOWN";try{return y.matchMedia("(display-mode: standalone)").matches?"WEB_DISPLAY_MODE_STANDALONE":y.matchMedia("(display-mode: minimal-ui)").matches?"WEB_DISPLAY_MODE_MINIMAL_UI":y.matchMedia("(display-mode: fullscreen)").matches?"WEB_DISPLAY_MODE_FULLSCREEN":y.matchMedia("(display-mode: browser)").matches?"WEB_DISPLAY_MODE_BROWSER":"WEB_DISPLAY_MODE_UNKNOWN"}catch(a){return"WEB_DISPLAY_MODE_UNKNOWN"}}
;function rl(a,b,c,d,e){mg.set(""+a,b,{ab:c,path:"/",domain:void 0===d?"youtube.com":d,secure:void 0===e?!1:e})}
function sl(){if(!mg.isEnabled())return!1;if(!mg.isEmpty())return!0;mg.set("TESTCOOKIESENABLED","1",{ab:60});if("1"!==mg.get("TESTCOOKIESENABLED"))return!1;mg.remove("TESTCOOKIESENABLED");return!0}
;var tl=B("ytglobal.prefsUserPrefsPrefs_")||{};z("ytglobal.prefsUserPrefsPrefs_",tl);function ul(){this.i=M("ALT_PREF_COOKIE_NAME","PREF");this.j=M("ALT_PREF_COOKIE_DOMAIN","youtube.com");var a=mg.get(""+this.i,void 0);if(a){a=decodeURIComponent(a).split("&");for(var b=0;b<a.length;b++){var c=a[b].split("="),d=c[0];(c=c[1])&&(tl[d]=c.toString())}}}
ul.prototype.get=function(a,b){vl(a);wl(a);a=void 0!==tl[a]?tl[a].toString():null;return null!=a?a:b?b:""};
ul.prototype.set=function(a,b){vl(a);wl(a);if(null==b)throw Error("ExpectedNotNull");tl[a]=b.toString()};
function xl(a){return!!((yl("f"+(Math.floor(a/31)+1))||0)&1<<a%31)}
ul.prototype.remove=function(a){vl(a);wl(a);delete tl[a]};
ul.prototype.clear=function(){for(var a in tl)delete tl[a]};
function wl(a){if(/^f([1-9][0-9]*)$/.test(a))throw Error("ExpectedRegexMatch: "+a);}
function vl(a){if(!/^\w+$/.test(a))throw Error("ExpectedRegexMismatch: "+a);}
function yl(a){a=void 0!==tl[a]?tl[a].toString():null;return null!=a&&/^[A-Fa-f0-9]+$/.test(a)?parseInt(a,16):null}
Qa(ul);var zl={bluetooth:"CONN_DISCO",cellular:"CONN_CELLULAR_UNKNOWN",ethernet:"CONN_WIFI",none:"CONN_NONE",wifi:"CONN_WIFI",wimax:"CONN_CELLULAR_4G",other:"CONN_UNKNOWN",unknown:"CONN_UNKNOWN","slow-2g":"CONN_CELLULAR_2G","2g":"CONN_CELLULAR_2G","3g":"CONN_CELLULAR_3G","4g":"CONN_CELLULAR_4G"},Al={CONN_DEFAULT:0,CONN_UNKNOWN:1,CONN_NONE:2,CONN_WIFI:3,CONN_CELLULAR_2G:4,CONN_CELLULAR_3G:5,CONN_CELLULAR_4G:6,CONN_CELLULAR_UNKNOWN:7,CONN_DISCO:8,CONN_CELLULAR_5G:9,CONN_WIFI_METERED:10,CONN_CELLULAR_5G_SA:11,
CONN_CELLULAR_5G_NSA:12,CONN_INVALID:31},Bl={EFFECTIVE_CONNECTION_TYPE_UNKNOWN:0,EFFECTIVE_CONNECTION_TYPE_OFFLINE:1,EFFECTIVE_CONNECTION_TYPE_SLOW_2G:2,EFFECTIVE_CONNECTION_TYPE_2G:3,EFFECTIVE_CONNECTION_TYPE_3G:4,EFFECTIVE_CONNECTION_TYPE_4G:5},Cl={"slow-2g":"EFFECTIVE_CONNECTION_TYPE_SLOW_2G","2g":"EFFECTIVE_CONNECTION_TYPE_2G","3g":"EFFECTIVE_CONNECTION_TYPE_3G","4g":"EFFECTIVE_CONNECTION_TYPE_4G"};function Dl(){var a=y.navigator;return a?a.connection:void 0}
function El(){var a=Dl();if(a){var b=zl[a.type||"unknown"]||"CONN_UNKNOWN";a=zl[a.effectiveType||"unknown"]||"CONN_UNKNOWN";"CONN_CELLULAR_UNKNOWN"===b&&"CONN_UNKNOWN"!==a&&(b=a);if("CONN_UNKNOWN"!==b)return b;if("CONN_UNKNOWN"!==a)return a}}
function Fl(){var a=Dl();if(null!=a&&a.effectiveType)return Cl.hasOwnProperty(a.effectiveType)?Cl[a.effectiveType]:"EFFECTIVE_CONNECTION_TYPE_UNKNOWN"}
;function Gl(){return"INNERTUBE_API_KEY"in xk&&"INNERTUBE_API_VERSION"in xk}
function Hl(){return{innertubeApiKey:M("INNERTUBE_API_KEY"),innertubeApiVersion:M("INNERTUBE_API_VERSION"),rb:M("INNERTUBE_CONTEXT_CLIENT_CONFIG_INFO"),Tb:M("INNERTUBE_CONTEXT_CLIENT_NAME","WEB"),Kc:M("INNERTUBE_CONTEXT_CLIENT_NAME",1),innertubeContextClientVersion:M("INNERTUBE_CONTEXT_CLIENT_VERSION"),Vb:M("INNERTUBE_CONTEXT_HL"),Ub:M("INNERTUBE_CONTEXT_GL"),Lc:M("INNERTUBE_HOST_OVERRIDE")||"",Nc:!!M("INNERTUBE_USE_THIRD_PARTY_AUTH",!1),Mc:!!M("INNERTUBE_OMIT_API_KEY_WHEN_AUTH_HEADER_IS_PRESENT",
!1),appInstallData:M("SERIALIZED_CLIENT_CONFIG_DATA")}}
function Il(a){var b={client:{hl:a.Vb,gl:a.Ub,clientName:a.Tb,clientVersion:a.innertubeContextClientVersion,configInfo:a.rb}};navigator.userAgent&&(b.client.userAgent=String(navigator.userAgent));var c=y.devicePixelRatio;c&&1!=c&&(b.client.screenDensityFloat=String(c));c=Ck();""!==c&&(b.client.experimentsToken=c);c=Dk();0<c.length&&(b.request={internalExperimentFlags:c});Jl(a,void 0,b);Kl(void 0,b);Ll(a,void 0,b);Ml(void 0,b);M("DELEGATED_SESSION_ID")&&!P("pageid_as_header_web")&&(b.user={onBehalfOfUser:M("DELEGATED_SESSION_ID")});
a=Object;c=a.assign;for(var d=b.client,e={},f=p(Object.entries(Sk(M("DEVICE","")))),g=f.next();!g.done;g=f.next()){var h=p(g.value);g=h.next().value;h=h.next().value;"cbrand"===g?e.deviceMake=h:"cmodel"===g?e.deviceModel=h:"cbr"===g?e.browserName=h:"cbrver"===g?e.browserVersion=h:"cos"===g?e.osName=h:"cosver"===g?e.osVersion=h:"cplatform"===g&&(e.platform=h)}b.client=c.call(a,d,e);return b}
function Nl(a){var b=new Ui,c=new Ni;D(c,1,a.Vb);D(c,2,a.Ub);D(c,16,a.Kc);D(c,17,a.innertubeContextClientVersion);if(a.rb){var d=a.rb,e=new Ji;d.coldConfigData&&D(e,1,d.coldConfigData);d.appInstallData&&D(e,6,d.appInstallData);d.coldHashData&&D(e,3,d.coldHashData);d.hotHashData&&D(e,5,d.hotHashData);G(c,Ji,62,e)}(d=y.devicePixelRatio)&&1!=d&&D(c,65,d);d=Ck();""!==d&&D(c,54,d);d=Dk();if(0<d.length){e=new Pi;for(var f=0;f<d.length;f++){var g=new Hi;D(g,1,d[f].key);g.setValue(d[f].value);$d(e,15,Hi,
g)}G(b,Pi,5,e)}Jl(a,c);Kl(c);Ll(a,c);Ml(c);M("DELEGATED_SESSION_ID")&&!P("pageid_as_header_web")&&(a=new Si,D(a,3,M("DELEGATED_SESSION_ID")));a=p(Object.entries(Sk(M("DEVICE",""))));for(d=a.next();!d.done;d=a.next())e=p(d.value),d=e.next().value,e=e.next().value,"cbrand"===d?D(c,12,e):"cmodel"===d?D(c,13,e):"cbr"===d?D(c,87,e):"cbrver"===d?D(c,88,e):"cos"===d?D(c,18,e):"cosver"===d?D(c,19,e):"cplatform"===d&&D(c,42,e);b.s(c);return b}
function Jl(a,b,c){a=a.Tb;if("WEB"===a||"MWEB"===a||1===a||2===a)if(b){c=Vd(b,Ki,96)||new Ki;var d=ql();d=Object.keys(Th).indexOf(d);d=-1===d?null:d;null!==d&&D(c,3,d);G(b,Ki,96,c)}else c&&(c.client.mainAppWebInfo=null!=(d=c.client.mainAppWebInfo)?d:{},c.client.mainAppWebInfo.webDisplayMode=ql())}
function Kl(a,b){var c;if(P("web_log_memory_total_kbytes")&&(null==(c=y.navigator)?0:c.deviceMemory)){var d;c=null==(d=y.navigator)?void 0:d.deviceMemory;a?D(a,95,1E6*c):b&&(b.client.memoryTotalKbytes=""+1E6*c)}}
function Ll(a,b,c){if(a.appInstallData)if(b){var d;c=null!=(d=Vd(b,Ji,62))?d:new Ji;D(c,6,a.appInstallData);G(b,Ji,62,c)}else c&&(c.client.configInfo=c.client.configInfo||{},c.client.configInfo.appInstallData=a.appInstallData)}
function Ml(a,b){var c=El();c&&(a?D(a,61,Al[c]):b&&(b.client.connectionType=c));P("web_log_effective_connection_type")&&(c=Fl())&&(a?D(a,94,Bl[c]):b&&(b.client.effectiveConnectionType=c))}
function Ol(a,b,c){c=void 0===c?{}:c;var d={};P("enable_web_eom_visitor_data")&&M("EOM_VISITOR_DATA")?d={"X-Goog-EOM-Visitor-Id":M("EOM_VISITOR_DATA")}:d={"X-Goog-Visitor-Id":c.visitorData||M("VISITOR_DATA","")};if(b&&b.includes("www.youtube-nocookie.com"))return d;(b=c.kq||M("AUTHORIZATION"))||(a?b="Bearer "+B("gapi.auth.getToken")().jq:b=qg([]));b&&(d.Authorization=b,d["X-Goog-AuthUser"]=M("SESSION_INDEX",0),P("pageid_as_header_web")&&(d["X-Goog-PageId"]=M("DELEGATED_SESSION_ID")));return d}
;function Pl(a){a=Object.assign({},a);delete a.Authorization;var b=qg();if(b){var c=new Zh;c.update(M("INNERTUBE_API_KEY"));c.update(b);a.hash=fd(c.digest(),3)}return a}
;function Ql(a){var b=new zi;(b=b.isAvailable()?a?new Fi(b,a):b:null)||(a=new Ai(a||"UserDataSharedStore"),b=a.isAvailable()?a:null);this.i=(a=b)?new vi(a):null;this.j=document.domain||window.location.hostname}
Ql.prototype.set=function(a,b,c,d){c=c||31104E3;this.remove(a);if(this.i)try{this.i.set(a,b,Date.now()+1E3*c);return}catch(f){}var e="";if(d)try{e=escape(ug(b))}catch(f){return}else e=escape(b);rl(a,e,c,this.j)};
Ql.prototype.get=function(a,b){var c=void 0,d=!this.i;if(!d)try{c=this.i.get(a)}catch(e){d=!0}if(d&&(c=mg.get(""+a,void 0))&&(c=unescape(c),b))try{c=JSON.parse(c)}catch(e){this.remove(a),c=void 0}return c};
Ql.prototype.remove=function(a){this.i&&this.i.remove(a);var b=this.j;mg.remove(""+a,"/",void 0===b?"youtube.com":b)};var Rl=window,R=Rl.ytcsi&&Rl.ytcsi.now?Rl.ytcsi.now:Rl.performance&&Rl.performance.timing&&Rl.performance.now&&Rl.performance.timing.navigationStart?function(){return Rl.performance.timing.navigationStart+Rl.performance.now()}:function(){return(new Date).getTime()};var Sl;function Tl(){Sl||(Sl=new Ql("yt.innertube"));return Sl}
function Ul(a,b,c,d){if(d)return null;d=Tl().get("nextId",!0)||1;var e=Tl().get("requests",!0)||{};e[d]={method:a,request:b,authState:Pl(c),requestTime:Math.round(R())};Tl().set("nextId",d+1,86400,!0);Tl().set("requests",e,86400,!0);return d}
function Vl(a){var b=Tl().get("requests",!0)||{};delete b[a];Tl().set("requests",b,86400,!0)}
function Wl(a){var b=Tl().get("requests",!0);if(b){for(var c in b){var d=b[c];if(!(6E4>Math.round(R())-d.requestTime)){var e=d.authState,f=Pl(Ol(!1));ub(e,f)&&(e=d.request,"requestTimeMs"in e&&(e.requestTimeMs=Math.round(R())),Xl(a,d.method,e,{}));delete b[c]}}Tl().set("requests",b,86400,!0)}}
;function Yl(){}
Yl.prototype.S=function(a,b){return Zl(a,1,b)};
function $l(a,b){Zl(a,2,b)}
function am(a){var b=B("yt.scheduler.instance.addImmediateJob");b?b(a):a()}
;function bm(){Yl.apply(this,arguments)}
r(bm,Yl);function cm(){bm.i||(bm.i=new bm);return bm.i}
function Zl(a,b,c){void 0!==c&&Number.isNaN(Number(c))&&(c=void 0);var d=B("yt.scheduler.instance.addJob");return d?d(a,b,c):void 0===c?(a(),NaN):al(a,c||0)}
bm.prototype.fa=function(a){if(void 0===a||!Number.isNaN(Number(a))){var b=B("yt.scheduler.instance.cancelJob");b?b(a):bl(a)}};
bm.prototype.start=function(){var a=B("yt.scheduler.instance.start");a&&a()};
bm.prototype.pause=function(){var a=B("yt.scheduler.instance.pause");a&&a()};var Rh=cm();var dm=ad||bd;function em(a){var b=Tb();return b?0<=b.toLowerCase().indexOf(a):!1}
;var fm=function(){var a;return function(){a||(a=new Ql("ytidb"));return a}}();
function gm(){var a;return null==(a=fm())?void 0:a.get("LAST_RESULT_ENTRY_KEY",!0)}
;var hm=[],im,jm=!1;function km(){var a={};for(im=new lm(void 0===a.handleError?mm:a.handleError,void 0===a.logEvent?nm:a.logEvent);0<hm.length;)switch(a=hm.shift(),a.type){case "ERROR":im.handleError(a.payload);break;case "EVENT":im.logEvent(a.eventType,a.payload)}}
function om(a){jm||(im?im.handleError(a):(hm.push({type:"ERROR",payload:a}),10<hm.length&&hm.shift()))}
function pm(a,b){jm||(im?im.logEvent(a,b):(hm.push({type:"EVENT",eventType:a,payload:b}),10<hm.length&&hm.shift()))}
;function S(a){var b=Ma.apply(1,arguments);var c=Error.call(this,a);this.message=c.message;"stack"in c&&(this.stack=c.stack);this.args=[].concat(ia(b))}
r(S,Error);function qm(){try{return rm(),!0}catch(a){return!1}}
function rm(a){if(void 0!==M("DATASYNC_ID"))return M("DATASYNC_ID");throw new S("Datasync ID not set",void 0===a?"unknown":a);}
;function sm(a){if(0<=a.indexOf(":"))throw Error("Database name cannot contain ':'");}
function tm(a){return a.substr(0,a.indexOf(":"))||a}
;var um={},vm=(um.AUTH_INVALID="No user identifier specified.",um.EXPLICIT_ABORT="Transaction was explicitly aborted.",um.IDB_NOT_SUPPORTED="IndexedDB is not supported.",um.MISSING_INDEX="Index not created.",um.MISSING_OBJECT_STORES="Object stores not created.",um.DB_DELETED_BY_MISSING_OBJECT_STORES="Database is deleted because expected object stores were not created.",um.DB_REOPENED_BY_MISSING_OBJECT_STORES="Database is reopened because expected object stores were not created.",um.UNKNOWN_ABORT="Transaction was aborted for unknown reasons.",
um.QUOTA_EXCEEDED="The current transaction exceeded its quota limitations.",um.QUOTA_MAYBE_EXCEEDED="The current transaction may have failed because of exceeding quota limitations.",um.EXECUTE_TRANSACTION_ON_CLOSED_DB="Can't start a transaction on a closed database",um.INCOMPATIBLE_DB_VERSION="The binary is incompatible with the database version",um),wm={},xm=(wm.AUTH_INVALID="ERROR",wm.EXECUTE_TRANSACTION_ON_CLOSED_DB="WARNING",wm.EXPLICIT_ABORT="IGNORED",wm.IDB_NOT_SUPPORTED="ERROR",wm.MISSING_INDEX=
"WARNING",wm.MISSING_OBJECT_STORES="ERROR",wm.DB_DELETED_BY_MISSING_OBJECT_STORES="WARNING",wm.DB_REOPENED_BY_MISSING_OBJECT_STORES="WARNING",wm.QUOTA_EXCEEDED="WARNING",wm.QUOTA_MAYBE_EXCEEDED="WARNING",wm.UNKNOWN_ABORT="WARNING",wm.INCOMPATIBLE_DB_VERSION="WARNING",wm),ym={},zm=(ym.AUTH_INVALID=!1,ym.EXECUTE_TRANSACTION_ON_CLOSED_DB=!1,ym.EXPLICIT_ABORT=!1,ym.IDB_NOT_SUPPORTED=!1,ym.MISSING_INDEX=!1,ym.MISSING_OBJECT_STORES=!1,ym.DB_DELETED_BY_MISSING_OBJECT_STORES=!1,ym.DB_REOPENED_BY_MISSING_OBJECT_STORES=
!1,ym.QUOTA_EXCEEDED=!1,ym.QUOTA_MAYBE_EXCEEDED=!0,ym.UNKNOWN_ABORT=!0,ym.INCOMPATIBLE_DB_VERSION=!1,ym);function Am(a,b,c,d,e){b=void 0===b?{}:b;c=void 0===c?vm[a]:c;d=void 0===d?xm[a]:d;e=void 0===e?zm[a]:e;S.call(this,c,Object.assign({},{name:"YtIdbKnownError",isSw:void 0===self.document,isIframe:self!==self.top,type:a},b));this.type=a;this.message=c;this.level=d;this.i=e;Object.setPrototypeOf(this,Am.prototype)}
r(Am,S);function Bm(a,b){Am.call(this,"MISSING_OBJECT_STORES",{expectedObjectStores:b,foundObjectStores:a},vm.MISSING_OBJECT_STORES);Object.setPrototypeOf(this,Bm.prototype)}
r(Bm,Am);function Cm(a,b){var c=Error.call(this);this.message=c.message;"stack"in c&&(this.stack=c.stack);this.index=a;this.objectStore=b;Object.setPrototypeOf(this,Cm.prototype)}
r(Cm,Error);var Dm=["The database connection is closing","Can't start a transaction on a closed database","A mutation operation was attempted on a database that did not allow mutations"];
function Em(a,b,c,d){b=tm(b);var e=a instanceof Error?a:Error("Unexpected error: "+a);if(e instanceof Am)return e;a={objectStoreNames:c,dbName:b,dbVersion:d};if("QuotaExceededError"===e.name)return new Am("QUOTA_EXCEEDED",a);if(cd&&"UnknownError"===e.name)return new Am("QUOTA_MAYBE_EXCEEDED",a);if(e instanceof Cm)return new Am("MISSING_INDEX",Object.assign({},a,{objectStore:e.objectStore,index:e.index}));if("InvalidStateError"===e.name&&Dm.some(function(f){return e.message.includes(f)}))return new Am("EXECUTE_TRANSACTION_ON_CLOSED_DB",
a);
if("AbortError"===e.name)return new Am("UNKNOWN_ABORT",a,e.message);e.args=[Object.assign({},a,{name:"IdbError",Zb:e.name})];e.level="WARNING";return e}
function Fm(a,b,c){var d=gm();return new Am("IDB_NOT_SUPPORTED",{context:{caller:a,publicName:b,version:c,hasSucceededOnce:null==d?void 0:d.hasSucceededOnce}})}
;function Gm(a){if(!a)throw Error();throw a;}
function Hm(a){return a}
function Im(a){this.i=a}
function Jm(a){function b(e){if("PENDING"===d.state.status){d.state={status:"REJECTED",reason:e};e=p(d.onRejected);for(var f=e.next();!f.done;f=e.next())f=f.value,f()}}
function c(e){if("PENDING"===d.state.status){d.state={status:"FULFILLED",value:e};e=p(d.i);for(var f=e.next();!f.done;f=e.next())f=f.value,f()}}
var d=this;this.state={status:"PENDING"};this.i=[];this.onRejected=[];a=a.i;try{a(c,b)}catch(e){b(e)}}
Jm.all=function(a){return new Jm(new Im(function(b,c){var d=[],e=a.length;0===e&&b(d);for(var f={wa:0};f.wa<a.length;f={wa:f.wa},++f.wa)Jm.resolve(a[f.wa]).then(function(g){return function(h){d[g.wa]=h;e--;0===e&&b(d)}}(f)).catch(function(g){c(g)})}))};
Jm.resolve=function(a){return new Jm(new Im(function(b,c){a instanceof Jm?a.then(b,c):b(a)}))};
Jm.reject=function(a){return new Jm(new Im(function(b,c){c(a)}))};
Jm.prototype.then=function(a,b){var c=this,d=null!=a?a:Hm,e=null!=b?b:Gm;return new Jm(new Im(function(f,g){"PENDING"===c.state.status?(c.i.push(function(){Km(c,c,d,f,g)}),c.onRejected.push(function(){Lm(c,c,e,f,g)})):"FULFILLED"===c.state.status?Km(c,c,d,f,g):"REJECTED"===c.state.status&&Lm(c,c,e,f,g)}))};
Jm.prototype.catch=function(a){return this.then(void 0,a)};
function Km(a,b,c,d,e){try{if("FULFILLED"!==a.state.status)throw Error("calling handleResolve before the promise is fulfilled.");var f=c(a.state.value);f instanceof Jm?Mm(a,b,f,d,e):d(f)}catch(g){e(g)}}
function Lm(a,b,c,d,e){try{if("REJECTED"!==a.state.status)throw Error("calling handleReject before the promise is rejected.");var f=c(a.state.reason);f instanceof Jm?Mm(a,b,f,d,e):d(f)}catch(g){e(g)}}
function Mm(a,b,c,d,e){b===c?e(new TypeError("Circular promise chain detected.")):c.then(function(f){f instanceof Jm?Mm(a,b,f,d,e):d(f)},function(f){e(f)})}
;function Nm(a,b,c){function d(){c(a.error);f()}
function e(){b(a.result);f()}
function f(){try{a.removeEventListener("success",e),a.removeEventListener("error",d)}catch(g){}}
a.addEventListener("success",e);a.addEventListener("error",d)}
function Om(a){return new Promise(function(b,c){Nm(a,b,c)})}
function Pm(a){return new Jm(new Im(function(b,c){Nm(a,b,c)}))}
;function Qm(a,b){return new Jm(new Im(function(c,d){function e(){var f=a?b(a):null;f?f.then(function(g){a=g;e()},d):c()}
e()}))}
;function Rm(a,b){this.i=a;this.options=b;this.transactionCount=0;this.l=Math.round(R());this.j=!1}
l=Rm.prototype;l.add=function(a,b,c){return Sm(this,[a],{mode:"readwrite",U:!0},function(d){return d.objectStore(a).add(b,c)})};
l.clear=function(a){return Sm(this,[a],{mode:"readwrite",U:!0},function(b){return b.objectStore(a).clear()})};
l.close=function(){this.i.close();var a;(null==(a=this.options)?0:a.closed)&&this.options.closed()};
l.count=function(a,b){return Sm(this,[a],{mode:"readonly",U:!0},function(c){return c.objectStore(a).count(b)})};
function Tm(a,b,c){a=a.i.createObjectStore(b,c);return new Um(a)}
l.delete=function(a,b){return Sm(this,[a],{mode:"readwrite",U:!0},function(c){return c.objectStore(a).delete(b)})};
l.get=function(a,b){return Sm(this,[a],{mode:"readonly",U:!0},function(c){return c.objectStore(a).get(b)})};
function Vm(a,b){return Sm(a,["LogsRequestsStore"],{mode:"readwrite",U:!0},function(c){c=c.objectStore("LogsRequestsStore");return Pm(c.i.put(b,void 0))})}
l.objectStoreNames=function(){return Array.from(this.i.objectStoreNames)};
function Sm(a,b,c,d){var e,f,g,h,k,m,q,t,x,u,A,E;return w(function(F){switch(F.i){case 1:var N={mode:"readonly",U:!1,tag:"IDB_TRANSACTION_TAG_UNKNOWN"};"string"===typeof c?N.mode=c:Object.assign(N,c);e=N;a.transactionCount++;f=e.U?3:1;g=0;case 2:if(h){F.u(3);break}g++;k=Math.round(R());Ba(F,4);m=a.i.transaction(b,e.mode);N=new Wm(m);N=Xm(N,d);return v(F,N,6);case 6:return q=F.j,t=Math.round(R()),Ym(a,k,t,g,void 0,b.join(),e),F.return(q);case 4:x=Da(F);u=Math.round(R());A=Em(x,a.i.name,b.join(),a.i.version);
if((E=A instanceof Am&&!A.i)||g>=f)Ym(a,k,u,g,A,b.join(),e),h=A;F.u(2);break;case 3:return F.return(Promise.reject(h))}})}
function Ym(a,b,c,d,e,f,g){b=c-b;e?(e instanceof Am&&("QUOTA_EXCEEDED"===e.type||"QUOTA_MAYBE_EXCEEDED"===e.type)&&pm("QUOTA_EXCEEDED",{dbName:tm(a.i.name),objectStoreNames:f,transactionCount:a.transactionCount,transactionMode:g.mode}),e instanceof Am&&"UNKNOWN_ABORT"===e.type&&(c-=a.l,0>c&&c>=Math.pow(2,31)&&(c=0),pm("TRANSACTION_UNEXPECTEDLY_ABORTED",{objectStoreNames:f,transactionDuration:b,transactionCount:a.transactionCount,dbDuration:c}),a.j=!0),Zm(a,!1,d,f,b,g.tag),om(e)):Zm(a,!0,d,f,b,g.tag)}
function Zm(a,b,c,d,e,f){pm("TRANSACTION_ENDED",{objectStoreNames:d,connectionHasUnknownAbortedTransaction:a.j,duration:e,isSuccessful:b,tryCount:c,tag:void 0===f?"IDB_TRANSACTION_TAG_UNKNOWN":f})}
l.getName=function(){return this.i.name};
function Um(a){this.i=a}
l=Um.prototype;l.add=function(a,b){return Pm(this.i.add(a,b))};
l.autoIncrement=function(){return this.i.autoIncrement};
l.clear=function(){return Pm(this.i.clear()).then(function(){})};
l.count=function(a){return Pm(this.i.count(a))};
function $m(a,b){return an(a,{query:b},function(c){return c.delete().then(function(){return c.continue()})}).then(function(){})}
l.delete=function(a){return a instanceof IDBKeyRange?$m(this,a):Pm(this.i.delete(a))};
l.get=function(a){return Pm(this.i.get(a))};
l.index=function(a){try{return new bn(this.i.index(a))}catch(b){if(b instanceof Error&&"NotFoundError"===b.name)throw new Cm(a,this.i.name);throw b;}};
l.getName=function(){return this.i.name};
l.keyPath=function(){return this.i.keyPath};
function an(a,b,c){a=a.i.openCursor(b.query,b.direction);return cn(a).then(function(d){return Qm(d,c)})}
function Wm(a){var b=this;this.i=a;this.l=new Map;this.j=!1;this.done=new Promise(function(c,d){b.i.addEventListener("complete",function(){c()});
b.i.addEventListener("error",function(e){e.currentTarget===e.target&&d(b.i.error)});
b.i.addEventListener("abort",function(){var e=b.i.error;if(e)d(e);else if(!b.j){e=Am;for(var f=b.i.objectStoreNames,g=[],h=0;h<f.length;h++){var k=f.item(h);if(null===k)throw Error("Invariant: item in DOMStringList is null");g.push(k)}e=new e("UNKNOWN_ABORT",{objectStoreNames:g.join(),dbName:b.i.db.name,mode:b.i.mode});d(e)}})})}
function Xm(a,b){var c=new Promise(function(d,e){try{b(a).then(function(f){d(f)}).catch(e)}catch(f){e(f),a.abort()}});
return Promise.all([c,a.done]).then(function(d){return p(d).next().value})}
Wm.prototype.abort=function(){this.i.abort();this.j=!0;throw new Am("EXPLICIT_ABORT");};
Wm.prototype.objectStore=function(a){a=this.i.objectStore(a);var b=this.l.get(a);b||(b=new Um(a),this.l.set(a,b));return b};
function bn(a){this.i=a}
l=bn.prototype;l.count=function(a){return Pm(this.i.count(a))};
l.delete=function(a){return dn(this,{query:a},function(b){return b.delete().then(function(){return b.continue()})})};
l.get=function(a){return Pm(this.i.get(a))};
l.getKey=function(a){return Pm(this.i.getKey(a))};
l.keyPath=function(){return this.i.keyPath};
l.unique=function(){return this.i.unique};
function dn(a,b,c){a=a.i.openCursor(void 0===b.query?null:b.query,void 0===b.direction?"next":b.direction);return cn(a).then(function(d){return Qm(d,c)})}
function en(a,b){this.request=a;this.cursor=b}
function cn(a){return Pm(a).then(function(b){return b?new en(a,b):null})}
l=en.prototype;l.advance=function(a){this.cursor.advance(a);return cn(this.request)};
l.continue=function(a){this.cursor.continue(a);return cn(this.request)};
l.delete=function(){return Pm(this.cursor.delete()).then(function(){})};
l.getKey=function(){return this.cursor.key};
l.getValue=function(){return this.cursor.value};
l.update=function(a){return Pm(this.cursor.update(a))};function fn(a,b,c){return new Promise(function(d,e){function f(){x||(x=new Rm(g.result,{closed:t}));return x}
var g=void 0!==b?self.indexedDB.open(a,b):self.indexedDB.open(a);var h=c.blocked,k=c.blocking,m=c.nd,q=c.upgrade,t=c.closed,x;g.addEventListener("upgradeneeded",function(u){try{if(null===u.newVersion)throw Error("Invariant: newVersion on IDbVersionChangeEvent is null");if(null===g.transaction)throw Error("Invariant: transaction on IDbOpenDbRequest is null");u.dataLoss&&"none"!==u.dataLoss&&pm("IDB_DATA_CORRUPTED",{reason:u.dataLossMessage||"unknown reason",dbName:tm(a)});var A=f(),E=new Wm(g.transaction);
q&&q(A,function(F){return u.oldVersion<F&&u.newVersion>=F},E);
E.done.catch(function(F){e(F)})}catch(F){e(F)}});
g.addEventListener("success",function(){var u=g.result;k&&u.addEventListener("versionchange",function(){k(f())});
u.addEventListener("close",function(){pm("IDB_UNEXPECTEDLY_CLOSED",{dbName:tm(a),dbVersion:u.version});m&&m()});
d(f())});
g.addEventListener("error",function(){e(g.error)});
h&&g.addEventListener("blocked",function(){h()})})}
function gn(a,b,c){c=void 0===c?{}:c;return fn(a,b,c)}
function hn(a,b){b=void 0===b?{}:b;var c,d,e,f;return w(function(g){if(1==g.i)return Ba(g,2),c=self.indexedDB.deleteDatabase(a),d=b,(e=d.blocked)&&c.addEventListener("blocked",function(){e()}),v(g,Om(c),4);
if(2!=g.i)return Ca(g,0);f=Da(g);throw Em(f,a,"",-1);})}
;function jn(a){return new Promise(function(b){$l(function(){b()},a)})}
function kn(a,b){this.name=a;this.options=b;this.m=!0;this.s=this.o=0;this.j=500}
kn.prototype.l=function(a,b,c){c=void 0===c?{}:c;return gn(a,b,c)};
kn.prototype.delete=function(a){a=void 0===a?{}:a;return hn(this.name,a)};
function ln(a,b){return new Am("INCOMPATIBLE_DB_VERSION",{dbName:a.name,oldVersion:a.options.version,newVersion:b})}
function mn(a,b){if(!b)throw Fm("openWithToken",tm(a.name));return nn(a)}
function nn(a){function b(){var f,g,h,k,m,q,t,x,u,A;return w(function(E){switch(E.i){case 1:return g=null!=(f=Error().stack)?f:"",Ba(E,2),v(E,a.l(a.name,a.options.version,d),4);case 4:h=E.j;for(var F=a.options,N=[],O=p(Object.keys(F.Ia)),Q=O.next();!Q.done;Q=O.next()){Q=Q.value;var ca=F.Ia[Q],aa=void 0===ca.Vc?Number.MAX_VALUE:ca.Vc;!(h.i.version>=ca.jb)||h.i.version>=aa||h.i.objectStoreNames.contains(Q)||N.push(Q)}k=N;if(0===k.length){E.u(5);break}m=Object.keys(a.options.Ia);q=h.objectStoreNames();
if(a.s<Bk("ytidb_reopen_db_retries",0))return a.s++,h.close(),om(new Am("DB_REOPENED_BY_MISSING_OBJECT_STORES",{dbName:a.name,expectedObjectStores:m,foundObjectStores:q})),E.return(b());if(!(a.o<Bk("ytidb_remake_db_retries",1))){E.u(6);break}a.o++;if(!P("ytidb_remake_db_enable_backoff_delay")){E.u(7);break}return v(E,jn(a.j),8);case 8:a.j*=2;case 7:return v(E,a.delete(),9);case 9:return om(new Am("DB_DELETED_BY_MISSING_OBJECT_STORES",{dbName:a.name,expectedObjectStores:m,foundObjectStores:q})),E.return(b());
case 6:throw new Bm(q,m);case 5:return E.return(h);case 2:t=Da(E);if(t instanceof DOMException?"VersionError"!==t.name:"DOMError"in self&&t instanceof DOMError?"VersionError"!==t.name:!(t instanceof Object&&"message"in t)||"An attempt was made to open a database using a lower version than the existing version."!==t.message){E.u(10);break}return v(E,a.l(a.name,void 0,Object.assign({},d,{upgrade:void 0})),11);case 11:x=E.j;u=x.i.version;if(void 0!==a.options.version&&u>a.options.version+1)throw x.close(),
a.m=!1,ln(a,u);return E.return(x);case 10:throw c(),t instanceof Error&&!P("ytidb_async_stack_killswitch")&&(t.stack=t.stack+"\n"+g.substring(g.indexOf("\n")+1)),Em(t,a.name,"",null!=(A=a.options.version)?A:-1);}})}
function c(){a.i===e&&(a.i=void 0)}
if(!a.m)throw ln(a);if(a.i)return a.i;var d={blocking:function(f){f.close()},
closed:c,nd:c,upgrade:a.options.upgrade};var e=b();a.i=e;return a.i}
;var on=new kn("YtIdbMeta",{Ia:{databases:{jb:1}},upgrade:function(a,b){b(1)&&Tm(a,"databases",{keyPath:"actualName"})}});
function pn(a,b){var c;return w(function(d){if(1==d.i)return v(d,mn(on,b),2);c=d.j;return d.return(Sm(c,["databases"],{U:!0,mode:"readwrite"},function(e){var f=e.objectStore("databases");return f.get(a.actualName).then(function(g){if(g?a.actualName!==g.actualName||a.publicName!==g.publicName||a.userIdentifier!==g.userIdentifier:1)return Pm(f.i.put(a,void 0)).then(function(){})})}))})}
function qn(a,b){var c;return w(function(d){if(1==d.i)return a?v(d,mn(on,b),2):d.return();c=d.j;return d.return(c.delete("databases",a))})}
function rn(a,b){var c,d;return w(function(e){return 1==e.i?(c=[],v(e,mn(on,b),2)):3!=e.i?(d=e.j,v(e,Sm(d,["databases"],{U:!0,mode:"readonly"},function(f){c.length=0;return an(f.objectStore("databases"),{},function(g){a(g.getValue())&&c.push(g.getValue());return g.continue()})}),3)):e.return(c)})}
function sn(a){return rn(function(b){return"LogsDatabaseV2"===b.publicName&&void 0!==b.userIdentifier},a)}
function tn(a,b,c){return rn(function(d){return c?void 0!==d.userIdentifier&&!a.includes(d.userIdentifier)&&c.includes(d.publicName):void 0!==d.userIdentifier&&!a.includes(d.userIdentifier)},b)}
function un(a){var b,c;return w(function(d){if(1==d.i)return b=rm("YtIdbMeta hasAnyMeta other"),v(d,rn(function(e){return void 0!==e.userIdentifier&&e.userIdentifier!==b},a),2);
c=d.j;return d.return(0<c.length)})}
;var vn,wn=new function(){}(new function(){});
function xn(){var a,b,c,d;return w(function(e){switch(e.i){case 1:a=gm();if(null==(b=a)?0:b.hasSucceededOnce)return e.return(!0);var f;if(f=dm)f=/WebKit\/([0-9]+)/.exec(Tb()),f=!!(f&&600<=parseInt(f[1],10));f&&(f=/WebKit\/([0-9]+)/.exec(Tb()),f=!(f&&602<=parseInt(f[1],10)));if(f||Nc)return e.return(!1);try{if(c=self,!(c.indexedDB&&c.IDBIndex&&c.IDBKeyRange&&c.IDBObjectStore))return e.return(!1)}catch(g){return e.return(!1)}if(!("IDBTransaction"in self&&"objectStoreNames"in IDBTransaction.prototype))return e.return(!1);
Ba(e,2);d={actualName:"yt-idb-test-do-not-use",publicName:"yt-idb-test-do-not-use",userIdentifier:void 0};return v(e,pn(d,wn),4);case 4:return v(e,qn("yt-idb-test-do-not-use",wn),5);case 5:return e.return(!0);case 2:return Da(e),e.return(!1)}})}
function yn(){if(void 0!==vn)return vn;jm=!0;return vn=xn().then(function(a){jm=!1;var b;if(null!=(b=fm())&&b.i){var c;b={hasSucceededOnce:(null==(c=gm())?void 0:c.hasSucceededOnce)||a};var d;null==(d=fm())||d.set("LAST_RESULT_ENTRY_KEY",b,2592E3,!0)}return a})}
function zn(){return B("ytglobal.idbToken_")||void 0}
function An(){var a=zn();return a?Promise.resolve(a):yn().then(function(b){(b=b?wn:void 0)&&z("ytglobal.idbToken_",b);return b})}
;var Bn=0;function Cn(a,b){Bn||(Bn=Rh.S(function(){var c,d,e,f,g;return w(function(h){switch(h.i){case 1:return v(h,An(),2);case 2:c=h.j;if(!c)return h.return();d=!0;Ba(h,3);return v(h,tn(a,c,b),5);case 5:e=h.j;if(!e.length){d=!1;h.u(6);break}f=e[0];return v(h,hn(f.actualName),7);case 7:return v(h,qn(f.actualName,c),6);case 6:Ca(h,4);break;case 3:g=Da(h),om(g),d=!1;case 4:Rh.fa(Bn),Bn=0,d&&Cn(a,b),h.i=0}})}))}
function Dn(){var a;return w(function(b){return 1==b.i?v(b,An(),2):(a=b.j)?b.return(un(a)):b.return(!1)})}
new xh;function En(a){if(!qm())throw a=new Am("AUTH_INVALID",{dbName:a}),om(a),a;var b=rm();return{actualName:a+":"+b,publicName:a,userIdentifier:b}}
function Fn(a,b,c,d){var e,f,g,h,k,m;return w(function(q){switch(q.i){case 1:return f=null!=(e=Error().stack)?e:"",v(q,An(),2);case 2:g=q.j;if(!g)throw h=Fm("openDbImpl",a,b),P("ytidb_async_stack_killswitch")||(h.stack=h.stack+"\n"+f.substring(f.indexOf("\n")+1)),om(h),h;sm(a);k=c?{actualName:a,publicName:a,userIdentifier:void 0}:En(a);Ba(q,3);return v(q,pn(k,g),5);case 5:return v(q,gn(k.actualName,b,d),6);case 6:return q.return(q.j);case 3:return m=Da(q),Ba(q,7),v(q,qn(k.actualName,g),9);case 9:Ca(q,
8);break;case 7:Da(q);case 8:throw m;}})}
function Gn(a,b,c){c=void 0===c?{}:c;return Fn(a,b,!1,c)}
function Hn(a,b,c){c=void 0===c?{}:c;return Fn(a,b,!0,c)}
function In(a,b){b=void 0===b?{}:b;var c,d;return w(function(e){if(1==e.i)return v(e,An(),2);if(3!=e.i){c=e.j;if(!c)return e.return();sm(a);d=En(a);return v(e,hn(d.actualName,b),3)}return v(e,qn(d.actualName,c),0)})}
function Jn(a,b,c){a=a.map(function(d){return w(function(e){return 1==e.i?v(e,hn(d.actualName,b),2):v(e,qn(d.actualName,c),0)})});
return Promise.all(a).then(function(){})}
function Kn(){var a=void 0===a?{}:a;var b,c;return w(function(d){if(1==d.i)return v(d,An(),2);if(3!=d.i){b=d.j;if(!b)return d.return();sm("LogsDatabaseV2");return v(d,sn(b),3)}c=d.j;return v(d,Jn(c,a,b),0)})}
function Ln(a,b){b=void 0===b?{}:b;var c;return w(function(d){if(1==d.i)return v(d,An(),2);if(3!=d.i){c=d.j;if(!c)return d.return();sm(a);return v(d,hn(a,b),3)}return v(d,qn(a,c),0)})}
;function Mn(a){this.Sa=this.i=!1;this.potentialEsfErrorCounter=this.j=0;this.handleError=function(){};
this.za=function(){};
this.now=Date.now;this.Ga=!1;var b;this.kc=null!=(b=a.kc)?b:100;var c;this.fc=null!=(c=a.fc)?c:1;var d;this.dc=null!=(d=a.dc)?d:2592E6;var e;this.ac=null!=(e=a.ac)?e:12E4;var f;this.ec=null!=(f=a.ec)?f:5E3;var g;this.G=null!=(g=a.G)?g:void 0;this.Xa=!!a.Xa;var h;this.Va=null!=(h=a.Va)?h:.1;var k;this.cb=null!=(k=a.cb)?k:10;a.handleError&&(this.handleError=a.handleError);a.za&&(this.za=a.za);a.Ga&&(this.Ga=a.Ga);a.Sa&&(this.Sa=a.Sa);this.H=a.H;this.Z=a.Z;this.O=a.O;this.M=a.M;this.ia=a.ia;this.wb=
a.wb;this.vb=a.vb;Nn(this)&&(!this.H||this.H("networkless_logging"))&&On(this)}
function On(a){Nn(a)&&!a.Ga&&(a.i=!0,a.Xa&&Math.random()<=a.Va&&a.O.zc(a.G),Pn(a),a.M.L()&&a.Ma(),a.M.aa(a.wb,a.Ma.bind(a)),a.M.aa(a.vb,a.Ib.bind(a)))}
l=Mn.prototype;l.writeThenSend=function(a,b){var c=this;b=void 0===b?{}:b;if(Nn(this)&&this.i){var d={url:a,options:b,timestamp:this.now(),status:"NEW",sendCount:0};this.O.set(d,this.G).then(function(e){d.id=e;c.M.L()&&Qn(c,d)}).catch(function(e){Qn(c,d);
Rn(c,e)})}else this.ia(a,b)};
l.sendThenWrite=function(a,b,c){var d=this;b=void 0===b?{}:b;if(Nn(this)&&this.i){var e={url:a,options:b,timestamp:this.now(),status:"NEW",sendCount:0};this.H&&this.H("nwl_skip_retry")&&(e.skipRetry=c);if(this.M.L()||this.H&&this.H("nwl_aggressive_send_then_write")&&!e.skipRetry){if(!e.skipRetry){var f=b.onError?b.onError:function(){};
b.onError=function(g,h){return w(function(k){if(1==k.i)return v(k,d.O.set(e,d.G).catch(function(m){Rn(d,m)}),2);
f(g,h);k.i=0})}}this.ia(a,b,e.skipRetry)}else this.O.set(e,this.G).catch(function(g){d.ia(a,b,e.skipRetry);
Rn(d,g)})}else this.ia(a,b,this.H&&this.H("nwl_skip_retry")&&c)};
l.sendAndWrite=function(a,b){var c=this;b=void 0===b?{}:b;if(Nn(this)&&this.i){var d={url:a,options:b,timestamp:this.now(),status:"NEW",sendCount:0},e=!1,f=b.onSuccess?b.onSuccess:function(){};
d.options.onSuccess=function(g,h){void 0!==d.id?c.O.ya(d.id,c.G):e=!0;c.M.ha&&c.H&&c.H("vss_network_hint")&&c.M.ha(!0);f(g,h)};
this.ia(d.url,d.options);this.O.set(d,this.G).then(function(g){d.id=g;e&&c.O.ya(d.id,c.G)}).catch(function(g){Rn(c,g)})}else this.ia(a,b)};
l.Ma=function(){var a=this;if(!Nn(this))throw Fm("throttleSend");this.j||(this.j=this.Z.S(function(){var b;return w(function(c){if(1==c.i)return v(c,a.O.Sb("NEW",a.G),2);if(3!=c.i)return b=c.j,b?v(c,Qn(a,b),3):(a.Ib(),c.return());a.j&&(a.j=0,a.Ma());c.i=0})},this.kc))};
l.Ib=function(){this.Z.fa(this.j);this.j=0};
function Qn(a,b){var c,d;return w(function(e){switch(e.i){case 1:if(!Nn(a))throw c=Fm("immediateSend"),c;if(void 0===b.id){e.u(2);break}return v(e,a.O.Pc(b.id,a.G),3);case 3:(d=e.j)?b=d:a.za(Error("The request cannot be found in the database."));case 2:if(Sn(a,b,a.dc)){e.u(4);break}a.za(Error("Networkless Logging: Stored logs request expired age limit"));if(void 0===b.id){e.u(5);break}return v(e,a.O.ya(b.id,a.G),5);case 5:return e.return();case 4:b.skipRetry||(b=Tn(a,b));if(!b){e.u(0);break}if(!b.skipRetry||
void 0===b.id){e.u(8);break}return v(e,a.O.ya(b.id,a.G),8);case 8:a.ia(b.url,b.options,!!b.skipRetry),e.i=0}})}
function Tn(a,b){if(!Nn(a))throw Fm("updateRequestHandlers");var c=b.options.onError?b.options.onError:function(){};
b.options.onError=function(e,f){var g,h,k;return w(function(m){switch(m.i){case 1:g=Un(f);if(!(a.H&&a.H("nwl_consider_error_code")&&g||a.H&&!a.H("nwl_consider_error_code")&&a.potentialEsfErrorCounter<=a.cb)){m.u(2);break}if(!a.M.Ka){m.u(3);break}return v(m,a.M.Ka(),3);case 3:if(a.M.L()){m.u(2);break}c(e,f);if(!a.H||!a.H("nwl_consider_error_code")||void 0===(null==(h=b)?void 0:h.id)){m.u(6);break}return v(m,a.O.zb(b.id,a.G,!1),6);case 6:return m.return();case 2:if(a.H&&a.H("nwl_consider_error_code")&&
!g&&a.potentialEsfErrorCounter>a.cb)return m.return();a.potentialEsfErrorCounter++;if(void 0===(null==(k=b)?void 0:k.id)){m.u(8);break}return b.sendCount<a.fc?v(m,a.O.zb(b.id,a.G),12):v(m,a.O.ya(b.id,a.G),8);case 12:a.Z.S(function(){a.M.L()&&a.Ma()},a.ec);
case 8:c(e,f),m.i=0}})};
var d=b.options.onSuccess?b.options.onSuccess:function(){};
b.options.onSuccess=function(e,f){var g;return w(function(h){if(1==h.i)return void 0===(null==(g=b)?void 0:g.id)?h.u(2):v(h,a.O.ya(b.id,a.G),2);a.M.ha&&a.H&&a.H("vss_network_hint")&&a.M.ha(!0);d(e,f);h.i=0})};
return b}
function Sn(a,b,c){b=b.timestamp;return a.now()-b>=c?!1:!0}
function Pn(a){if(!Nn(a))throw Fm("retryQueuedRequests");a.O.Sb("QUEUED",a.G).then(function(b){b&&!Sn(a,b,a.ac)?a.Z.S(function(){return w(function(c){if(1==c.i)return void 0===b.id?c.u(2):v(c,a.O.zb(b.id,a.G),2);Pn(a);c.i=0})}):a.M.L()&&a.Ma()})}
function Rn(a,b){a.oc&&!a.M.L()?a.oc(b):a.handleError(b)}
function Nn(a){return!!a.G||a.Sa}
function Un(a){var b;return(a=null==a?void 0:null==(b=a.error)?void 0:b.code)&&400<=a&&599>=a?!1:!0}
;function Vn(a,b){this.version=a;this.args=b}
;function Wn(a,b){this.topic=a;this.i=b}
Wn.prototype.toString=function(){return this.topic};var Xn=B("ytPubsub2Pubsub2Instance")||new L;L.prototype.subscribe=L.prototype.subscribe;L.prototype.unsubscribeByKey=L.prototype.Da;L.prototype.publish=L.prototype.oa;L.prototype.clear=L.prototype.clear;z("ytPubsub2Pubsub2Instance",Xn);var Yn=B("ytPubsub2Pubsub2SubscribedKeys")||{};z("ytPubsub2Pubsub2SubscribedKeys",Yn);var Zn=B("ytPubsub2Pubsub2TopicToKeys")||{};z("ytPubsub2Pubsub2TopicToKeys",Zn);var $n=B("ytPubsub2Pubsub2IsAsync")||{};z("ytPubsub2Pubsub2IsAsync",$n);
z("ytPubsub2Pubsub2SkipSubKey",null);function ao(a,b){var c=bo();c&&c.publish.call(c,a.toString(),a,b)}
function co(a){var b=eo,c=bo();if(!c)return 0;var d=c.subscribe(b.toString(),function(e,f){var g=B("ytPubsub2Pubsub2SkipSubKey");g&&g==d||(g=function(){if(Yn[d])try{if(f&&b instanceof Wn&&b!=e)try{var h=b.i,k=f;if(!k.args||!k.version)throw Error("yt.pubsub2.Data.deserialize(): serializedData is incomplete.");try{if(!h.na){var m=new h;h.na=m.version}var q=h.na}catch(F){}if(!q||k.version!=q)throw Error("yt.pubsub2.Data.deserialize(): serializedData version is incompatible.");try{q=Reflect;var t=q.construct;
var x=k.args,u=x.length;if(0<u){var A=Array(u);for(k=0;k<u;k++)A[k]=x[k];var E=A}else E=[];f=t.call(q,h,E)}catch(F){throw F.message="yt.pubsub2.Data.deserialize(): "+F.message,F;}}catch(F){throw F.message="yt.pubsub2.pubsub2 cross-binary conversion error for "+b.toString()+": "+F.message,F;}a.call(window,f)}catch(F){Hk(F)}},$n[b.toString()]?B("yt.scheduler.instance")?Rh.S(g):al(g,0):g())});
Yn[d]=!0;Zn[b.toString()]||(Zn[b.toString()]=[]);Zn[b.toString()].push(d);return d}
function fo(){var a=go,b=co(function(c){a.apply(void 0,arguments);ho(b)});
return b}
function ho(a){var b=bo();b&&("number"===typeof a&&(a=[a]),hb(a,function(c){b.unsubscribeByKey(c);delete Yn[c]}))}
function bo(){return B("ytPubsub2Pubsub2Instance")}
;function io(a,b){kn.call(this,a,b);this.options=b;sm(a)}
r(io,kn);function jo(a,b){var c;return function(){c||(c=new io(a,b));return c}}
io.prototype.l=function(a,b,c){c=void 0===c?{}:c;return(this.options.Ab?Hn:Gn)(a,b,Object.assign({},c))};
io.prototype.delete=function(a){a=void 0===a?{}:a;return(this.options.Ab?Ln:In)(this.name,a)};
function ko(a,b){return jo(a,b)}
;var lo;
function mo(){if(lo)return lo();var a={};lo=ko("LogsDatabaseV2",{Ia:(a.LogsRequestsStore={jb:2},a),Ab:!1,upgrade:function(b,c,d){c(2)&&Tm(b,"LogsRequestsStore",{keyPath:"id",autoIncrement:!0});c(3);c(5)&&(d=d.objectStore("LogsRequestsStore"),d.i.indexNames.contains("newRequest")&&d.i.deleteIndex("newRequest"),d.i.createIndex("newRequestV2",["status","interface","timestamp"],{unique:!1}));c(7)&&b.i.objectStoreNames.contains("sapisid")&&b.i.deleteObjectStore("sapisid");c(9)&&b.i.objectStoreNames.contains("SWHealthLog")&&b.i.deleteObjectStore("SWHealthLog")},
version:9});return lo()}
;function no(a){return mn(mo(),a)}
function oo(a,b){var c,d,e,f;return w(function(g){if(1==g.i)return c={startTime:R(),transactionType:"YT_IDB_TRANSACTION_TYPE_WRITE"},v(g,no(b),2);if(3!=g.i)return d=g.j,e=Object.assign({},a,{options:JSON.parse(JSON.stringify(a.options)),interface:M("INNERTUBE_CONTEXT_CLIENT_NAME",0)}),v(g,Vm(d,e),3);f=g.j;c.pd=R();po(c);return g.return(f)})}
function qo(a,b){var c,d,e,f,g,h,k;return w(function(m){if(1==m.i)return c={startTime:R(),transactionType:"YT_IDB_TRANSACTION_TYPE_READ"},v(m,no(b),2);if(3!=m.i)return d=m.j,e=M("INNERTUBE_CONTEXT_CLIENT_NAME",0),f=[a,e,0],g=[a,e,R()],h=IDBKeyRange.bound(f,g),k=void 0,v(m,Sm(d,["LogsRequestsStore"],{mode:"readwrite",U:!0},function(q){return dn(q.objectStore("LogsRequestsStore").index("newRequestV2"),{query:h,direction:"prev"},function(t){t.getValue()&&(k=t.getValue(),"NEW"===a&&(k.status="QUEUED",
t.update(k)))})}),3);
c.pd=R();po(c);return m.return(k)})}
function ro(a,b){var c;return w(function(d){if(1==d.i)return v(d,no(b),2);c=d.j;return d.return(Sm(c,["LogsRequestsStore"],{mode:"readwrite",U:!0},function(e){var f=e.objectStore("LogsRequestsStore");return f.get(a).then(function(g){if(g)return g.status="QUEUED",Pm(f.i.put(g,void 0)).then(function(){return g})})}))})}
function so(a,b,c){c=void 0===c?!0:c;var d;return w(function(e){if(1==e.i)return v(e,no(b),2);d=e.j;return e.return(Sm(d,["LogsRequestsStore"],{mode:"readwrite",U:!0},function(f){var g=f.objectStore("LogsRequestsStore");return g.get(a).then(function(h){return h?(h.status="NEW",c&&(h.sendCount+=1),Pm(g.i.put(h,void 0)).then(function(){return h})):Jm.resolve(void 0)})}))})}
function to(a,b){var c;return w(function(d){if(1==d.i)return v(d,no(b),2);c=d.j;return d.return(c.delete("LogsRequestsStore",a))})}
function uo(a){var b,c;return w(function(d){if(1==d.i)return v(d,no(a),2);b=d.j;c=R()-2592E6;return v(d,Sm(b,["LogsRequestsStore"],{mode:"readwrite",U:!0},function(e){return an(e.objectStore("LogsRequestsStore"),{},function(f){if(f.getValue().timestamp<=c)return f.delete().then(function(){return f.continue()})})}),0)})}
function vo(){return w(function(a){return v(a,Kn(),0)})}
function po(a){P("nwl_csi_killswitch")||.01>=Math.random()&&ao("nwl_transaction_latency_payload",a)}
;var wo={},xo=ko("ServiceWorkerLogsDatabase",{Ia:(wo.SWHealthLog={jb:1},wo),Ab:!0,upgrade:function(a,b){b(1)&&Tm(a,"SWHealthLog",{keyPath:"id",autoIncrement:!0}).i.createIndex("swHealthNewRequest",["interface","timestamp"],{unique:!1})},
version:1});function yo(a){return mn(xo(),a)}
function zo(a){var b,c;return w(function(d){if(1==d.i)return v(d,yo(a),2);b=d.j;c=R()-2592E6;return v(d,Sm(b,["SWHealthLog"],{mode:"readwrite",U:!0},function(e){return an(e.objectStore("SWHealthLog"),{},function(f){if(f.getValue().timestamp<=c)return f.delete().then(function(){return f.continue()})})}),0)})}
function Ao(a){var b;return w(function(c){if(1==c.i)return v(c,yo(a),2);b=c.j;return v(c,b.clear("SWHealthLog"),0)})}
;var Bo={},Co=0;
function Do(a){var b=void 0===b?"":b;var c=void 0===c?!1:c;if(a)if(b)kl(a,void 0,"POST",b);else if(M("USE_NET_AJAX_FOR_PING_TRANSPORT",!1))kl(a,void 0,"GET","",void 0,void 0,c);else{b:{try{var d=new db({url:a});if(d.l&&d.j||d.m){var e=mc(nc(5,a)),f;if(!(f=!e||!e.endsWith("/aclk"))){var g=a.search(yc),h=xc(a,0,"ri",g);if(0>h)var k=null;else{var m=a.indexOf("&",h);if(0>m||m>g)m=g;k=decodeURIComponent(a.slice(h+3,-1!==m?m:0).replace(/\+/g," "))}f="1"!==k}var q=!f;break b}}catch(x){}q=!1}if(q){b:{try{if(window.navigator&&
window.navigator.sendBeacon&&window.navigator.sendBeacon(a,"")){var t=!0;break b}}catch(x){}t=!1}b=t?!0:!1}else b=!1;b||Eo(a)}}
function Eo(a){var b=new Image,c=""+Co++;Bo[c]=b;b.onload=b.onerror=function(){delete Bo[c]};
b.src=a}
;function Fo(){this.i=new Map;this.j=!1}
function Go(){if(!Fo.i){var a=B("yt.networkRequestMonitor.instance")||new Fo;z("yt.networkRequestMonitor.instance",a);Fo.i=a}return Fo.i}
Fo.prototype.requestComplete=function(a,b){b&&(this.j=!0);a=this.removeParams(a);this.i.get(a)||this.i.set(a,b)};
Fo.prototype.isEndpointCFR=function(a){a=this.removeParams(a);return(a=this.i.get(a))?!1:!1===a&&this.j?!0:null};
Fo.prototype.removeParams=function(a){return a.split("?")[0]};
Fo.prototype.removeParams=Fo.prototype.removeParams;Fo.prototype.isEndpointCFR=Fo.prototype.isEndpointCFR;Fo.prototype.requestComplete=Fo.prototype.requestComplete;Fo.getInstance=Go;var Ho;function Io(){Ho||(Ho=new Ql("yt.offline"));return Ho}
function Jo(a){if(P("offline_error_handling")){var b=Io().get("errors",!0)||{};b[a.message]={name:a.name,stack:a.stack};a.level&&(b[a.message].level=a.level);Io().set("errors",b,2592E3,!0)}}
;function Ko(){K.call(this);var a=this;this.l=!1;this.j=Qh();this.j.aa("networkstatus-online",function(){if(a.l&&P("offline_error_handling")){var b=Io().get("errors",!0);if(b){for(var c in b)if(b[c]){var d=new S(c,"sent via offline_errors");d.name=b[c].name;d.stack=b[c].stack;d.level=b[c].level;Hk(d)}Io().set("errors",{},2592E3,!0)}}})}
r(Ko,K);function Lo(){if(!Ko.i){var a=B("yt.networkStatusManager.instance")||new Ko;z("yt.networkStatusManager.instance",a);Ko.i=a}return Ko.i}
l=Ko.prototype;l.L=function(){return this.j.L()};
l.ha=function(a){this.j.j=a};
l.Jc=function(){var a=window.navigator.onLine;return void 0===a?!0:a};
l.Dc=function(){this.l=!0};
l.aa=function(a,b){return this.j.aa(a,b)};
l.Ka=function(a){a=Oh(this.j,a);a.then(function(b){P("use_cfr_monitor")&&Go().requestComplete("generate_204",b)});
return a};
Ko.prototype.sendNetworkCheckRequest=Ko.prototype.Ka;Ko.prototype.listen=Ko.prototype.aa;Ko.prototype.enableErrorFlushing=Ko.prototype.Dc;Ko.prototype.getWindowStatus=Ko.prototype.Jc;Ko.prototype.networkStatusHint=Ko.prototype.ha;Ko.prototype.isNetworkAvailable=Ko.prototype.L;Ko.getInstance=Lo;function Mo(a){a=void 0===a?{}:a;K.call(this);var b=this;this.j=this.s=0;this.l=Lo();var c=B("yt.networkStatusManager.instance.listen").bind(this.l);c&&(a.fb?(this.fb=a.fb,c("networkstatus-online",function(){No(b,"publicytnetworkstatus-online")}),c("networkstatus-offline",function(){No(b,"publicytnetworkstatus-offline")})):(c("networkstatus-online",function(){Ye(b,"publicytnetworkstatus-online")}),c("networkstatus-offline",function(){Ye(b,"publicytnetworkstatus-offline")})))}
r(Mo,K);Mo.prototype.L=function(){var a=B("yt.networkStatusManager.instance.isNetworkAvailable");return a?a.bind(this.l)():!0};
Mo.prototype.ha=function(a){var b=B("yt.networkStatusManager.instance.networkStatusHint").bind(this.l);b&&b(a)};
Mo.prototype.Ka=function(a){var b=this,c;return w(function(d){c=B("yt.networkStatusManager.instance.sendNetworkCheckRequest").bind(b.l);return P("skip_network_check_if_cfr")&&Go().isEndpointCFR("generate_204")?d.return(new Promise(function(e){var f;b.ha((null==(f=window.navigator)?void 0:f.onLine)||!0);e(b.L())})):c?d.return(c(a)):d.return(!0)})};
function No(a,b){a.fb?a.j?(Rh.fa(a.s),a.s=Rh.S(function(){a.o!==b&&(Ye(a,b),a.o=b,a.j=R())},a.fb-(R()-a.j))):(Ye(a,b),a.o=b,a.j=R()):Ye(a,b)}
;var Oo;function Po(){Mn.call(this,{O:{zc:uo,ya:to,Sb:qo,Pc:ro,zb:so,set:oo},M:Qo(),handleError:Hk,za:Ik,ia:Ro,now:R,oc:Jo,Z:cm(),wb:"publicytnetworkstatus-online",vb:"publicytnetworkstatus-offline",Xa:!0,Va:.1,cb:Bk("potential_esf_error_limit",10),H:P,Ga:!(qm()&&So())});this.l=new xh;P("networkless_immediately_drop_all_requests")&&vo();Ln("LogsDatabaseV2")}
r(Po,Mn);function To(){var a=B("yt.networklessRequestController.instance");a||(a=new Po,z("yt.networklessRequestController.instance",a),P("networkless_logging")&&An().then(function(b){a.G=b;On(a);a.l.resolve();a.Xa&&Math.random()<=a.Va&&a.G&&zo(a.G);P("networkless_immediately_drop_sw_health_store")&&Uo(a)}));
return a}
Po.prototype.writeThenSend=function(a,b){b||(b={});qm()||(this.i=!1);Mn.prototype.writeThenSend.call(this,a,b)};
Po.prototype.sendThenWrite=function(a,b,c){b||(b={});qm()||(this.i=!1);Mn.prototype.sendThenWrite.call(this,a,b,c)};
Po.prototype.sendAndWrite=function(a,b){b||(b={});qm()||(this.i=!1);Mn.prototype.sendAndWrite.call(this,a,b)};
Po.prototype.awaitInitialization=function(){return this.l.promise};
function Uo(a){var b;w(function(c){if(!a.G)throw b=Fm("clearSWHealthLogsDb"),b;return c.return(Ao(a.G).catch(function(d){a.handleError(d)}))})}
function Ro(a,b,c){P("use_cfr_monitor")&&Vo(a,b);var d;if(null==(d=b.postParams)?0:d.requestTimeMs)b.postParams.requestTimeMs=Math.round(R());c&&0===Object.keys(b).length?Do(a):hl(a,b)}
function Qo(){Oo||(Oo=new Mo({Oc:!0,Ec:!0}));return Oo}
function Vo(a,b){var c=b.onError?b.onError:function(){};
b.onError=function(e,f){Go().requestComplete(a,!1);c(e,f)};
var d=b.onSuccess?b.onSuccess:function(){};
b.onSuccess=function(e,f){Go().requestComplete(a,!0);d(e,f)}}
function So(){return"www.youtube-nocookie.com"!==oc(document.location.toString())}
;var Wo=!1,Xo=0,Yo=0,Zo,$o=y.ytNetworklessLoggingInitializationOptions||{isNwlInitialized:Wo,potentialEsfErrorCounter:Yo};z("ytNetworklessLoggingInitializationOptions",$o);
function ap(){var a;w(function(b){switch(b.i){case 1:return v(b,An(),2);case 2:a=b.j;if(!a||!qm()&&!P("nwl_init_require_datasync_id_killswitch")||!So()){b.u(0);break}Wo=!0;$o.isNwlInitialized=Wo;if(!P("use_new_nwl_initialization")){b.u(4);break}return v(b,To().awaitInitialization(),5);case 5:return b.return();case 4:return v(b,Ln("LogsDatabaseV2"),6);case 6:if(!(.1>=Math.random())){b.u(7);break}return v(b,uo(a),8);case 8:return v(b,zo(a),7);case 7:bp();cp().L()&&dp();cp().aa("publicytnetworkstatus-online",
dp);cp().aa("publicytnetworkstatus-offline",ep);if(!P("networkless_immediately_drop_sw_health_store")){b.u(10);break}return v(b,fp(),10);case 10:if(P("networkless_immediately_drop_all_requests"))return v(b,vo(),0);b.u(0)}})}
function gp(a,b){function c(d){var e=cp().L();if(!hp()||!d||e&&P("vss_networkless_bypass_write"))ip(a,b);else{var f={url:a,options:b,timestamp:R(),status:"NEW",sendCount:0};oo(f,d).then(function(g){f.id=g;cp().L()&&jp(f)}).catch(function(g){jp(f);
cp().L()?Hk(g):Jo(g)})}}
b=void 0===b?{}:b;P("skip_is_supported_killswitch")?An().then(function(d){c(d)}):c(zn())}
function kp(a,b){function c(d){if(hp()&&d){var e={url:a,options:b,timestamp:R(),status:"NEW",sendCount:0},f=!1,g=b.onSuccess?b.onSuccess:function(){};
e.options.onSuccess=function(k,m){P("use_cfr_monitor")&&Go().requestComplete(e.url,!0);void 0!==e.id?to(e.id,d):f=!0;P("vss_network_hint")&&cp().ha(!0);g(k,m)};
if(P("use_cfr_monitor")){var h=b.onError?b.onError:function(){};
e.options.onError=function(k,m){Go().requestComplete(e.url,!1);h(k,m)}}ip(e.url,e.options);
oo(e,d).then(function(k){e.id=k;f&&to(e.id,d)}).catch(function(k){cp().L()?Hk(k):Jo(k)})}else ip(a,b)}
b=void 0===b?{}:b;P("skip_is_supported_killswitch")?An().then(function(d){c(d)}):c(zn())}
function dp(){var a=zn();if(!a)throw Fm("throttleSend");Xo||(Xo=Rh.S(function(){var b;return w(function(c){if(1==c.i)return v(c,qo("NEW",a),2);if(3!=c.i)return b=c.j,b?v(c,jp(b),3):(ep(),c.return());Xo&&(Xo=0,dp());c.i=0})},100))}
function ep(){Rh.fa(Xo);Xo=0}
function jp(a){var b,c,d;return w(function(e){switch(e.i){case 1:b=zn();if(!b)throw c=Fm("immediateSend"),c;if(void 0===a.id){e.u(2);break}return v(e,ro(a.id,b),3);case 3:(d=e.j)?a=d:Ik(Error("The request cannot be found in the database."));case 2:if(lp(a,2592E6)){e.u(4);break}Ik(Error("Networkless Logging: Stored logs request expired age limit"));if(void 0===a.id){e.u(5);break}return v(e,to(a.id,b),5);case 5:return e.return();case 4:a.skipRetry||(a=mp(a));var f=a,g,h;if(null==f?0:null==(g=f.options)?
0:null==(h=g.postParams)?0:h.requestTimeMs)f.options.postParams.requestTimeMs=Math.round(R());a=f;if(!a){e.u(0);break}if(!a.skipRetry||void 0===a.id){e.u(8);break}return v(e,to(a.id,b),8);case 8:ip(a.url,a.options,!!a.skipRetry),e.i=0}})}
function mp(a){var b=zn();if(!b)throw Fm("updateRequestHandlers");var c=a.options.onError?a.options.onError:function(){};
a.options.onError=function(e,f){var g,h,k;return w(function(m){switch(m.i){case 1:P("use_cfr_monitor")&&Go().requestComplete(a.url,!1);g=Un(f);if(!(P("nwl_consider_error_code")&&g||!P("nwl_consider_error_code")&&np()<=Bk("potential_esf_error_limit",10))){m.u(2);break}if(P("skip_checking_network_on_cfr_failure")&&(!P("skip_checking_network_on_cfr_failure")||Go().isEndpointCFR(a.url))){m.u(3);break}return v(m,cp().Ka(),3);case 3:if(cp().L()){m.u(2);break}c(e,f);if(!P("nwl_consider_error_code")||void 0===
(null==(h=a)?void 0:h.id)){m.u(6);break}return v(m,so(a.id,b,!1),6);case 6:return m.return();case 2:if(P("nwl_consider_error_code")&&!g&&np()>Bk("potential_esf_error_limit",10))return m.return();B("ytNetworklessLoggingInitializationOptions")&&$o.potentialEsfErrorCounter++;Yo++;if(void 0===(null==(k=a)?void 0:k.id)){m.u(8);break}return 1>a.sendCount?v(m,so(a.id,b),12):v(m,to(a.id,b),8);case 12:Rh.S(function(){cp().L()&&dp()},5E3);
case 8:c(e,f),m.i=0}})};
var d=a.options.onSuccess?a.options.onSuccess:function(){};
a.options.onSuccess=function(e,f){var g;return w(function(h){if(1==h.i)return P("use_cfr_monitor")&&Go().requestComplete(a.url,!0),void 0===(null==(g=a)?void 0:g.id)?h.u(2):v(h,to(a.id,b),2);P("vss_network_hint")&&cp().ha(!0);d(e,f);h.i=0})};
return a}
function lp(a,b){a=a.timestamp;return R()-a>=b?!1:!0}
function bp(){var a=zn();if(!a)throw Fm("retryQueuedRequests");qo("QUEUED",a).then(function(b){b&&!lp(b,12E4)?Rh.S(function(){return w(function(c){if(1==c.i)return void 0===b.id?c.u(2):v(c,so(b.id,a),2);bp();c.i=0})}):cp().L()&&dp()})}
function fp(){var a,b;return w(function(c){a=zn();if(!a)throw b=Fm("clearSWHealthLogsDb"),b;return c.return(Ao(a).catch(function(d){Hk(d)}))})}
function cp(){if(P("use_new_nwl"))return Qo();Zo||(Zo=new Mo({Oc:!0,Ec:!0}));return Zo}
function ip(a,b,c){c&&0===Object.keys(b).length?Do(a):hl(a,b)}
function hp(){return B("ytNetworklessLoggingInitializationOptions")?$o.isNwlInitialized:Wo}
function np(){return B("ytNetworklessLoggingInitializationOptions")?$o.potentialEsfErrorCounter:Yo}
;function op(a){var b=this;this.config_=null;a?this.config_=a:Gl()&&(this.config_=Hl());Zl(function(){Wl(b)},0,5E3)}
op.prototype.isReady=function(){!this.config_&&Gl()&&(this.config_=Hl());return!!this.config_};
function Xl(a,b,c,d){function e(A){A=void 0===A?!1:A;var E;if(d.retry&&"www.youtube-nocookie.com"!=h&&(A||P("skip_ls_gel_retry")||"application/json"!==g.headers["Content-Type"]||(E=Ul(b,c,m,k)),E)){var F=g.onSuccess,N=g.onFetchSuccess;g.onSuccess=function(O,Q){Vl(E);F(O,Q)};
c.onFetchSuccess=function(O,Q){Vl(E);N(O,Q)}}try{A&&d.retry&&!d.Xb.bypassNetworkless?(g.method="POST",d.Xb.writeThenSend?P("use_new_nwl_wts")?To().writeThenSend(u,g):gp(u,g):P("use_new_nwl_saw")?To().sendAndWrite(u,g):kp(u,g)):(g.method="POST",g.postParams||(g.postParams={}),hl(u,g))}catch(O){if("InvalidAccessError"==O.name)E&&(Vl(E),E=0),Ik(Error("An extension is blocking network request."));
else throw O;}E&&Zl(function(){Wl(a)},0,5E3)}
!M("VISITOR_DATA")&&"visitor_id"!==b&&.01>Math.random()&&Ik(new S("Missing VISITOR_DATA when sending innertube request.",b,c,d));if(!a.isReady()){var f=new S("innertube xhrclient not ready",b,c,d);Hk(f);throw f;}var g={headers:d.headers||{},method:"POST",postParams:c,postBody:d.postBody,postBodyFormat:d.postBodyFormat||"JSON",onTimeout:function(){d.onTimeout()},
onFetchTimeout:d.onTimeout,onSuccess:function(A,E){if(d.onSuccess)d.onSuccess(E)},
onFetchSuccess:function(A){if(d.onSuccess)d.onSuccess(A)},
onError:function(A,E){if(d.onError)d.onError(E)},
onFetchError:function(A){if(d.onError)d.onError(A)},
timeout:d.timeout,withCredentials:!0};g.headers["Content-Type"]||(g.headers["Content-Type"]="application/json");var h="";(f=a.config_.Lc)&&(h=f);var k=a.config_.Nc||!1,m=Ol(k,h,d);Object.assign(g.headers,m);(f=g.headers.Authorization)&&!h&&(g.headers["x-origin"]=window.location.origin);var q="/youtubei/"+a.config_.innertubeApiVersion+"/"+b,t={alt:"json"},x=a.config_.Mc&&f;x=x&&f.startsWith("Bearer");x||(t.key=a.config_.innertubeApiKey);var u=Uk(""+h+q,t||{},!0);P("use_new_nwl")&&To().i||!P("use_new_nwl")&&
hp()?yn().then(function(A){e(A)}):e(!1)}
;var pp=0,qp=Pc?"webkit":Oc?"moz":Mc?"ms":Lc?"o":"";z("ytDomDomGetNextId",B("ytDomDomGetNextId")||function(){return++pp});var rp={stopImmediatePropagation:1,stopPropagation:1,preventMouseEvent:1,preventManipulation:1,preventDefault:1,layerX:1,layerY:1,screenX:1,screenY:1,scale:1,rotation:1,webkitMovementX:1,webkitMovementY:1};
function Gp(a){this.type="";this.state=this.source=this.data=this.currentTarget=this.relatedTarget=this.target=null;this.charCode=this.keyCode=0;this.metaKey=this.shiftKey=this.ctrlKey=this.altKey=!1;this.rotation=this.clientY=this.clientX=0;this.scale=1;this.changedTouches=this.touches=null;try{if(a=a||window.event){this.event=a;for(var b in a)b in rp||(this[b]=a[b]);this.scale=a.scale;this.rotation=a.rotation;var c=a.target||a.srcElement;c&&3==c.nodeType&&(c=c.parentNode);this.target=c;var d=a.relatedTarget;
if(d)try{d=d.nodeName?d:null}catch(e){d=null}else"mouseover"==this.type?d=a.fromElement:"mouseout"==this.type&&(d=a.toElement);this.relatedTarget=d;this.clientX=void 0!=a.clientX?a.clientX:a.pageX;this.clientY=void 0!=a.clientY?a.clientY:a.pageY;this.keyCode=a.keyCode?a.keyCode:a.which;this.charCode=a.charCode||("keypress"==this.type?this.keyCode:0);this.altKey=a.altKey;this.ctrlKey=a.ctrlKey;this.shiftKey=a.shiftKey;this.metaKey=a.metaKey;this.i=a.pageX;this.j=a.pageY}}catch(e){}}
function eq(a){if(document.body&&document.documentElement){var b=document.body.scrollTop+document.documentElement.scrollTop;a.i=a.clientX+(document.body.scrollLeft+document.documentElement.scrollLeft);a.j=a.clientY+b}}
Gp.prototype.preventDefault=function(){this.event&&(this.event.returnValue=!1,this.event.preventDefault&&this.event.preventDefault())};
Gp.prototype.stopPropagation=function(){this.event&&(this.event.cancelBubble=!0,this.event.stopPropagation&&this.event.stopPropagation())};
Gp.prototype.stopImmediatePropagation=function(){this.event&&(this.event.cancelBubble=!0,this.event.stopImmediatePropagation&&this.event.stopImmediatePropagation())};var qb=y.ytEventsEventsListeners||{};z("ytEventsEventsListeners",qb);var fq=y.ytEventsEventsCounter||{count:0};z("ytEventsEventsCounter",fq);
function gq(a,b,c,d){d=void 0===d?{}:d;a.addEventListener&&("mouseenter"!=b||"onmouseenter"in document?"mouseleave"!=b||"onmouseenter"in document?"mousewheel"==b&&"MozBoxSizing"in document.documentElement.style&&(b="MozMousePixelScroll"):b="mouseout":b="mouseover");return pb(function(e){var f="boolean"===typeof e[4]&&e[4]==!!d,g=Ta(e[4])&&Ta(d)&&ub(e[4],d);return!!e.length&&e[0]==a&&e[1]==b&&e[2]==c&&(f||g)})}
var hq=fb(function(){var a=!1;try{var b=Object.defineProperty({},"capture",{get:function(){a=!0}});
window.addEventListener("test",null,b)}catch(c){}return a});
function iq(a,b,c,d){d=void 0===d?{}:d;if(!a||!a.addEventListener&&!a.attachEvent)return"";var e=gq(a,b,c,d);if(e)return e;e=++fq.count+"";var f=!("mouseenter"!=b&&"mouseleave"!=b||!a.addEventListener||"onmouseenter"in document);var g=f?function(h){h=new Gp(h);if(!gf(h.relatedTarget,function(k){return k==a}))return h.currentTarget=a,h.type=b,c.call(a,h)}:function(h){h=new Gp(h);
h.currentTarget=a;return c.call(a,h)};
g=Gk(g);a.addEventListener?("mouseenter"==b&&f?b="mouseover":"mouseleave"==b&&f?b="mouseout":"mousewheel"==b&&"MozBoxSizing"in document.documentElement.style&&(b="MozMousePixelScroll"),hq()||"boolean"===typeof d?a.addEventListener(b,g,d):a.addEventListener(b,g,!!d.capture)):a.attachEvent("on"+b,g);qb[e]=[a,b,c,g,d];return e}
function jq(a){a&&("string"==typeof a&&(a=[a]),hb(a,function(b){if(b in qb){var c=qb[b],d=c[0],e=c[1],f=c[3];c=c[4];d.removeEventListener?hq()||"boolean"===typeof c?d.removeEventListener(e,f,c):d.removeEventListener(e,f,!!c.capture):d.detachEvent&&d.detachEvent("on"+e,f);delete qb[b]}}))}
;var kq=window.ytcsi&&window.ytcsi.now?window.ytcsi.now:window.performance&&window.performance.timing&&window.performance.now&&window.performance.timing.navigationStart?function(){return window.performance.timing.navigationStart+window.performance.now()}:function(){return(new Date).getTime()};function lq(a){this.F=a;this.j=null;this.o=0;this.v=null;this.s=0;this.l=[];for(a=0;4>a;a++)this.l.push(0);this.m=0;this.K=iq(window,"mousemove",Za(this.P,this));a=Za(this.J,this);"function"===typeof a&&(a=Gk(a));this.R=window.setInterval(a,25)}
ab(lq,J);lq.prototype.P=function(a){void 0===a.i&&eq(a);var b=a.i;void 0===a.j&&eq(a);this.j=new cf(b,a.j)};
lq.prototype.J=function(){if(this.j){var a=kq();if(0!=this.o){var b=this.v,c=this.j,d=b.x-c.x;b=b.y-c.y;d=Math.sqrt(d*d+b*b)/(a-this.o);this.l[this.m]=.5<Math.abs((d-this.s)/this.s)?1:0;for(c=b=0;4>c;c++)b+=this.l[c]||0;3<=b&&this.F();this.s=d}this.o=a;this.v=this.j;this.m=(this.m+1)%4}};
lq.prototype.C=function(){window.clearInterval(this.R);jq(this.K)};var mq={};
function nq(a){var b=void 0===a?{}:a;a=void 0===b.Tc?!1:b.Tc;b=void 0===b.Fc?!0:b.Fc;if(null==B("_lact",window)){var c=parseInt(M("LACT"),10);c=isFinite(c)?Date.now()-Math.max(c,0):-1;z("_lact",c,window);z("_fact",c,window);-1==c&&oq();iq(document,"keydown",oq);iq(document,"keyup",oq);iq(document,"mousedown",oq);iq(document,"mouseup",oq);a?iq(window,"touchmove",function(){pq("touchmove",200)},{passive:!0}):(iq(window,"resize",function(){pq("resize",200)}),b&&iq(window,"scroll",function(){pq("scroll",200)}));
new lq(function(){pq("mouse",100)});
iq(document,"touchstart",oq,{passive:!0});iq(document,"touchend",oq,{passive:!0})}}
function pq(a,b){mq[a]||(mq[a]=!0,Rh.S(function(){oq();mq[a]=!1},b))}
function oq(){null==B("_lact",window)&&nq();var a=Date.now();z("_lact",a,window);-1==B("_fact",window)&&z("_fact",a,window);(a=B("ytglobal.ytUtilActivityCallback_"))&&a()}
function qq(){var a=B("_lact",window);return null==a?-1:Math.max(Date.now()-a,0)}
;var rq=y.ytPubsubPubsubInstance||new L,sq=y.ytPubsubPubsubSubscribedKeys||{},tq=y.ytPubsubPubsubTopicToKeys||{},uq=y.ytPubsubPubsubIsSynchronous||{};function vq(a,b){var c=wq();if(c&&b){var d=c.subscribe(a,function(){var e=arguments;var f=function(){sq[d]&&b.apply&&"function"==typeof b.apply&&b.apply(window,e)};
try{uq[a]?f():al(f,0)}catch(g){Hk(g)}},void 0);
sq[d]=!0;tq[a]||(tq[a]=[]);tq[a].push(d);return d}return 0}
function xq(a){var b=wq();b&&("number"===typeof a?a=[a]:"string"===typeof a&&(a=[parseInt(a,10)]),hb(a,function(c){b.unsubscribeByKey(c);delete sq[c]}))}
function yq(a,b){var c=wq();c&&c.publish.apply(c,arguments)}
function zq(a){var b=wq();if(b)if(b.clear(a),a)Aq(a);else for(var c in tq)Aq(c)}
function wq(){return y.ytPubsubPubsubInstance}
function Aq(a){tq[a]&&(a=tq[a],hb(a,function(b){sq[b]&&delete sq[b]}),a.length=0)}
L.prototype.subscribe=L.prototype.subscribe;L.prototype.unsubscribeByKey=L.prototype.Da;L.prototype.publish=L.prototype.oa;L.prototype.clear=L.prototype.clear;z("ytPubsubPubsubInstance",rq);z("ytPubsubPubsubTopicToKeys",tq);z("ytPubsubPubsubIsSynchronous",uq);z("ytPubsubPubsubSubscribedKeys",sq);function Bq(a){this.policy=a;this.store=[];this.i={}}
function Cq(a,b,c){a.store.push({payload:c,keys:b});c=Dq(b);a.i[c]?a.i[c]++:a.i[c]=1;a.i[c]>=a.policy.maxBatchSize&&(a.policy.onBatchSizeExceeded(b),a.i[c]=0)}
function Eq(a,b){for(var c=[],d=[],e=p(a.store),f=e.next();!f.done;f=e.next()){f=f.value;a:{var g=b;var h=Object.keys(g);h=p(h);for(var k=h.next();!k.done;k=h.next())if(k=k.value,f.keys[k]!==g[k]){g=!1;break a}g=!0}g?c.push(f.payload):d.push(f)}a.store=d;d=0;k=Object.keys(b);h=g=f=e="THIS_KEY_FIELD_NOT_FILLED";k=p(k);for(var m=k.next();!m.done;m=k.next())m=m.value,"auth"===m?e=Fq(b.auth):"isJspb"===m?f=JSON.stringify(b.isJspb):"isLeader"===m?g=JSON.stringify(b.isLeader):"cttAuthInfo"===m&&(h=Fq(b.cttAuthInfo));
b=[];e=[e,f,g,h];f=p(Object.keys(a.i));for(g=f.next();!g.done;g=f.next()){g=g.value;h=g.split("/");k=!0;for(m=0;m<e.length;m++)if("THIS_KEY_FIELD_NOT_FILLED"!==e[m]&&e[m]!==h[m]){k=!1;break}k&&b.push(g)}b=p(b);for(e=b.next();!e.done;e=b.next())e=e.value,d+=a.i[e],a.i[e]=0;d!==c.length&&Ik(new S("Transport IMS extracted entries count != keyCounter sum",c.length,d));return c}
function Dq(a){return[void 0===a.auth?"undefined":a.auth,void 0===a.isJspb?"undefined":a.isJspb,void 0===a.isLeader?"undefined":a.isLeader,void 0===a.cttAuthInfo?"undefined":a.cttAuthInfo].join("/")}
function Fq(a){return void 0===a?"undefined":a}
;var Gq=y.window;Gq.ytExports||(Gq.ytExports={logging:{transport:{leaderQueueLength:0,leaderChosen:!1}}});var Hq=Bk("initial_gel_batch_timeout",2E3),Iq=Math.pow(2,16)-1,Jq=!1,Kq=void 0;function Lq(){this.l=this.i=this.j=0}
var Mq=new Lq,Nq=new Lq,Oq=!0,Pq=y.ytLoggingTransportGELQueue_||new Map;z("ytLoggingTransportGELQueue_",Pq);var Qq=new Map,Rq=y.ytLoggingTransportGELProtoQueue_||new Map;z("ytLoggingTransportGELProtoQueue_",Rq);var Sq=y.ytLoggingTransportTokensToCttTargetIds_||{};z("ytLoggingTransportTokensToCttTargetIds_",Sq);var Tq=y.ytLoggingTransportTokensToJspbCttTargetIds_||{};z("ytLoggingTransportTokensToJspbCttTargetIds_",Tq);var Uq={};
function Vq(){var a=B("yt.logging.ims");a||(a=new Bq({maxBatchSize:Bk("tvhtml5_logging_max_batch")||Bk("web_logging_max_batch")||100,onBatchSizeExceeded:function(b){Wq({writeThenSend:!0},void 0,b.isJspb)}}),z("yt.logging.ims",a));
return a}
function Xq(){P("jspb_with_transport_leader")&&!Gq.ytExports.logging.transport.leaderChosen&&(Jq=Gq.ytExports.logging.transport.leaderChosen=!0,document.addEventListener("FLUSH_REQUEST",function(){Wq(void 0,void 0,!0)}))}
function Yq(a,b){Xq();if("log_event"===a.endpoint){Zq(a);var c=$q(a);if(P("use_new_in_memory_storage")){Uq[c]=!0;var d={cttAuthInfo:c,isJspb:!1,isLeader:Jq};Cq(Vq(),d,a.payload);ar(b,[],c,!1,d)}else d=Pq.get(c)||[],Pq.set(c,d),d.push(a.payload),ar(b,d,c)}}
function br(a,b){Xq();if("log_event"===a.endpoint){Zq(void 0,a);var c=$q(a,!0);if(P("jspb_with_transport_leader")&&Jq)if(P("use_new_in_memory_storage")){Uq[c]=!0;var d={cttAuthInfo:c,isJspb:!0,isLeader:Jq};Cq(Vq(),d,a.payload);Gq.ytExports.logging.transport.leaderQueueLength++;ar(b,[],c,!0,d)}else d=Qq.get(c)||[],Qq.set(c,d),Gq.ytExports.logging.transport.leaderQueueLength++,d.push(a.payload),ar(b,d,c,!0);else P("use_new_in_memory_storage")?(Uq[c]=!0,d={cttAuthInfo:c,isJspb:!0,isLeader:Jq},Cq(Vq(),
d,a.payload.toJSON()),ar(b,[],c,!0,d)):(d=Rq.get(c)||[],Rq.set(c,d),a=a.payload.toJSON(),d.push(a),ar(b,d,c,!0))}}
function ar(a,b,c,d,e){d=void 0===d?!1:d;a&&(Kq=new a);a=Bk("tvhtml5_logging_max_batch")||Bk("web_logging_max_batch")||100;var f=R(),g=d?Nq.l:Mq.l,h=Rq.get(c)||[];b=b.length;e&&(b=Vq().i[Dq(e)]);P("jspb_with_transport_leader")&&(Jq&&b+h.length>=a||!Jq&&Gq.ytExports.logging.transport.leaderQueueLength+b>=a)||b>=a?Wq({writeThenSend:!0},P("flush_only_full_queue")?c:void 0,d):10<=f-g&&(cr(d),d?Nq.l=f:Mq.l=f)}
function dr(a,b){Xq();if("log_event"===a.endpoint){Zq(a);var c=$q(a),d=new Map;d.set(c,[a.payload]);b&&(Kq=new b);return new uf(function(e,f){Kq&&Kq.isReady()?er(d,Kq,e,f,{bypassNetworkless:!0},!0):e()})}}
function fr(a,b){Xq();if("log_event"===a.endpoint){Zq(void 0,a);var c=$q(a,!0),d=new Map,e=new Map;P("jspb_with_transport_leader")&&Jq?e.set(c,[a.payload]):d.set(c,[a.payload.toJSON()]);b&&(Kq=new b);return new uf(function(f){Kq&&Kq.isReady()?gr(d,e,Kq,f,{bypassNetworkless:!0},!0):f()})}}
function $q(a,b){var c="";if(a.Fa)c="visitorOnlyApprovedKey";else if(a.cttAuthInfo){if(void 0===b?0:b){b=a.cttAuthInfo.token;c=a.cttAuthInfo;var d=new Rj;c.videoId?d.setVideoId(c.videoId):c.playlistId&&Td(d,2,Sj,c.playlistId);Tq[b]=d}else b=a.cttAuthInfo,c={},b.videoId?c.videoId=b.videoId:b.playlistId&&(c.playlistId=b.playlistId),Sq[a.cttAuthInfo.token]=c;c=a.cttAuthInfo.token}return c}
function Wq(a,b,c){a=void 0===a?{}:a;c=void 0===c?!1:c;new uf(function(d,e){c?(bl(Nq.j),bl(Nq.i),Nq.i=0):(bl(Mq.j),bl(Mq.i),Mq.i=0);if(P("jspb_with_transport_leader")&&!Jq&&c)document.dispatchEvent(new CustomEvent("FLUSH_REQUEST")),d();else if(Kq&&Kq.isReady())if(P("use_new_in_memory_storage"))a:{var f=a,g=c,h=Kq;f=void 0===f?{}:f;g=void 0===g?!1:g;var k=new Map,m=new Map,q=new Map;if(void 0!==b){if(g){e=Eq(Vq(),{isJspb:g,cttAuthInfo:b,isLeader:!1});k.set(b,e);if(P("jspb_with_transport_leader")){e=
Eq(Vq(),{isJspb:!0,cttAuthInfo:b,isLeader:!0});if(0===e.length)break a;m.set(b,e)}gr(k,m,h,d,f)}}else if(g){e=p(Object.keys(Uq));for(g=e.next();!g.done;g=e.next())q=g.value,g=Eq(Vq(),{isJspb:!0,isLeader:!1,cttAuthInfo:q}),0<g.length&&k.set(q,g),P("jspb_with_transport_leader")&&(g=Eq(Vq(),{isJspb:!0,isLeader:!0,cttAuthInfo:q}),0<g.length&&m.set(q,g)),Uq[q]=!1;gr(k,m,h,d,f)}else{k=p(Object.keys(Uq));for(g=k.next();!g.done;g=k.next())m=g.value,g=Eq(Vq(),{isJspb:!1,cttAuthInfo:m}),0!==g.length&&q.set(m,
g);er(q,h,d,e,f)}}else f=a,k=c,h=Kq,f=void 0===f?{}:f,k=void 0===k?!1:k,void 0!==b?k?(e=new Map,k=new Map,m=Rq.get(b)||[],e.set(b,m),P("jspb_with_transport_leader")&&(m=Qq.get(b)||[],k.set(b,m)),gr(e,k,h,d,f),P("jspb_with_transport_leader")&&Qq.delete(b),Rq.delete(b)):(k=new Map,m=Pq.get(b)||[],k.set(b,m),er(k,h,d,e,f),Pq.delete(b)):k?(gr(Rq,Qq,h,d,f),Rq.clear(),P("jspb_with_transport_leader")&&Qq.clear()):(er(Pq,h,d,e,f),Pq.clear());else cr(c),d()})}
function cr(a){a=void 0===a?!1:a;if(P("web_gel_timeout_cap")&&(!a&&!Mq.i||a&&!Nq.i)){var b=al(function(){Wq({writeThenSend:!0},void 0,a)},6E4);
a?Nq.i=b:Mq.i=b}bl(a?Nq.j:Mq.j);b=M("LOGGING_BATCH_TIMEOUT",Bk("web_gel_debounce_ms",1E4));P("shorten_initial_gel_batch_timeout")&&Oq&&(b=Hq);b=al(function(){Wq({writeThenSend:!0},void 0,a)},b);
a?Nq.j=b:Mq.j=b}
function er(a,b,c,d,e,f){e=void 0===e?{}:e;var g=Math.round(R()),h=a.size;a=p(a);for(var k=a.next();!k.done;k=a.next()){var m=p(k.value);k=m.next().value;var q=m.next().value;m=k;k=wb({context:Il(b.config_||Hl())});if(!Sa(q)&&!P("throw_err_when_logevent_malformed_killswitch")){Hk(new S("LogEvent value at event was not an array",q));d();break}k.events=q;(q=Sq[m])&&hr(k,m,q);delete Sq[m];m="visitorOnlyApprovedKey"===m;ir(k,g,m);jr(e);q=function(){h--;h||c()};
var t=function(){h--;h||c()};
try{Xl(b,"log_event",k,kr(e,m,q,t,f)),Oq=!1}catch(x){Hk(x),d()}}}
function gr(a,b,c,d,e,f){e=void 0===e?{}:e;var g=Math.round(R()),h=a.size+b.size,k=new Map([].concat(ia(a),ia(b)));k=p(k);for(var m=k.next();!m.done;m=k.next()){var q=p(m.value).next().value,t=a.get(q),x=b.get(q)||[];m=new Tj;var u=Nl(c.config_||Hl());G(m,Ui,1,u);t=t?lr(t):[];t=p(t);for(u=t.next();!u.done;u=t.next())$d(m,3,Nj,u.value);x=p(x);for(t=x.next();!t.done;t=x.next())$d(m,3,Nj,t.value);(x=Tq[q])&&mr(m,q,x);delete Tq[q];q="visitorOnlyApprovedKey"===q;nr(m,g,q);jr(e);m=ce(m);q=kr(e,q,function(){Gq.ytExports.logging.transport.leaderQueueLength=
0;h--;h||d()},function(){Gq.ytExports.logging.transport.leaderQueueLength=0;
h--;h||d()},f);
q.headers={"Content-Type":"application/json+protobuf"};q.postBodyFormat="JSPB";q.postBody=m;Xl(c,"log_event","",q);Oq=!1}}
function jr(a){P("always_send_and_write")&&(a.writeThenSend=!1)}
function kr(a,b,c,d,e){return{retry:!0,onSuccess:c,onError:d,Xb:a,Fa:b,mq:!!e,headers:{},postBodyFormat:"",postBody:""}}
function ir(a,b,c){a.requestTimeMs=String(b);P("unsplit_gel_payloads_in_logs")&&(a.unsplitGelPayloadsInLogs=!0);!c&&(b=M("EVENT_ID"))&&(c=or(),a.serializedClientEventId={serializedEventId:b,clientCounter:String(c)})}
function nr(a,b,c){D(a,2,b);if(!c&&(b=M("EVENT_ID"))){c=or();var d=new Qj;D(d,1,b);D(d,2,c);G(a,Qj,5,d)}}
function or(){var a=M("BATCH_CLIENT_COUNTER")||0;a||(a=Math.floor(Math.random()*Iq/2));a++;a>Iq&&(a=1);yk("BATCH_CLIENT_COUNTER",a);return a}
function hr(a,b,c){if(c.videoId)var d="VIDEO";else if(c.playlistId)d="PLAYLIST";else return;a.credentialTransferTokenTargetId=c;a.context=a.context||{};a.context.user=a.context.user||{};a.context.user.credentialTransferTokens=[{token:b,scope:d}]}
function mr(a,b,c){if(Pd(c,1===Ud(c,Sj)?1:-1))var d=1;else if(c.getPlaylistId())d=2;else return;G(a,Rj,4,c);a=Vd(a,Ui,1)||new Ui;c=Vd(a,Si,3)||new Si;var e=new Ri;e.setToken(b);D(e,1,d);$d(c,12,Ri,e);G(a,Si,3,c)}
function lr(a){for(var b=[],c=0;c<a.length;c++)try{b.push(new Nj(a[c]))}catch(d){Hk(new S("Transport failed to deserialize "+String(a[c])))}return b}
function Zq(a,b){if(B("yt.logging.transport.enableScrapingForTest")){var c=B("yt.logging.transport.scrapedPayloadsForTesting"),d=B("yt.logging.transport.payloadToScrape","");b&&(b=B("yt.logging.transport.getScrapedPayloadFromClientEventsFunction").bind(b.payload)())&&c.push(b);a&&a.payload[d]&&c.push((null==a?void 0:a.payload)[d]);z("yt.logging.transport.scrapedPayloadsForTesting",c)}}
;var pr=y.ytLoggingGelSequenceIdObj_||{};z("ytLoggingGelSequenceIdObj_",pr);function qr(a,b,c,d){d=void 0===d?{}:d;var e={},f=Math.round(d.timestamp||R());e.eventTimeMs=f<Number.MAX_SAFE_INTEGER?f:0;e[a]=b;a=qq();e.context={lastActivityMs:String(d.timestamp||!isFinite(a)?-1:a)};P("log_sequence_info_on_gel_web")&&d.ba&&(a=e.context,b=d.ba,b={index:rr(b),groupKey:b},a.sequence=b,d.Pb&&delete pr[d.ba]);(d.hc?dr:Yq)({endpoint:"log_event",payload:e,cttAuthInfo:d.cttAuthInfo,Fa:d.Fa},c)}
function sr(a){Wq(void 0,void 0,void 0===a?!1:a)}
function rr(a){pr[a]=a in pr?pr[a]+1:0;return pr[a]}
;var tr=y.ytLoggingGelSequenceIdObj_||{};z("ytLoggingGelSequenceIdObj_",tr);function ur(a,b,c){c=void 0===c?{}:c;var d=Math.round(c.timestamp||R());D(a,1,d<Number.MAX_SAFE_INTEGER?d:0);var e=qq();d=new Mj;D(d,1,c.timestamp||!isFinite(e)?-1:e);if(P("log_sequence_info_on_gel_web")&&c.ba){e=c.ba;var f=rr(e),g=new Lj;D(g,2,f);D(g,1,e);G(d,Lj,3,g);c.Pb&&delete tr[c.ba]}G(a,Mj,33,d);(c.hc?fr:br)({endpoint:"log_event",payload:a,cttAuthInfo:c.cttAuthInfo,Fa:c.Fa},b)}
;function vr(a,b){b=void 0===b?{}:b;var c=!1;M("ytLoggingEventsDefaultDisabled",!1)&&(c=!0);ur(a,c?null:op,b)}
;function wr(a,b){var c=new Nj;Yd(c,Aj,72,Oj,a);vr(c,b)}
function xr(a,b,c){var d=new Nj;Yd(d,zj,73,Oj,a);c?ur(d,c,b):vr(d,b)}
function yr(a,b,c){var d=new Nj;Yd(d,yj,78,Oj,a);c?ur(d,c,b):vr(d,b)}
function zr(a,b,c){var d=new Nj;Yd(d,Bj,208,Oj,a);c?ur(d,c,b):vr(d,b)}
function Ar(a,b,c){var d=new Nj;Yd(d,rj,156,Oj,a);c?ur(d,c,b):vr(d,b)}
function Br(a,b,c){var d=new Nj;Yd(d,vj,215,Oj,a);c?ur(d,c,b):vr(d,b)}
function Cr(a,b,c){var d=new Nj;Yd(d,nj,111,Oj,a);c?ur(d,c,b):vr(d,b)}
;function nm(a,b,c){c=void 0===c?{}:c;if(P("migrate_events_to_ts")){c=void 0===c?{}:c;var d=op;M("ytLoggingEventsDefaultDisabled",!1)&&op===op&&(d=null);qr(a,b,d,c)}else d=op,M("ytLoggingEventsDefaultDisabled",!1)&&op==op&&(d=null),qr(a,b,d,c)}
;var Dr=[{ub:function(a){return"Cannot read property '"+a.key+"'"},
bb:{Error:[{regexp:/(Permission denied) to access property "([^']+)"/,groups:["reason","key"]}],TypeError:[{regexp:/Cannot read property '([^']+)' of (null|undefined)/,groups:["key","value"]},{regexp:/\u65e0\u6cd5\u83b7\u53d6\u672a\u5b9a\u4e49\u6216 (null|undefined) \u5f15\u7528\u7684\u5c5e\u6027\u201c([^\u201d]+)\u201d/,groups:["value","key"]},{regexp:/\uc815\uc758\ub418\uc9c0 \uc54a\uc74c \ub610\ub294 (null|undefined) \ucc38\uc870\uc778 '([^']+)' \uc18d\uc131\uc744 \uac00\uc838\uc62c \uc218 \uc5c6\uc2b5\ub2c8\ub2e4./,
groups:["value","key"]},{regexp:/No se puede obtener la propiedad '([^']+)' de referencia nula o sin definir/,groups:["key"]},{regexp:/Unable to get property '([^']+)' of (undefined or null) reference/,groups:["key","value"]},{regexp:/(null) is not an object \(evaluating '(?:([^.]+)\.)?([^']+)'\)/,groups:["value","base","key"]}]}},{ub:function(a){return"Cannot call '"+a.key+"'"},
bb:{TypeError:[{regexp:/(?:([^ ]+)?\.)?([^ ]+) is not a function/,groups:["base","key"]},{regexp:/([^ ]+) called on (null or undefined)/,groups:["key","value"]},{regexp:/Object (.*) has no method '([^ ]+)'/,groups:["base","key"]},{regexp:/Object doesn't support property or method '([^ ]+)'/,groups:["key"]},{regexp:/\u30aa\u30d6\u30b8\u30a7\u30af\u30c8\u306f '([^']+)' \u30d7\u30ed\u30d1\u30c6\u30a3\u307e\u305f\u306f\u30e1\u30bd\u30c3\u30c9\u3092\u30b5\u30dd\u30fc\u30c8\u3057\u3066\u3044\u307e\u305b\u3093/,
groups:["key"]},{regexp:/\uac1c\uccb4\uac00 '([^']+)' \uc18d\uc131\uc774\ub098 \uba54\uc11c\ub4dc\ub97c \uc9c0\uc6d0\ud558\uc9c0 \uc54a\uc2b5\ub2c8\ub2e4./,groups:["key"]}]}},{ub:function(a){return a.key+" is not defined"},
bb:{ReferenceError:[{regexp:/(.*) is not defined/,groups:["key"]},{regexp:/Can't find variable: (.*)/,groups:["key"]}]}}];var Fr={ma:[],la:[{callback:Er,weight:500}]};function Er(a){if("JavaException"===a.name)return!0;a=a.stack;return a.includes("chrome://")||a.includes("chrome-extension://")||a.includes("moz-extension://")}
;function Gr(){this.la=[];this.ma=[]}
var Hr;function Ir(){if(!Hr){var a=Hr=new Gr;a.ma.length=0;a.la.length=0;Fr.ma&&a.ma.push.apply(a.ma,Fr.ma);Fr.la&&a.la.push.apply(a.la,Fr.la)}return Hr}
;var Jr=new L;function Kr(a){function b(){return a.charCodeAt(d++)}
var c=a.length,d=0;do{var e=Lr(b);if(Infinity===e)break;var f=e>>3;switch(e&7){case 0:e=Lr(b);if(2===f)return e;break;case 1:if(2===f)return;d+=8;break;case 2:e=Lr(b);if(2===f)return a.substr(d,e);d+=e;break;case 5:if(2===f)return;d+=4;break;default:return}}while(d<c)}
function Lr(a){var b=a(),c=b&127;if(128>b)return c;b=a();c|=(b&127)<<7;if(128>b)return c;b=a();c|=(b&127)<<14;if(128>b)return c;b=a();return 128>b?c|(b&127)<<21:Infinity}
;function Mr(a,b,c,d){if(a)if(Array.isArray(a)){var e=d;for(d=0;d<a.length&&!(a[d]&&(e+=Nr(d,a[d],b,c),500<e));d++);d=e}else if("object"===typeof a)for(e in a){if(a[e]){var f=a[e];var g=b;var h=c;g="string"!==typeof f||"clickTrackingParams"!==e&&"trackingParams"!==e?0:(f=Kr(atob(f.replace(/-/g,"+").replace(/_/g,"/"))))?Nr(e+".ve",f,g,h):0;d+=g;d+=Nr(e,a[e],b,c);if(500<d)break}}else c[b]=Or(a),d+=c[b].length;else c[b]=Or(a),d+=c[b].length;return d}
function Nr(a,b,c,d){c+="."+a;a=Or(b);d[c]=a;return c.length+a.length}
function Or(a){try{return("string"===typeof a?a:String(JSON.stringify(a))).substr(0,500)}catch(b){return"unable to serialize "+typeof a+" ("+b.message+")"}}
;var Pr=new Set,Qr=0,Rr=0,Sr=0,Tr=[],Ur=["PhantomJS","Googlebot","TO STOP THIS SECURITY SCAN go/scan"];function mm(a){Vr(a)}
function Wr(a){Vr(a,"WARNING")}
function Vr(a,b,c,d,e,f){f=void 0===f?{}:f;f.name=c||M("INNERTUBE_CONTEXT_CLIENT_NAME",1);f.version=d||M("INNERTUBE_CONTEXT_CLIENT_VERSION");var g=f||{},h=void 0===b?"ERROR":b;h=void 0===h?"ERROR":h;if(a){a.hasOwnProperty("level")&&a.level&&(h=a.level);if(P("console_log_js_exceptions")){var k=[];k.push("Name: "+a.name);k.push("Message: "+a.message);a.hasOwnProperty("params")&&k.push("Error Params: "+JSON.stringify(a.params));a.hasOwnProperty("args")&&k.push("Error args: "+JSON.stringify(a.args));
k.push("File name: "+a.fileName);k.push("Stacktrace: "+a.stack);window.console.log(k.join("\n"),a)}if(!(5<=Qr)){var m=Tr,q=te(a),t=q.message||"Unknown Error",x=q.name||"UnknownError",u=q.stack||a.j||"Not available";if(u.startsWith(x+": "+t)){var A=u.split("\n");A.shift();u=A.join("\n")}var E=q.lineNumber||"Not available",F=q.fileName||"Not available",N=u,O=0;if(a.hasOwnProperty("args")&&a.args&&a.args.length)for(var Q=0;Q<a.args.length&&!(O=Mr(a.args[Q],"params."+Q,g,O),500<=O);Q++);else if(a.hasOwnProperty("params")&&
a.params){var ca=a.params;if("object"===typeof a.params)for(var aa in ca){if(ca[aa]){var ja="params."+aa,ma=Or(ca[aa]);g[ja]=ma;O+=ja.length+ma.length;if(500<O)break}}else g.params=Or(ca)}if(m.length)for(var na=0;na<m.length&&!(O=Mr(m[na],"params.context."+na,g,O),500<=O);na++);navigator.vendor&&!g.hasOwnProperty("vendor")&&(g["device.vendor"]=navigator.vendor);var H={message:t,name:x,lineNumber:E,fileName:F,stack:N,params:g,sampleWeight:1},sa=Number(a.columnNumber);isNaN(sa)||(H.lineNumber=H.lineNumber+
":"+sa);if("IGNORED"===a.level)var la=0;else a:{for(var vd=Ir(),wd=p(vd.ma),xa=wd.next();!xa.done;xa=wd.next()){var sp=xa.value;if(H.message&&H.message.match(sp.uq)){la=sp.weight;break a}}for(var tp=p(vd.la),Xj=tp.next();!Xj.done;Xj=tp.next()){var up=Xj.value;if(up.callback(H)){la=up.weight;break a}}la=1}H.sampleWeight=la;for(var vp=p(Dr),Yj=vp.next();!Yj.done;Yj=vp.next()){var Zj=Yj.value;if(Zj.bb[H.name])for(var wp=p(Zj.bb[H.name]),ak=wp.next();!ak.done;ak=wp.next()){var xp=ak.value,Rg=H.message.match(xp.regexp);
if(Rg){H.params["params.error.original"]=Rg[0];for(var bk=xp.groups,yp={},xd=0;xd<bk.length;xd++)yp[bk[xd]]=Rg[xd+1],H.params["params.error."+bk[xd]]=Rg[xd+1];H.message=Zj.ub(yp);break}}}H.params||(H.params={});var zp=Ir();H.params["params.errorServiceSignature"]="msg="+zp.ma.length+"&cb="+zp.la.length;H.params["params.serviceWorker"]="false";y.document&&y.document.querySelectorAll&&(H.params["params.fscripts"]=String(document.querySelectorAll("script:not([nonce])").length));Db("sample").constructor!==
Bb&&(H.params["params.fconst"]="true");window.yterr&&"function"===typeof window.yterr&&window.yterr(H);if(0!==H.sampleWeight&&!Pr.has(H.message)){if("ERROR"===h){Jr.oa("handleError",H);if(P("record_app_crashed_web")&&0===Sr&&1===H.sampleWeight)if(Sr++,P("errors_via_jspb")){var ck=new kj;D(ck,1,1);if(!P("report_client_error_with_app_crash_ks")){var Ap=new fj;D(Ap,1,H.message);var Bp=new gj;G(Bp,fj,3,Ap);var Cp=new hj;G(Cp,gj,5,Bp);var Dp=new ij;G(Dp,hj,9,Cp);G(ck,ij,4,Dp)}var Ep=new Nj;Yd(Ep,kj,20,
Oj,ck);vr(Ep)}else{var Fp={appCrashType:"APP_CRASH_TYPE_BREAKPAD"};P("report_client_error_with_app_crash_ks")||(Fp.systemHealth={crashData:{clientError:{logMessage:{message:H.message}}}});nm("appCrashed",Fp)}Rr++}else"WARNING"===h&&Jr.oa("handleWarning",H);if(P("kevlar_gel_error_routing"))a:{var Fe=h;if(P("errors_via_jspb")){if(Xr())var Hp=void 0;else{var yd=new cj;D(yd,1,H.stack);H.fileName&&D(yd,4,H.fileName);var Hb=H.lineNumber&&H.lineNumber.split?H.lineNumber.split(":"):[];0!==Hb.length&&(1!==
Hb.length||isNaN(Number(Hb[0]))?2!==Hb.length||isNaN(Number(Hb[0]))||isNaN(Number(Hb[1]))||(D(yd,2,Number(Hb[0])),D(yd,3,Number(Hb[1]))):D(yd,2,Number(Hb[0])));var zc=new fj;D(zc,1,H.message);D(zc,3,H.name);D(zc,6,H.sampleWeight);"ERROR"===Fe?D(zc,2,2):"WARNING"===Fe?D(zc,2,1):D(zc,2,0);var dk=new dj;D(dk,1,!0);Yd(dk,cj,3,ej,yd);var $b=new $i;D($b,3,window.location.href);for(var Ip=M("FEXP_EXPERIMENTS",[]),ek=0;ek<Ip.length;ek++){var Lv=Ip[ek];Cd($b);Qd($b,5).push(Lv)}var fk=M("LATEST_ECATCHER_SERVICE_TRACKING_PARAMS");
if(!zk()&&fk)for(var Jp=p(Object.keys(fk)),Ac=Jp.next();!Ac.done;Ac=Jp.next()){var Kp=Ac.value,gk=new bj;D(gk,1,Kp);gk.setValue(String(fk[Kp]));$d($b,4,bj,gk)}var hk=H.params;if(hk){var Lp=p(Object.keys(hk));for(Ac=Lp.next();!Ac.done;Ac=Lp.next()){var Mp=Ac.value,ik=new bj;D(ik,1,"client."+Mp);ik.setValue(String(hk[Mp]));$d($b,4,bj,ik)}}var Np=M("SERVER_NAME"),Op=M("SERVER_VERSION");if(Np&&Op){var jk=new bj;D(jk,1,"server.name");jk.setValue(Np);$d($b,4,bj,jk);var kk=new bj;D(kk,1,"server.version");
kk.setValue(Op);$d($b,4,bj,kk)}var Sg=new gj;G(Sg,$i,1,$b);G(Sg,dj,2,dk);G(Sg,fj,3,zc);Hp=Sg}var Pp=Hp;if(!Pp)break a;var Qp=new Nj;Yd(Qp,gj,163,Oj,Pp);vr(Qp)}else{if(Xr())var Rp=void 0;else{var Ge={stackTrace:H.stack};H.fileName&&(Ge.filename=H.fileName);var Ib=H.lineNumber&&H.lineNumber.split?H.lineNumber.split(":"):[];0!==Ib.length&&(1!==Ib.length||isNaN(Number(Ib[0]))?2!==Ib.length||isNaN(Number(Ib[0]))||isNaN(Number(Ib[1]))||(Ge.lineNumber=Number(Ib[0]),Ge.columnNumber=Number(Ib[1])):Ge.lineNumber=
Number(Ib[0]));var lk={level:"ERROR_LEVEL_UNKNOWN",message:H.message,errorClassName:H.name,sampleWeight:H.sampleWeight};"ERROR"===Fe?lk.level="ERROR_LEVEL_ERROR":"WARNING"===Fe&&(lk.level="ERROR_LEVEL_WARNNING");var Mv={isObfuscated:!0,browserStackInfo:Ge},zd={pageUrl:window.location.href,kvPairs:[]};M("FEXP_EXPERIMENTS")&&(zd.experimentIds=M("FEXP_EXPERIMENTS"));var mk=M("LATEST_ECATCHER_SERVICE_TRACKING_PARAMS");if(!zk()&&mk)for(var Sp=p(Object.keys(mk)),Bc=Sp.next();!Bc.done;Bc=Sp.next()){var Tp=
Bc.value;zd.kvPairs.push({key:Tp,value:String(mk[Tp])})}var nk=H.params;if(nk){var Up=p(Object.keys(nk));for(Bc=Up.next();!Bc.done;Bc=Up.next()){var Vp=Bc.value;zd.kvPairs.push({key:"client."+Vp,value:String(nk[Vp])})}}var Wp=M("SERVER_NAME"),Xp=M("SERVER_VERSION");Wp&&Xp&&(zd.kvPairs.push({key:"server.name",value:Wp}),zd.kvPairs.push({key:"server.version",value:Xp}));Rp={errorMetadata:zd,stackTrace:Mv,logMessage:lk}}var Yp=Rp;if(!Yp)break a;nm("clientError",Yp)}if("ERROR"===Fe||P("errors_flush_gel_always_killswitch"))b:if(P("migrate_events_to_ts"))c:{if(P("web_fp_via_jspb")&&
(sr(!0),!P("web_fp_via_jspb_and_json")))break c;sr()}else{if(P("web_fp_via_jspb")&&(sr(!0),!P("web_fp_via_jspb_and_json")))break b;sr()}}if(!P("suppress_error_204_logging")){var He=H.params||{},ac={urlParams:{a:"logerror",t:"jserror",type:H.name,msg:H.message.substr(0,250),line:H.lineNumber,level:h,"client.name":He.name},postParams:{url:M("PAGE_NAME",window.location.href),file:H.fileName},method:"POST"};He.version&&(ac["client.version"]=He.version);if(ac.postParams){H.stack&&(ac.postParams.stack=
H.stack);for(var Zp=p(Object.keys(He)),ok=Zp.next();!ok.done;ok=Zp.next()){var $p=ok.value;ac.postParams["client."+$p]=He[$p]}var pk=M("LATEST_ECATCHER_SERVICE_TRACKING_PARAMS");if(pk)for(var aq=p(Object.keys(pk)),qk=aq.next();!qk.done;qk=aq.next()){var bq=qk.value;ac.postParams[bq]=pk[bq]}var cq=M("SERVER_NAME"),dq=M("SERVER_VERSION");cq&&dq&&(ac.postParams["server.name"]=cq,ac.postParams["server.version"]=dq)}hl(M("ECATCHER_REPORT_HOST","")+"/error_204",ac)}try{Pr.add(H.message)}catch(mx){}Qr++}}}}
function Xr(){for(var a=p(Ur),b=a.next();!b.done;b=a.next())if(em(b.value.toLowerCase()))return!0;return!1}
function Yr(a){var b=Ma.apply(1,arguments);a.args||(a.args=[]);a.args.push.apply(a.args,ia(b))}
;function Zr(){this.register=new Map}
function $r(a){a=p(a.register.values());for(var b=a.next();!b.done;b=a.next())b.value.yq("ABORTED")}
Zr.prototype.clear=function(){$r(this);this.register.clear()};
var as=new Zr;var bs=Date.now().toString();
function cs(){a:{if(window.crypto&&window.crypto.getRandomValues)try{var a=Array(16),b=new Uint8Array(16);window.crypto.getRandomValues(b);for(var c=0;c<a.length;c++)a[c]=b[c];var d=a;break a}catch(e){}d=Array(16);for(a=0;16>a;a++){b=Date.now();for(c=0;c<b%23;c++)d[a]=Math.random();d[a]=Math.floor(256*Math.random())}if(bs)for(a=1,b=0;b<bs.length;b++)d[a%16]=d[a%16]^d[(a-1)%16]/4^bs.charCodeAt(b),a++}a=[];for(b=0;b<d.length;b++)a.push("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_".charAt(d[b]&63));
return a.join("")}
;var ds=y.ytLoggingDocDocumentNonce_;ds||(ds=cs(),z("ytLoggingDocDocumentNonce_",ds));var es=ds;var fs={yh:0,ie:1,se:2,ql:3,Ah:4,Ep:5,gm:6,Nn:7,hn:8,Bn:9,0:"DEFAULT",1:"CHAT",2:"CONVERSATIONS",3:"MINIPLAYER",4:"DIALOG",5:"VOZ",6:"MUSIC_WATCH_TABS",7:"SHARE",8:"PUSH_NOTIFICATIONS",9:"RICH_GRID_WATCH"};function gs(a){this.i=a}
function hs(a){return new gs({trackingParams:a})}
gs.prototype.getAsJson=function(){var a={};void 0!==this.i.trackingParams?a.trackingParams=this.i.trackingParams:(a.veType=this.i.veType,void 0!==this.i.veCounter&&(a.veCounter=this.i.veCounter),void 0!==this.i.elementIndex&&(a.elementIndex=this.i.elementIndex));void 0!==this.i.dataElement&&(a.dataElement=this.i.dataElement.getAsJson());void 0!==this.i.youtubeData&&(a.youtubeData=this.i.youtubeData);return a};
gs.prototype.getAsJspb=function(){var a=new mj;if(void 0!==this.i.trackingParams){var b=this.i.trackingParams;null!=b&&b instanceof kd&&jd();D(a,1,b)}else void 0!==this.i.veType&&D(a,2,this.i.veType),void 0!==this.i.veCounter&&D(a,6,this.i.veCounter),void 0!==this.i.elementIndex&&D(a,3,this.i.elementIndex);void 0!==this.i.dataElement&&(b=this.i.dataElement.getAsJspb(),G(a,mj,7,b));void 0!==this.i.youtubeData&&G(a,Gi,8,this.i.jspbYoutubeData);return a};
gs.prototype.toString=function(){return JSON.stringify(this.getAsJson())};
gs.prototype.isClientVe=function(){return!this.i.trackingParams&&!!this.i.veType};function is(a){a=void 0===a?0:a;return 0===a?"client-screen-nonce":"client-screen-nonce."+a}
function js(a){a=void 0===a?0:a;return 0===a?"ROOT_VE_TYPE":"ROOT_VE_TYPE."+a}
function ks(a){return M(js(void 0===a?0:a))}
z("yt_logging_screen.getRootVeType",ks);function ls(a){return(a=ks(void 0===a?0:a))?new gs({veType:a,youtubeData:void 0,jspbYoutubeData:void 0}):null}
function ms(){var a=M("csn-to-ctt-auth-info");a||(a={},yk("csn-to-ctt-auth-info",a));return a}
function ns(a){a=M(is(void 0===a?0:a));if(!a&&!M("USE_CSN_FALLBACK",!0))return null;a||(a="UNDEFINED_CSN");return a?a:null}
z("yt_logging_screen.getCurrentCsn",ns);function os(a,b,c){var d=ms();(c=ns(c))&&delete d[c];b&&(d[a]=b)}
function ps(a){return ms()[a]}
z("yt_logging_screen.getCttAuthInfo",ps);
function qs(a,b,c,d){c=void 0===c?0:c;if(a!==M(is(c))||b!==M(js(c)))if(os(a,d,c),yk(is(c),a),yk(js(c),b),b=function(){setTimeout(function(){if(a)if(P("web_time_via_jspb")){var e=new nj;D(e,1,es);D(e,2,a);P("use_default_heartbeat_client")?Cr(e):Cr(e,void 0,op)}else e={clientDocumentNonce:es,clientScreenNonce:a},P("use_default_heartbeat_client")?nm("foregroundHeartbeatScreenAssociated",e):qr("foregroundHeartbeatScreenAssociated",e,op)},0)},"requestAnimationFrame"in window)try{window.requestAnimationFrame(b)}catch(e){b()}else b()}
z("yt_logging_screen.setCurrentScreen",qs);var rs=window.yt&&window.yt.msgs_||window.ytcfg&&window.ytcfg.msgs||{};z("yt.msgs_",rs);function ss(a){tk(rs,arguments)}
;var ts={he:3611,td:27686,ud:85013,vd:23462,xd:42016,yd:62407,zd:26926,wd:43781,Ad:51236,Bd:79148,Cd:50160,Dd:77504,Pd:153587,Qd:87907,Rd:18630,Sd:54445,Td:80935,Ud:152172,Vd:105675,Wd:150723,Xd:37521,Yd:147285,Zd:47786,ae:98349,be:123695,ce:6827,de:29434,ee:7282,ge:124448,ke:32276,je:76278,le:147868,me:147869,ne:93911,oe:106531,pe:27259,qe:27262,re:27263,te:21759,ue:27107,we:62936,xe:49568,ye:38408,ze:80637,Ae:68727,Be:68728,Ce:80353,De:80356,Ee:74610,Fe:45707,Ge:83962,He:83970,Ie:46713,Je:89711,
Ke:74612,Le:155792,Me:93265,Ne:74611,Oe:131380,Qe:128979,Re:139311,Se:128978,Pe:131391,Te:105350,Ve:139312,We:134800,Ue:131392,Ye:113533,Ze:93252,af:99357,cf:94521,df:114252,ef:113532,ff:94522,bf:94583,gf:88E3,hf:139580,jf:93253,kf:93254,lf:94387,mf:94388,nf:93255,pf:97424,Xe:72502,qf:110111,rf:76019,tf:117092,uf:117093,sf:89431,vf:110466,wf:77240,xf:60508,yf:148123,zf:148124,Af:137401,Bf:137402,Cf:137046,Df:73393,Ef:113534,Ff:92098,Gf:131381,Hf:84517,If:83759,Jf:80357,Kf:86113,Lf:72598,Mf:72733,
Nf:107349,Of:124275,Pf:118203,Qf:133275,Rf:152569,Sf:133274,Tf:133272,Uf:133273,Vf:133276,Wf:144507,Xf:143247,Yf:143248,Zf:143249,ag:143250,cg:143251,dg:144401,fg:117431,eg:133797,gg:153964,hg:128572,ig:133405,jg:117429,kg:117430,lg:117432,mg:120080,ng:117259,og:121692,pg:145656,qg:145655,rg:145653,sg:145654,tg:145657,ug:132972,vg:133051,wg:133658,xg:132971,yg:97615,Ag:143359,zg:143356,Cg:143361,Bg:143358,Eg:143360,Dg:143357,Fg:142303,Gg:143353,Hg:143354,Ig:144479,Jg:143355,Kg:31402,Mg:133624,Ng:146477,
Og:133623,Pg:133622,Lg:133621,Qg:84774,Rg:95117,Sg:150497,Tg:98930,Ug:98931,Vg:98932,Wg:43347,Xg:129889,Yg:149123,Zg:45474,ah:100352,bh:84758,dh:98443,eh:117985,fh:74613,gh:155911,hh:74614,ih:64502,jh:136032,kh:74615,lh:74616,mh:122224,nh:74617,oh:77820,ph:74618,qh:93278,rh:93274,sh:93275,th:93276,uh:22110,vh:29433,wh:133798,xh:132295,zh:120541,Bh:82047,Ch:113550,Dh:75836,Eh:75837,Fh:42352,Gh:84512,Hh:76065,Ih:75989,Nh:16623,Oh:32594,Ph:27240,Qh:32633,Rh:74858,Th:3945,Sh:16989,Uh:45520,Vh:25488,Wh:25492,
Xh:25494,Yh:55760,Zh:14057,ai:18451,bi:57204,ci:57203,di:17897,fi:57205,gi:18198,hi:17898,ii:17909,ji:43980,ki:46220,li:11721,mi:147994,ni:49954,oi:96369,ri:3854,si:151633,ti:56251,vi:25624,wi:152036,Ni:16906,Oi:99999,Pi:68172,Qi:27068,Ri:47973,Si:72773,Ti:26970,Ui:26971,Vi:96805,Wi:17752,Xi:73233,Yi:109512,Zi:22256,aj:14115,bj:22696,cj:89278,dj:89277,ej:109513,fj:43278,gj:43459,hj:43464,ij:89279,jj:43717,kj:55764,lj:22255,mj:147912,nj:89281,oj:40963,pj:43277,qj:43442,rj:91824,sj:120137,tj:96367,
uj:36850,vj:72694,wj:37414,xj:36851,zj:124863,yj:121343,Aj:73491,Bj:54473,Cj:43375,Dj:46674,Ej:143815,Fj:139095,Gj:144402,Hj:149968,Ij:149969,Jj:32473,Kj:72901,Lj:72906,Mj:50947,Nj:50612,Oj:50613,Pj:50942,Qj:84938,Rj:84943,Sj:84939,Tj:84941,Uj:84944,Vj:84940,Wj:84942,Xj:35585,Yj:51926,Zj:79983,ak:63238,bk:18921,ck:63241,dk:57893,ek:41182,fk:135732,gk:33424,hk:22207,ik:42993,jk:36229,kk:22206,lk:22205,mk:18993,nk:19001,pk:18990,qk:18991,rk:18997,sk:18725,tk:19003,uk:36874,vk:44763,wk:33427,xk:67793,
yk:22182,zk:37091,Ak:34650,Bk:50617,Ck:47261,Dk:22287,Ek:25144,Fk:97917,Gk:62397,Hk:150871,Ik:150874,Jk:125598,Kk:137935,Lk:36961,Mk:108035,Nk:27426,Ok:27857,Pk:27846,Qk:27854,Rk:69692,Sk:61411,Tk:39299,Uk:38696,Vk:62520,Wk:36382,Xk:108701,Yk:50663,Zk:36387,al:14908,bl:37533,dl:105443,fl:61635,il:62274,jl:133818,kl:65702,ll:65703,ml:65701,nl:76256,ol:37671,pl:49953,rl:36216,sl:28237,ul:39553,vl:29222,wl:26107,xl:38050,yl:26108,Al:120745,zl:26109,Bl:26110,Cl:66881,Dl:28236,El:14586,Fl:57929,Gl:74723,
Hl:44098,Il:44099,Ll:23528,Ml:61699,Jl:134104,Kl:134103,Nl:59149,Ol:101951,Pl:97346,Ql:118051,Rl:95102,Sl:64882,Tl:119505,Ul:63595,Vl:63349,Wl:95101,Xl:75240,Yl:27039,Zl:68823,am:21537,bm:83464,cm:75707,dm:83113,em:101952,fm:101953,hm:79610,im:125755,jm:24402,km:24400,lm:32925,nm:57173,mm:156421,om:122502,pm:145268,qm:138480,rm:64423,sm:64424,tm:33986,um:100828,vm:129089,wm:21409,Am:135155,Bm:135156,Cm:135157,Dm:135158,Em:135159,Fm:135160,Gm:135161,Hm:135162,Im:135163,Jm:135164,Km:135165,Lm:135166,
xm:11070,ym:11074,zm:17880,Mm:14001,Om:30709,Pm:30707,Qm:30711,Rm:30710,Sm:30708,Nm:26984,Tm:146143,Um:63648,Vm:63649,Wm:51879,Xm:111059,Ym:5754,Zm:20445,an:151308,bn:151152,dn:130975,cn:130976,en:110386,fn:113746,gn:66557,jn:17310,kn:28631,ln:21589,mn:154946,nn:68012,pn:60480,qn:138664,rn:141121,sn:31571,tn:141978,un:150105,vn:150106,wn:150107,xn:150108,yn:76980,zn:41577,An:45469,Cn:38669,Dn:13768,En:13777,Fn:141842,Gn:62985,Hn:4724,In:59369,Jn:43927,Kn:43928,Ln:12924,Mn:100355,Pn:56219,Qn:27669,
Rn:10337,On:47896,Sn:122629,Un:139723,Tn:139722,Vn:121258,Wn:107598,Xn:127991,Yn:96639,Zn:107536,ao:130169,bo:96661,co:145188,eo:96658,fo:116646,ho:121122,jo:96660,ko:127738,lo:127083,mo:147842,no:104443,oo:96659,po:147595,qo:106442,ro:134840,so:63667,to:63668,uo:63669,vo:130686,wo:147036,xo:78314,yo:147799,zo:148649,Ao:55761,Bo:127098,Co:134841,Do:96368,Eo:67374,Fo:48992,Go:146176,Ho:49956,Io:31961,Jo:26388,Ko:23811,Lo:5E4,Mo:126250,No:96370,Oo:47355,Po:47356,Qo:37935,Ro:45521,So:21760,To:83769,
Uo:49977,Vo:49974,Wo:93497,Xo:93498,Yo:34325,Zo:140759,ap:115803,bp:123707,cp:100081,ep:35309,fp:68314,gp:25602,hp:100339,ip:143516,jp:59018,kp:18248,lp:50625,mp:9729,np:37168,qp:37169,rp:21667,sp:16749,tp:18635,up:39305,vp:18046,wp:53969,xp:8213,yp:93926,zp:102852,Ap:110099,Bp:22678,Cp:69076,Dp:137575,Fp:139224,Gp:100856,Hp:154430,Ip:17736,Jp:3832,Kp:147111,Lp:55759,Mp:64031,Sp:93044,Tp:93045,Up:34388,Vp:17657,Wp:17655,Xp:39579,Yp:39578,Zp:77448,aq:8196,bq:11357,cq:69877,fq:8197,gq:156512,hq:156509,
iq:82039};function us(){var a=vb(vs),b;return(new uf(function(c,d){a.onSuccess=function(e){$k(e)?c(new ws(e)):d(new xs("Request failed, status="+(e&&"status"in e?e.status:-1),"net.badstatus",e))};
a.onError=function(e){d(new xs("Unknown request error","net.unknown",e))};
a.onTimeout=function(e){d(new xs("Request timed out","net.timeout",e))};
b=hl("//googleads.g.doubleclick.net/pagead/id",a)})).gb(function(c){c instanceof Bf&&b.abort();
return zf(c)})}
function xs(a,b,c){cb.call(this,a+", errorCode="+b);this.errorCode=b;this.xhr=c;this.name="PromiseAjaxError"}
r(xs,cb);function ws(a){this.xhr=a}
;function ys(){this.i=0;this.ja=null}
ys.prototype.then=function(a,b,c){return 1===this.i&&a?(a=a.call(c,this.ja))&&"function"===typeof a.then?a:zs(a):2===this.i&&b?(a=b.call(c,this.ja))&&"function"===typeof a.then?a:As(a):this};
ys.prototype.getValue=function(){return this.ja};
ys.prototype.$goog_Thenable=!0;function As(a){var b=new ys;a=void 0===a?null:a;b.i=2;b.ja=void 0===a?null:a;return b}
function zs(a){var b=new ys;a=void 0===a?null:a;b.i=1;b.ja=void 0===a?null:a;return b}
;function Bs(a,b){if(a)return a[b.name]}
;function Cs(a,b){return{method:void 0===b?"POST":b,mode:Vk(a)?"same-origin":"cors",credentials:Vk(a)?"same-origin":"include"}}
;function Ds(){return og()||dm&&em("applewebkit")&&!em("version")&&(!em("safari")||em("gsa/"))||Qc&&em("version/")?!0:M("EOM_VISITOR_DATA")?!1:!0}
;function Es(a){a:{var b=a.raw_embedded_player_response;if(!b&&(a=a.embedded_player_response))try{b=JSON.parse(a)}catch(d){b="EMBEDDED_PLAYER_MODE_UNKNOWN";break a}if(b)b:{for(var c in Sh)if(Sh[c]==b.embeddedPlayerMode){b=Sh[c];break b}b="EMBEDDED_PLAYER_MODE_UNKNOWN"}else b="EMBEDDED_PLAYER_MODE_UNKNOWN"}return"EMBEDDED_PLAYER_MODE_PFL"===b}
;function Fs(a){cb.call(this,a.message||a.description||a.name);this.isMissing=a instanceof Gs;this.isTimeout=a instanceof xs&&"net.timeout"==a.errorCode;this.isCanceled=a instanceof Bf}
r(Fs,cb);Fs.prototype.name="BiscottiError";function Gs(){cb.call(this,"Biscotti ID is missing from server")}
r(Gs,cb);Gs.prototype.name="BiscottiMissingError";var vs={format:"RAW",method:"GET",timeout:5E3,withCredentials:!0},Hs=null;
function Kk(){if(P("disable_biscotti_fetch_entirely_for_all_web_clients"))return zf(Error("Biscotti id fetching has been disabled entirely."));if(!Ds())return zf(Error("User has not consented - not fetching biscotti id."));var a=M("PLAYER_VARS",{});if("1"==tb(a))return zf(Error("Biscotti ID is not available in private embed mode"));if(Es(a))return zf(Error("Biscotti id fetching has been disabled for pfl."));Hs||(Hs=us().then(Is).gb(function(b){return Js(2,b)}));
return Hs}
function Is(a){a=a.xhr.responseText;if(0!=a.lastIndexOf(")]}'",0))throw new Gs;a=JSON.parse(a.substr(4));if(1<(a.type||1))throw new Gs;a=a.id;Lk(a);Hs=zs(a);Ks(18E5,2);return a}
function Js(a,b){b=new Fs(b);Lk("");Hs=As(b);0<a&&Ks(12E4,a-1);throw b;}
function Ks(a,b){al(function(){us().then(Is,function(c){return Js(b,c)}).gb(eb)},a)}
function Ls(){try{var a=B("yt.ads.biscotti.getId_");return a?a():Kk()}catch(b){return zf(b)}}
;function Ms(a){if("1"!=tb(M("PLAYER_VARS",{}))){a&&Jk();try{Ls().then(function(){},function(){}),al(Ms,18E5)}catch(b){Hk(b)}}}
;function Ns(){this.ld=!0}
function Os(a){var b={},c=qg([]);c&&(b.Authorization=c,c=a=null==a?void 0:a.sessionIndex,void 0===c&&(c=Number(M("SESSION_INDEX",0)),c=isNaN(c)?0:c),P("voice_search_auth_header_removal")||(b["X-Goog-AuthUser"]=c),"INNERTUBE_HOST_OVERRIDE"in xk||(b["X-Origin"]=window.location.origin),void 0===a&&"DELEGATED_SESSION_ID"in xk&&(b["X-Goog-PageId"]=M("DELEGATED_SESSION_ID")));return b}
;var Ps=Symbol("injectionDeps");function Qs(a){this.name=a}
Qs.prototype.toString=function(){return"InjectionToken("+this.name+")"};
function Rs(){this.key=Ss}
function Ts(){this.providers=new Map;this.i=new Map}
Ts.prototype.resolve=function(a){return a instanceof Rs?Us(this,a.key,[],!0):Us(this,a,[])};
function Us(a,b,c,d){d=void 0===d?!1:d;if(-1<c.indexOf(b))throw Error("Deps cycle for: "+b);if(a.i.has(b))return a.i.get(b);if(!a.providers.has(b)){if(d)return;throw Error("No provider for: "+b);}d=a.providers.get(b);c.push(b);if(d.nc)var e=d.nc;else if(d.sd)e=d[Ps]?Vs(a,d[Ps],c):[],e=d.sd.apply(d,ia(e));else if(d.mc){e=d.mc;var f=e[Ps]?Vs(a,e[Ps],c):[];e=new (Function.prototype.bind.apply(e,[null].concat(ia(f))))}else throw Error("Could not resolve providers for: "+b);c.pop();d.Eq||a.i.set(b,e);
return e}
function Vs(a,b,c){return b?b.map(function(d){return d instanceof Rs?Us(a,d.key,c,!0):Us(a,d,c)}):[]}
;var Ws;function Xs(){Ws||(Ws=new Ts);return Ws}
;var Ys={identityType:"UNAUTHENTICATED_IDENTITY_TYPE_UNKNOWN"};var Zs=new Map([["dark","USER_INTERFACE_THEME_DARK"],["light","USER_INTERFACE_THEME_LIGHT"]]);function $s(){var a=void 0===a?window.location.href:a;if(P("kevlar_disable_theme_param"))return null;mc(nc(5,a));try{var b=Tk(a).theme;return Zs.get(b)||null}catch(c){}return null}
;function at(){this.i={};if(this.j=sl()){var a=mg.get("CONSISTENCY",void 0);a&&bt(this,{encryptedTokenJarContents:a})}}
at.prototype.handleResponse=function(a,b){if(!b)throw Error("request needs to be passed into ConsistencyService");var c,d;b=(null==(c=b.ga.context)?void 0:null==(d=c.request)?void 0:d.consistencyTokenJars)||[];var e;if(a=null==(e=a.responseContext)?void 0:e.consistencyTokenJar){e=p(b);for(c=e.next();!c.done;c=e.next())delete this.i[c.value.encryptedTokenJarContents];bt(this,a)}};
function bt(a,b){if(b.encryptedTokenJarContents&&(a.i[b.encryptedTokenJarContents]=b,"string"===typeof b.expirationSeconds)){var c=Number(b.expirationSeconds);setTimeout(function(){delete a.i[b.encryptedTokenJarContents]},1E3*c);
a.j&&rl("CONSISTENCY",b.encryptedTokenJarContents,c,void 0,!0)}}
;var ct=window.location.hostname.split(".").slice(-2).join(".");function dt(){var a=M("LOCATION_PLAYABILITY_TOKEN");"TVHTML5"===M("INNERTUBE_CLIENT_NAME")&&(this.i=et(this))&&(a=this.i.get("yt-location-playability-token"));a&&(this.locationPlayabilityToken=a,this.j=void 0)}
var ft;dt.getInstance=function(){ft=B("yt.clientLocationService.instance");ft||(ft=new dt,z("yt.clientLocationService.instance",ft));return ft};
dt.prototype.setLocationOnInnerTubeContext=function(a){a.client||(a.client={});this.j?(a.client.locationInfo||(a.client.locationInfo={}),a.client.locationInfo.latitudeE7=Math.floor(1E7*this.j.coords.latitude),a.client.locationInfo.longitudeE7=Math.floor(1E7*this.j.coords.longitude),a.client.locationInfo.horizontalAccuracyMeters=Math.round(this.j.coords.accuracy),a.client.locationInfo.forceLocationPlayabilityTokenRefresh=!0):this.locationPlayabilityToken&&(a.client.locationPlayabilityToken=this.locationPlayabilityToken)};
dt.prototype.handleResponse=function(a){var b;a=null==(b=a.responseContext)?void 0:b.locationPlayabilityToken;void 0!==a&&(this.locationPlayabilityToken=a,this.j=void 0,"TVHTML5"===M("INNERTUBE_CLIENT_NAME")?(this.i=et(this))&&this.i.set("yt-location-playability-token",a,15552E3):rl("YT_CL",JSON.stringify({loctok:a}),15552E3,ct,!0))};
function et(a){return void 0===a.i?new Ql("yt-client-location"):a.i}
dt.prototype.getCurrentPositionFromGeolocation=function(){var a=this;if(!(navigator&&navigator.geolocation&&navigator.geolocation.getCurrentPosition&&P("enable_handoff_location_2fa_on_mweb")))return Promise.reject(Error("Geolocation unsupported"));var b=!1,c=1E4;P("enable_handoff_location_2fa_on_mweb")&&(b=!0,c=15E3);return new Promise(function(d,e){navigator.geolocation.getCurrentPosition(function(f){a.j=f;d(f)},function(f){e(f)},{enableHighAccuracy:b,
maximumAge:0,timeout:c})})};
dt.prototype.createUnpluggedLocationInfo=function(a){var b={};a=a.coords;if(null==a?0:a.latitude)b.latitudeE7=Math.floor(1E7*a.latitude);if(null==a?0:a.longitude)b.longitudeE7=Math.floor(1E7*a.longitude);if(null==a?0:a.accuracy)b.locationRadiusMeters=Math.round(a.accuracy);return b};function gt(a,b){var c,d=null==(c=Bs(a,Yi))?void 0:c.signal;if(d&&b.La&&(c=b.La[d]))return c();var e;if((c=null==(e=Bs(a,Xi))?void 0:e.request)&&b.Bc&&(e=b.Bc[c]))return e();for(var f in a)if(b.Lb[f]&&(a=b.Lb[f]))return a()}
;function ht(a){return function(){return new a}}
;var jt={},kt=(jt.WEB_UNPLUGGED="^unplugged/",jt.WEB_UNPLUGGED_ONBOARDING="^unplugged/",jt.WEB_UNPLUGGED_OPS="^unplugged/",jt.WEB_UNPLUGGED_PUBLIC="^unplugged/",jt.WEB_CREATOR="^creator/",jt.WEB_KIDS="^kids/",jt.WEB_EXPERIMENTS="^experiments/",jt.WEB_MUSIC="^music/",jt.WEB_REMIX="^music/",jt.WEB_MUSIC_EMBEDDED_PLAYER="^music/",jt.WEB_MUSIC_EMBEDDED_PLAYER="^main_app/|^sfv/",jt);
function lt(a){var b=void 0===b?"UNKNOWN_INTERFACE":b;if(1===a.length)return a[0];var c=kt[b];if(c){var d=new RegExp(c),e=p(a);for(c=e.next();!c.done;c=e.next())if(c=c.value,d.exec(c))return c}var f=[];Object.entries(kt).forEach(function(g){var h=p(g);g=h.next().value;h=h.next().value;b!==g&&f.push(h)});
d=new RegExp(f.join("|"));a.sort(function(g,h){return g.length-h.length});
e=p(a);for(c=e.next();!c.done;c=e.next())if(c=c.value,!d.exec(c))return c;return a[0]}
;function mt(){}
mt.prototype.o=function(a,b,c){b=void 0===b?{}:b;c=void 0===c?Ys:c;var d=a.clickTrackingParams,e=this.m,f=!1;f=void 0===f?!1:f;e=void 0===e?!1:e;var g=M("INNERTUBE_CONTEXT");if(g){g=wb(g);P("web_no_tracking_params_in_shell_killswitch")||delete g.clickTracking;g.client||(g.client={});var h=g.client;"MWEB"===h.clientName&&(h.clientFormFactor=M("IS_TABLET")?"LARGE_FORM_FACTOR":"SMALL_FORM_FACTOR");h.screenWidthPoints=window.innerWidth;h.screenHeightPoints=window.innerHeight;h.screenPixelDensity=Math.round(window.devicePixelRatio||
1);h.screenDensityFloat=window.devicePixelRatio||1;h.utcOffsetMinutes=-Math.floor((new Date).getTimezoneOffset());var k=void 0===k?!1:k;ul.getInstance();var m="USER_INTERFACE_THEME_LIGHT";xl(165)?m="USER_INTERFACE_THEME_DARK":xl(174)?m="USER_INTERFACE_THEME_LIGHT":!P("kevlar_legacy_browsers")&&window.matchMedia&&window.matchMedia("(prefers-color-scheme)").matches&&window.matchMedia("(prefers-color-scheme: dark)").matches&&(m="USER_INTERFACE_THEME_DARK");k=k?m:$s()||m;h.userInterfaceTheme=k;if(!f){if(k=
El())h.connectionType=k;P("web_log_effective_connection_type")&&(k=Fl())&&(g.client.effectiveConnectionType=k)}var q;if(P("web_log_memory_total_kbytes")&&(null==(q=y.navigator)?0:q.deviceMemory)){var t;q=null==(t=y.navigator)?void 0:t.deviceMemory;g.client.memoryTotalKbytes=""+1E6*q}t=Tk(y.location.href);!P("web_populate_internal_geo_killswitch")&&t.internalcountrycode&&(h.internalGeo=t.internalcountrycode);"MWEB"===h.clientName||"WEB"===h.clientName?(h.mainAppWebInfo={graftUrl:y.location.href},P("kevlar_woffle")&&
pl.i&&(t=pl.i,h.mainAppWebInfo.pwaInstallabilityStatus=!t.i&&t.j?"PWA_INSTALLABILITY_STATUS_CAN_BE_INSTALLED":"PWA_INSTALLABILITY_STATUS_UNKNOWN"),h.mainAppWebInfo.webDisplayMode=ql(),h.mainAppWebInfo.isWebNativeShareAvailable=navigator&&void 0!==navigator.share):"TVHTML5"===h.clientName&&(!P("web_lr_app_quality_killswitch")&&(t=M("LIVING_ROOM_APP_QUALITY"))&&(h.tvAppInfo=Object.assign(h.tvAppInfo||{},{appQuality:t})),t=M("LIVING_ROOM_CERTIFICATION_SCOPE"))&&(h.tvAppInfo=Object.assign(h.tvAppInfo||
{},{certificationScope:t}));if(!P("web_populate_time_zone_itc_killswitch")){b:{if("undefined"!==typeof Intl)try{var x=(new Intl.DateTimeFormat).resolvedOptions().timeZone;break b}catch(ma){}x=void 0}x&&(h.timeZone=x)}(x=Ck())?h.experimentsToken=x:delete h.experimentsToken;x=Dk();at.i||(at.i=new at);h=at.i.i;t=[];q=0;for(var u in h)t[q++]=h[u];g.request=Object.assign({},g.request,{internalExperimentFlags:x,consistencyTokenJars:t});!P("web_prequest_context_killswitch")&&(u=M("INNERTUBE_CONTEXT_PREQUEST_CONTEXT"))&&
(g.request.externalPrequestContext=u);x=ul.getInstance();u=xl(58);x=x.get("gsml","");g.user=Object.assign({},g.user);u&&(g.user.enableSafetyMode=u);x&&(g.user.lockedSafetyMode=!0);P("warm_op_csn_cleanup")?e&&(f=ns())&&(g.clientScreenNonce=f):!f&&(f=ns())&&(g.clientScreenNonce=f);d&&(g.clickTracking={clickTrackingParams:d});if(d=B("yt.mdx.remote.remoteClient_"))g.remoteClient=d;P("web_enable_client_location_service")&&dt.getInstance().setLocationOnInnerTubeContext(g);try{var A=Wk(),E=A.bid;delete A.bid;
g.adSignalsInfo={params:[],bid:E};var F=p(Object.entries(A));for(var N=F.next();!N.done;N=F.next()){var O=p(N.value),Q=O.next().value,ca=O.next().value;A=Q;E=ca;d=void 0;null==(d=g.adSignalsInfo.params)||d.push({key:A,value:""+E})}}catch(ma){Vr(ma)}F=g}else Vr(Error("Error: No InnerTubeContext shell provided in ytconfig.")),F={};F={context:F};if(N=this.i(a)){this.j(F,N,b);var aa;b="/youtubei/v1/"+lt(this.l());var ja;(N=null==(aa=a.commandMetadata)?void 0:null==(ja=aa.webCommandMetadata)?void 0:ja.apiUrl)&&
(b=N);aa=b;(ja=M("INNERTUBE_HOST_OVERRIDE"))&&(aa=String(ja)+String(pc(aa)));ja={};ja.key=M("INNERTUBE_API_KEY");P("json_condensed_response")&&(ja.prettyPrint="false");aa=Uk(aa,ja||{},!1);a=P("kevlar_response_command_processor_page")?Object.assign({},{command:a},void 0):Object.assign({},void 0);a={input:aa,Ba:Cs(aa),ga:F,config:a};a.config.Ra?a.config.Ra.identity=c:a.config.Ra={identity:c};return a}Vr(new S("Error: Failed to create Request from Command.",a))};
fa.Object.defineProperties(mt.prototype,{m:{configurable:!0,enumerable:!0,get:function(){return!1}}});function nt(){}
r(nt,mt);nt.prototype.o=function(){return{input:"/getDatasyncIdsEndpoint",Ba:Cs("/getDatasyncIdsEndpoint","GET"),ga:{}}};
nt.prototype.l=function(){return[]};
nt.prototype.i=function(){};
nt.prototype.j=function(){};var ot={},pt=(ot.GET_DATASYNC_IDS=ht(nt),ot);function qt(a){var b=Ma.apply(1,arguments);if(!rt(a)||b.some(function(d){return!rt(d)}))throw Error("Only objects may be merged.");
b=p(b);for(var c=b.next();!c.done;c=b.next())st(a,c.value);return a}
function st(a,b){for(var c in b)if(rt(b[c])){if(c in a&&!rt(a[c]))throw Error("Cannot merge an object into a non-object.");c in a||(a[c]={});st(a[c],b[c])}else if(tt(b[c])){if(c in a&&!tt(a[c]))throw Error("Cannot merge an array into a non-array.");c in a||(a[c]=[]);ut(a[c],b[c])}else a[c]=b[c];return a}
function ut(a,b){b=p(b);for(var c=b.next();!c.done;c=b.next())c=c.value,rt(c)?a.push(st({},c)):tt(c)?a.push(ut([],c)):a.push(c);return a}
function rt(a){return"object"===typeof a&&!Array.isArray(a)}
function tt(a){return"object"===typeof a&&Array.isArray(a)}
;function vt(a,b){Vn.call(this,1,arguments);this.timer=b}
r(vt,Vn);var wt=new Wn("aft-recorded",vt);var xt=window;function zt(){this.timing={};this.clearResourceTimings=function(){};
this.webkitClearResourceTimings=function(){};
this.mozClearResourceTimings=function(){};
this.msClearResourceTimings=function(){};
this.oClearResourceTimings=function(){}}
var T=xt.performance||xt.mozPerformance||xt.msPerformance||xt.webkitPerformance||new zt;var At=!1,Bt={'script[name="scheduler/scheduler"]':"sj",'script[name="player/base"]':"pj",'link[rel="stylesheet"][name="www-player"]':"pc",'link[rel="stylesheet"][name="player/www-player"]':"pc",'script[name="desktop_polymer/desktop_polymer"]':"dpj",'link[rel="import"][name="desktop_polymer"]':"dph",'script[name="mobile-c3"]':"mcj",'link[rel="stylesheet"][name="mobile-c3"]':"mcc",'script[name="player-plasma-ias-phone/base"]':"mcppj",'script[name="player-plasma-ias-tablet/base"]':"mcptj",'link[rel="stylesheet"][name="mobile-polymer-player-ias"]':"mcpc",
'link[rel="stylesheet"][name="mobile-polymer-player-svg-ias"]':"mcpsc",'script[name="mobile_blazer_core_mod"]':"mbcj",'link[rel="stylesheet"][name="mobile_blazer_css"]':"mbc",'script[name="mobile_blazer_logged_in_users_mod"]':"mbliuj",'script[name="mobile_blazer_logged_out_users_mod"]':"mblouj",'script[name="mobile_blazer_noncore_mod"]':"mbnj","#player_css":"mbpc",'script[name="mobile_blazer_desktopplayer_mod"]':"mbpj",'link[rel="stylesheet"][name="mobile_blazer_tablet_css"]':"mbtc",'script[name="mobile_blazer_watch_mod"]':"mbwj"};
Za(T.clearResourceTimings||T.webkitClearResourceTimings||T.mozClearResourceTimings||T.msClearResourceTimings||T.oClearResourceTimings||eb,T);function Ct(a){var b=Dt(a);if(b.aft)return b.aft;a=M((a||"")+"TIMING_AFT_KEYS",["ol"]);for(var c=a.length,d=0;d<c;d++){var e=b[a[d]];if(e)return e}return NaN}
function Et(){var a;if(P("csi_use_performance_navigation_timing")||P("csi_use_performance_navigation_timing_tvhtml5")){var b,c,d,e=null==T?void 0:null==(a=T.getEntriesByType)?void 0:null==(b=a.call(T,"navigation"))?void 0:null==(c=b[0])?void 0:null==(d=c.toJSON)?void 0:d.call(c);e?(e.requestStart=Ft(e.requestStart),e.responseEnd=Ft(e.responseEnd),e.redirectStart=Ft(e.redirectStart),e.redirectEnd=Ft(e.redirectEnd),e.domainLookupEnd=Ft(e.domainLookupEnd),e.connectStart=Ft(e.connectStart),e.connectEnd=
Ft(e.connectEnd),e.responseStart=Ft(e.responseStart),e.secureConnectionStart=Ft(e.secureConnectionStart),e.domainLookupStart=Ft(e.domainLookupStart),e.isPerformanceNavigationTiming=!0,a=e):a=T.timing}else a=T.timing;return a}
function Gt(){return(P("csi_use_time_origin")||P("csi_use_time_origin_tvhtml5"))&&T.timeOrigin?Math.floor(T.timeOrigin):T.timing.navigationStart}
function Ft(a){return Math.round(Gt()+a)}
function Ht(a){var b;(b=B("ytcsi."+(a||"")+"data_"))||(b={tick:{},info:{}},z("ytcsi."+(a||"")+"data_",b));return b}
function It(a){a=Ht(a);a.info||(a.info={});return a.info}
function Dt(a){a=Ht(a);a.tick||(a.tick={});return a.tick}
function Jt(a){a=Ht(a);if(a.gel){var b=a.gel;b.gelInfos||(b.gelInfos={});b.gelTicks||(b.gelTicks={})}else a.gel={gelTicks:{},gelInfos:{}};return a.gel}
function Kt(a){a=Jt(a);a.gelInfos||(a.gelInfos={});return a.gelInfos}
function Lt(a){var b=Ht(a).nonce;b||(b=cs(),Ht(a).nonce=b);return b}
function Mt(a){var b=Dt(a||""),c=Ct(a);c&&!At&&(ao(wt,new vt(Math.round(c-b._start),a)),At=!0)}
function Nt(a,b){for(var c=p(Object.keys(b)),d=c.next();!d.done;d=c.next())if(d=d.value,!Object.keys(a).includes(d)||"object"===typeof b[d]&&!Nt(a[d],b[d]))return!1;return!0}
;function Ot(){if(T.getEntriesByType){var a=T.getEntriesByType("paint");if(a=lb(a,function(b){return"first-paint"===b.name}))return Ft(a.startTime)}a=T.timing;
return a.Qc?Math.max(0,a.Qc):0}
;function Pt(){var a=B("ytcsi.debug");a||(a=[],z("ytcsi.debug",a),z("ytcsi.reference",{}));return a}
function Qt(a){a=a||"";var b=B("ytcsi.reference");b||(Pt(),b=B("ytcsi.reference"));if(b[a])return b[a];var c=Pt(),d={timerName:a,info:{},tick:{},span:{},jspbInfo:[]};c.push(d);return b[a]=d}
;var U={},Rt=(U.auto_search="LATENCY_ACTION_AUTO_SEARCH",U.ad_to_ad="LATENCY_ACTION_AD_TO_AD",U.ad_to_video="LATENCY_ACTION_AD_TO_VIDEO",U["analytics.explore"]="LATENCY_ACTION_CREATOR_ANALYTICS_EXPLORE",U.app_startup="LATENCY_ACTION_APP_STARTUP",U["artist.analytics"]="LATENCY_ACTION_CREATOR_ARTIST_ANALYTICS",U["artist.events"]="LATENCY_ACTION_CREATOR_ARTIST_CONCERTS",U["artist.presskit"]="LATENCY_ACTION_CREATOR_ARTIST_PROFILE",U["song.analytics"]="LATENCY_ACTION_CREATOR_SONG_ANALYTICS",U.browse="LATENCY_ACTION_BROWSE",
U.cast_splash="LATENCY_ACTION_CAST_SPLASH",U.channels="LATENCY_ACTION_CHANNELS",U.creator_channel_dashboard="LATENCY_ACTION_CREATOR_CHANNEL_DASHBOARD",U["channel.analytics"]="LATENCY_ACTION_CREATOR_CHANNEL_ANALYTICS",U["channel.comments"]="LATENCY_ACTION_CREATOR_CHANNEL_COMMENTS",U["channel.content"]="LATENCY_ACTION_CREATOR_POST_LIST",U["channel.copyright"]="LATENCY_ACTION_CREATOR_CHANNEL_COPYRIGHT",U["channel.editing"]="LATENCY_ACTION_CREATOR_CHANNEL_EDITING",U["channel.monetization"]="LATENCY_ACTION_CREATOR_CHANNEL_MONETIZATION",
U["channel.music"]="LATENCY_ACTION_CREATOR_CHANNEL_MUSIC",U["channel.music_storefront"]="LATENCY_ACTION_CREATOR_CHANNEL_MUSIC_STOREFRONT",U["channel.playlists"]="LATENCY_ACTION_CREATOR_CHANNEL_PLAYLISTS",U["channel.translations"]="LATENCY_ACTION_CREATOR_CHANNEL_TRANSLATIONS",U["channel.videos"]="LATENCY_ACTION_CREATOR_CHANNEL_VIDEOS",U["channel.live_streaming"]="LATENCY_ACTION_CREATOR_LIVE_STREAMING",U.chips="LATENCY_ACTION_CHIPS",U["dialog.copyright_strikes"]="LATENCY_ACTION_CREATOR_DIALOG_COPYRIGHT_STRIKES",
U["dialog.video_copyright"]="LATENCY_ACTION_CREATOR_DIALOG_VIDEO_COPYRIGHT",U["dialog.uploads"]="LATENCY_ACTION_CREATOR_DIALOG_UPLOADS",U.direct_playback="LATENCY_ACTION_DIRECT_PLAYBACK",U.embed="LATENCY_ACTION_EMBED",U.entity_key_serialization_perf="LATENCY_ACTION_ENTITY_KEY_SERIALIZATION_PERF",U.entity_key_deserialization_perf="LATENCY_ACTION_ENTITY_KEY_DESERIALIZATION_PERF",U.explore="LATENCY_ACTION_EXPLORE",U.home="LATENCY_ACTION_HOME",U.library="LATENCY_ACTION_LIBRARY",U.live="LATENCY_ACTION_LIVE",
U.live_pagination="LATENCY_ACTION_LIVE_PAGINATION",U.onboarding="LATENCY_ACTION_ONBOARDING",U.parent_profile_settings="LATENCY_ACTION_KIDS_PARENT_PROFILE_SETTINGS",U.parent_tools_collection="LATENCY_ACTION_PARENT_TOOLS_COLLECTION",U.parent_tools_dashboard="LATENCY_ACTION_PARENT_TOOLS_DASHBOARD",U.player_att="LATENCY_ACTION_PLAYER_ATTESTATION",U["post.comments"]="LATENCY_ACTION_CREATOR_POST_COMMENTS",U["post.edit"]="LATENCY_ACTION_CREATOR_POST_EDIT",U.prebuffer="LATENCY_ACTION_PREBUFFER",U.prefetch=
"LATENCY_ACTION_PREFETCH",U.profile_settings="LATENCY_ACTION_KIDS_PROFILE_SETTINGS",U.profile_switcher="LATENCY_ACTION_LOGIN",U.reel_watch="LATENCY_ACTION_REEL_WATCH",U.results="LATENCY_ACTION_RESULTS",U.search_ui="LATENCY_ACTION_SEARCH_UI",U.search_suggest="LATENCY_ACTION_SUGGEST",U.search_zero_state="LATENCY_ACTION_SEARCH_ZERO_STATE",U.secret_code="LATENCY_ACTION_KIDS_SECRET_CODE",U.seek="LATENCY_ACTION_PLAYER_SEEK",U.settings="LATENCY_ACTION_SETTINGS",U.store="LATENCY_ACTION_STORE",U.tenx="LATENCY_ACTION_TENX",
U.video_to_ad="LATENCY_ACTION_VIDEO_TO_AD",U.watch="LATENCY_ACTION_WATCH",U.watch_it_again="LATENCY_ACTION_KIDS_WATCH_IT_AGAIN",U["watch,watch7"]="LATENCY_ACTION_WATCH",U["watch,watch7_html5"]="LATENCY_ACTION_WATCH",U["watch,watch7ad"]="LATENCY_ACTION_WATCH",U["watch,watch7ad_html5"]="LATENCY_ACTION_WATCH",U.wn_comments="LATENCY_ACTION_LOAD_COMMENTS",U.ww_rqs="LATENCY_ACTION_WHO_IS_WATCHING",U["video.analytics"]="LATENCY_ACTION_CREATOR_VIDEO_ANALYTICS",U["video.comments"]="LATENCY_ACTION_CREATOR_VIDEO_COMMENTS",
U["video.edit"]="LATENCY_ACTION_CREATOR_VIDEO_EDIT",U["video.editor"]="LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR",U["video.editor_async"]="LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR_ASYNC",U["video.live_settings"]="LATENCY_ACTION_CREATOR_VIDEO_LIVE_SETTINGS",U["video.live_streaming"]="LATENCY_ACTION_CREATOR_VIDEO_LIVE_STREAMING",U["video.monetization"]="LATENCY_ACTION_CREATOR_VIDEO_MONETIZATION",U["video.translations"]="LATENCY_ACTION_CREATOR_VIDEO_TRANSLATIONS",U.voice_assistant="LATENCY_ACTION_VOICE_ASSISTANT",
U.cast_load_by_entity_to_watch="LATENCY_ACTION_CAST_LOAD_BY_ENTITY_TO_WATCH",U.networkless_performance="LATENCY_ACTION_NETWORKLESS_PERFORMANCE",U),V={},St=(V.ad_allowed="adTypesAllowed",V.yt_abt="adBreakType",V.ad_cpn="adClientPlaybackNonce",V.ad_docid="adVideoId",V.yt_ad_an="adNetworks",V.ad_at="adType",V.aida="appInstallDataAgeMs",V.browse_id="browseId",V.p="httpProtocol",V.t="transportProtocol",V.cs="commandSource",V.cpn="clientPlaybackNonce",V.ccs="creatorInfo.creatorCanaryState",V.ctop="creatorInfo.topEntityType",
V.csn="clientScreenNonce",V.docid="videoId",V.GetHome_rid="requestIds",V.GetSearch_rid="requestIds",V.GetPlayer_rid="requestIds",V.GetWatchNext_rid="requestIds",V.GetBrowse_rid="requestIds",V.GetLibrary_rid="requestIds",V.is_continuation="isContinuation",V.is_nav="isNavigation",V.b_p="kabukiInfo.browseParams",V.is_prefetch="kabukiInfo.isPrefetch",V.is_secondary_nav="kabukiInfo.isSecondaryNav",V.nav_type="kabukiInfo.navigationType",V.prev_browse_id="kabukiInfo.prevBrowseId",V.query_source="kabukiInfo.querySource",
V.voz_type="kabukiInfo.vozType",V.yt_lt="loadType",V.mver="creatorInfo.measurementVersion",V.yt_ad="isMonetized",V.nr="webInfo.navigationReason",V.nrsu="navigationRequestedSameUrl",V.pnt="performanceNavigationTiming",V.prt="playbackRequiresTap",V.plt="playerInfo.playbackType",V.pis="playerInfo.playerInitializedState",V.paused="playerInfo.isPausedOnLoad",V.yt_pt="playerType",V.fmt="playerInfo.itag",V.yt_pl="watchInfo.isPlaylist",V.yt_pre="playerInfo.preloadType",V.yt_ad_pr="prerollAllowed",V.pa="previousAction",
V.yt_red="isRedSubscriber",V.rce="mwebInfo.responseContentEncoding",V.rc="resourceInfo.resourceCache",V.scrh="screenHeight",V.scrw="screenWidth",V.st="serverTimeMs",V.ssdm="shellStartupDurationMs",V.br_trs="tvInfo.bedrockTriggerState",V.kebqat="kabukiInfo.earlyBrowseRequestInfo.abandonmentType",V.kebqa="kabukiInfo.earlyBrowseRequestInfo.adopted",V.label="tvInfo.label",V.is_mdx="tvInfo.isMdx",V.preloaded="tvInfo.isPreloaded",V.aac_type="tvInfo.authAccessCredentialType",V.upg_player_vis="playerInfo.visibilityState",
V.query="unpluggedInfo.query",V.upg_chip_ids_string="unpluggedInfo.upgChipIdsString",V.yt_vst="videoStreamType",V.vph="viewportHeight",V.vpw="viewportWidth",V.yt_vis="isVisible",V.rcl="mwebInfo.responseContentLength",V.GetSettings_rid="requestIds",V.GetTrending_rid="requestIds",V.GetMusicSearchSuggestions_rid="requestIds",V.REQUEST_ID="requestIds",V),Tt="isContinuation isNavigation kabukiInfo.earlyBrowseRequestInfo.adopted kabukiInfo.isPrefetch kabukiInfo.isSecondaryNav isMonetized navigationRequestedSameUrl performanceNavigationTiming playerInfo.isPausedOnLoad prerollAllowed isRedSubscriber tvInfo.isMdx tvInfo.isPreloaded isVisible watchInfo.isPlaylist playbackRequiresTap".split(" "),
Ut={},Vt=(Ut.ccs="CANARY_STATE_",Ut.mver="MEASUREMENT_VERSION_",Ut.pis="PLAYER_INITIALIZED_STATE_",Ut.yt_pt="LATENCY_PLAYER_",Ut.pa="LATENCY_ACTION_",Ut.ctop="TOP_ENTITY_TYPE_",Ut.yt_vst="VIDEO_STREAM_TYPE_",Ut),Wt="all_vc ap aq c cbr cbrand cbrver cmodel cos cosver cplatform ctheme cver ei l_an l_mm plid srt yt_fss yt_li vpst vpni2 vpil2 icrc icrt pa GetAccountOverview_rid GetHistory_rid cmt d_vpct d_vpnfi d_vpni nsru pc pfa pfeh pftr pnc prerender psc rc start tcrt tcrc ssr vpr vps yt_abt yt_fn yt_fs yt_pft yt_pre yt_pt yt_pvis ytu_pvis yt_ref yt_sts tds".split(" ");
function Xt(a){return Rt[a]||"LATENCY_ACTION_UNKNOWN"}
function Yt(a,b,c){c=Jt(c);if(c.gelInfos)c.gelInfos[a]=!0;else{var d={};c.gelInfos=(d[a]=!0,d)}if(a.match("_rid")){var e=a.split("_rid")[0];a="REQUEST_ID"}if(a in St){c=St[a];0<=gb(Tt,c)&&(b=!!b);a in Vt&&"string"===typeof b&&(b=Vt[a]+b.toUpperCase());a=b;b=c.split(".");for(var f=d={},g=0;g<b.length-1;g++){var h=b[g];f[h]={};f=f[h]}f[b[b.length-1]]="requestIds"===c?[{id:a,endpoint:e}]:a;return qt({},d)}0<=gb(Wt,a)||Wr(new S("Unknown label logged with GEL CSI",a))}
;var W={LATENCY_ACTION_KIDS_PROFILE_SWITCHER:90,LATENCY_ACTION_OFFLINE_THUMBNAIL_TRANSFER:100,LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR_ASYNC:46,LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR:37,LATENCY_ACTION_SPINNER_DISPLAYED:14,LATENCY_ACTION_PLAYABILITY_CHECK:10,LATENCY_ACTION_PROCESS:9,LATENCY_ACTION_APP_STARTUP:5,LATENCY_ACTION_SHORTS_VIDEO_INGESTION_TRANSCODING:179,LATENCY_ACTION_LOG_PAYMENT_SERVER_ANALYTICS_RPC:173,LATENCY_ACTION_GET_PAYMENT_INSTRUMENTS_PARAMS_RPC:172,LATENCY_ACTION_GET_FIX_INSTRUMENT_PARAMS_RPC:171,
LATENCY_ACTION_RESUME_SUBSCRIPTION_RPC:170,LATENCY_ACTION_PAUSE_SUBSCRIPTION_RPC:169,LATENCY_ACTION_GET_OFFLINE_UPSELL_RPC:168,LATENCY_ACTION_GET_OFFERS_RPC:167,LATENCY_ACTION_GET_CANCELLATION_YT_FLOW_RPC:166,LATENCY_ACTION_GET_CANCELLATION_FLOW_RPC:165,LATENCY_ACTION_UPDATE_CROSS_DEVICE_OFFLINE_STATE_RPC:164,LATENCY_ACTION_GET_OFFER_DETAILS_RPC:163,LATENCY_ACTION_CANCEL_RECURRENCE_TRANSACTION_RPC:162,LATENCY_ACTION_GET_TIP_MODULE_RPC:161,LATENCY_ACTION_HANDLE_TRANSACTION_RPC:160,LATENCY_ACTION_COMPLETE_TRANSACTION_RPC:159,
LATENCY_ACTION_GET_CART_RPC:158,LATENCY_ACTION_THUMBNAIL_FETCH:156,LATENCY_ACTION_ABANDONED_DIRECT_PLAYBACK:154,LATENCY_ACTION_SHARE_VIDEO:153,LATENCY_ACTION_AD_TO_VIDEO_INT:152,LATENCY_ACTION_ABANDONED_BROWSE:151,LATENCY_ACTION_PLAYER_ROTATION:150,LATENCY_ACTION_SHOPPING_IN_APP:124,LATENCY_ACTION_PLAYER_ATTESTATION:121,LATENCY_ACTION_PLAYER_SEEK:119,LATENCY_ACTION_SUPER_STICKER_BUY_FLOW:114,LATENCY_ACTION_DOWNLOADS_DATA_ACCESS:180,LATENCY_ACTION_BLOCKS_PERFORMANCE:148,LATENCY_ACTION_ASSISTANT_QUERY:138,
LATENCY_ACTION_ASSISTANT_SETTINGS:137,LATENCY_ACTION_ENTITY_KEY_DESERIALIZATION_PERF:129,LATENCY_ACTION_ENTITY_KEY_SERIALIZATION_PERF:128,LATENCY_ACTION_PROOF_OF_ORIGIN_TOKEN_CREATE:127,LATENCY_ACTION_EMBEDS_SDK_INITIALIZATION:123,LATENCY_ACTION_NETWORKLESS_PERFORMANCE:122,LATENCY_ACTION_DOWNLOADS_EXPANSION:133,LATENCY_ACTION_ENTITY_TRANSFORM:131,LATENCY_ACTION_DOWNLOADS_COMPATIBILITY_LAYER:96,LATENCY_ACTION_EMBEDS_SET_VIDEO:95,LATENCY_ACTION_SETTINGS:93,LATENCY_ACTION_ABANDONED_STARTUP:81,LATENCY_ACTION_MEDIA_BROWSER_ALARM_PLAY:80,
LATENCY_ACTION_MEDIA_BROWSER_SEARCH:79,LATENCY_ACTION_MEDIA_BROWSER_LOAD_TREE:78,LATENCY_ACTION_WHO_IS_WATCHING:77,LATENCY_ACTION_CAST_LOAD_BY_ENTITY_TO_WATCH:76,LATENCY_ACTION_LITE_SWITCH_ACCOUNT:73,LATENCY_ACTION_ELEMENTS_PERFORMANCE:70,LATENCY_ACTION_LOCATION_SIGNAL_COLLECTION:69,LATENCY_ACTION_MODIFY_CHANNEL_NOTIFICATION:65,LATENCY_ACTION_OFFLINE_STORE_START:61,LATENCY_ACTION_REEL_EDITOR:58,LATENCY_ACTION_CHANNEL_SUBSCRIBE:56,LATENCY_ACTION_CHANNEL_PREVIEW:55,LATENCY_ACTION_PREFETCH:52,LATENCY_ACTION_ABANDONED_WATCH:45,
LATENCY_ACTION_LOAD_COMMENT_REPLIES:26,LATENCY_ACTION_LOAD_COMMENTS:25,LATENCY_ACTION_EDIT_COMMENT:24,LATENCY_ACTION_NEW_COMMENT:23,LATENCY_ACTION_OFFLINE_SHARING_RECEIVER_PAIRING:19,LATENCY_ACTION_EMBED:18,LATENCY_ACTION_MDX_LAUNCH:15,LATENCY_ACTION_RESOLVE_URL:13,LATENCY_ACTION_CAST_SPLASH:149,LATENCY_ACTION_MDX_STREAM_TRANSFER:178,LATENCY_ACTION_MDX_CAST:120,LATENCY_ACTION_MDX_COMMAND:12,LATENCY_ACTION_REEL_SELECT_SEGMENT:136,LATENCY_ACTION_ACCELERATED_EFFECTS:145,LATENCY_ACTION_EDIT_AUDIO_GEN:182,
LATENCY_ACTION_UPLOAD_AUDIO_MIXER:147,LATENCY_ACTION_SHORTS_CLIENT_SIDE_RENDERING:157,LATENCY_ACTION_SHORTS_SEG_IMP_TRANSCODING:146,LATENCY_ACTION_SHORTS_AUDIO_PICKER_PLAYBACK:130,LATENCY_ACTION_SHORTS_WAVEFORM_DOWNLOAD:125,LATENCY_ACTION_SHORTS_VIDEO_INGESTION:155,LATENCY_ACTION_SHORTS_GALLERY:107,LATENCY_ACTION_SHORTS_TRIM:105,LATENCY_ACTION_SHORTS_EDIT:104,LATENCY_ACTION_SHORTS_CAMERA:103,LATENCY_ACTION_PARENT_TOOLS_DASHBOARD:102,LATENCY_ACTION_PARENT_TOOLS_COLLECTION:101,LATENCY_ACTION_MUSIC_LOAD_RECOMMENDED_MEDIA_ITEMS:116,
LATENCY_ACTION_MUSIC_LOAD_MEDIA_ITEMS:115,LATENCY_ACTION_MUSIC_ALBUM_DETAIL:72,LATENCY_ACTION_MUSIC_PLAYLIST_DETAIL:71,LATENCY_ACTION_STORE:175,LATENCY_ACTION_CHIPS:68,LATENCY_ACTION_SEARCH_ZERO_STATE:67,LATENCY_ACTION_LIVE_PAGINATION:117,LATENCY_ACTION_LIVE:20,LATENCY_ACTION_PREBUFFER:40,LATENCY_ACTION_TENX:39,LATENCY_ACTION_KIDS_PROFILE_SETTINGS:94,LATENCY_ACTION_KIDS_WATCH_IT_AGAIN:92,LATENCY_ACTION_KIDS_SECRET_CODE:91,LATENCY_ACTION_KIDS_PARENT_PROFILE_SETTINGS:89,LATENCY_ACTION_KIDS_ONBOARDING:88,
LATENCY_ACTION_KIDS_VOICE_SEARCH:82,LATENCY_ACTION_KIDS_CURATED_COLLECTION:62,LATENCY_ACTION_KIDS_LIBRARY:53,LATENCY_ACTION_CREATOR_VIDEO_TRANSLATIONS:38,LATENCY_ACTION_CREATOR_VIDEO_MONETIZATION:74,LATENCY_ACTION_CREATOR_VIDEO_LIVE_STREAMING:141,LATENCY_ACTION_CREATOR_VIDEO_LIVE_SETTINGS:142,LATENCY_ACTION_CREATOR_VIDEO_EDITOR_ASYNC:51,LATENCY_ACTION_CREATOR_VIDEO_EDITOR:50,LATENCY_ACTION_CREATOR_VIDEO_EDIT:36,LATENCY_ACTION_CREATOR_VIDEO_COMMENTS:34,LATENCY_ACTION_CREATOR_VIDEO_ANALYTICS:33,LATENCY_ACTION_CREATOR_SONG_ANALYTICS:176,
LATENCY_ACTION_CREATOR_POST_LIST:112,LATENCY_ACTION_CREATOR_POST_EDIT:110,LATENCY_ACTION_CREATOR_POST_COMMENTS:111,LATENCY_ACTION_CREATOR_LIVE_STREAMING:108,LATENCY_ACTION_CREATOR_DIALOG_VIDEO_COPYRIGHT:174,LATENCY_ACTION_CREATOR_DIALOG_UPLOADS:86,LATENCY_ACTION_CREATOR_DIALOG_COPYRIGHT_STRIKES:87,LATENCY_ACTION_CREATOR_CHANNEL_VIDEOS:32,LATENCY_ACTION_CREATOR_CHANNEL_TRANSLATIONS:48,LATENCY_ACTION_CREATOR_CHANNEL_PLAYLISTS:139,LATENCY_ACTION_CREATOR_CHANNEL_MUSIC_STOREFRONT:177,LATENCY_ACTION_CREATOR_CHANNEL_MUSIC:99,
LATENCY_ACTION_CREATOR_CHANNEL_MONETIZATION:43,LATENCY_ACTION_CREATOR_CHANNEL_EDITING:113,LATENCY_ACTION_CREATOR_CHANNEL_DASHBOARD:49,LATENCY_ACTION_CREATOR_CHANNEL_COPYRIGHT:44,LATENCY_ACTION_CREATOR_CHANNEL_COMMENTS:66,LATENCY_ACTION_CREATOR_CHANNEL_ANALYTICS:31,LATENCY_ACTION_CREATOR_ARTIST_PROFILE:85,LATENCY_ACTION_CREATOR_ARTIST_CONCERTS:84,LATENCY_ACTION_CREATOR_ARTIST_ANALYTICS:83,LATENCY_ACTION_CREATOR_ANALYTICS_EXPLORE:140,LATENCY_ACTION_WATCH_UI:181,LATENCY_ACTION_STORYBOARD_THUMBNAILS:118,
LATENCY_ACTION_SEARCH_THUMBNAILS:59,LATENCY_ACTION_ON_DEVICE_MODEL_DOWNLOAD:54,LATENCY_ACTION_VOICE_ASSISTANT:47,LATENCY_ACTION_SEARCH_UI:35,LATENCY_ACTION_SUGGEST:30,LATENCY_ACTION_AUTO_SEARCH:126,LATENCY_ACTION_DOWNLOADS:98,LATENCY_ACTION_EXPLORE:75,LATENCY_ACTION_VIDEO_LIST:63,LATENCY_ACTION_HOME_RESUME:60,LATENCY_ACTION_SUBSCRIPTIONS_LIST:57,LATENCY_ACTION_THUMBNAIL_LOAD:42,LATENCY_ACTION_FIRST_THUMBNAIL_LOAD:29,LATENCY_ACTION_SUBSCRIPTIONS_FEED:109,LATENCY_ACTION_SUBSCRIPTIONS:28,LATENCY_ACTION_TRENDING:27,
LATENCY_ACTION_LIBRARY:21,LATENCY_ACTION_VIDEO_THUMBNAIL:8,LATENCY_ACTION_SHOW_MORE:7,LATENCY_ACTION_VIDEO_PREVIEW:6,LATENCY_ACTION_PREBUFFER_VIDEO:144,LATENCY_ACTION_PREFETCH_VIDEO:143,LATENCY_ACTION_DIRECT_PLAYBACK:132,LATENCY_ACTION_REEL_WATCH:41,LATENCY_ACTION_AD_TO_AD:22,LATENCY_ACTION_VIDEO_TO_AD:17,LATENCY_ACTION_AD_TO_VIDEO:16,LATENCY_ACTION_ONBOARDING:135,LATENCY_ACTION_LOGIN:97,LATENCY_ACTION_BROWSE:11,LATENCY_ACTION_CHANNELS:4,LATENCY_ACTION_WATCH:3,LATENCY_ACTION_RESULTS:2,LATENCY_ACTION_HOME:1,
LATENCY_ACTION_STARTUP:106,LATENCY_ACTION_UNKNOWN:0};W[W.LATENCY_ACTION_KIDS_PROFILE_SWITCHER]="LATENCY_ACTION_KIDS_PROFILE_SWITCHER";W[W.LATENCY_ACTION_OFFLINE_THUMBNAIL_TRANSFER]="LATENCY_ACTION_OFFLINE_THUMBNAIL_TRANSFER";W[W.LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR_ASYNC]="LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR_ASYNC";W[W.LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR]="LATENCY_ACTION_CREATOR_VIDEO_VIDEO_EDITOR";W[W.LATENCY_ACTION_SPINNER_DISPLAYED]="LATENCY_ACTION_SPINNER_DISPLAYED";
W[W.LATENCY_ACTION_PLAYABILITY_CHECK]="LATENCY_ACTION_PLAYABILITY_CHECK";W[W.LATENCY_ACTION_PROCESS]="LATENCY_ACTION_PROCESS";W[W.LATENCY_ACTION_APP_STARTUP]="LATENCY_ACTION_APP_STARTUP";W[W.LATENCY_ACTION_SHORTS_VIDEO_INGESTION_TRANSCODING]="LATENCY_ACTION_SHORTS_VIDEO_INGESTION_TRANSCODING";W[W.LATENCY_ACTION_LOG_PAYMENT_SERVER_ANALYTICS_RPC]="LATENCY_ACTION_LOG_PAYMENT_SERVER_ANALYTICS_RPC";W[W.LATENCY_ACTION_GET_PAYMENT_INSTRUMENTS_PARAMS_RPC]="LATENCY_ACTION_GET_PAYMENT_INSTRUMENTS_PARAMS_RPC";
W[W.LATENCY_ACTION_GET_FIX_INSTRUMENT_PARAMS_RPC]="LATENCY_ACTION_GET_FIX_INSTRUMENT_PARAMS_RPC";W[W.LATENCY_ACTION_RESUME_SUBSCRIPTION_RPC]="LATENCY_ACTION_RESUME_SUBSCRIPTION_RPC";W[W.LATENCY_ACTION_PAUSE_SUBSCRIPTION_RPC]="LATENCY_ACTION_PAUSE_SUBSCRIPTION_RPC";W[W.LATENCY_ACTION_GET_OFFLINE_UPSELL_RPC]="LATENCY_ACTION_GET_OFFLINE_UPSELL_RPC";W[W.LATENCY_ACTION_GET_OFFERS_RPC]="LATENCY_ACTION_GET_OFFERS_RPC";W[W.LATENCY_ACTION_GET_CANCELLATION_YT_FLOW_RPC]="LATENCY_ACTION_GET_CANCELLATION_YT_FLOW_RPC";
W[W.LATENCY_ACTION_GET_CANCELLATION_FLOW_RPC]="LATENCY_ACTION_GET_CANCELLATION_FLOW_RPC";W[W.LATENCY_ACTION_UPDATE_CROSS_DEVICE_OFFLINE_STATE_RPC]="LATENCY_ACTION_UPDATE_CROSS_DEVICE_OFFLINE_STATE_RPC";W[W.LATENCY_ACTION_GET_OFFER_DETAILS_RPC]="LATENCY_ACTION_GET_OFFER_DETAILS_RPC";W[W.LATENCY_ACTION_CANCEL_RECURRENCE_TRANSACTION_RPC]="LATENCY_ACTION_CANCEL_RECURRENCE_TRANSACTION_RPC";W[W.LATENCY_ACTION_GET_TIP_MODULE_RPC]="LATENCY_ACTION_GET_TIP_MODULE_RPC";
W[W.LATENCY_ACTION_HANDLE_TRANSACTION_RPC]="LATENCY_ACTION_HANDLE_TRANSACTION_RPC";W[W.LATENCY_ACTION_COMPLETE_TRANSACTION_RPC]="LATENCY_ACTION_COMPLETE_TRANSACTION_RPC";W[W.LATENCY_ACTION_GET_CART_RPC]="LATENCY_ACTION_GET_CART_RPC";W[W.LATENCY_ACTION_THUMBNAIL_FETCH]="LATENCY_ACTION_THUMBNAIL_FETCH";W[W.LATENCY_ACTION_ABANDONED_DIRECT_PLAYBACK]="LATENCY_ACTION_ABANDONED_DIRECT_PLAYBACK";W[W.LATENCY_ACTION_SHARE_VIDEO]="LATENCY_ACTION_SHARE_VIDEO";W[W.LATENCY_ACTION_AD_TO_VIDEO_INT]="LATENCY_ACTION_AD_TO_VIDEO_INT";
W[W.LATENCY_ACTION_ABANDONED_BROWSE]="LATENCY_ACTION_ABANDONED_BROWSE";W[W.LATENCY_ACTION_PLAYER_ROTATION]="LATENCY_ACTION_PLAYER_ROTATION";W[W.LATENCY_ACTION_SHOPPING_IN_APP]="LATENCY_ACTION_SHOPPING_IN_APP";W[W.LATENCY_ACTION_PLAYER_ATTESTATION]="LATENCY_ACTION_PLAYER_ATTESTATION";W[W.LATENCY_ACTION_PLAYER_SEEK]="LATENCY_ACTION_PLAYER_SEEK";W[W.LATENCY_ACTION_SUPER_STICKER_BUY_FLOW]="LATENCY_ACTION_SUPER_STICKER_BUY_FLOW";W[W.LATENCY_ACTION_DOWNLOADS_DATA_ACCESS]="LATENCY_ACTION_DOWNLOADS_DATA_ACCESS";
W[W.LATENCY_ACTION_BLOCKS_PERFORMANCE]="LATENCY_ACTION_BLOCKS_PERFORMANCE";W[W.LATENCY_ACTION_ASSISTANT_QUERY]="LATENCY_ACTION_ASSISTANT_QUERY";W[W.LATENCY_ACTION_ASSISTANT_SETTINGS]="LATENCY_ACTION_ASSISTANT_SETTINGS";W[W.LATENCY_ACTION_ENTITY_KEY_DESERIALIZATION_PERF]="LATENCY_ACTION_ENTITY_KEY_DESERIALIZATION_PERF";W[W.LATENCY_ACTION_ENTITY_KEY_SERIALIZATION_PERF]="LATENCY_ACTION_ENTITY_KEY_SERIALIZATION_PERF";W[W.LATENCY_ACTION_PROOF_OF_ORIGIN_TOKEN_CREATE]="LATENCY_ACTION_PROOF_OF_ORIGIN_TOKEN_CREATE";
W[W.LATENCY_ACTION_EMBEDS_SDK_INITIALIZATION]="LATENCY_ACTION_EMBEDS_SDK_INITIALIZATION";W[W.LATENCY_ACTION_NETWORKLESS_PERFORMANCE]="LATENCY_ACTION_NETWORKLESS_PERFORMANCE";W[W.LATENCY_ACTION_DOWNLOADS_EXPANSION]="LATENCY_ACTION_DOWNLOADS_EXPANSION";W[W.LATENCY_ACTION_ENTITY_TRANSFORM]="LATENCY_ACTION_ENTITY_TRANSFORM";W[W.LATENCY_ACTION_DOWNLOADS_COMPATIBILITY_LAYER]="LATENCY_ACTION_DOWNLOADS_COMPATIBILITY_LAYER";W[W.LATENCY_ACTION_EMBEDS_SET_VIDEO]="LATENCY_ACTION_EMBEDS_SET_VIDEO";
W[W.LATENCY_ACTION_SETTINGS]="LATENCY_ACTION_SETTINGS";W[W.LATENCY_ACTION_ABANDONED_STARTUP]="LATENCY_ACTION_ABANDONED_STARTUP";W[W.LATENCY_ACTION_MEDIA_BROWSER_ALARM_PLAY]="LATENCY_ACTION_MEDIA_BROWSER_ALARM_PLAY";W[W.LATENCY_ACTION_MEDIA_BROWSER_SEARCH]="LATENCY_ACTION_MEDIA_BROWSER_SEARCH";W[W.LATENCY_ACTION_MEDIA_BROWSER_LOAD_TREE]="LATENCY_ACTION_MEDIA_BROWSER_LOAD_TREE";W[W.LATENCY_ACTION_WHO_IS_WATCHING]="LATENCY_ACTION_WHO_IS_WATCHING";W[W.LATENCY_ACTION_CAST_LOAD_BY_ENTITY_TO_WATCH]="LATENCY_ACTION_CAST_LOAD_BY_ENTITY_TO_WATCH";
W[W.LATENCY_ACTION_LITE_SWITCH_ACCOUNT]="LATENCY_ACTION_LITE_SWITCH_ACCOUNT";W[W.LATENCY_ACTION_ELEMENTS_PERFORMANCE]="LATENCY_ACTION_ELEMENTS_PERFORMANCE";W[W.LATENCY_ACTION_LOCATION_SIGNAL_COLLECTION]="LATENCY_ACTION_LOCATION_SIGNAL_COLLECTION";W[W.LATENCY_ACTION_MODIFY_CHANNEL_NOTIFICATION]="LATENCY_ACTION_MODIFY_CHANNEL_NOTIFICATION";W[W.LATENCY_ACTION_OFFLINE_STORE_START]="LATENCY_ACTION_OFFLINE_STORE_START";W[W.LATENCY_ACTION_REEL_EDITOR]="LATENCY_ACTION_REEL_EDITOR";
W[W.LATENCY_ACTION_CHANNEL_SUBSCRIBE]="LATENCY_ACTION_CHANNEL_SUBSCRIBE";W[W.LATENCY_ACTION_CHANNEL_PREVIEW]="LATENCY_ACTION_CHANNEL_PREVIEW";W[W.LATENCY_ACTION_PREFETCH]="LATENCY_ACTION_PREFETCH";W[W.LATENCY_ACTION_ABANDONED_WATCH]="LATENCY_ACTION_ABANDONED_WATCH";W[W.LATENCY_ACTION_LOAD_COMMENT_REPLIES]="LATENCY_ACTION_LOAD_COMMENT_REPLIES";W[W.LATENCY_ACTION_LOAD_COMMENTS]="LATENCY_ACTION_LOAD_COMMENTS";W[W.LATENCY_ACTION_EDIT_COMMENT]="LATENCY_ACTION_EDIT_COMMENT";
W[W.LATENCY_ACTION_NEW_COMMENT]="LATENCY_ACTION_NEW_COMMENT";W[W.LATENCY_ACTION_OFFLINE_SHARING_RECEIVER_PAIRING]="LATENCY_ACTION_OFFLINE_SHARING_RECEIVER_PAIRING";W[W.LATENCY_ACTION_EMBED]="LATENCY_ACTION_EMBED";W[W.LATENCY_ACTION_MDX_LAUNCH]="LATENCY_ACTION_MDX_LAUNCH";W[W.LATENCY_ACTION_RESOLVE_URL]="LATENCY_ACTION_RESOLVE_URL";W[W.LATENCY_ACTION_CAST_SPLASH]="LATENCY_ACTION_CAST_SPLASH";W[W.LATENCY_ACTION_MDX_STREAM_TRANSFER]="LATENCY_ACTION_MDX_STREAM_TRANSFER";W[W.LATENCY_ACTION_MDX_CAST]="LATENCY_ACTION_MDX_CAST";
W[W.LATENCY_ACTION_MDX_COMMAND]="LATENCY_ACTION_MDX_COMMAND";W[W.LATENCY_ACTION_REEL_SELECT_SEGMENT]="LATENCY_ACTION_REEL_SELECT_SEGMENT";W[W.LATENCY_ACTION_ACCELERATED_EFFECTS]="LATENCY_ACTION_ACCELERATED_EFFECTS";W[W.LATENCY_ACTION_EDIT_AUDIO_GEN]="LATENCY_ACTION_EDIT_AUDIO_GEN";W[W.LATENCY_ACTION_UPLOAD_AUDIO_MIXER]="LATENCY_ACTION_UPLOAD_AUDIO_MIXER";W[W.LATENCY_ACTION_SHORTS_CLIENT_SIDE_RENDERING]="LATENCY_ACTION_SHORTS_CLIENT_SIDE_RENDERING";W[W.LATENCY_ACTION_SHORTS_SEG_IMP_TRANSCODING]="LATENCY_ACTION_SHORTS_SEG_IMP_TRANSCODING";
W[W.LATENCY_ACTION_SHORTS_AUDIO_PICKER_PLAYBACK]="LATENCY_ACTION_SHORTS_AUDIO_PICKER_PLAYBACK";W[W.LATENCY_ACTION_SHORTS_WAVEFORM_DOWNLOAD]="LATENCY_ACTION_SHORTS_WAVEFORM_DOWNLOAD";W[W.LATENCY_ACTION_SHORTS_VIDEO_INGESTION]="LATENCY_ACTION_SHORTS_VIDEO_INGESTION";W[W.LATENCY_ACTION_SHORTS_GALLERY]="LATENCY_ACTION_SHORTS_GALLERY";W[W.LATENCY_ACTION_SHORTS_TRIM]="LATENCY_ACTION_SHORTS_TRIM";W[W.LATENCY_ACTION_SHORTS_EDIT]="LATENCY_ACTION_SHORTS_EDIT";W[W.LATENCY_ACTION_SHORTS_CAMERA]="LATENCY_ACTION_SHORTS_CAMERA";
W[W.LATENCY_ACTION_PARENT_TOOLS_DASHBOARD]="LATENCY_ACTION_PARENT_TOOLS_DASHBOARD";W[W.LATENCY_ACTION_PARENT_TOOLS_COLLECTION]="LATENCY_ACTION_PARENT_TOOLS_COLLECTION";W[W.LATENCY_ACTION_MUSIC_LOAD_RECOMMENDED_MEDIA_ITEMS]="LATENCY_ACTION_MUSIC_LOAD_RECOMMENDED_MEDIA_ITEMS";W[W.LATENCY_ACTION_MUSIC_LOAD_MEDIA_ITEMS]="LATENCY_ACTION_MUSIC_LOAD_MEDIA_ITEMS";W[W.LATENCY_ACTION_MUSIC_ALBUM_DETAIL]="LATENCY_ACTION_MUSIC_ALBUM_DETAIL";W[W.LATENCY_ACTION_MUSIC_PLAYLIST_DETAIL]="LATENCY_ACTION_MUSIC_PLAYLIST_DETAIL";
W[W.LATENCY_ACTION_STORE]="LATENCY_ACTION_STORE";W[W.LATENCY_ACTION_CHIPS]="LATENCY_ACTION_CHIPS";W[W.LATENCY_ACTION_SEARCH_ZERO_STATE]="LATENCY_ACTION_SEARCH_ZERO_STATE";W[W.LATENCY_ACTION_LIVE_PAGINATION]="LATENCY_ACTION_LIVE_PAGINATION";W[W.LATENCY_ACTION_LIVE]="LATENCY_ACTION_LIVE";W[W.LATENCY_ACTION_PREBUFFER]="LATENCY_ACTION_PREBUFFER";W[W.LATENCY_ACTION_TENX]="LATENCY_ACTION_TENX";W[W.LATENCY_ACTION_KIDS_PROFILE_SETTINGS]="LATENCY_ACTION_KIDS_PROFILE_SETTINGS";
W[W.LATENCY_ACTION_KIDS_WATCH_IT_AGAIN]="LATENCY_ACTION_KIDS_WATCH_IT_AGAIN";W[W.LATENCY_ACTION_KIDS_SECRET_CODE]="LATENCY_ACTION_KIDS_SECRET_CODE";W[W.LATENCY_ACTION_KIDS_PARENT_PROFILE_SETTINGS]="LATENCY_ACTION_KIDS_PARENT_PROFILE_SETTINGS";W[W.LATENCY_ACTION_KIDS_ONBOARDING]="LATENCY_ACTION_KIDS_ONBOARDING";W[W.LATENCY_ACTION_KIDS_VOICE_SEARCH]="LATENCY_ACTION_KIDS_VOICE_SEARCH";W[W.LATENCY_ACTION_KIDS_CURATED_COLLECTION]="LATENCY_ACTION_KIDS_CURATED_COLLECTION";
W[W.LATENCY_ACTION_KIDS_LIBRARY]="LATENCY_ACTION_KIDS_LIBRARY";W[W.LATENCY_ACTION_CREATOR_VIDEO_TRANSLATIONS]="LATENCY_ACTION_CREATOR_VIDEO_TRANSLATIONS";W[W.LATENCY_ACTION_CREATOR_VIDEO_MONETIZATION]="LATENCY_ACTION_CREATOR_VIDEO_MONETIZATION";W[W.LATENCY_ACTION_CREATOR_VIDEO_LIVE_STREAMING]="LATENCY_ACTION_CREATOR_VIDEO_LIVE_STREAMING";W[W.LATENCY_ACTION_CREATOR_VIDEO_LIVE_SETTINGS]="LATENCY_ACTION_CREATOR_VIDEO_LIVE_SETTINGS";W[W.LATENCY_ACTION_CREATOR_VIDEO_EDITOR_ASYNC]="LATENCY_ACTION_CREATOR_VIDEO_EDITOR_ASYNC";
W[W.LATENCY_ACTION_CREATOR_VIDEO_EDITOR]="LATENCY_ACTION_CREATOR_VIDEO_EDITOR";W[W.LATENCY_ACTION_CREATOR_VIDEO_EDIT]="LATENCY_ACTION_CREATOR_VIDEO_EDIT";W[W.LATENCY_ACTION_CREATOR_VIDEO_COMMENTS]="LATENCY_ACTION_CREATOR_VIDEO_COMMENTS";W[W.LATENCY_ACTION_CREATOR_VIDEO_ANALYTICS]="LATENCY_ACTION_CREATOR_VIDEO_ANALYTICS";W[W.LATENCY_ACTION_CREATOR_SONG_ANALYTICS]="LATENCY_ACTION_CREATOR_SONG_ANALYTICS";W[W.LATENCY_ACTION_CREATOR_POST_LIST]="LATENCY_ACTION_CREATOR_POST_LIST";
W[W.LATENCY_ACTION_CREATOR_POST_EDIT]="LATENCY_ACTION_CREATOR_POST_EDIT";W[W.LATENCY_ACTION_CREATOR_POST_COMMENTS]="LATENCY_ACTION_CREATOR_POST_COMMENTS";W[W.LATENCY_ACTION_CREATOR_LIVE_STREAMING]="LATENCY_ACTION_CREATOR_LIVE_STREAMING";W[W.LATENCY_ACTION_CREATOR_DIALOG_VIDEO_COPYRIGHT]="LATENCY_ACTION_CREATOR_DIALOG_VIDEO_COPYRIGHT";W[W.LATENCY_ACTION_CREATOR_DIALOG_UPLOADS]="LATENCY_ACTION_CREATOR_DIALOG_UPLOADS";W[W.LATENCY_ACTION_CREATOR_DIALOG_COPYRIGHT_STRIKES]="LATENCY_ACTION_CREATOR_DIALOG_COPYRIGHT_STRIKES";
W[W.LATENCY_ACTION_CREATOR_CHANNEL_VIDEOS]="LATENCY_ACTION_CREATOR_CHANNEL_VIDEOS";W[W.LATENCY_ACTION_CREATOR_CHANNEL_TRANSLATIONS]="LATENCY_ACTION_CREATOR_CHANNEL_TRANSLATIONS";W[W.LATENCY_ACTION_CREATOR_CHANNEL_PLAYLISTS]="LATENCY_ACTION_CREATOR_CHANNEL_PLAYLISTS";W[W.LATENCY_ACTION_CREATOR_CHANNEL_MUSIC_STOREFRONT]="LATENCY_ACTION_CREATOR_CHANNEL_MUSIC_STOREFRONT";W[W.LATENCY_ACTION_CREATOR_CHANNEL_MUSIC]="LATENCY_ACTION_CREATOR_CHANNEL_MUSIC";W[W.LATENCY_ACTION_CREATOR_CHANNEL_MONETIZATION]="LATENCY_ACTION_CREATOR_CHANNEL_MONETIZATION";
W[W.LATENCY_ACTION_CREATOR_CHANNEL_EDITING]="LATENCY_ACTION_CREATOR_CHANNEL_EDITING";W[W.LATENCY_ACTION_CREATOR_CHANNEL_DASHBOARD]="LATENCY_ACTION_CREATOR_CHANNEL_DASHBOARD";W[W.LATENCY_ACTION_CREATOR_CHANNEL_COPYRIGHT]="LATENCY_ACTION_CREATOR_CHANNEL_COPYRIGHT";W[W.LATENCY_ACTION_CREATOR_CHANNEL_COMMENTS]="LATENCY_ACTION_CREATOR_CHANNEL_COMMENTS";W[W.LATENCY_ACTION_CREATOR_CHANNEL_ANALYTICS]="LATENCY_ACTION_CREATOR_CHANNEL_ANALYTICS";W[W.LATENCY_ACTION_CREATOR_ARTIST_PROFILE]="LATENCY_ACTION_CREATOR_ARTIST_PROFILE";
W[W.LATENCY_ACTION_CREATOR_ARTIST_CONCERTS]="LATENCY_ACTION_CREATOR_ARTIST_CONCERTS";W[W.LATENCY_ACTION_CREATOR_ARTIST_ANALYTICS]="LATENCY_ACTION_CREATOR_ARTIST_ANALYTICS";W[W.LATENCY_ACTION_CREATOR_ANALYTICS_EXPLORE]="LATENCY_ACTION_CREATOR_ANALYTICS_EXPLORE";W[W.LATENCY_ACTION_WATCH_UI]="LATENCY_ACTION_WATCH_UI";W[W.LATENCY_ACTION_STORYBOARD_THUMBNAILS]="LATENCY_ACTION_STORYBOARD_THUMBNAILS";W[W.LATENCY_ACTION_SEARCH_THUMBNAILS]="LATENCY_ACTION_SEARCH_THUMBNAILS";
W[W.LATENCY_ACTION_ON_DEVICE_MODEL_DOWNLOAD]="LATENCY_ACTION_ON_DEVICE_MODEL_DOWNLOAD";W[W.LATENCY_ACTION_VOICE_ASSISTANT]="LATENCY_ACTION_VOICE_ASSISTANT";W[W.LATENCY_ACTION_SEARCH_UI]="LATENCY_ACTION_SEARCH_UI";W[W.LATENCY_ACTION_SUGGEST]="LATENCY_ACTION_SUGGEST";W[W.LATENCY_ACTION_AUTO_SEARCH]="LATENCY_ACTION_AUTO_SEARCH";W[W.LATENCY_ACTION_DOWNLOADS]="LATENCY_ACTION_DOWNLOADS";W[W.LATENCY_ACTION_EXPLORE]="LATENCY_ACTION_EXPLORE";W[W.LATENCY_ACTION_VIDEO_LIST]="LATENCY_ACTION_VIDEO_LIST";
W[W.LATENCY_ACTION_HOME_RESUME]="LATENCY_ACTION_HOME_RESUME";W[W.LATENCY_ACTION_SUBSCRIPTIONS_LIST]="LATENCY_ACTION_SUBSCRIPTIONS_LIST";W[W.LATENCY_ACTION_THUMBNAIL_LOAD]="LATENCY_ACTION_THUMBNAIL_LOAD";W[W.LATENCY_ACTION_FIRST_THUMBNAIL_LOAD]="LATENCY_ACTION_FIRST_THUMBNAIL_LOAD";W[W.LATENCY_ACTION_SUBSCRIPTIONS_FEED]="LATENCY_ACTION_SUBSCRIPTIONS_FEED";W[W.LATENCY_ACTION_SUBSCRIPTIONS]="LATENCY_ACTION_SUBSCRIPTIONS";W[W.LATENCY_ACTION_TRENDING]="LATENCY_ACTION_TRENDING";
W[W.LATENCY_ACTION_LIBRARY]="LATENCY_ACTION_LIBRARY";W[W.LATENCY_ACTION_VIDEO_THUMBNAIL]="LATENCY_ACTION_VIDEO_THUMBNAIL";W[W.LATENCY_ACTION_SHOW_MORE]="LATENCY_ACTION_SHOW_MORE";W[W.LATENCY_ACTION_VIDEO_PREVIEW]="LATENCY_ACTION_VIDEO_PREVIEW";W[W.LATENCY_ACTION_PREBUFFER_VIDEO]="LATENCY_ACTION_PREBUFFER_VIDEO";W[W.LATENCY_ACTION_PREFETCH_VIDEO]="LATENCY_ACTION_PREFETCH_VIDEO";W[W.LATENCY_ACTION_DIRECT_PLAYBACK]="LATENCY_ACTION_DIRECT_PLAYBACK";W[W.LATENCY_ACTION_REEL_WATCH]="LATENCY_ACTION_REEL_WATCH";
W[W.LATENCY_ACTION_AD_TO_AD]="LATENCY_ACTION_AD_TO_AD";W[W.LATENCY_ACTION_VIDEO_TO_AD]="LATENCY_ACTION_VIDEO_TO_AD";W[W.LATENCY_ACTION_AD_TO_VIDEO]="LATENCY_ACTION_AD_TO_VIDEO";W[W.LATENCY_ACTION_ONBOARDING]="LATENCY_ACTION_ONBOARDING";W[W.LATENCY_ACTION_LOGIN]="LATENCY_ACTION_LOGIN";W[W.LATENCY_ACTION_BROWSE]="LATENCY_ACTION_BROWSE";W[W.LATENCY_ACTION_CHANNELS]="LATENCY_ACTION_CHANNELS";W[W.LATENCY_ACTION_WATCH]="LATENCY_ACTION_WATCH";W[W.LATENCY_ACTION_RESULTS]="LATENCY_ACTION_RESULTS";
W[W.LATENCY_ACTION_HOME]="LATENCY_ACTION_HOME";W[W.LATENCY_ACTION_STARTUP]="LATENCY_ACTION_STARTUP";W[W.LATENCY_ACTION_UNKNOWN]="LATENCY_ACTION_UNKNOWN";var Zt={LATENCY_NETWORK_MOBILE:2,LATENCY_NETWORK_WIFI:1,LATENCY_NETWORK_UNKNOWN:0};Zt[Zt.LATENCY_NETWORK_MOBILE]="LATENCY_NETWORK_MOBILE";Zt[Zt.LATENCY_NETWORK_WIFI]="LATENCY_NETWORK_WIFI";Zt[Zt.LATENCY_NETWORK_UNKNOWN]="LATENCY_NETWORK_UNKNOWN";
var X={CONN_INVALID:31,CONN_CELLULAR_5G_NSA:12,CONN_CELLULAR_5G_SA:11,CONN_WIFI_METERED:10,CONN_CELLULAR_5G:9,CONN_DISCO:8,CONN_CELLULAR_UNKNOWN:7,CONN_CELLULAR_4G:6,CONN_CELLULAR_3G:5,CONN_CELLULAR_2G:4,CONN_WIFI:3,CONN_NONE:2,CONN_UNKNOWN:1,CONN_DEFAULT:0};X[X.CONN_INVALID]="CONN_INVALID";X[X.CONN_CELLULAR_5G_NSA]="CONN_CELLULAR_5G_NSA";X[X.CONN_CELLULAR_5G_SA]="CONN_CELLULAR_5G_SA";X[X.CONN_WIFI_METERED]="CONN_WIFI_METERED";X[X.CONN_CELLULAR_5G]="CONN_CELLULAR_5G";X[X.CONN_DISCO]="CONN_DISCO";
X[X.CONN_CELLULAR_UNKNOWN]="CONN_CELLULAR_UNKNOWN";X[X.CONN_CELLULAR_4G]="CONN_CELLULAR_4G";X[X.CONN_CELLULAR_3G]="CONN_CELLULAR_3G";X[X.CONN_CELLULAR_2G]="CONN_CELLULAR_2G";X[X.CONN_WIFI]="CONN_WIFI";X[X.CONN_NONE]="CONN_NONE";X[X.CONN_UNKNOWN]="CONN_UNKNOWN";X[X.CONN_DEFAULT]="CONN_DEFAULT";
var Y={DETAILED_NETWORK_TYPE_NR_NSA:126,DETAILED_NETWORK_TYPE_NR_SA:125,DETAILED_NETWORK_TYPE_INTERNAL_WIFI_IMPAIRED:124,DETAILED_NETWORK_TYPE_APP_WIFI_HOTSPOT:123,DETAILED_NETWORK_TYPE_DISCONNECTED:122,DETAILED_NETWORK_TYPE_NON_MOBILE_UNKNOWN:121,DETAILED_NETWORK_TYPE_MOBILE_UNKNOWN:120,DETAILED_NETWORK_TYPE_WIMAX:119,DETAILED_NETWORK_TYPE_ETHERNET:118,DETAILED_NETWORK_TYPE_BLUETOOTH:117,DETAILED_NETWORK_TYPE_WIFI:116,DETAILED_NETWORK_TYPE_LTE:115,DETAILED_NETWORK_TYPE_HSPAP:114,DETAILED_NETWORK_TYPE_EHRPD:113,
DETAILED_NETWORK_TYPE_EVDO_B:112,DETAILED_NETWORK_TYPE_UMTS:111,DETAILED_NETWORK_TYPE_IDEN:110,DETAILED_NETWORK_TYPE_HSUPA:109,DETAILED_NETWORK_TYPE_HSPA:108,DETAILED_NETWORK_TYPE_HSDPA:107,DETAILED_NETWORK_TYPE_EVDO_A:106,DETAILED_NETWORK_TYPE_EVDO_0:105,DETAILED_NETWORK_TYPE_CDMA:104,DETAILED_NETWORK_TYPE_1_X_RTT:103,DETAILED_NETWORK_TYPE_GPRS:102,DETAILED_NETWORK_TYPE_EDGE:101,DETAILED_NETWORK_TYPE_UNKNOWN:0};Y[Y.DETAILED_NETWORK_TYPE_NR_NSA]="DETAILED_NETWORK_TYPE_NR_NSA";
Y[Y.DETAILED_NETWORK_TYPE_NR_SA]="DETAILED_NETWORK_TYPE_NR_SA";Y[Y.DETAILED_NETWORK_TYPE_INTERNAL_WIFI_IMPAIRED]="DETAILED_NETWORK_TYPE_INTERNAL_WIFI_IMPAIRED";Y[Y.DETAILED_NETWORK_TYPE_APP_WIFI_HOTSPOT]="DETAILED_NETWORK_TYPE_APP_WIFI_HOTSPOT";Y[Y.DETAILED_NETWORK_TYPE_DISCONNECTED]="DETAILED_NETWORK_TYPE_DISCONNECTED";Y[Y.DETAILED_NETWORK_TYPE_NON_MOBILE_UNKNOWN]="DETAILED_NETWORK_TYPE_NON_MOBILE_UNKNOWN";Y[Y.DETAILED_NETWORK_TYPE_MOBILE_UNKNOWN]="DETAILED_NETWORK_TYPE_MOBILE_UNKNOWN";
Y[Y.DETAILED_NETWORK_TYPE_WIMAX]="DETAILED_NETWORK_TYPE_WIMAX";Y[Y.DETAILED_NETWORK_TYPE_ETHERNET]="DETAILED_NETWORK_TYPE_ETHERNET";Y[Y.DETAILED_NETWORK_TYPE_BLUETOOTH]="DETAILED_NETWORK_TYPE_BLUETOOTH";Y[Y.DETAILED_NETWORK_TYPE_WIFI]="DETAILED_NETWORK_TYPE_WIFI";Y[Y.DETAILED_NETWORK_TYPE_LTE]="DETAILED_NETWORK_TYPE_LTE";Y[Y.DETAILED_NETWORK_TYPE_HSPAP]="DETAILED_NETWORK_TYPE_HSPAP";Y[Y.DETAILED_NETWORK_TYPE_EHRPD]="DETAILED_NETWORK_TYPE_EHRPD";Y[Y.DETAILED_NETWORK_TYPE_EVDO_B]="DETAILED_NETWORK_TYPE_EVDO_B";
Y[Y.DETAILED_NETWORK_TYPE_UMTS]="DETAILED_NETWORK_TYPE_UMTS";Y[Y.DETAILED_NETWORK_TYPE_IDEN]="DETAILED_NETWORK_TYPE_IDEN";Y[Y.DETAILED_NETWORK_TYPE_HSUPA]="DETAILED_NETWORK_TYPE_HSUPA";Y[Y.DETAILED_NETWORK_TYPE_HSPA]="DETAILED_NETWORK_TYPE_HSPA";Y[Y.DETAILED_NETWORK_TYPE_HSDPA]="DETAILED_NETWORK_TYPE_HSDPA";Y[Y.DETAILED_NETWORK_TYPE_EVDO_A]="DETAILED_NETWORK_TYPE_EVDO_A";Y[Y.DETAILED_NETWORK_TYPE_EVDO_0]="DETAILED_NETWORK_TYPE_EVDO_0";Y[Y.DETAILED_NETWORK_TYPE_CDMA]="DETAILED_NETWORK_TYPE_CDMA";
Y[Y.DETAILED_NETWORK_TYPE_1_X_RTT]="DETAILED_NETWORK_TYPE_1_X_RTT";Y[Y.DETAILED_NETWORK_TYPE_GPRS]="DETAILED_NETWORK_TYPE_GPRS";Y[Y.DETAILED_NETWORK_TYPE_EDGE]="DETAILED_NETWORK_TYPE_EDGE";Y[Y.DETAILED_NETWORK_TYPE_UNKNOWN]="DETAILED_NETWORK_TYPE_UNKNOWN";var $t={LATENCY_PLAYER_RTSP:7,LATENCY_PLAYER_HTML5_INLINE:6,LATENCY_PLAYER_HTML5_FULLSCREEN:5,LATENCY_PLAYER_HTML5:4,LATENCY_PLAYER_FRAMEWORK:3,LATENCY_PLAYER_FLASH:2,LATENCY_PLAYER_EXO:1,LATENCY_PLAYER_UNKNOWN:0};$t[$t.LATENCY_PLAYER_RTSP]="LATENCY_PLAYER_RTSP";
$t[$t.LATENCY_PLAYER_HTML5_INLINE]="LATENCY_PLAYER_HTML5_INLINE";$t[$t.LATENCY_PLAYER_HTML5_FULLSCREEN]="LATENCY_PLAYER_HTML5_FULLSCREEN";$t[$t.LATENCY_PLAYER_HTML5]="LATENCY_PLAYER_HTML5";$t[$t.LATENCY_PLAYER_FRAMEWORK]="LATENCY_PLAYER_FRAMEWORK";$t[$t.LATENCY_PLAYER_FLASH]="LATENCY_PLAYER_FLASH";$t[$t.LATENCY_PLAYER_EXO]="LATENCY_PLAYER_EXO";$t[$t.LATENCY_PLAYER_UNKNOWN]="LATENCY_PLAYER_UNKNOWN";
var au={LATENCY_AD_BREAK_TYPE_POSTROLL:3,LATENCY_AD_BREAK_TYPE_MIDROLL:2,LATENCY_AD_BREAK_TYPE_PREROLL:1,LATENCY_AD_BREAK_TYPE_UNKNOWN:0};au[au.LATENCY_AD_BREAK_TYPE_POSTROLL]="LATENCY_AD_BREAK_TYPE_POSTROLL";au[au.LATENCY_AD_BREAK_TYPE_MIDROLL]="LATENCY_AD_BREAK_TYPE_MIDROLL";au[au.LATENCY_AD_BREAK_TYPE_PREROLL]="LATENCY_AD_BREAK_TYPE_PREROLL";au[au.LATENCY_AD_BREAK_TYPE_UNKNOWN]="LATENCY_AD_BREAK_TYPE_UNKNOWN";var bu={LATENCY_ACTION_ERROR_STARTUP_TIMEOUT:1,LATENCY_ACTION_ERROR_UNSPECIFIED:0};
bu[bu.LATENCY_ACTION_ERROR_STARTUP_TIMEOUT]="LATENCY_ACTION_ERROR_STARTUP_TIMEOUT";bu[bu.LATENCY_ACTION_ERROR_UNSPECIFIED]="LATENCY_ACTION_ERROR_UNSPECIFIED";var cu={LIVE_STREAM_MODE_WINDOW:5,LIVE_STREAM_MODE_POST:4,LIVE_STREAM_MODE_LP:3,LIVE_STREAM_MODE_LIVE:2,LIVE_STREAM_MODE_DVR:1,LIVE_STREAM_MODE_UNKNOWN:0};cu[cu.LIVE_STREAM_MODE_WINDOW]="LIVE_STREAM_MODE_WINDOW";cu[cu.LIVE_STREAM_MODE_POST]="LIVE_STREAM_MODE_POST";cu[cu.LIVE_STREAM_MODE_LP]="LIVE_STREAM_MODE_LP";
cu[cu.LIVE_STREAM_MODE_LIVE]="LIVE_STREAM_MODE_LIVE";cu[cu.LIVE_STREAM_MODE_DVR]="LIVE_STREAM_MODE_DVR";cu[cu.LIVE_STREAM_MODE_UNKNOWN]="LIVE_STREAM_MODE_UNKNOWN";var du={VIDEO_STREAM_TYPE_VOD:3,VIDEO_STREAM_TYPE_DVR:2,VIDEO_STREAM_TYPE_LIVE:1,VIDEO_STREAM_TYPE_UNSPECIFIED:0};du[du.VIDEO_STREAM_TYPE_VOD]="VIDEO_STREAM_TYPE_VOD";du[du.VIDEO_STREAM_TYPE_DVR]="VIDEO_STREAM_TYPE_DVR";du[du.VIDEO_STREAM_TYPE_LIVE]="VIDEO_STREAM_TYPE_LIVE";du[du.VIDEO_STREAM_TYPE_UNSPECIFIED]="VIDEO_STREAM_TYPE_UNSPECIFIED";
var eu={YT_IDB_TRANSACTION_TYPE_READ:2,YT_IDB_TRANSACTION_TYPE_WRITE:1,YT_IDB_TRANSACTION_TYPE_UNKNOWN:0};eu[eu.YT_IDB_TRANSACTION_TYPE_READ]="YT_IDB_TRANSACTION_TYPE_READ";eu[eu.YT_IDB_TRANSACTION_TYPE_WRITE]="YT_IDB_TRANSACTION_TYPE_WRITE";eu[eu.YT_IDB_TRANSACTION_TYPE_UNKNOWN]="YT_IDB_TRANSACTION_TYPE_UNKNOWN";var fu={PLAYER_ROTATION_TYPE_PORTRAIT_TO_FULLSCREEN:2,PLAYER_ROTATION_TYPE_FULLSCREEN_TO_PORTRAIT:1,PLAYER_ROTATION_TYPE_UNKNOWN:0};fu[fu.PLAYER_ROTATION_TYPE_PORTRAIT_TO_FULLSCREEN]="PLAYER_ROTATION_TYPE_PORTRAIT_TO_FULLSCREEN";
fu[fu.PLAYER_ROTATION_TYPE_FULLSCREEN_TO_PORTRAIT]="PLAYER_ROTATION_TYPE_FULLSCREEN_TO_PORTRAIT";fu[fu.PLAYER_ROTATION_TYPE_UNKNOWN]="PLAYER_ROTATION_TYPE_UNKNOWN";var gu="actionVisualElement spinnerInfo resourceInfo playerInfo commentInfo mdxInfo watchInfo thumbnailLoadInfo creatorInfo unpluggedInfo reelInfo subscriptionsFeedInfo requestIds mediaBrowserActionInfo musicLoadActionInfo shoppingInfo prefetchInfo accelerationSession webInfo tvInfo kabukiInfo mwebInfo musicInfo".split(" ");var hu=y.ytLoggingLatencyUsageStats_||{};z("ytLoggingLatencyUsageStats_",hu);function iu(){this.i=0}
function ju(){iu.i||(iu.i=new iu);return iu.i}
iu.prototype.tick=function(a,b,c,d){ku(this,"tick_"+a+"_"+b)||(c={timestamp:c,cttAuthInfo:d},P("web_csi_via_jspb")?(d=new Kj,D(d,1,a),D(d,2,b),a=new Nj,Yd(a,Kj,5,Oj,d),vr(a,c)):nm("latencyActionTicked",{tickName:a,clientActionNonce:b},c))};
iu.prototype.info=function(a,b,c){var d=Object.keys(a).join("");ku(this,"info_"+d+"_"+b)||(a=Object.assign({},a),a.clientActionNonce=b,nm("latencyActionInfo",a,{cttAuthInfo:c}))};
iu.prototype.jspbInfo=function(a,b,c){for(var d="",e=0;e<a.toJSON().length;e++)void 0!==a.toJSON()[e]&&(d=0===e?d.concat(""+e):d.concat("_"+e));ku(this,"info_"+d+"_"+b)||(D(a,2,b),b={cttAuthInfo:c},c=new Nj,Yd(c,Ej,7,Oj,a),vr(c,b))};
iu.prototype.span=function(a,b,c){var d=Object.keys(a).join("");ku(this,"span_"+d+"_"+b)||(a.clientActionNonce=b,nm("latencyActionSpan",a,{cttAuthInfo:c}))};
function ku(a,b){hu[b]=hu[b]||{count:0};var c=hu[b];c.count++;c.time=R();a.i||(a.i=Zl(function(){var d=R(),e;for(e in hu)hu[e]&&6E4<d-hu[e].time&&delete hu[e];a&&(a.i=0)},0,5E3));
return 5<c.count?(6===c.count&&1>1E5*Math.random()&&(c=new S("CSI data exceeded logging limit with key",b.split("_")),0<=b.indexOf("plev")||Wr(c)),!0):!1}
;function lu(){var a=["ol"];Qt("").info.actionType="embed";a&&yk("TIMING_AFT_KEYS",a);yk("TIMING_ACTION","embed");mu();a=It();var b=Kt();if("cold"===a.yt_lt||"cold"===b.loadType){var c=Dt(),d=Jt();d=d.gelTicks?d.gelTicks:d.gelTicks={};for(var e in c)e in d||Z(e,c[e]);e={};c=!1;d=p(Object.keys(a));for(var f=d.next();!f.done;f=d.next())f=f.value,(f=Yt(f,a[f]))&&!Nt(Kt(),f)&&(qt(b,f),qt(e,f),c=!0);c&&nu(e)}z("ytglobal.timingready_",!0);a=M("TIMING_ACTION");B("ytglobal.timingready_")&&a&&"_start"in Dt()&&
Ct()&&Mt()}
function ou(a,b,c,d){null!==b&&(It(c)[a]=b,(a=Yt(a,b,c))&&nu(a,c,d))}
function nu(a,b,c){if(!P("web_csi_via_jspb")||(void 0===c?0:c))c=Qt(b||""),qt(c.info,a),qt(Kt(b),a),c=Lt(b),b=Ht(b).cttAuthInfo,ju().info(a,c,b);else{c=new Ej;var d=Object.keys(a);a=Object.values(a);for(var e=0;e<d.length;e++){var f=d[e];try{switch(f){case "actionType":Gj(c,W[a[e]]);break;case "clientActionNonce":D(c,2,a[e]);break;case "clientScreenNonce":D(c,4,a[e]);break;case "loadType":D(c,3,a[e]);break;case "isPrewarmedLaunch":D(c,92,a[e]);break;case "isFirstInstall":D(c,55,a[e]);break;case "networkType":D(c,
5,Zt[a[e]]);break;case "connectionType":D(c,26,X[a[e]]);break;case "detailedConnectionType":D(c,27,Y[a[e]]);break;case "isVisible":D(c,6,a[e]);break;case "playerType":D(c,7,$t[a[e]]);break;case "clientPlaybackNonce":D(c,8,a[e]);break;case "adClientPlaybackNonce":D(c,28,a[e]);break;case "previousCpn":D(c,77,a[e]);break;case "targetCpn":D(c,76,a[e]);break;case "isMonetized":D(c,9,a[e]);break;case "isPrerollAllowed":D(c,16,a[e]);break;case "isPrerollShown":D(c,17,a[e]);break;case "adType":D(c,12,a[e]);
break;case "adTypesAllowed":D(c,36,a[e]);break;case "adNetworks":D(c,37,a[e]);break;case "previousAction":D(c,13,W[a[e]]);break;case "isRedSubscriber":D(c,14,a[e]);break;case "serverTimeMs":D(c,15,a[e]);break;case "videoId":c.setVideoId(a[e]);break;case "adVideoId":D(c,20,a[e]);break;case "targetVideoId":D(c,78,a[e]);break;case "adBreakType":D(c,21,au[a[e]]);break;case "isNavigation":Hj(c,a[e]);break;case "viewportHeight":D(c,29,a[e]);break;case "viewportWidth":D(c,30,a[e]);break;case "screenHeight":D(c,
84,a[e]);break;case "screenWidth":D(c,85,a[e]);break;case "browseId":D(c,31,a[e]);break;case "isCacheHit":D(c,32,a[e]);break;case "httpProtocol":D(c,33,a[e]);break;case "transportProtocol":D(c,34,a[e]);break;case "searchQuery":D(c,41,a[e]);break;case "isContinuation":D(c,42,a[e]);break;case "availableProcessors":D(c,43,a[e]);break;case "sdk":D(c,44,a[e]);break;case "isLocalStream":D(c,45,a[e]);break;case "navigationRequestedSameUrl":D(c,64,a[e]);break;case "shellStartupDurationMs":D(c,70,a[e]);break;
case "appInstallDataAgeMs":D(c,73,a[e]);break;case "latencyActionError":D(c,71,bu[a[e]]);break;case "actionStep":D(c,79,a[e]);break;case "jsHeapSizeLimit":D(c,80,a[e]);break;case "totalJsHeapSize":D(c,81,a[e]);break;case "usedJsHeapSize":D(c,82,a[e]);break;case "sourceVideoDurationMs":D(c,90,a[e]);break;case "videoOutputFrames":D(c,93,a[e]);break;case "isResume":D(c,104,a[e]);break;case "adPrebufferedTimeSecs":D(c,39,a[e]);break;case "isLivestream":D(c,47,a[e]);break;case "liveStreamMode":D(c,91,
cu[a[e]]);break;case "adCpn2":D(c,48,a[e]);break;case "adDaiDriftMillis":D(c,49,a[e]);break;case "videoStreamType":D(c,53,du[a[e]]);break;case "playbackRequiresTap":D(c,56,a[e]);break;case "performanceNavigationTiming":D(c,67,a[e]);break;case "transactionType":D(c,74,eu[a[e]]);break;case "playerRotationType":D(c,101,fu[a[e]]);break;case "allowedPreroll":D(c,10,a[e]);break;case "shownPreroll":D(c,11,a[e]);break;case "getHomeRequestId":D(c,57,a[e]);break;case "getSearchRequestId":D(c,60,a[e]);break;
case "getPlayerRequestId":D(c,61,a[e]);break;case "getWatchNextRequestId":D(c,62,a[e]);break;case "getBrowseRequestId":D(c,63,a[e]);break;case "getLibraryRequestId":D(c,66,a[e]);break;default:gu.includes(f)&&Hk(new S("Codegen laipb translator asked to translate message field",""+f))}}catch(g){Hk(Error("Codegen laipb translator failed to set "+f))}}pu(c,b)}}
function pu(a,b){var c=Jt(b);c.jspbInfos||(c.jspbInfos=[]);c.jspbInfos.push(a);Qt(b||"").jspbInfo.push(a);c=Lt(b);b=Ht(b).cttAuthInfo;ju().jspbInfo(a,c,b)}
function Z(a,b,c){if(!b&&"_"!==a[0]){var d=a;T.mark&&(0==d.lastIndexOf("mark_",0)||(d="mark_"+d),c&&(d+=" ("+c+")"),T.mark(d))}d=Qt(c||"");d.tick[a]=b||R();if(d.callback&&d.callback[a]){d=p(d.callback[a]);for(var e=d.next();!e.done;e=d.next())e=e.value,e()}d=Jt(c);d.gelTicks&&(d.gelTicks[a]=!0);d=Dt(c);e=b||R();d[a]=e;e=Lt(c);var f=Ht(c).cttAuthInfo;if("_start"===a){var g=ju();ku(g,"baseline_"+e)||(b={timestamp:b,cttAuthInfo:f},P("web_csi_via_jspb")?(f=new Cj,D(f,1,e),e=new Nj,Yd(e,Cj,6,Oj,f),vr(e,
b)):nm("latencyActionBaselined",{clientActionNonce:e},b))}else ju().tick(a,e,b,f);Mt(c);return d[a]}
function qu(){var a=Lt();requestAnimationFrame(function(){setTimeout(function(){a===Lt()&&Z("ol",void 0,void 0)},0)})}
function ru(){var a=document;if("visibilityState"in a)a=a.visibilityState;else{var b=qp+"VisibilityState";a=b in a?a[b]:void 0}switch(a){case "hidden":return 0;case "visible":return 1;case "prerender":return 2;case "unloaded":return 3;default:return-1}}
function mu(){function a(f){var g=Et(),h=Gt(),k=M("CSI_START_TIMESTAMP_MILLIS",0);0<k&&!P("embeds_web_enable_csi_start_override_killswitch")&&(h=k);h&&(Z("srt",g.responseStart),1!==f.prerender&&Z("_start",h,void 0));f=Ot();0<f&&Z("fpt",f);f=Et();f.isPerformanceNavigationTiming&&nu({performanceNavigationTiming:!0});Z("nreqs",f.requestStart,void 0);Z("nress",f.responseStart,void 0);Z("nrese",f.responseEnd,void 0);0<f.redirectEnd-f.redirectStart&&(Z("nrs",f.redirectStart,void 0),Z("nre",f.redirectEnd,
void 0));0<f.domainLookupEnd-f.domainLookupStart&&(Z("ndnss",f.domainLookupStart,void 0),Z("ndnse",f.domainLookupEnd,void 0));0<f.connectEnd-f.connectStart&&(Z("ntcps",f.connectStart,void 0),Z("ntcpe",f.connectEnd,void 0));f.secureConnectionStart>=Gt()&&0<f.connectEnd-f.secureConnectionStart&&(Z("nstcps",f.secureConnectionStart,void 0),Z("ntcpe",f.connectEnd,void 0));T&&"getEntriesByType"in T&&su()}
var b=M("TIMING_INFO",{});if(P("web_csi_via_jspb")){b=tu(b);pu(b);b=Gj(Hj(new Ej,!0),W[Xt(M("TIMING_ACTION"))]);var c=M("PREVIOUS_ACTION");c&&D(b,13,W[Xt(c)]);(c=M("CLIENT_PROTOCOL"))&&D(b,33,c);(c=M("CLIENT_TRANSPORT"))&&D(b,34,c);(c=ns())&&"UNDEFINED_CSN"!==c&&D(b,4,c);c=ru();1!==c&&-1!==c||D(b,6,!0);c=It();D(b,3,"cold");a(c);c=uu();if(0<c.length){c=p(c);for(var d=c.next();!d.done;d=c.next()){d=d.value;var e=new Dj;D(e,1,d);$d(b,83,Dj,e)}}pu(b)}else{for(c in b)b.hasOwnProperty(c)&&ou(c,b[c]);b=
{isNavigation:!0,actionType:Xt(M("TIMING_ACTION"))};if(c=M("PREVIOUS_ACTION"))b.previousAction=Xt(c);if(c=M("CLIENT_PROTOCOL"))b.httpProtocol=c;if(c=M("CLIENT_TRANSPORT"))b.transportProtocol=c;(c=ns())&&"UNDEFINED_CSN"!==c&&(b.clientScreenNonce=c);c=ru();if(1===c||-1===c)b.isVisible=!0;c=It();b.loadType="cold";a(c);c=uu();if(0<c.length)for(b.resourceInfo=[],c=p(c),d=c.next();!d.done;d=c.next())b.resourceInfo.push({resourceCache:d.value});nu(b)}}
function tu(a){var b=new Ej;a=p(Object.entries(a));for(var c=a.next();!c.done;c=a.next()){var d=p(c.value);c=d.next().value;d=d.next().value;switch(c){case "GetBrowse_rid":var e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetGuide_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetHome_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetPlayer_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetSearch_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;
case "GetSettings_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetTrending_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "GetWatchNext_rid":e=new Jj;D(e,1,c);D(e,2,String(d));Ij(b,e);break;case "yt_red":D(b,14,!!d);break;case "yt_ad":D(b,9,!!d)}}return b}
function vu(a,b){a=document.querySelector(a);if(!a)return!1;var c="",d=a.nodeName;"SCRIPT"===d?(c=a.src,c||(c=a.getAttribute("data-timing-href"))&&(c=window.location.protocol+c)):"LINK"===d&&(c=a.href);ic()&&a.setAttribute("nonce",ic());return c?(a=T.getEntriesByName(c))&&a[0]&&(a=a[0],c=Gt(),Z("rsf_"+b,c+Math.round(a.fetchStart)),Z("rse_"+b,c+Math.round(a.responseEnd)),void 0!==a.transferSize&&0===a.transferSize)?!0:!1:!1}
function uu(){var a=[];if(document.querySelector&&T&&T.getEntriesByName)for(var b in Bt)if(Bt.hasOwnProperty(b)){var c=Bt[b];vu(b,c)&&a.push(c)}return a}
function su(){var a=window.location.protocol,b=T.getEntriesByType("resource");b=ib(b,function(c){return 0===c.name.indexOf(a+"//fonts.gstatic.com/s/")});
(b=kb(b,function(c,d){return d.duration>c.duration?d:c},{duration:0}))&&0<b.startTime&&0<b.responseEnd&&(Z("wffs",Ft(b.startTime)),Z("wffe",Ft(b.responseEnd)))}
var wu=window;wu.ytcsi&&(wu.ytcsi.info=ou,wu.ytcsi.tick=Z);var xu="tokens consistency mss client_location entities response_received_commands store PLAYER_PRELOAD".split(" "),yu=["type.googleapis.com/youtube.api.pfiinnertube.YoutubeApiInnertube.BrowseResponse"];function zu(a,b,c,d){this.o=a;this.M=b;this.m=c;this.l=d;this.j=void 0;this.i=new Map;a.La||(a.La={});a.La=Object.assign({},pt,a.La)}
function Au(a,b,c,d){if(void 0!==zu.i){if(d=zu.i,a=[a!==d.o,b!==d.M,c!==d.m,!1,!1,void 0!==d.j],a.some(function(e){return e}))throw new S("InnerTubeTransportService is already initialized",a);
}else zu.i=new zu(a,b,c,d)}
function Bu(a){var b={signalServiceEndpoint:{signal:"GET_DATASYNC_IDS"}};var c=void 0===c?Ys:c;var d=gt(b,a.o);if(!d)return zf(new S("Error: No request builder found for command.",b));var e=d.o(b,void 0,c);return e?new uf(function(f){var g,h,k;return w(function(m){if(1==m.i){h="cors"===(null==(g=e.Ba)?void 0:g.mode)?"cors":void 0;if(a.m.ld){var q=e.config,t;q=null==q?void 0:null==(t=q.Ra)?void 0:t.sessionIndex;t=Os({sessionIndex:q});k=Object.assign({},Cu(h),t);return m.u(2)}return v(m,Du(e.config,
h),3)}2!=m.i&&(k=m.j);f(Eu(a,e,k));m.i=0})}):zf(new S("Error: Failed to build request for command.",b))}
function Eu(a,b,c){var d,e,f,g,h,k,m,q,t,x,u,A,E,F,N,O,Q,ca,aa,ja,ma,na,H,sa,la,vd,wd;return w(function(xa){switch(xa.i){case 1:xa.u(2);break;case 3:if((d=xa.j)&&!d.isExpired())return xa.return(Promise.resolve(d.i()));case 2:if(null==(e=b)?0:null==(f=e.ga)?0:f.context)for(g=p([]),h=g.next();!h.done;h=g.next())k=h.value,k.xq(b.ga.context);if(null==(m=a.j)?0:m.Dq(b.input,b.ga))return xa.return(a.j.tq(b.input,b.ga));(x=null==(t=b.config)?void 0:t.Aa)&&a.i.has(x)&&P("web_memoize_inflight_requests")?q=
a.i.get(x):(u=JSON.stringify(b.ga),b.Ba=Object.assign({},b.Ba,{headers:c}),A=Object.assign({},b.Ba),"POST"===b.Ba.method&&(A=Object.assign({},A,{body:u})),(null==(E=b.config)?0:E.Wc)&&Z(b.config.Wc),F=function(){return a.M.fetch(b.input,A,b.config)},q=F(),x&&a.i.set(x,q));
return v(xa,q,4);case 4:N=xa.j;if(P("web_one_platform_error_handling")&&(null==(O=N)?0:null==(Q=O.error)?0:Q.details))for(ca=N.error.details,aa=p(ca),ja=aa.next();!ja.done;ja=aa.next())ma=ja.value,(na=ma["@type"])&&-1<yu.indexOf(na)&&(delete ma["@type"],N=ma);x&&a.i.has(x)&&a.i.delete(x);(null==(H=b.config)?0:H.Xc)&&Z(b.config.Xc);if(N||null==(sa=a.j)||!sa.nq(b.input,b.ga)){xa.u(5);break}return v(xa,a.j.sq(b.input,b.ga),6);case 6:N=xa.j;case 5:if(N&&(null==(la=N.Cq)||!la.Fq)&&a.l)for(vd=p(xu),h=vd.next();!h.done;h=
vd.next())wd=h.value,a.l[wd]&&a.l[wd].handleResponse(N,b);return xa.return(N)}})}
function Du(a,b){var c,d,e,f;return w(function(g){if(1==g.i){e=null==(c=a)?void 0:null==(d=c.Ra)?void 0:d.sessionIndex;var h=Os({sessionIndex:e});if(!(h instanceof uf)){var k=new uf(eb);vf(k,2,h);h=k}return v(g,h,2)}f=g.j;return g.return(Promise.resolve(Object.assign({},Cu(b),f)))})}
function Cu(a){var b={"Content-Type":"application/json"};P("enable_web_eom_visitor_data")&&M("EOM_VISITOR_DATA")?b["X-Goog-EOM-Visitor-Id"]=M("EOM_VISITOR_DATA"):M("VISITOR_DATA")&&(b["X-Goog-Visitor-Id"]=M("VISITOR_DATA"));P("track_webfe_innertube_auth_mismatch")&&(b["X-Youtube-Bootstrap-Logged-In"]=M("LOGGED_IN",!1));"cors"!==a&&((a=M("INNERTUBE_CONTEXT_CLIENT_NAME"))&&(b["X-Youtube-Client-Name"]=a),(a=M("INNERTUBE_CONTEXT_CLIENT_VERSION"))&&(b["X-Youtube-Client-Version"]=a),(a=M("CHROME_CONNECTED_HEADER"))&&
(b["X-Youtube-Chrome-Connected"]=a),(a=M("DOMAIN_ADMIN_STATE"))&&(b["X-Youtube-Domain-Admin-State"]=a),(a=M("INNERTUBE_CONTEXT_SERIALIZED_DELEGATION_CONTEXT"))&&(b["X-YouTube-Delegation-Context"]=a));return b}
;var Fu=new Qs("INNERTUBE_TRANSPORT_TOKEN");var Gu=["share/get_web_player_share_panel"],Hu=["feedback"],Iu=["notification/modify_channel_preference"],Ju=["browse/edit_playlist"],Ku=["subscription/subscribe"],Lu=["subscription/unsubscribe"];function Mu(){}
r(Mu,mt);Mu.prototype.l=function(){return Ku};
Mu.prototype.i=function(a){return Bs(a,sk)||void 0};
Mu.prototype.j=function(a,b,c){c=void 0===c?{}:c;b.channelIds&&(a.channelIds=b.channelIds);b.siloName&&(a.siloName=b.siloName);b.params&&(a.params=b.params);c.botguardResponse&&(a.botguardResponse=c.botguardResponse);c.feature&&(a.clientFeature=c.feature)};
fa.Object.defineProperties(Mu.prototype,{m:{configurable:!0,enumerable:!0,get:function(){return!0}}});function Nu(){}
r(Nu,mt);Nu.prototype.l=function(){return Lu};
Nu.prototype.i=function(a){return Bs(a,rk)||void 0};
Nu.prototype.j=function(a,b){b.channelIds&&(a.channelIds=b.channelIds);b.siloName&&(a.siloName=b.siloName);b.params&&(a.params=b.params)};
fa.Object.defineProperties(Nu.prototype,{m:{configurable:!0,enumerable:!0,get:function(){return!0}}});function Ou(){}
r(Ou,mt);Ou.prototype.l=function(){return Hu};
Ou.prototype.i=function(a){return Bs(a,Zi)||void 0};
Ou.prototype.j=function(a,b,c){a.feedbackTokens=[];b.feedbackToken&&a.feedbackTokens.push(b.feedbackToken);if(b=b.cpn||c.cpn)a.feedbackContext={cpn:b};a.isFeedbackTokenUnencrypted=!!c.is_feedback_token_unencrypted;a.shouldMerge=!1;c.extra_feedback_tokens&&(a.shouldMerge=!0,a.feedbackTokens=a.feedbackTokens.concat(c.extra_feedback_tokens))};
fa.Object.defineProperties(Ou.prototype,{m:{configurable:!0,enumerable:!0,get:function(){return!0}}});function Pu(){}
r(Pu,mt);Pu.prototype.l=function(){return Iu};
Pu.prototype.i=function(a){return Bs(a,Wj)||void 0};
Pu.prototype.j=function(a,b){b.params&&(a.params=b.params);b.secondaryParams&&(a.secondaryParams=b.secondaryParams)};function Qu(){}
r(Qu,mt);Qu.prototype.l=function(){return Ju};
Qu.prototype.i=function(a){return Bs(a,Vj)||void 0};
Qu.prototype.j=function(a,b){b.actions&&(a.actions=b.actions);b.params&&(a.params=b.params);b.playlistId&&(a.playlistId=b.playlistId)};function Ru(){}
r(Ru,mt);Ru.prototype.l=function(){return Gu};
Ru.prototype.i=function(a){return a.webPlayerShareEntityServiceEndpoint};
Ru.prototype.j=function(a,b,c){c=void 0===c?{}:c;b.serializedShareEntity&&(a.serializedSharedEntity=b.serializedShareEntity);c.includeListId&&(a.includeListId=!0)};var Ss=new Qs("NETWORK_SLI_TOKEN");function Su(a){this.i=a}
Su.prototype.fetch=function(a,b){var c=this,d,e;return w(function(f){c.i&&(d=mc(nc(5,Dc(a,"key")))||"/UNKNOWN_PATH",c.i.start(d));e=new window.Request(a,b);return P("web_fetch_promise_cleanup_killswitch")?f.return(Promise.resolve(fetch(e).then(function(g){return c.handleResponse(g)}).catch(function(g){Wr(g)}))):f.return(fetch(e).then(function(g){return c.handleResponse(g)}).catch(function(g){Wr(g)}))})};
Su.prototype.handleResponse=function(a){var b=a.text().then(function(c){return JSON.parse(c.replace(")]}'",""))});
a.redirected||a.ok?this.i&&this.i.success():(this.i&&this.i.failure(),b=b.then(function(c){Wr(new S("Error: API fetch failed",a.status,a.url,c));return Object.assign({},c,{errorMetadata:{status:a.status}})}));
return b};
Su[Ps]=[new Rs];var Tu=new Qs("NETWORK_MANAGER_TOKEN");var Uu;function Vu(a){Vn.call(this,1,arguments);this.csn=a}
r(Vu,Vn);var eo=new Wn("screen-created",Vu),Wu=[],Yu=Xu,Zu=0;function $u(a,b,c,d,e,f,g){function h(){Wr(new S("newScreen() parent element does not have a VE - rootVe",b))}
var k=Yu();f=new gs({veType:b,youtubeData:f,jspbYoutubeData:void 0});e={cttAuthInfo:e,ba:k};if(P("il_via_jspb")){var m=new rj;m.V(k);sj(m,f.getAsJspb());c&&c.visualElement?(f=new tj,c.clientScreenNonce&&D(f,2,c.clientScreenNonce),uj(f,c.visualElement.getAsJspb()),g&&D(f,4,Pj[g]),G(m,tj,5,f)):c&&h();d&&D(m,3,d);Ar(m,e,a)}else f={csn:k,pageVe:f.getAsJson()},c&&c.visualElement?(f.implicitGesture={parentCsn:c.clientScreenNonce,gesturedVe:c.visualElement.getAsJson()},g&&(f.implicitGesture.gestureType=
g)):c&&h(),d&&(f.cloneCsn=d),a?qr("screenCreated",f,a,e):nm("screenCreated",f,e);ao(eo,new Vu(k));return k}
function av(a,b,c,d){var e=d.filter(function(k){k.csn!==b?(k.csn=b,k=!0):k=!1;return k}),f={cttAuthInfo:ps(b),
ba:b};d=p(d);for(var g=d.next();!g.done;g=d.next())g=g.value.getAsJson(),(rb(g)||!g.trackingParams&&!g.veType)&&Wr(Error("Child VE logged with no data"));if(P("il_via_jspb")){var h=new vj;h.V(b);xj(h,c.getAsJspb());jb(e,function(k){k=k.getAsJspb();$d(h,3,mj,k)});
"UNDEFINED_CSN"==b?bv("visualElementAttached",h,f):Br(h,f,a)}else c={csn:b,parentVe:c.getAsJson(),childVes:jb(e,function(k){return k.getAsJson()})},"UNDEFINED_CSN"==b?bv("visualElementAttached",c,f):a?qr("visualElementAttached",c,a,f):nm("visualElementAttached",c,f)}
function Xu(){for(var a=Math.random()+"",b=[],c=0,d=0;d<a.length;d++){var e=a.charCodeAt(d);255<e&&(b[c++]=e&255,e>>=8);b[c++]=e}return fd(b,3)}
function bv(a,b,c){Wu.push({payloadName:a,payload:b,options:c});Zu||(Zu=fo())}
function go(a){if(Wu){for(var b=p(Wu),c=b.next();!c.done;c=b.next())if(c=c.value,c.payload)if(P("il_via_jspb"))switch(c.payload.V(a.csn),c.payloadName){case "screenCreated":Ar(c.payload,c.options);break;case "visualElementAttached":Br(c.payload,c.options);break;case "visualElementShown":wr(c.payload,c.options);break;case "visualElementHidden":xr(c.payload,c.options);break;case "visualElementGestured":yr(c.payload,c.options);break;case "visualElementStateChanged":zr(c.payload,c.options);break;default:Wr(new S("flushQueue unable to map payloadName to JSPB setter"))}else c.payload.csn=
a.csn,qr(c.payloadName,c.payload,null,c.options);Wu.length=0}Zu=0}
;function cv(){this.j=new Set;this.i=new Set;this.l=new Map}
cv.prototype.s=function(){};
cv.prototype.clear=function(){this.j.clear();this.i.clear();this.l.clear()};
Qa(cv);function dv(){this.o=[];this.N=[];this.i=[];this.m=[];this.B=[];this.j=new Set;this.v=new Map}
dv.prototype.s=function(a){this.client=a};
function ev(a,b,c){c=void 0===c?0:c;b.then(function(d){a.j.has(c)&&a.l&&a.l();var e=ns(c),f=ls(c);if(e&&f){var g;(null==d?0:null==(g=d.response)?0:g.trackingParams)&&av(a.client,e,f,[hs(d.response.trackingParams)]);var h;(null==d?0:null==(h=d.playerResponse)?0:h.trackingParams)&&av(a.client,e,f,[hs(d.playerResponse.trackingParams)])}})}
function fv(a,b,c,d){d=void 0===d?0:d;if(a.j.has(d))a.o.push([b,c]);else{var e=ns(d);c=c||ls(d);e&&c&&av(a.client,e,c,[b])}}
dv.prototype.clickCommand=function(a,b,c){var d=a.clickTrackingParams;c=void 0===c?0:c;if(d)if(c=ns(void 0===c?0:c)){a=this.client;var e=hs(d);d={cttAuthInfo:ps(c),ba:c};if(P("il_via_jspb")){var f=new yj;f.V(c);e=e.getAsJspb();G(f,mj,2,e);D(f,4,Pj.INTERACTION_LOGGING_GESTURE_TYPE_GENERIC_CLICK);b&&G(f,pj,3);"UNDEFINED_CSN"==c?bv("visualElementGestured",f,d):yr(f,d,a)}else f={csn:c,ve:e.getAsJson(),gestureType:"INTERACTION_LOGGING_GESTURE_TYPE_GENERIC_CLICK"},b&&(f.clientData=b),"UNDEFINED_CSN"==c?
bv("visualElementGestured",f,d):a?qr("visualElementGestured",f,a,d):nm("visualElementGestured",f,d);b=!0}else b=!1;else b=!1;return b};
function gv(a,b,c){c=void 0===c?{}:c;a.j.add(c.layer||0);a.l=function(){hv(a,b,c);var f=ls(c.layer);if(f){for(var g=p(a.o),h=g.next();!h.done;h=g.next())h=h.value,fv(a,h[0],h[1]||f,c.layer);f=p(a.N);for(g=f.next();!g.done;g=f.next()){var k=g.value;g=void 0;g=void 0===g?0:g;h=ns(g);var m=k[0]||ls(g);if(h&&m){g=a.client;var q=k[1];k={cttAuthInfo:ps(h),ba:h};P("il_via_jspb")?(q=new Bj,q.V(h),m=m.getAsJspb(),G(q,mj,2,m),"UNDEFINED_CSN"==h?bv("visualElementStateChanged",q,k):zr(q,k,g)):(m={csn:h,ve:m.getAsJson(),
clientData:q},"UNDEFINED_CSN"==h?bv("visualElementStateChanged",m,k):g?qr("visualElementStateChanged",m,g,k):nm("visualElementStateChanged",m,k))}}}};
ns(c.layer)||a.l();if(c.Ob)for(var d=p(c.Ob),e=d.next();!e.done;e=d.next())ev(a,e.value,c.layer);else Vr(Error("Delayed screen needs a data promise."))}
function hv(a,b,c){c=void 0===c?{}:c;c.layer||(c.layer=0);var d=void 0!==c.Sc?c.Sc:c.layer;var e=ns(d);d=ls(d);var f;d&&(void 0!==c.parentCsn?f={clientScreenNonce:c.parentCsn,visualElement:d}:e&&"UNDEFINED_CSN"!==e&&(f={clientScreenNonce:e,visualElement:d}));var g,h=M("EVENT_ID");"UNDEFINED_CSN"===e&&h&&(g={servletData:{serializedServletEventId:h}});try{var k=$u(a.client,b,f,c.Nb,c.cttAuthInfo,g,c.qq)}catch(m){Yr(m,{Aq:b,rootVe:d,parentVisualElement:void 0,oq:e,wq:f,Nb:c.Nb});Vr(m);return}qs(k,b,
c.layer,c.cttAuthInfo);if(b=e&&"UNDEFINED_CSN"!==e&&d){a:{b=p(Object.values(fs));for(f=b.next();!f.done;f=b.next())if(ns(f.value)===e){b=!0;break a}b=!1}b=!b}b&&(b=a.client,g=!0,h=(g=void 0===g?!1:g)?16:8,f={cttAuthInfo:ps(e),ba:e,Pb:g},P("il_via_jspb")?(h=new zj,h.V(e),d=d.getAsJspb(),G(h,mj,2,d),D(h,4,g?16:8),"UNDEFINED_CSN"==e?bv("visualElementHidden",h,f):xr(h,f,b)):(d={csn:e,ve:d.getAsJson(),eventType:h},"UNDEFINED_CSN"==e?bv("visualElementHidden",d,f):b?qr("visualElementHidden",d,b,f):nm("visualElementHidden",
d,f)));a.i[a.i.length-1]&&!a.i[a.i.length-1].csn&&(a.i[a.i.length-1].csn=k||"");nu({clientScreenNonce:k});cv.getInstance().clear();d=ls(c.layer);e&&"UNDEFINED_CSN"!==e&&d&&(P("web_mark_root_visible")||P("music_web_mark_root_visible"))&&(e=k,k={cttAuthInfo:ps(e),ba:e},P("il_via_jspb")?(b=new Aj,b.V(e),f=d.getAsJspb(),G(b,mj,2,f),D(b,4,1),"UNDEFINED_CSN"==e?bv("visualElementShown",b,k):wr(b,k)):(b={csn:e,ve:d.getAsJson(),eventType:1},"UNDEFINED_CSN"==e?bv("visualElementShown",b,k):nm("visualElementShown",
b,k)));a.j.delete(c.layer||0);a.l=void 0;e=p(a.v);for(k=e.next();!k.done;k=e.next())b=p(k.value),k=b.next().value,b=b.next().value,b.has(c.layer)&&d&&fv(a,k,d,c.layer);for(c=0;c<a.m.length;c++){e=a.m[c];try{e()}catch(m){Vr(m)}}for(c=a.m.length=0;c<a.B.length;c++){e=a.B[c];try{e()}catch(m){Vr(m)}}}
;function iv(){var a,b;return w(function(c){if(1==c.i)return a=Xs().resolve(Fu),a?v(c,Bu(a),2):(Wr(Error("InnertubeTransportService unavailable in fetchDatasyncIds")),c.return(void 0));if(b=c.j)return b.errorMetadata?(Wr(Error("Datasync IDs fetch responded with "+b.errorMetadata.status+": "+b.error)),c.return(void 0)):c.return(b.pq);Wr(Error("Network request to get Datasync IDs failed."));return c.return(void 0)})}
;var jv=y.caches,kv;function lv(a){var b=a.indexOf(":");return-1===b?{Zb:a}:{Zb:a.substring(0,b),datasyncId:a.substring(b+1)}}
function mv(){return w(function(a){if(void 0!==kv)return a.return(kv);kv=new Promise(function(b){var c;return w(function(d){switch(d.i){case 1:return Ba(d,2),v(d,jv.open("test-only"),4);case 4:return v(d,jv.delete("test-only"),5);case 5:Ca(d,3);break;case 2:if(c=Da(d),c instanceof Error&&"SecurityError"===c.name)return b(!1),d.return();case 3:b("caches"in window),d.i=0}})});
return a.return(kv)})}
function nv(a){var b,c,d,e,f,g,h;w(function(k){if(1==k.i)return v(k,mv(),2);if(3!=k.i){if(!k.j)return k.return(!1);b=[];return v(k,jv.keys(),3)}c=k.j;d=p(c);for(e=d.next();!e.done;e=d.next())f=e.value,g=lv(f),h=g.datasyncId,!h||a.includes(h)||b.push(jv.delete(f));return k.return(Promise.all(b).then(function(m){return m.some(function(q){return q})}))})}
function ov(){var a,b,c,d,e,f,g;return w(function(h){if(1==h.i)return v(h,mv(),2);if(3!=h.i){if(!h.j)return h.return(!1);a=rm("cache contains other");return v(h,jv.keys(),3)}b=h.j;c=p(b);for(d=c.next();!d.done;d=c.next())if(e=d.value,f=lv(e),(g=f.datasyncId)&&g!==a)return h.return(!0);return h.return(!1)})}
;function pv(){try{return!!self.localStorage}catch(a){return!1}}
;function qv(a){a=a.match(/(.*)::.*::.*/);if(null!==a)return a[1]}
function rv(a){if(pv()){var b=Object.keys(window.localStorage);b=p(b);for(var c=b.next();!c.done;c=b.next()){c=c.value;var d=qv(c);void 0===d||a.includes(d)||self.localStorage.removeItem(c)}}}
function sv(){if(!pv())return!1;var a=rm(),b=Object.keys(window.localStorage);b=p(b);for(var c=b.next();!c.done;c=b.next())if(c=qv(c.value),void 0!==c&&c!==a)return!0;return!1}
;function tv(){iv().then(function(a){a&&(Cn(a),nv(a),rv(a))})}
function uv(){var a=new Mo;Rh.S(function(){var b,c,d,e;return w(function(f){switch(f.i){case 1:if(P("ytidb_clear_optimizations_killswitch")){f.u(2);break}b=rm("clear");if(b.startsWith("V")){var g=[b];Cn(g);nv(g);rv(g);return f.return()}c=sv();return v(f,ov(),3);case 3:return d=f.j,v(f,Dn(),4);case 4:if(e=f.j,!c&&!d&&!e)return f.return();case 2:a.L()?tv():a.m.add("publicytnetworkstatus-online",tv,!0,void 0,void 0),f.i=0}})})}
;function vv(a){a&&(a.dataset?a.dataset[wv("loaded")]="true":a.setAttribute("data-loaded","true"))}
function xv(a,b){return a?a.dataset?a.dataset[wv(b)]:a.getAttribute("data-"+b):null}
var yv={};function wv(a){return yv[a]||(yv[a]=String(a).replace(/\-([a-z])/g,function(b,c){return c.toUpperCase()}))}
;var zv=/\.vflset|-vfl[a-zA-Z0-9_+=-]+/,Av=/-[a-zA-Z]{2,3}_[a-zA-Z]{2,3}(?=(\/|$))/;function Bv(a,b,c){c=void 0===c?null:c;if(window.spf&&spf.script){c="";if(a){var d=a.indexOf("jsbin/"),e=a.lastIndexOf(".js"),f=d+6;-1<d&&-1<e&&e>f&&(c=a.substring(f,e),c=c.replace(zv,""),c=c.replace(Av,""),c=c.replace("debug-",""),c=c.replace("tracing-",""))}spf.script.load(a,c,b)}else Cv(a,b,c)}
function Cv(a,b,c){c=void 0===c?null:c;var d=Dv(a),e=document.getElementById(d),f=e&&xv(e,"loaded"),g=e&&!f;f?b&&b():(b&&(f=vq(d,b),b=""+Ua(b),Ev[b]=f),g||(e=Fv(a,d,function(){xv(e,"loaded")||(vv(e),yq(d),al($a(zq,d),0))},c)))}
function Fv(a,b,c,d){d=void 0===d?null:d;var e=ff("SCRIPT");e.id=b;e.onload=function(){c&&setTimeout(c,0)};
e.onreadystatechange=function(){switch(e.readyState){case "loaded":case "complete":e.onload()}};
d&&e.setAttribute("nonce",d);Ah(e,Lb(a));a=document.getElementsByTagName("head")[0]||document.body;a.insertBefore(e,a.firstChild);return e}
function Gv(a){a=Dv(a);var b=document.getElementById(a);b&&(zq(a),b.parentNode.removeChild(b))}
function Hv(a,b){a&&b&&(a=""+Ua(b),(a=Ev[a])&&xq(a))}
function Dv(a){var b=document.createElement("a");fc(b,a);a=b.href.replace(/^[a-zA-Z]+:\/\//,"//");return"js-"+kc(a)}
var Ev={};var Iv=[],Jv=!1;function Kv(){if(!P("disable_biscotti_fetch_for_ad_blocker_detection")&&!P("disable_biscotti_fetch_entirely_for_all_web_clients")&&Ds()){var a=M("PLAYER_VARS",{});if("1"!=tb(a)&&!Es(a)){var b=function(){Jv=!0;"google_ad_status"in window?yk("DCLKSTAT",1):yk("DCLKSTAT",2)};
try{Bv("//static.doubleclick.net/instream/ad_status.js",b)}catch(c){}Iv.push(Rh.S(function(){if(!(Jv||"google_ad_status"in window)){try{Hv("//static.doubleclick.net/instream/ad_status.js",b)}catch(c){}Jv=!0;yk("DCLKSTAT",3)}},5E3))}}}
function Nv(){var a=Number(M("DCLKSTAT",0));return isNaN(a)?0:a}
;function Ov(){this.state=1;this.i=null}
Ov.prototype.initialize=function(a,b,c){if(a.program){var d,e=null!=(d=a.interpreterScript)?d:null,f;d=null!=(f=a.interpreterUrl)?f:null;a.interpreterSafeScript&&(e=a.interpreterSafeScript,Db("From proto message. b/166824318"),e=e.privateDoNotAccessOrElseSafeScriptWrappedValue||"",e=(f=Ab())?f.createScript(e):e,e=(new Fb(e)).toString());a.interpreterSafeUrl&&(d=a.interpreterSafeUrl,Db("From proto message. b/166824318"),d=Lb(d.privateDoNotAccessOrElseTrustedResourceUrlWrappedValue||"").toString());
Pv(this,e,d,a.program,b,c)}else Wr(Error("Cannot initialize botguard without program"))};
function Pv(a,b,c,d,e,f){var g=void 0===g?"trayride":g;c?(a.state=2,Bv(c,function(){window[g]?Qv(a,d,g,e):(a.state=3,Gv(c),Wr(new S("Unable to load Botguard","from "+c)))},f)):b?(f=ff("SCRIPT"),f.textContent=b,f.nonce=ic(),document.head.appendChild(f),document.head.removeChild(f),window[g]?Qv(a,d,g,e):(a.state=4,Wr(new S("Unable to load Botguard from JS")))):Wr(new S("Unable to load VM; no url or JS provided"))}
Ov.prototype.isInitialized=function(){return!!this.i};
function Qv(a,b,c,d){a.state=5;try{var e=new yh({program:b,globalName:c});e.hd.then(function(){a.state=6;d&&d(b)});
Rv(a,e)}catch(f){a.state=7,f instanceof Error&&Wr(f)}}
Ov.prototype.invoke=function(a){a=void 0===a?{}:a;var b=this.i;if(b){var c={Mb:a};if(b.Wa)throw Error("Already disposed");a=wh();var d;null!=(d=b.sa)&&d.j.i.Cb("/client_streamz/bg/fsc",d.Aa);d=b.md([c.Mb,c.kd]);null!=(b=b.sa)&&(a=wh()-a,b.l.i.hb("/client_streamz/bg/fsl",a,b.Aa));b=d}else b=null;return b};
Ov.prototype.dispose=function(){Rv(this,null);this.state=8};
function Rv(a,b){oe(a.i);a.i=b}
;var Sv=new Ov;function Tv(){return Sv.isInitialized()}
function Uv(a){a=void 0===a?{}:a;return Sv.invoke(a)}
;function Vv(a){var b=this;var c=void 0===c?0:c;var d=void 0===d?cm():d;this.m=c;this.l=d;this.j=new xh;this.i=a;a={};c=p(this.i.entries());for(d=c.next();!d.done;a={Ca:a.Ca,Na:a.Na},d=c.next()){var e=p(d.value);d=e.next().value;e=e.next().value;a.Na=d;a.Ca=e;d=function(f){return function(){f.Ca.tb();b.i[f.Na].eb=!0;b.i.every(function(g){return!0===g.eb})&&b.j.resolve()}}(a);
e=Zl(d,Wv(this,a.Ca));this.i[a.Na]=Object.assign({},a.Ca,{tb:d,Za:e})}}
function Xv(a){var b=Array.from(a.i.keys()).sort(function(d,e){return Wv(a,a.i[e])-Wv(a,a.i[d])});
b=p(b);for(var c=b.next();!c.done;c=b.next())c=a.i[c.value],void 0===c.Za||c.eb||(a.l.fa(c.Za),Zl(c.tb,10))}
Vv.prototype.cancel=function(){for(var a=p(this.i),b=a.next();!b.done;b=a.next())b=b.value,void 0===b.Za||b.eb||this.l.fa(b.Za),b.eb=!0;this.j.resolve()};
function Wv(a,b){var c;return null!=(c=b.priority)?c:a.m}
;function Yv(a){this.state=a;this.plugins=[];this.s=void 0}
Yv.prototype.install=function(){this.plugins.push.apply(this.plugins,ia(Ma.apply(0,arguments)))};
Yv.prototype.transition=function(a,b){var c=this,d=this.B.find(function(f){return f.from===c.state&&f.D===a});
if(d){this.l&&(Xv(this.l),this.l=void 0);this.state=a;d=d.action.bind(this);var e=this.plugins.filter(function(f){return f[a]}).map(function(f){return f[a]});
d(Zv(this,e,this.s),b)}else throw Error("no transition specified from "+this.state+" to "+a);};
function Zv(a,b,c){return function(){var d=Ma.apply(0,arguments),e=b.filter(function(k){var m;return 10===(null!=(m=null!=c?c:k.priority)?m:0)}),f=b.filter(function(k){var m;
return 10!==(null!=(m=null!=c?c:k.priority)?m:0)});
cm();var g={};e=p(e);for(var h=e.next();!h.done;g={Oa:g.Oa},h=e.next())g.Oa=h.value,am(function(k){return function(){k.Oa.callback.apply(k.Oa,ia(d))}}(g));
f=f.map(function(k){var m;return{tb:function(){k.callback.apply(k,ia(d))},
priority:null!=(m=null!=c?c:k.priority)?m:0}});
f.length&&(a.l=new Vv(f))}}
fa.Object.defineProperties(Yv.prototype,{currentState:{configurable:!0,enumerable:!0,get:function(){return this.state}}});function $v(a){Yv.call(this,void 0===a?"document_active":a);var b=this;this.s=10;this.i=new Map;this.B=[{from:"document_active",D:"document_disposed_preventable",action:this.N},{from:"document_active",D:"document_disposed",action:this.m},{from:"document_disposed_preventable",D:"document_disposed",action:this.m},{from:"document_disposed_preventable",D:"flush_logs",action:this.o},{from:"document_disposed_preventable",D:"document_active",action:this.j},{from:"document_disposed",D:"flush_logs",action:this.o},
{from:"document_disposed",D:"document_active",action:this.j},{from:"document_disposed",D:"document_disposed",action:function(){}},
{from:"flush_logs",D:"document_active",action:this.j}];window.addEventListener("pagehide",function(c){b.transition("document_disposed",{event:c})});
window.addEventListener("beforeunload",function(c){b.transition("document_disposed_preventable",{event:c})})}
r($v,Yv);$v.prototype.N=function(a,b){if(!this.i.get("document_disposed_preventable")){a(null==b?void 0:b.event);var c,d;if((null==b?0:null==(c=b.event)?0:c.defaultPrevented)||(null==b?0:null==(d=b.event)?0:d.returnValue)){b.event.returnValue||(b.event.returnValue=!0);b.event.defaultPrevented||b.event.preventDefault();this.i=new Map;this.transition("document_active");return}}this.i.set("document_disposed_preventable",!0);this.i.get("document_disposed")?this.transition("flush_logs"):this.transition("document_disposed")};
$v.prototype.m=function(a,b){this.i.get("document_disposed")?this.transition("document_active"):(a(null==b?void 0:b.event),this.i.set("document_disposed",!0),this.transition("flush_logs"))};
$v.prototype.o=function(a,b){a(null==b?void 0:b.event);this.transition("document_active")};
$v.prototype.j=function(){this.i=new Map};function aw(a){Yv.call(this,void 0===a?"document_visibility_unknown":a);var b=this;this.B=[{from:"document_visibility_unknown",D:"document_visible",action:this.j},{from:"document_visibility_unknown",D:"document_hidden",action:this.i},{from:"document_visibility_unknown",D:"document_foregrounded",action:this.o},{from:"document_visibility_unknown",D:"document_backgrounded",action:this.m},{from:"document_visible",D:"document_hidden",action:this.i},{from:"document_visible",D:"document_foregrounded",action:this.o},
{from:"document_visible",D:"document_visible",action:this.j},{from:"document_foregrounded",D:"document_visible",action:this.j},{from:"document_foregrounded",D:"document_hidden",action:this.i},{from:"document_foregrounded",D:"document_foregrounded",action:this.o},{from:"document_hidden",D:"document_visible",action:this.j},{from:"document_hidden",D:"document_backgrounded",action:this.m},{from:"document_hidden",D:"document_hidden",action:this.i},{from:"document_backgrounded",D:"document_hidden",action:this.i},
{from:"document_backgrounded",D:"document_backgrounded",action:this.m},{from:"document_backgrounded",D:"document_visible",action:this.j}];document.addEventListener("visibilitychange",function(c){"visible"===document.visibilityState?b.transition("document_visible",{event:c}):b.transition("document_hidden",{event:c})});
P("visibility_lifecycles_dynamic_backgrounding")&&(window.addEventListener("blur",function(c){b.transition("document_backgrounded",{event:c})}),window.addEventListener("focus",function(c){b.transition("document_foregrounded",{event:c})}))}
r(aw,Yv);aw.prototype.j=function(a,b){a(null==b?void 0:b.event);P("visibility_lifecycles_dynamic_backgrounding")&&this.transition("document_foregrounded")};
aw.prototype.i=function(a,b){a(null==b?void 0:b.event);P("visibility_lifecycles_dynamic_backgrounding")&&this.transition("document_backgrounded")};
aw.prototype.m=function(a,b){a(null==b?void 0:b.event)};
aw.prototype.o=function(a,b){a(null==b?void 0:b.event)};function bw(){this.i=new $v;this.j=new aw}
bw.prototype.install=function(){var a=Ma.apply(0,arguments);this.i.install.apply(this.i,ia(a));this.j.install.apply(this.j,ia(a))};function cw(){bw.call(this);var a={};this.install((a.document_disposed={callback:this.l},a));a={};this.install((a.flush_logs={callback:this.m},a))}
var dw;r(cw,bw);cw.prototype.m=function(){if(P("web_fp_via_jspb")){var a=new lj,b=ns();b&&a.V(b);b=new Nj;Yd(b,lj,380,Oj,a);vr(b);P("web_fp_via_jspb_and_json")&&nm("finalPayload",{csn:ns()})}else nm("finalPayload",{csn:ns()})};
cw.prototype.l=function(){$r(as)};function ew(){}
ew.getInstance=function(){var a=B("ytglobal.storage_");a||(a=new ew,z("ytglobal.storage_",a));return a};
ew.prototype.estimate=function(){var a,b,c;return w(function(d){a=navigator;return(null==(b=a.storage)?0:b.estimate)?d.return(a.storage.estimate()):(null==(c=a.webkitTemporaryStorage)?0:c.queryUsageAndQuota)?d.return(fw()):d.return()})};
function fw(){var a=navigator;return new Promise(function(b,c){var d;null!=(d=a.webkitTemporaryStorage)&&d.queryUsageAndQuota?a.webkitTemporaryStorage.queryUsageAndQuota(function(e,f){b({usage:e,quota:f})},function(e){c(e)}):c(Error("webkitTemporaryStorage is not supported."))})}
z("ytglobal.storageClass_",ew);function lm(a,b){var c=this;this.handleError=a;this.i=b;this.j=!1;void 0===self.document||self.addEventListener("beforeunload",function(){c.j=!0});
this.l=Math.random()<=Bk("ytidb_transaction_ended_event_rate_limit",.02)}
lm.prototype.logEvent=function(a,b){switch(a){case "IDB_DATA_CORRUPTED":P("idb_data_corrupted_killswitch")||this.i("idbDataCorrupted",b);break;case "IDB_UNEXPECTEDLY_CLOSED":this.i("idbUnexpectedlyClosed",b);break;case "IS_SUPPORTED_COMPLETED":P("idb_is_supported_completed_killswitch")||this.i("idbIsSupportedCompleted",b);break;case "QUOTA_EXCEEDED":gw(this,b);break;case "TRANSACTION_ENDED":this.l&&this.i("idbTransactionEnded",b);break;case "TRANSACTION_UNEXPECTEDLY_ABORTED":a=Object.assign({},b,
{hasWindowUnloaded:this.j}),this.i("idbTransactionAborted",a)}};
function gw(a,b){ew.getInstance().estimate().then(function(c){c=Object.assign({},b,{isSw:void 0===self.document,isIframe:self!==self.top,deviceStorageUsageMbytes:hw(null==c?void 0:c.usage),deviceStorageQuotaMbytes:hw(null==c?void 0:c.quota)});a.i("idbQuotaExceeded",c)})}
function hw(a){return"undefined"===typeof a?"-1":String(Math.ceil(a/1048576))}
;function iw(a,b,c){J.call(this);var d=this;c=c||M("POST_MESSAGE_ORIGIN")||window.document.location.protocol+"//"+window.document.location.hostname;this.l=b||null;this.targetOrigin="*";this.m=c;this.sessionId=null;this.channel="widget";this.F=!!a;this.v=function(e){a:if(!("*"!=d.m&&e.origin!=d.m||d.l&&e.source!=d.l||"string"!==typeof e.data)){try{var f=JSON.parse(e.data)}catch(g){break a}if(!(null==f||d.F&&(d.sessionId&&d.sessionId!=f.id||d.channel&&d.channel!=f.channel))&&f)switch(f.event){case "listening":"null"!=
e.origin&&(d.m=d.targetOrigin=e.origin);d.l=e.source;d.sessionId=f.id;d.j&&(d.j(),d.j=null);break;case "command":d.o&&(!d.s||0<=gb(d.s,f.func))&&d.o(f.func,f.args,e.origin)}}};
this.s=this.j=this.o=null;window.addEventListener("message",this.v)}
r(iw,J);iw.prototype.sendMessage=function(a,b){if(b=b||this.l){this.sessionId&&(a.id=this.sessionId);this.channel&&(a.channel=this.channel);try{var c=JSON.stringify(a);b.postMessage(c,this.targetOrigin)}catch(d){Ik(d)}}};
iw.prototype.C=function(){window.removeEventListener("message",this.v);J.prototype.C.call(this)};function jw(){this.j=[];this.isReady=!1;this.l={};var a=this.i=new iw(!!M("WIDGET_ID_ENFORCE")),b=this.Uc.bind(this);a.o=b;a.s=null;this.i.channel="widget";if(a=M("WIDGET_ID"))this.i.sessionId=a}
l=jw.prototype;l.Uc=function(a,b,c){"addEventListener"===a&&b?(a=b[0],this.l[a]||"onReady"===a||(this.addEventListener(a,kw(this,a)),this.l[a]=!0)):this.Db(a,b,c)};
l.Db=function(){};
function kw(a,b){return function(c){return a.sendMessage(b,c)}}
l.addEventListener=function(){};
l.Hc=function(){this.isReady=!0;this.sendMessage("initialDelivery",this.pb());this.sendMessage("onReady");hb(this.j,this.ic,this);this.j=[]};
l.pb=function(){return null};
function lw(a,b){a.sendMessage("infoDelivery",b)}
l.ic=function(a){this.isReady?this.i.sendMessage(a):this.j.push(a)};
l.sendMessage=function(a,b){this.ic({event:a,info:void 0===b?null:b})};
l.dispose=function(){this.i=null};var mw=new Set("endSeconds startSeconds mediaContentUrl suggestedQuality videoId rct rctn".split(" "));function nw(a){return(0===a.search("cue")||0===a.search("load"))&&"loadModule"!==a}
function ow(a,b,c){if("string"===typeof a)return{videoId:a,startSeconds:b,suggestedQuality:c};b={};c=p(mw);for(var d=c.next();!d.done;d=c.next())d=d.value,a[d]&&(b[d]=a[d]);return b}
function pw(a,b,c,d){if(Ta(a)&&!Array.isArray(a)){b="playlist list listType index startSeconds suggestedQuality".split(" ");c={};for(d=0;d<b.length;d++){var e=b[d];a[e]&&(c[e]=a[e])}return c}b={index:b,startSeconds:c,suggestedQuality:d};"string"===typeof a&&16===a.length?b.list="PL"+a:b.playlist=a;return b}
;function qw(a){jw.call(this);this.listeners=[];this.api=a;this.addEventListener("onReady",this.onReady.bind(this));this.addEventListener("onVideoProgress",this.ed.bind(this));this.addEventListener("onVolumeChange",this.fd.bind(this));this.addEventListener("onApiChange",this.Yc.bind(this));this.addEventListener("onPlaybackQualityChange",this.bd.bind(this));this.addEventListener("onPlaybackRateChange",this.cd.bind(this));this.addEventListener("onStateChange",this.dd.bind(this));this.addEventListener("onWebglSettingsChanged",
this.gd.bind(this))}
r(qw,jw);l=qw.prototype;
l.Db=function(a,b,c){if(this.api.isExternalMethodAvailable(a,c)){b=b||[];if(0<b.length&&nw(a)){var d=b;if(Ta(d[0])&&!Array.isArray(d[0]))var e=d[0];else switch(e={},a){case "loadVideoById":case "cueVideoById":e=ow(d[0],void 0!==d[1]?Number(d[1]):void 0,d[2]);break;case "loadVideoByUrl":case "cueVideoByUrl":e=d[0];"string"===typeof e&&(e={mediaContentUrl:e,startSeconds:void 0!==d[1]?Number(d[1]):void 0,suggestedQuality:d[2]});b:{if((d=e.mediaContentUrl)&&(d=/\/([ve]|embed)\/([^#?]+)/.exec(d))&&d[2]){d=
d[2];break b}d=null}e.videoId=d;e=ow(e);break;case "loadPlaylist":case "cuePlaylist":e=pw(d[0],d[1],d[2],d[3])}b.length=1;b[0]=e}this.api.handleExternalCall(a,b,c);nw(a)&&lw(this,this.pb())}};
l.onReady=function(){var a=this.Hc.bind(this);this.i.j=a;a=this.api.getVideoData();!1===a.isPlayable&&this.sendMessage("onError",a.errorCode)};
l.addEventListener=function(a,b){this.listeners.push({eventType:a,listener:b});this.api.addEventListener(a,b)};
l.pb=function(){if(!this.api)return null;var a=this.api.getApiInterface();mb(a,"getVideoData");for(var b={apiInterface:a},c=0,d=a.length;c<d;c++){var e=a[c];if(0===e.search("get")||0===e.search("is")){var f=0;0===e.search("get")?f=3:0===e.search("is")&&(f=2);f=e.charAt(f).toLowerCase()+e.substr(f+1);try{var g=this.api[e]();b[f]=g}catch(h){}}}b.videoData=this.api.getVideoData();b.currentTimeLastUpdated_=Date.now()/1E3;return b};
l.dd=function(a){a={playerState:a,currentTime:this.api.getCurrentTime(),duration:this.api.getDuration(),videoData:this.api.getVideoData(),videoStartBytes:0,videoBytesTotal:this.api.getVideoBytesTotal(),videoLoadedFraction:this.api.getVideoLoadedFraction(),playbackQuality:this.api.getPlaybackQuality(),availableQualityLevels:this.api.getAvailableQualityLevels(),currentTimeLastUpdated_:Date.now()/1E3,playbackRate:this.api.getPlaybackRate(),mediaReferenceTime:this.api.getMediaReferenceTime()};this.api.getVideoUrl&&
(a.videoUrl=this.api.getVideoUrl());this.api.getVideoContentRect&&(a.videoContentRect=this.api.getVideoContentRect());this.api.getProgressState&&(a.progressState=this.api.getProgressState());this.api.getPlaylist&&(a.playlist=this.api.getPlaylist());this.api.getPlaylistIndex&&(a.playlistIndex=this.api.getPlaylistIndex());this.api.getStoryboardFormat&&(a.storyboardFormat=this.api.getStoryboardFormat());lw(this,a)};
l.bd=function(a){lw(this,{playbackQuality:a})};
l.cd=function(a){lw(this,{playbackRate:a})};
l.Yc=function(){for(var a=this.api.getOptions(),b={namespaces:a},c=0,d=a.length;c<d;c++){var e=a[c],f=this.api.getOptions(e);b[e]={options:f};for(var g=0,h=f.length;g<h;g++){var k=f[g],m=this.api.getOption(e,k);b[e][k]=m}}this.sendMessage("apiInfoDelivery",b)};
l.fd=function(){lw(this,{muted:this.api.isMuted(),volume:this.api.getVolume()})};
l.ed=function(a){a={currentTime:a,videoBytesLoaded:this.api.getVideoBytesLoaded(),videoLoadedFraction:this.api.getVideoLoadedFraction(),currentTimeLastUpdated_:Date.now()/1E3,playbackRate:this.api.getPlaybackRate(),mediaReferenceTime:this.api.getMediaReferenceTime()};this.api.getProgressState&&(a.progressState=this.api.getProgressState());lw(this,a)};
l.gd=function(){var a={sphericalProperties:this.api.getSphericalProperties()};lw(this,a)};
l.dispose=function(){jw.prototype.dispose.call(this);for(var a=0;a<this.listeners.length;a++){var b=this.listeners[a];this.api.removeEventListener(b.eventType,b.listener)}this.listeners=[]};function rw(a){J.call(this);this.j={};this.started=!1;this.connection=a;this.connection.subscribe("command",this.cc,this)}
r(rw,J);l=rw.prototype;l.start=function(){this.started||this.i()||(this.started=!0,this.connection.va("RECEIVING"))};
l.va=function(a,b){this.started&&!this.i()&&this.connection.va(a,b)};
l.cc=function(a,b,c){if(this.started&&!this.i()){var d=b||{};switch(a){case "addEventListener":"string"===typeof d.event&&this.addListener(d.event);break;case "removeEventListener":"string"===typeof d.event&&this.removeListener(d.event);break;default:this.api.isReady()&&this.api.isExternalMethodAvailable(a,c||null)&&(b=sw(a,b||{}),c=this.api.handleExternalCall(a,b,c||null),(c=tw(a,c))&&this.va(a,c))}}};
l.addListener=function(a){if(!(a in this.j)){var b=this.Zc.bind(this,a);this.j[a]=b;this.addEventListener(a,b)}};
l.Zc=function(a,b){this.started&&!this.i()&&this.connection.va(a,this.ob(a,b))};
l.ob=function(a,b){if(null!=b)return{value:b}};
l.removeListener=function(a){a in this.j&&(this.removeEventListener(a,this.j[a]),delete this.j[a])};
l.C=function(){var a=this.connection;a.i()||pi(a.j,"command",this.cc,this);this.connection=null;for(var b in this.j)this.j.hasOwnProperty(b)&&this.removeListener(b);J.prototype.C.call(this)};function uw(a,b){rw.call(this,b);this.api=a;this.start()}
r(uw,rw);uw.prototype.addEventListener=function(a,b){this.api.addEventListener(a,b)};
uw.prototype.removeEventListener=function(a,b){this.api.removeEventListener(a,b)};
function sw(a,b){switch(a){case "loadVideoById":return a=ow(b),[a];case "cueVideoById":return a=ow(b),[a];case "loadVideoByPlayerVars":return[b];case "cueVideoByPlayerVars":return[b];case "loadPlaylist":return a=pw(b),[a];case "cuePlaylist":return a=pw(b),[a];case "seekTo":return[b.seconds,b.allowSeekAhead];case "playVideoAt":return[b.index];case "setVolume":return[b.volume];case "setPlaybackQuality":return[b.suggestedQuality];case "setPlaybackRate":return[b.suggestedRate];case "setLoop":return[b.loopPlaylists];
case "setShuffle":return[b.shufflePlaylist];case "getOptions":return[b.module];case "getOption":return[b.module,b.option];case "setOption":return[b.module,b.option,b.value];case "handleGlobalKeyDown":return[b.keyCode,b.shiftKey,b.ctrlKey,b.altKey,b.metaKey,b.key,b.code]}return[]}
function tw(a,b){switch(a){case "isMuted":return{muted:b};case "getVolume":return{volume:b};case "getPlaybackRate":return{playbackRate:b};case "getAvailablePlaybackRates":return{availablePlaybackRates:b};case "getVideoLoadedFraction":return{videoLoadedFraction:b};case "getPlayerState":return{playerState:b};case "getCurrentTime":return{currentTime:b};case "getPlaybackQuality":return{playbackQuality:b};case "getAvailableQualityLevels":return{availableQualityLevels:b};case "getDuration":return{duration:b};
case "getVideoUrl":return{videoUrl:b};case "getVideoEmbedCode":return{videoEmbedCode:b};case "getPlaylist":return{playlist:b};case "getPlaylistIndex":return{playlistIndex:b};case "getOptions":return{options:b};case "getOption":return{option:b}}}
uw.prototype.ob=function(a,b){switch(a){case "onReady":return;case "onStateChange":return{playerState:b};case "onPlaybackQualityChange":return{playbackQuality:b};case "onPlaybackRateChange":return{playbackRate:b};case "onError":return{errorCode:b}}return rw.prototype.ob.call(this,a,b)};
uw.prototype.C=function(){rw.prototype.C.call(this);delete this.api};function vw(a){a=void 0===a?!1:a;J.call(this);this.j=new L(a);qe(this,this.j)}
ab(vw,J);vw.prototype.subscribe=function(a,b,c){return this.i()?0:this.j.subscribe(a,b,c)};
vw.prototype.m=function(a,b){this.i()||this.j.oa.apply(this.j,arguments)};function ww(a,b,c){vw.call(this);this.l=a;this.destination=b;this.id=c}
r(ww,vw);ww.prototype.va=function(a,b){this.i()||this.l.va(this.destination,this.id,a,b)};
ww.prototype.C=function(){this.destination=this.l=null;vw.prototype.C.call(this)};function xw(a,b,c){J.call(this);this.destination=a;this.origin=c;this.j=iq(window,"message",this.l.bind(this));this.connection=new ww(this,a,b);qe(this,this.connection)}
r(xw,J);xw.prototype.va=function(a,b,c,d){this.i()||a!==this.destination||(a={id:b,command:c},d&&(a.data=d),this.destination.postMessage(ug(a),this.origin))};
xw.prototype.l=function(a){if(!this.i()&&a.origin===this.origin){var b=a.data;if("string"===typeof b){try{b=JSON.parse(b)}catch(d){return}if(b.command){var c=this.connection;c.i()||c.m("command",b.command,b.data,a.origin)}}}};
xw.prototype.C=function(){jq(this.j);this.destination=null;J.prototype.C.call(this)};function yw(a){a=a||{};var b={},c={};this.url=a.url||"";this.args=a.args||vb(b);this.assets=a.assets||{};this.attrs=a.attrs||vb(c);this.fallback=a.fallback||null;this.fallbackMessage=a.fallbackMessage||null;this.html5=!!a.html5;this.disable=a.disable||{};this.loaded=!!a.loaded;this.messages=a.messages||{}}
yw.prototype.clone=function(){var a=new yw,b;for(b in this)if(this.hasOwnProperty(b)){var c=this[b];"object"==Ra(c)?a[b]=vb(c):a[b]=c}return a};var zw=/cssbin\/(?:debug-)?([a-zA-Z0-9_-]+?)(?:-2x|-web|-rtl|-vfl|.css)/;function Aw(a){a=a||"";if(window.spf){var b=a.match(zw);spf.style.load(a,b?b[1]:"",void 0)}else Bw(a)}
function Bw(a){var b=Cw(a),c=document.getElementById(b),d=c&&xv(c,"loaded");d||c&&!d||(c=Dw(a,b,function(){xv(c,"loaded")||(vv(c),yq(b),al($a(zq,b),0))}))}
function Dw(a,b,c){var d=document.createElement("link");d.id=b;d.onload=function(){c&&setTimeout(c,0)};
a=Lb(a);gc(d,a);(document.getElementsByTagName("head")[0]||document.body).appendChild(d);return d}
function Cw(a){var b=ff("A");Db("This URL is never added to the DOM");fc(b,new Ob(a,Pb));a=b.href.replace(/^[a-zA-Z]+:\/\//,"//");return"css-"+kc(a)}
;function Ew(){J.call(this);this.j=[]}
r(Ew,J);Ew.prototype.C=function(){for(;this.j.length;){var a=this.j.pop();a.target.removeEventListener(a.name,a.callback,void 0)}J.prototype.C.call(this)};function Fw(){Ew.apply(this,arguments)}
r(Fw,Ew);function Gw(a,b,c,d){J.call(this);var e=this;this.v=b;this.webPlayerContextConfig=d;this.da=!1;this.api={};this.W=this.s=null;this.K=new L;this.j={};this.R=this.X=this.elementId=this.qa=this.config=null;this.P=!1;this.m=this.F=null;this.ka={};this.Pa=["onReady"];this.lastError=null;this.Ea=NaN;this.J={};this.Qa=new Fw(this);this.T=0;this.l=this.o=a;qe(this,this.K);Hw(this);Iw(this);qe(this,this.Qa);c?this.T=al(function(){e.loadNewVideoConfig(c)},0):d&&(Jw(this),Kw(this))}
r(Gw,J);l=Gw.prototype;l.getId=function(){return this.v};
l.loadNewVideoConfig=function(a){if(!this.i()){this.T&&(bl(this.T),this.T=0);var b=a||{};b instanceof yw||(b=new yw(b));this.config=b;this.setConfig(a);Kw(this);this.isReady()&&Lw(this)}};
function Jw(a){var b;a.webPlayerContextConfig?b=a.webPlayerContextConfig.rootElementId:b=a.config.attrs.id;a.elementId=b||a.elementId;"video-player"===a.elementId&&(a.elementId=a.v,a.webPlayerContextConfig?a.webPlayerContextConfig.rootElementId=a.v:a.config.attrs.id=a.v);var c;(null==(c=a.l)?void 0:c.id)===a.elementId&&(a.elementId+="-player",a.webPlayerContextConfig?a.webPlayerContextConfig.rootElementId=a.elementId:a.config.attrs.id=a.elementId)}
l.setConfig=function(a){this.qa=a;this.config=Mw(a);Jw(this);if(!this.X){var b;this.X=Nw(this,(null==(b=this.config.args)?void 0:b.jsapicallback)||"onYouTubePlayerReady")}this.config.args?this.config.args.jsapicallback=null:this.config.args={jsapicallback:null};var c;if(null==(c=this.config)?0:c.attrs)a=this.config.attrs,(b=a.width)&&this.l&&(this.l.style.width=Kh(Number(b)||b)),(a=a.height)&&this.l&&(this.l.style.height=Kh(Number(a)||a))};
function Lw(a){if(a.config&&!0!==a.config.loaded)if(a.config.loaded=!0,!a.config.args||"0"!==a.config.args.autoplay&&0!==a.config.args.autoplay&&!1!==a.config.args.autoplay){var b;a.api.loadVideoByPlayerVars(null!=(b=a.config.args)?b:null)}else a.api.cueVideoByPlayerVars(a.config.args)}
function Ow(a){var b=!0,c=Pw(a);c&&a.config&&(a=Qw(a),b=xv(c,"version")===a);return b&&!!B("yt.player.Application.create")}
function Kw(a){if(!a.i()&&!a.P){var b=Ow(a);if(b&&"html5"===(Pw(a)?"html5":null))a.R="html5",a.isReady()||Rw(a);else if(Sw(a),a.R="html5",b&&a.m&&a.o)a.o.appendChild(a.m),Rw(a);else{a.config&&(a.config.loaded=!0);var c=!1;a.F=function(){c=!0;var d=Tw(a,"player_bootstrap_method")?B("yt.player.Application.createAlternate")||B("yt.player.Application.create"):B("yt.player.Application.create");var e=a.config?Mw(a.config):void 0;d&&d(a.o,e,a.webPlayerContextConfig);Rw(a)};
a.P=!0;b?a.F():(Bv(Qw(a),a.F),(b=Uw(a))&&Aw(b),Vw(a)&&!c&&z("yt.player.Application.create",null))}}}
function Pw(a){var b=ef(a.elementId);!b&&a.l&&a.l.querySelector&&(b=a.l.querySelector("#"+a.elementId));return b}
function Rw(a){if(!a.i()){var b=Pw(a),c=!1;b&&b.getApiInterface&&b.getApiInterface()&&(c=!0);if(c){a.P=!1;if(!Tw(a,"html5_remove_not_servable_check_killswitch")){var d;if((null==b?0:b.isNotServable)&&a.config&&(null==b?0:b.isNotServable(null==(d=a.config.args)?void 0:d.video_id)))return}Ww(a)}else a.Ea=al(function(){Rw(a)},50)}}
function Ww(a){Hw(a);a.da=!0;var b=Pw(a);if(b){a.s=Xw(a,b,"addEventListener");a.W=Xw(a,b,"removeEventListener");var c=b.getApiInterface();c=c.concat(b.getInternalApiInterface());for(var d=a.api,e=0;e<c.length;e++){var f=c[e];d[f]||(d[f]=Xw(a,b,f))}}for(var g in a.j)a.j.hasOwnProperty(g)&&a.s&&a.s(g,a.j[g]);Lw(a);a.X&&a.X(a.api);a.K.oa("onReady",a.api)}
function Xw(a,b,c){var d=b[c];return function(){var e=Ma.apply(0,arguments);try{return a.lastError=null,d.apply(b,e)}catch(f){"sendAbandonmentPing"!==c&&(f.params=c,a.lastError=f,Wr(f))}}}
function Hw(a){a.da=!1;if(a.W)for(var b in a.j)a.j.hasOwnProperty(b)&&a.W(b,a.j[b]);for(var c in a.J)a.J.hasOwnProperty(c)&&bl(Number(c));a.J={};a.s=null;a.W=null;b=a.api;for(var d in b)b.hasOwnProperty(d)&&(b[d]=null);b.addEventListener=function(e,f){a.addEventListener(e,f)};
b.removeEventListener=function(e,f){a.removeEventListener(e,f)};
b.destroy=function(){a.dispose()};
b.getLastError=function(){return a.getLastError()};
b.getPlayerType=function(){return a.getPlayerType()};
b.getCurrentVideoConfig=function(){return a.qa};
b.loadNewVideoConfig=function(e){a.loadNewVideoConfig(e)};
b.isReady=function(){return a.isReady()}}
l.isReady=function(){return this.da};
function Iw(a){a.addEventListener("WATCH_LATER_VIDEO_ADDED",function(b){yq("WATCH_LATER_VIDEO_ADDED",b)});
a.addEventListener("WATCH_LATER_VIDEO_REMOVED",function(b){yq("WATCH_LATER_VIDEO_REMOVED",b)})}
l.addEventListener=function(a,b){var c=this,d=Nw(this,b);d&&(0<=gb(this.Pa,a)||this.j[a]||(b=Yw(this,a),this.s&&this.s(a,b)),this.K.subscribe(a,d),"onReady"===a&&this.isReady()&&al(function(){d(c.api)},0))};
l.removeEventListener=function(a,b){this.i()||(b=Nw(this,b))&&pi(this.K,a,b)};
function Nw(a,b){var c=b;if("string"===typeof b){if(a.ka[b])return a.ka[b];c=function(){var d=Ma.apply(0,arguments),e=B(b);if(e)try{e.apply(y,d)}catch(f){Vr(f)}};
a.ka[b]=c}return c?c:null}
function Yw(a,b){var c="ytPlayer"+b+a.v;a.j[b]=c;y[c]=function(d){var e=al(function(){if(!a.i()){try{a.K.oa(b,null!=d?d:void 0)}catch(h){Wr(new S("PlayerProxy error when creating global callback",{error:h,event:b,playerId:a.v,data:d}))}var f=a.J,g=String(e);g in f&&delete f[g]}},0);
sb(a.J,String(e))};
return c}
l.getPlayerType=function(){return this.R||(Pw(this)?"html5":null)};
l.getLastError=function(){return this.lastError};
function Sw(a){a.cancel();Hw(a);a.R=null;a.config&&(a.config.loaded=!1);var b=Pw(a);b&&(Ow(a)||!Vw(a)?a.m=b:(b&&b.destroy&&b.destroy(),a.m=null));if(a.o)for(a=a.o;b=a.firstChild;)a.removeChild(b)}
l.cancel=function(){this.F&&Hv(Qw(this),this.F);bl(this.Ea);this.P=!1};
l.C=function(){Sw(this);if(this.m&&this.config&&this.m.destroy)try{this.m.destroy()}catch(b){Vr(b)}this.ka=null;for(var a in this.j)this.j.hasOwnProperty(a)&&(y[this.j[a]]=null);this.qa=this.config=this.api=null;delete this.o;delete this.l;J.prototype.C.call(this)};
function Vw(a){var b,c;a=null==(b=a.config)?void 0:null==(c=b.args)?void 0:c.fflags;return!!a&&-1!==a.indexOf("player_destroy_old_version=true")}
function Qw(a){return a.webPlayerContextConfig?a.webPlayerContextConfig.jsUrl:(a=a.config.assets)?a.js:""}
function Uw(a){return a.webPlayerContextConfig?a.webPlayerContextConfig.cssUrl:(a=a.config.assets)?a.css:""}
function Tw(a,b){if(a.webPlayerContextConfig)var c=a.webPlayerContextConfig.serializedExperimentFlags;else{var d;if(null==(d=a.config)?0:d.args)c=a.config.args.fflags}return"true"===Ok(c||"","&")[b]}
function Mw(a){for(var b={},c=p(Object.keys(a)),d=c.next();!d.done;d=c.next()){d=d.value;var e=a[d];b[d]="object"===typeof e?vb(e):e}return b}
;var Zw={},$w="player_uid_"+(1E9*Math.random()>>>0);function ax(a,b,c){var d="player";c=void 0===c?!0:c;d="string"===typeof d?ef(d):d;var e=$w+"_"+Ua(d),f=Zw[e];if(f&&c)return bx(a,b)?f.api.loadVideoByPlayerVars(a.args||null):f.loadNewVideoConfig(a),f.api;f=new Gw(d,e,a,b);Zw[e]=f;yq("player-added",f.api);re(f,function(){delete Zw[f.getId()]});
return f.api}
function bx(a,b){return b&&b.serializedExperimentFlags?b.serializedExperimentFlags.includes("web_player_remove_playerproxy=true"):a&&a.args&&a.args.fflags?a.args.fflags.includes("web_player_remove_playerproxy=true"):!1}
;var cx=null,dx=null,ex=null;function fx(){gx()}
function hx(){gx()}
function gx(){var a=cx.getVideoData(1);a=a.title?a.title+" - YouTube":"YouTube";document.title!==a&&(document.title=a)}
;function ix(a,b,c){a="ST-"+kc(a).toString(36);b=b?tc(b):"";c=c||5;Ds()&&rl(a,b,c)}
;function jx(a,b,c){b=void 0===b?{}:b;c=void 0===c?!1:c;var d=M("EVENT_ID");d&&(b.ei||(b.ei=d));if(b){d=a;var e=void 0===e?!0:e;var f=M("VALID_SESSION_TEMPDATA_DOMAINS",[]),g=oc(window.location.href);g&&f.push(g);g=oc(d);if(0<=gb(f,g)||!g&&0==d.lastIndexOf("/",0))if(P("autoescape_tempdata_url")&&(f=document.createElement("a"),fc(f,d),d=f.href),d&&(d=pc(d),f=d.indexOf("#"),d=0>f?d:d.slice(0,f)))if(e&&!b.csn&&(b.itct||b.ved)&&(b=Object.assign({csn:ns()},b)),h){var h=parseInt(h,10);isFinite(h)&&0<h&&
ix(d,b,h)}else ix(d,b)}if(c)return!1;if((window.ytspf||{}).enabled)spf.navigate(a);else{var k=void 0===k?{}:k;var m=void 0===m?"":m;var q=void 0===q?window:q;c=q.location;a=vc(a,k)+m;var t=void 0===t?Jh:t;a:{t=void 0===t?Jh:t;for(k=0;k<t.length;++k)if(m=t[k],m instanceof Hh&&m.isValid(a)){t=new Ob(a,Pb);break a}t=void 0}c.href=Qb(t||Sb)}return!0}
;z("yt.setConfig",yk);z("yt.config.set",yk);z("yt.setMsg",ss);z("yt.msgs.set",ss);z("yt.logging.errors.log",Vr);
z("writeEmbed",function(){var a=M("PLAYER_CONFIG");if(!a){var b=M("PLAYER_VARS");b&&(a={args:b})}Ms(!0);"gvn"===a.args.ps&&(document.body.style.backgroundColor="transparent");a.attrs||(a.attrs={width:"100%",height:"100%",id:"video-player"});var c=document.referrer;b=M("POST_MESSAGE_ORIGIN");window!==window.top&&c&&c!==document.URL&&(a.args.loaderUrl=c);P("embeds_js_api_set_1p_cookie")&&(c=Tk(window.location.href),c.embedsTokenValue&&(a.args.embedsTokenValue=c.embedsTokenValue));lu();if((c=M("WEB_PLAYER_CONTEXT_CONFIGS"))&&
"WEB_PLAYER_CONTEXT_CONFIG_ID_EMBEDDED_PLAYER"in c){c=c.WEB_PLAYER_CONTEXT_CONFIG_ID_EMBEDDED_PLAYER;if(!c.serializedForcedExperimentIds){var d=Tk(window.location.href);d.forced_experiments&&(c.serializedForcedExperimentIds=d.forced_experiments)}cx=ax(a,c,!1)}else cx=ax(a);cx.addEventListener("onVideoDataChange",fx);cx.addEventListener("onReady",hx);a=M("POST_MESSAGE_ID","player");M("ENABLE_JS_API")?ex=new qw(cx):M("ENABLE_POST_API")&&"string"===typeof a&&"string"===typeof b&&(dx=new xw(window.parent,
a,b),ex=new uw(cx,dx.connection));Kv();P("ytidb_create_logger_embed_killswitch")||km();a={};dw||(dw=new cw);dw.install((a.flush_logs={callback:function(){Wq()}},a));
P("embeds_web_enable_new_nwl")?To():ap();P("ytidb_clear_embedded_player")&&Rh.S(function(){var e;if(!Uu){var f=Xs(),g={xb:Tu,mc:Su};f.providers.set(g.xb,g);g={Lb:{feedbackEndpoint:ht(Ou),modifyChannelNotificationPreferenceEndpoint:ht(Pu),playlistEditEndpoint:ht(Qu),subscribeEndpoint:ht(Mu),unsubscribeEndpoint:ht(Nu),webPlayerShareEntityServiceEndpoint:ht(Ru)}};var h=P("web_enable_client_location_service")?dt.getInstance():void 0,k={};h&&(k.client_location=h);if(void 0===m){Ns.i||(Ns.i=new Ns);var m=
Ns.i}void 0===e&&(e=f.resolve(Tu));Au(g,e,m,k);m={xb:Fu,nc:zu.i};f.providers.set(m.xb,m);Uu=zu.i}uv()})});
var kx=Gk(function(){qu();var a=ul.getInstance(),b=xl(119),c=1<window.devicePixelRatio;if(document.body&&ci(document.body,"exp-invert-logo"))if(c&&!ci(document.body,"inverted-hdpi")){var d=document.body;if(d.classList)d.classList.add("inverted-hdpi");else if(!ci(d,"inverted-hdpi")){var e=ai(d);bi(d,e+(0<e.length?" inverted-hdpi":"inverted-hdpi"))}}else!c&&ci(document.body,"inverted-hdpi")&&di();if(b!=c){b="f"+(Math.floor(119/31)+1);d=yl(b)||0;d=c?d|67108864:d&-67108865;0==d?delete tl[b]:(c=d.toString(16),
tl[b]=c.toString());c=!0;P("web_secure_pref_cookie_killswitch")&&(c=!1);b=a.i;d=[];for(var f in tl)d.push(f+"="+encodeURIComponent(String(tl[f])));rl(b,d.join("&"),63072E3,a.j,c)}dv.i||(dv.i=new dv);a=dv.i;f=16623;var g=void 0===g?{}:g;Object.values(ts).includes(f)||(Wr(new S("createClientScreen() called with a non-page VE",f)),f=83769);g.isHistoryNavigation||a.i.push({rootVe:f,key:g.key||""});a.o=[];a.N=[];g.Ob?gv(a,f,g):hv(a,f,g)}),lx=Gk(function(){cx&&cx.sendAbandonmentPing&&cx.sendAbandonmentPing();
M("PL_ATT")&&Sv.dispose();for(var a=Rh,b=0,c=Iv.length;b<c;b++)a.fa(Iv[b]);Iv.length=0;Gv("//static.doubleclick.net/instream/ad_status.js");Jv=!1;yk("DCLKSTAT",0);pe(ex,dx);cx&&(cx.removeEventListener("onVideoDataChange",fx),cx.destroy())});
window.addEventListener?(window.addEventListener("load",kx),window.addEventListener("pagehide",lx)):window.attachEvent&&(window.attachEvent("onload",kx),window.attachEvent("onunload",lx));z("yt.abuse.player.botguardInitialized",B("yt.abuse.player.botguardInitialized")||Tv);z("yt.abuse.player.invokeBotguard",B("yt.abuse.player.invokeBotguard")||Uv);z("yt.abuse.dclkstatus.checkDclkStatus",B("yt.abuse.dclkstatus.checkDclkStatus")||Nv);z("yt.player.exports.navigate",B("yt.player.exports.navigate")||jx);
z("yt.util.activity.init",B("yt.util.activity.init")||nq);z("yt.util.activity.getTimeSinceActive",B("yt.util.activity.getTimeSinceActive")||qq);z("yt.util.activity.setTimestamp",B("yt.util.activity.setTimestamp")||oq);}).call(this);
