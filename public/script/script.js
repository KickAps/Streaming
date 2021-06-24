// ==UserScript==
// @name         Channel Stream
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Free Channel!
// @author       RLucas
// @match        https://embed-channel.stream/*
// @match        https://teleriumtv.net/*
// @match        https://teleriumtv.com/*
// @match        https://firedata.alwaysdata.net/tv*
// @icon         https://www.google.com/s2/favicons?domain=embed-channel.stream
// @grant        none
// @webRequest   [{"selector":"*histats.com*","action":"cancel"},{"selector":"*cornerbut.com*","action":"cancel"},{"selector":"*sfp.js*","action":"cancel"},{"selector":"*advertisers.js","action":"cancel"},{"selector":"*dcn.espncdn.shop/nwm-dbh.min3.js","action":"cancel"},{"selector":"https://teleriumtv.com/embed/34833.html","action":"cancel"},{"selector":"*googletagmanager.com*","action":"cancel"},{"selector":"*smokingpetty.com*","action":"cancel"},{"selector":"*pubdirecte.com*","action":"cancel"},{"selector":"*cloudfront.net*","action":"cancel"},{"selector":"*deloplen.com*","action":"cancel"}]
// ==/UserScript==

(function() {
    'use strict';
    document.body.setAttribute('module','tvStream');

    //AJOUT DU CSS SUR LA PAGE
    var css = '#overlay,.clappr-watermark,.tb .tb-col a{display: none!important;}',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');
    head.appendChild(style);

    style.type = 'text/css';
    if (style.styleSheet){// This is required for IE8 and below.
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
    // Your code here...
    var mousemove=0;var elmnt=document.querySelector('#playerdiv');
    document.body.onmousemove = event => {
        mousemove=4;
        elmnt=document.querySelector('#playerdiv');
        if(elmnt && elmnt.classList.contains('show-controls')==false){
            elmnt.classList.add('show-controls');
        }
    }
    setInterval(function(){
        if(mousemove>0){
            mousemove--;
        }else{
            elmnt=document.querySelector('#playerdiv');
            if(elmnt && elmnt.classList.contains('show-controls')){
                elmnt.classList.remove('show-controls');
            }

        }
    },500);
})();
