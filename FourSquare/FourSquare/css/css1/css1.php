<style>
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu{
	
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
  
}
#cssmenu #menu-button {
  display: none;
  
}
#cssmenu {
  width: auto;
  font-family: Raleway, sans-serif;
  line-height: 1;
  
  
}
#cssmenu > ul {
  background: #0099cc;
  background:#28281E;
}
#cssmenu > ul > li {
  float: left;
  -webkit-perspective: 1000px;
  -moz-perspective: 1000px;
  perspective: 1000px;
  
}
#cssmenu > ul > li > a {
  padding: 16px 20px;
  font-size: 14px;
  color: #ffffff;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  background: #0099cc;
  background:#28281E;
  -webkit-transition: all .3s;
  -moz-transition: all .3s;
  -o-transition: all .3s;
  transition: all .3s;
  -webkit-transform-origin: 50% 0;
  -moz-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
#cssmenu > ul > li.active > a {
  color: white;
  font-weight: bold;
  background: #19799f;
  
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li > a:hover {
  color: #dff2fa;
  -webkit-transform: rotateX(90deg) translateY(-23px);
  -moz-transform: rotateX(90deg) translateY(-23px);
  transform: rotateX(90deg) translateY(-23px);
  -ms-transform: none;
}
#cssmenu > ul > li > a:before {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: -1;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%;
  height: 100%;
  padding: 16px 20px;
  color: #dff2fa;
  background: #216369;
  content: attr(data-title);
  -webkit-transition: background 0.3s;
  -moz-transition: background 0.3s;
  transition: background 0.3s;
  -webkit-transform: rotateX(-90deg);
  -moz-transform: rotateX(-90deg);
  transform: rotateX(-90deg);
  -webkit-transform-origin: 50% 0;
  -moz-transform-origin: 50% 0;
  transform-origin: 50% 0;
  -ms-transform: translateY(- -18px);
}
/*
#cssmenu > ul > li:hover > a::before,
#cssmenu > ul > li > a:hover::before {
  background: #3db2e1;
}
*/
</style>