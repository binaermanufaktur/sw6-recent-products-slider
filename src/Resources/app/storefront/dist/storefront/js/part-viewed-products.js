(window.webpackJsonp=window.webpackJsonp||[]).push([["part-viewed-products"],{oTv4:function(e,n){var o=window.PluginManager,t=new XMLHttpRequest;t.open("GET","/partviewedproducts/get"),t.send(null),t.onreadystatechange=function(){if(4===t.readyState)if(200===t.status&&204!=t.response){var e=document.getElementById("ViewedProductsContainer");e.innerHTML=e.innerHTML+t.response,e.style.removeProperty("style"),o.initializePlugins()}else 204==t.response?console.log("No viewed products"):console.log("Error: "+t.status)}}},[["oTv4","runtime"]]]);