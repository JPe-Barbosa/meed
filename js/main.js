"use strict";

const htmlTag = document.querySelector('html');
const bodyTag = document.querySelector('body');
const myNav = document.querySelector('nav');
const myElem = document.querySelector('nav li a');
const myNavColapsed = document.getElementById("myNavColapsed");
const botao = document.getElementById("botao");
const i=false;

let scrolled = () => {
    let dec = scrollY / (bodyTag.scrollHeight - innerHeight);
    return Math.floor(dec * 1500);
}

    function colapsedChange(){
        myNav.style.setProperty('background',scrolled() > 175 ?
        "var(--color1)" : "");
        myNavColapsed.style.setProperty('background',scrolled() > 175 ?
        "var(--color1)" : "");
    }
    $(document).ready(function(){
        $(document).on('click', 'botao', function(){
            alert("Eu sou um alert!");

        myNav.style.setProperty('background', "var(--color1)");
        myNavColapsed.style.setProperty('background', "var(--color1)");
        if(i == false){
            colapsedChange();
            i = true;
            break;
        }
        i = false;
        });
    });
    
    function vtnc(){
        alert("Eu sou um alert!");

        myNav.style.setProperty('background', "var(--color1)");
        myNavColapsed.style.setProperty('background', "var(--color1)");
        if(i == false){
            colapsedChange();
            i = true;
            break;
        }
        i = false;
    }

    addEventListener('scroll', () => { 
    if(screen.width > 576){   
        myNav.style.setProperty('background',scrolled() > 250 ?
        "var(--color1)" : "var(--color2)");
    }else{
        colapsedChange();
    }
    

})



