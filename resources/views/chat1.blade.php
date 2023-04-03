<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Chat APP</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style type="text/css">
         body{
         background-color: #f4f7f6;
         margin-top:20px;
         }
         .card {
         background: #fff;
         transition: .5s;
         border: 0;
         margin-bottom: 30px;
         border-radius: .55rem;
         position: relative;
         width: 100%;
         box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
         }
         .chat-app .people-list {
         width: 280px;
         position: absolute;
         left: 0;
         top: 0;
         padding: 20px;
         z-index: 7
         }
         .chat-app .chat {
         margin-left: 280px;
         border-left: 1px solid #eaeaea
         }
         .people-list {
         -moz-transition: .5s;
         -o-transition: .5s;
         -webkit-transition: .5s;
         transition: .5s
         }
         .people-list .chat-list li {
         padding: 10px 15px;
         list-style: none;
         border-radius: 3px
         }
         .people-list .chat-list li:hover {
         background: #efefef;
         cursor: pointer
         }
         .people-list .chat-list li.active {
         background: #efefef
         }
         .people-list .chat-list li .name {
         font-size: 15px
         }
         .people-list .chat-list img {
         width: 45px;
         border-radius: 50%
         }
         .people-list img {
         float: left;
         border-radius: 50%
         }
         .people-list .about {
         float: left;
         padding-left: 8px
         }
         .people-list .status {
         color: #999;
         font-size: 13px
         }
         .chat .chat-header {
         padding: 15px 20px;
         border-bottom: 2px solid #f4f7f6
         }
         .chat .chat-header img {
         float: left;
         border-radius: 40px;
         width: 40px
         }
         .chat .chat-header .chat-about {
         float: left;
         padding-left: 10px
         }
         .chat .chat-history {
         padding: 20px;
         border-bottom: 2px solid #fff
         }
         .chat .chat-history ul {
         padding: 0
         }
         .chat .chat-history ul li {
         list-style: none;
         margin-bottom: 30px
         }
         .chat .chat-history ul li:last-child {
         margin-bottom: 0px
         }
         .chat .chat-history .message-data {
         margin-bottom: 15px
         }
         .chat .chat-history .message-data img {
         border-radius: 40px;
         width: 40px
         }
         .chat .chat-history .message-data-time {
         color: #434651;
         padding-left: 6px
         }
         .chat .chat-history .message {
         color: #444;
         padding: 18px 20px;
         line-height: 26px;
         font-size: 16px;
         border-radius: 7px;
         display: inline-block;
         position: relative
         }
         .chat .chat-history .message:after {
         bottom: 100%;
         left: 7%;
         border: solid transparent;
         content: " ";
         height: 0;
         width: 0;
         position: absolute;
         pointer-events: none;
         border-bottom-color: #fff;
         border-width: 10px;
         margin-left: -10px
         }
         .chat .chat-history .my-message {
         background: #efefef
         }
         .chat .chat-history .my-message:after {
         bottom: 100%;
         left: 30px;
         border: solid transparent;
         content: " ";
         height: 0;
         width: 0;
         position: absolute;
         pointer-events: none;
         border-bottom-color: #efefef;
         border-width: 10px;
         margin-left: -10px
         }
         .chat .chat-history .other-message {
         background: #e8f1f3;
         text-align: right
         }
         .chat .chat-history .other-message:after {
         border-bottom-color: #e8f1f3;
         left: 93%
         }
         .chat .chat-message {
         padding: 20px
         }
         .online,
         .offline,
         .me {
         margin-right: 2px;
         font-size: 8px;
         vertical-align: middle
         }
         .online {
         color: #86c541
         }
         .offline {
         color: #e47297
         }
         .me {
         color: #1d8ecd
         }
         .float-right {
         float: right
         }
         .clearfix:after {
         visibility: hidden;
         display: block;
         font-size: 0;
         content: " ";
         clear: both;
         height: 0
         }
         @media only screen and (max-width: 767px) {
         .chat-app .people-list {
         height: 465px;
         width: 100%;
         overflow-x: auto;
         background: #fff;
         left: -400px;
         display: none
         }
         .chat-app .people-list.open {
         left: 0
         }
         .chat-app .chat {
         margin: 0
         }
         .chat-app .chat .chat-header {
         border-radius: 0.55rem 0.55rem 0 0
         }
         .chat-app .chat-history {
         height: 300px;
         overflow-x: auto
         }
         }
         @media only screen and (min-width: 768px) and (max-width: 992px) {
         .chat-app .chat-list {
         height: 650px;
         overflow-x: auto
         }
         .chat-app .chat-history {
         height: 600px;
         overflow-x: auto
         }
         }
         @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
         .chat-app .chat-list {
         height: 480px;
         overflow-x: auto
         }
         .chat-app .chat-history {
         height: calc(100vh - 350px);
         overflow-x: auto
         }

         
         }
         .read-tick {
          font-size: 10px;
          color: blue !important;
        }

        /*--------------------
Mixins
--------------------*/

