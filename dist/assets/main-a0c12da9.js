document.addEventListener("DOMContentLoaded",function(){console.log("js executed..."),document.querySelectorAll('input[type="text"]').forEach(a=>{a.setAttribute("data-lpignore",!0)});const t=document.querySelector("#menu-icon"),n=document.querySelector("#menu-icon-close"),e=document.querySelector("#burger-menu");t.onclick=()=>{e.classList.toggle("menu-open")},n.onclick=()=>{e.classList.remove("menu-open")}});document.addEventListener("DOMContentLoaded",function(){anime({targets:".site-logo, .acf-form-submit input[type='submit']",opacity:[0,1],translateX:[-100,0],duration:2e3}),anime({targets:"#page-title",opacity:[0,1],translateY:[-100,0],duration:2e3}),anime({targets:".order-row",opacity:[0,1],translateY:[-100,0],duration:250,delay:anime.stagger(50),easing:"linear"}),anime({targets:".acf-field:nth-of-type(odd), .widget-form-header > *",opacity:[0,1],translateX:[-100,0],duration:500,delay:anime.stagger(150),easing:"linear"}),anime({targets:".acf-field:nth-of-type(even)",opacity:[0,1],translateX:[100,0],duration:500,delay:anime.stagger(150),easing:"linear"})});