@mixin center {
  position: relative;
/*  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);*/
}

@mixin ball {
  @include center;
  content: '';
  display: block;
  width: 5px;
  height: 5px;
  border-radius: 50%;
/*  background: rgba(255, 255, 255, .5);*/
  background:#888;
  z-index: 2;
  margin-top: 4px;
  animation: ball .45s cubic-bezier(0, 0, 0.15, 1) alternate infinite;
}


/*--------------------
Body
--------------------*/

*,
*::before,
*::after {
  box-sizing: border-box;
}

html,
body {
  height: 100%;
}

body {
 background: linear-gradient(135deg, #044f48, #345093);
  background-size: cover;
background:#fff;
  font-family: 'Avenir', 'Open Sans', sans-serif;
  font-size: 14px;
  line-height: 1.3;
  overflow: hidden;
}

.bg {
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 1;
  /* background: url('https://images.unsplash.com/photo-1451186859696-371d9477be93?crop=entropy&fit=crop&fm=jpg&h=975&ixjsv=2.1.0&ixlib=rb-0.3.5&q=80&w=1925') no-repeat 0 0;*/
  filter: blur(80px);
  transform: scale(1.2);
 background: #fff;
}


/*--------------------
Chat
--------------------*/

.chat {
  @include center;
  width: 100%;
  height: calc(100% - 15px);
  max-height: 500px;
  z-index: 10;
  overflow: hidden;
  /*box-shadow: 0 5px 30px rgba(0, 0, 0, .2);*/
  /* background: rgba(0, 0, 0, .5);*/
  background: transparent;
  border-radius: 20px;
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
}


/*--------------------
Chat Title
--------------------*/

.chat-title {
  flex: 0 1 45px;
  position: relative;
  z-index: 2;
  width:100%;
  border-bottom:1px solid #ccc;
  color: #777;
  padding-top:50px;
  padding-bottom:5px;
  background-color:#fff;
  text-transform: uppercase;
  text-align: center;

  h1,
  h2 {
    font-weight: normal;
    font-size: 14px;
    margin: 0;
    padding: 0;
 
  }
  h2 {
    /* color: rgba(255, 255, 255, .8);*/
    font-size: 11px;
    letter-spacing: 1px;
  }
  .avatar {
    position: absolute;
    z-index: 1;
    top: 8px;
    left: 9px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px;
    width: 60px;
    height: 60px;
    overflow: hidden;
    margin: 0;
    padding: 0;
    border: 1px solid #fff;
    img {
      width: 100%;
      height: auto;
    }
  }
}


/*--------------------
Messages
--------------------*/

.messages {
  flex: 1 1 auto;
  /*  color: rgba(255, 255, 255, .5);
  color: #fff;*/
  overflow: hidden;
  position: relative;
  width: 100%;
  & .messages-content {
    position: absolute;
    top: 0;
    left: 0;
    height: 101%;
    width: 100%;
  }
  .message {
    clear: both;
    float: left;
    padding: 6px 10px 7px;
    -webkit-border-radius: 20px 20px 20px 0;
    -moz-border-radius: 20px 20px 20px 0;
    border-radius: 20px 20px 20px 0; 
    background: #eee; /*rgba(0, 0, 0, 0.1);*/
    margin: 8px 0;
    font-size: 14px;
    line-height: 1.4;
    margin-left: 35px;
    position: relative;
    border:1px solid #ccc;
    /*text-shadow: 0 1px 1px rgba(0, 0, 0, .2);*/
    .timestamp {
      position: absolute;
      bottom: -15px;
      font-size: 10px;
      color: #555;
       right:30px;
      /* color: rgba(255, 255, 255, .7);*/
      
    }
    .checkmark-sent-delivered {
      position: absolute;
      bottom: -15px;
     right: 10px;
      font-size:12px;
      color:#999;
    }
    .checkmark-read {
      color:blue;
       position: absolute;
      bottom: -15px;
     right: 16px;
      font-size:12px;
    }
    &::before {
    /*  content: '';
      position: absolute;
      bottom: -6px;
      border-top: 6px solid rgba(0, 0, 0, 0.1);
      left: 0;
      border-right: 7px solid transparent;*/
    }
    .avatar {
      position: absolute;
      z-index: 1;
      bottom: -15px;
      left: -35px;
      -webkit-border-radius: 30px;
      -moz-border-radius: 30px;
      border-radius: 30px;
      width: 30px;
      height: 30px;
      overflow: hidden;
      margin: 0;
      padding: 0;
      border: 2px solid rgba(255, 255, 255, 0.5);
      img {
        width: 100%;
        height: auto;
      }
    }
    &.message-personal {
      float: right;
      text-align: right;
/*      background: linear-gradient(120deg, #ddd, #eee);*/
      background:#fff;
      border:1px solid #ccc /*#4A90E2*/;
      -webkit-border-radius: 20px 20px 0 20px;
      -moz-border-radius: 20px 20px 0 20px;
      border-radius: 20px 20px 0 20px;
    
      &::before {
        
      /*
          content:"";
      border-color:#4A90E2 transparent;
        width:0;
        border-style:solid;*/
        /*
        left: auto;
        right: 0;
        border-right: none;
       border-left: 8px solid transparent;
        border-top: 9px solid #fff;
        
        bottom: -8px;*/
      }
       
    }
    &:last-child {
      margin-bottom: 30px;
    }
    &.new {
      transform: scale(0);
      transform-origin: 0 0;
      animation: bounce 500ms linear both;
    }
    &.loading {
      &::before {
        @include ball;
        border: none;
        animation-delay: .15s;
      }
      & span {
        display: block;
        font-size: 0;
        width: 20px;
        height: 10px;
        position: relative;
        &::before {
          @include ball;
          margin-left: -7px;
        }
        &::after {
          @include ball;
          margin-left: 7px;
          animation-delay: .3s;
        }
      }
    }
  }
}


/*--------------------
Message Box
--------------------*/

.message-box {
  flex: 0 1 42px;
  width: 90%;
  background: #fff; 
  margin:2px auto;
/*-webkit-box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.4);
-moz-box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.4);
box-shadow: 0px 1px 1px 1px rgba(0,0,0,0.4);*/
  /*background: rgba(0, 0, 0, 0.3);
    border-top:1px solid #e3e3e3;*/
  padding: 10px;
  position: relative;
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px; 
  height:14px;
  border:1px solid #ccc;
 
  & .message-input {
    background: none;
    border: none;
    outline: none!important;
    resize: none; 
    /* color: rgba(255, 255, 255, .8);*/
    font-size: 15px;
    height: 24px;
    margin: 0;
    padding-right: 20px;
    width: 265px;
    color: #444;
  }
  textarea:focus:-webkit-placeholder {
    color: transparent;
  }
  & .message-submit {
    position: absolute;
    z-index: 1;
    top: 9px;
    right: 10px;
    color: #4A90E2;
    border: none;
   /* background: #c29d5f;*/
    background: #fff;
    font-size: 12px;
    text-transform: uppercase;
    line-height: 1;
    padding: 6px 10px;
    border-radius: 5px;
    outline: none!important;
    transition: background .2s ease;
    cursor:pointer;
    &:hover {
      background: #fff;
      color: #333;
    }
  }
}


/*--------------------
Custom Srollbar
--------------------*/

.mCSB_scrollTools {
  margin: 1px -3px 1px 0;
  opacity: 0;
}

.mCSB_inside > .mCSB_container {
  margin-right: 0px;
  padding: 0 10px;
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
  background-color: rgba(0, 0, 0, 0.5)!important;
}


/*--------------------
Bounce
--------------------*/

@keyframes bounce {
  0% {
    transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  4.7% {
    transform: matrix3d(0.45, 0, 0, 0, 0, 0.45, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  9.41% {
    transform: matrix3d(0.883, 0, 0, 0, 0, 0.883, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  14.11% {
    transform: matrix3d(1.141, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  18.72% {
    transform: matrix3d(1.212, 0, 0, 0, 0, 1.212, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  24.32% {
    transform: matrix3d(1.151, 0, 0, 0, 0, 1.151, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  29.93% {
    transform: matrix3d(1.048, 0, 0, 0, 0, 1.048, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  35.54% {
    transform: matrix3d(0.979, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  41.04% {
    transform: matrix3d(0.961, 0, 0, 0, 0, 0.961, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  52.15% {
    transform: matrix3d(0.991, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  63.26% {
    transform: matrix3d(1.007, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  85.49% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}

@keyframes ball {
  from {
    transform: translateY(0) scaleY(.8);
  }
  to {
    transform: translateY(-10px);
  }
}


.avenue-messenger {  
    opacity: 1;
    -webkit-border-radius: 20px;
-moz-border-radius: 20px;
border-radius: 20px;
    height: calc(100% - 60px)!important;
  max-height:460px!important;
  min-height:220px!important;
    width: 320px;
  /*  transform: translateY(0);
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
  */
    background: rgba(255, 255, 255, 0.9);
      position: fixed;
  right: 20px;
    bottom: 20px;
    margin: auto;
    z-index: 10;
    box-shadow: 2px 10px 40px rgba(22,20,19,0.4);
  /*  transform: translateX(300px);*/
    -webkit-transition: 0.3s all ease-out 0.1s, transform 0.2s ease-in;
    -moz-transition: 0.3s all ease-out 0.1s, transform 0.2s ease-in;
  
}

.avenue-messenger div.agent-face {
    position: absolute;
    left: 0;
    top: -50px;
    right: 0;
    margin: auto;
    width: 101px;
    height: 50px;
    background: transparent;
  z-index:12;
    

}


.avenue-messenger div {
    font-size: 14px;
    color:#232323;
}


.close {
  display: block;
  width: 100px;
  height: 100px;
  margin: 1em auto;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  -webkit-border-radius: 99em;
  -moz-border-radius: 99em;
  border-radius: 99em; opacity: 0.5;
  /*border: 1px solid #ccc;
  color:#ccc;*/
/* -webkit-box-shadow: 0px -1px 2px 0px rgba(0, 0, 0, 0.5);
-moz-box-shadow:    0px -1px 2px 0px rgba(0, 0, 0, 0.5);
box-shadow:         0px -1px 2px 0px rgba(0, 0, 0, 0.5);*/
}
.close:hover {/*
-webkit-box-shadow:  0 1px 1px rgba(0,0,0,0.3);
-moz-box-shadow:  0 1px 1px rgba(0,0,0,0.3);
box-shadow: 0 1px 1px rgba(0,0,0,0.3);*/
  opacity:0.9;
}

.circle {
  display: block;
  width: 80px;
  height: 80px;
  margin: 1em auto;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  -webkit-border-radius: 99em;
  -moz-border-radius: 99em;
  border-radius: 99em;
  border: 2px solid #fff; /*#4A90E2;*/
 /* -webkit-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
  -moz-box-shadow: 0px 0px 10px rgba(0,0,0,.8);
box-shadow: 0px 0px 10px rgba(0,0,0,.8);*/

}

.contact-icon .circle:hover{
 box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
  transition:0.2s all ease-out 0.2s;
  -webkit-transition:0.2s all ease-out 0.2s;
  -moz-transition:0.2s all ease-out 0.2s;
}


.arrow_box:after {
    border-color: rgba(255, 255, 255, 0);
    border-left-color: #fff;
    border-width: 5px;
    margin-top: -5px;
}
.arrow_box {
    position: relative;
    background: #fff;
    border: 1px solid #4A90E2;
}
.arrow_box:after, .arrow_box:before {
    left: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}


.menu div.items {
/*  height: 140px;
  width: 180px;
  overflow: hidden;
  position: absolute;
  left: -130px;
  z-index: 2;
  top: 20px;*/
}

.menu .items span {
    color: #111;
  z-index:12;
    font-size: 14px;
    text-align: center;
    position: absolute;
    right: 0;
  top:40px;
    height: 86px;
    line-height: 40px;
    background: #fff;
    border-left:1px solid #ccc; 
  border-bottom:1px solid #ccc;
  border-right:1px solid #ccc;
    width: 48px;
    opacity: 0;
   border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
    transition: .3s all ease-in-out;
    -webkit-transition: .3s all ease-in-out;
    -moz-transition: .3s all ease-in-out;
}

.menu .button {
    font-size: 30px;
    
    z-index:12;
    text-align: right;
    color: #333;
    content: "...";
    display: block;
    width: 48px;
    line-height: 25px;
    height: 40px;
    border-top-right-radius: 20px;
/*  border-top-left-radius:20px;*/
    position: absolute;
    right: 0;
  padding-right:10px;
  cursor: pointer;
  transition: .3s all ease-in-out;
  -webkit-transition: .3s all ease-in-out;
  -moz-transition: .3s all ease-in-out;
}
.menu .button.active {background: #ccc;}
/*
.menu .button:hover .menu .items span {
  display: block;
  left: -2px;
  opacity: 1;
}*/

.menu .items span.active {
  opacity:1;
  /*border-radius:10px;
  height: 180px;
  width: 400px;
  transform:translateY(0);
  -webkit-transform:translateY(0);
  -moz-transform:translateY(0);*/
}

.menu .items a {color:#111; text-decoration:none;}
.menu .items a:hover{color:#777}



@media only screen and (max-device-width: 667px), screen and (max-width: 450px) {
.avenue-messenger {
    z-index: 2147483001!important;
    width: 100%!important;
    height: 100%!important;
    max-height: none!important;
    top: 0!important;
    left: 0!important;
    right: 0!important;
    bottom: 0!important;
  -webkit-border-radius: 0!important;
-moz-border-radius: 0!important;
border-radius: 0!important;
  background:#fff;
}
  .avenue-messenger div.agent-face {
    top:-10px!important;
   /* left:initial !important;*/
  }
  .chat {-webkit-border-radius: 0!important;
-moz-border-radius: 0!important;
border-radius: 0!important;
  max-height:initial!important;}
  
  .chat-title {  
    padding:20px 20px 15px 10px!important;
    text-align:left;
    
  }
  .circle {
    width:80px; 
    height:80px;
    border:1px solid #fff;
  }
  .menu .button {
    border-top-right-radius:0;
  }
}

@media only screen and (min-device-width: 667px) {
div.half {

  margin: auto;
  width: 80px;
    height: 40px;
    background-color: #fff;
    border-top-left-radius: 60px;
    border-top-right-radius: 60px;
  
    border-bottom: 0;
  box-shadow:1px 4px 20px rgba(22,20,19,0.6);
  -webkit-box-shadow:1px 4px 20px rgba(22,20,19,0.6) ;
  -moz-box-shadow:1px 4px 20px rgba(22,20,19,0.6);
}
}

      </style>
   </head>
   <body>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <div class="container">
         <div class="row clearfix">
            <div class="col-lg-12">
               <div class="card chat-app">
                  <div id="plist" class="people-list">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                     </div>
                     <ul class="list-unstyled chat-list mt-2 mb-0">
                        <li class="clearfix">
                           <img src=" {{url('/images/my-pic.jpg')}} " alt="avatar">
                           <div class="about">
                              <div class="name">Muhammad Abid</div>
                              <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                           </div>
                        </li>
                        <li class="clearfix active">
                           <img src="{{url('/images/bhai.jpg')}}" alt="avatar">
                           <div class="about">
                           <div class="name">Bhai ❤️</div>
                              <div class="status"> <i class="fa fa-circle online"></i> online </div>
                           </div>
                        </li>
                    
                     </ul>
                  </div>
                  <div class="chat">
                     <div class="chat-header clearfix">
                        <div class="row">
                           <div class="col-lg-6">
                              <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                              </a>
                              <div class="chat-about">
                                 <h6 class="m-b-0">Aiden Chavez</h6>
                                 <small>Last seen: 2 hours ago</small>
                              </div>
                           </div>
                           <div class="col-lg-6 hidden-sm text-right">
                              <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                              <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                              <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                              <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                           </div>
                        </div>
                     </div>
                     @php
                     use Carbon\Carbon;
                     @endphp
                     <div class="chat-history">
                        <ul class="m-b-0">
                           @foreach ($chats as $chat)
                           @php 
                           $dateTime = new DateTime($chat->created_at);
                           @endphp
                           <li class="clearfix">
                              <div class="message-data text-right">
                                 <span class="message-data-time text-right">{{ $dateTime->format('h:i A') }}
                                 , {{ $day = Carbon::now()->format('l') }}</span>
                                 <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                              </div>
                              <div class="message other-message float-right">{{ $chat->message }} </div>
                              <div class="read-tick float-right">&#10004;</div>
                              <div class="read-tick float-right">&#10004;</div>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                     <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                           <div class="input-group-prepend"></div>
                           <form action="{{ route('chat.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <!-- <input type="text" class="form-control" name = "message" placeholder="Enter text here...">
                              <button class="input-group-text" type= "submit"><i class="fa fa-send"></i></button> -->
                              <div class="message-box">
    <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
    <button type="submit" class="message-submit">Send</button>
  </div>
  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">
      var $messages = $('.messages-content'),
    d, h, m,
    i = 0;

$(window).load(function() {
  $messages.mCustomScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 100);
});


function updateScrollbar() {
  $messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
    scrollInertia: 10,
    timeout: 0
  });
}

function setDate(){
  d = new Date()
  if (m != d.getMinutes()) {
    m = d.getMinutes();
    $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
    $('<div class="checkmark-sent-delivered">&check;</div>').appendTo($('.message:last'));
    $('<div class="checkmark-read">&check;</div>').appendTo($('.message:last'));
  }
}

function insertMessage() {
  msg = $('.message-input').val();
  if ($.trim(msg) == '') {
    return false;
  }
  $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
  setDate();
  $('.message-input').val(null);
  updateScrollbar();
  setTimeout(function() {
    fakeMessage();
  }, 1000 + (Math.random() * 20) * 100);
}

$('.message-submit').click(function() {
  insertMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    insertMessage();
    return false;
  }
})

var Fake = [
  'Hi there, I\'m Jesse and you?',
  'Nice to meet you',
  'How are you?',
  'Not too bad, thanks',
  'What do you do?',
  'That\'s awesome',
  'Codepen is a nice place to stay',
  'I think you\'re a nice person',
  'Why do you think that?',
  'Can you explain?',
  'Anyway I\'ve gotta go now',
  'It was a pleasure chat with you',
  'Time to make a new codepen',
  'Bye',
  ':)'
]

function fakeMessage() {
  if ($('.message-input').val() != '') {
    return false;
  }
  $('<div class="message loading new"><figure class="avatar"><img src="http://askavenue.com/img/17.jpg" /></figure><span></span></div>').appendTo($('.mCSB_container'));
  updateScrollbar();

  setTimeout(function() {
    $('.message.loading').remove();
    $('<div class="message new"><figure class="avatar"><img src="http://askavenue.com/img/17.jpg" /></figure>' + Fake[i] + '</div>').appendTo($('.mCSB_container')).addClass('new');
    setDate();
    updateScrollbar();
    i++;
  }, 1000 + (Math.random() * 20) * 100);

}

$('.button').click(function(){
  $('.menu .items span').toggleClass('active');
   $('.menu .button').toggleClass('active');
});

      </script>
   </body>
</html>
