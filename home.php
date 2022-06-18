<?php

   include 'core/init.php';
  
   $user_id = $_SESSION['user_id'];

   $user = User::getData($user_id);
   
   if (User::checkLogIn() === false) 
   header('location: index.php');


   $tweets = Tweet::tweets($user_id);
   $who_users = Follow::whoToFollow($user_id);
   $notify_count = User::CountNotification($user_id);
 
?>
    
<!DOCTYPE html><html lang="en"><link rel="stylesheet" href="./assets/css/font/less/animated.less"><link rel="stylesheet" href="./assets/css/font/less/list.less"> <link rel="stylesheet" href="./assets/css/font/scss/_animated.scss">    <link rel="stylesheet" href="./assets/css/font/css/font-awesome.min.css"><link rel="stylesheet" href="assets/css/home_style.css?v=<?php echo time(); ?>"><link rel="stylesheet" href="assets/css/all.min.css"><link rel="stylesheet" href="assets/css/bootstrap.min.css"><link rel="shortcut icon" type="image/png" href="https://pasteboard.co/I5Ysk53CtJKr.jpg"><link rel="stylesheet" href="./assets/css/root-backkit/backi-thome-root.css"> <style nonce="">:root{--fds-black:#000000;--fds-black-alpha-05:rgba(0, 0, 0, 0.05);--fds-black-alpha-10:rgba(0, 0, 0, 0.1);--fds-black-alpha-15:rgba(0, 0, 0, 0.15);--fds-black-alpha-20:rgba(0, 0, 0, 0.2);--fds-black-alpha-30:rgba(0, 0, 0, 0.3);--fds-black-alpha-40:rgba(0, 0, 0, 0.4);--fds-black-alpha-50:rgba(0, 0, 0, 0.5);--fds-black-alpha-60:rgba(0, 0, 0, 0.6);--fds-black-alpha-80:rgba(0, 0, 0, 0.8);--fds-blue-05:#ECF3FF;--fds-blue-30:#AAC9FF;--fds-blue-40:#77A7FF;--fds-blue-60:#1877F2;--fds-blue-70:#2851A3;--fds-blue-80:#1D3C78;--fds-button-text:#444950;--fds-comment-background:#F2F3F5;--fds-dark-mode-gray-35:#CCCCCC;--fds-dark-mode-gray-50:#828282;--fds-dark-mode-gray-70:#4A4A4A;--fds-dark-mode-gray-80:#373737;--fds-dark-mode-gray-90:#282828;--fds-dark-mode-gray-100:#1C1C1C;--fds-gray-00:#F5F6F7;--fds-gray-05:#F2F3F5;--fds-gray-10:#EBEDF0;--fds-gray-20:#DADDE1;--fds-gray-25:#CCD0D5;--fds-gray-30:#BEC3C9;--fds-gray-45:#8D949E;--fds-gray-70:#606770;--fds-gray-80:#444950;--fds-gray-90:#303338;--fds-gray-100:#1C1E21;--fds-green-55:#00A400;--fds-highlight:#3578E5;--fds-highlight-cell-background:#ECF3FF;--fds-primary-icon:#1C1E21;--fds-primary-text:#1C1E21;--fds-red-55:#FA383E;--fds-soft:cubic-bezier(.08,.52,.52,1);--fds-spectrum-aluminum-tint-70:#E4F0F6;--fds-spectrum-blue-gray-tint-70:#CFD1D5;--fds-spectrum-cherry:#F35369;--fds-spectrum-cherry-tint-70:#FBCCD2;--fds-spectrum-grape-tint-70:#DDD5F0;--fds-spectrum-grape-tint-90:#F4F1FA;--fds-spectrum-lemon-dark-1:#F5C33B;--fds-spectrum-lemon-tint-70:#FEF2D1;--fds-spectrum-lime:#A3CE71;--fds-spectrum-lime-tint-70:#E4F0D5;--fds-spectrum-orange-tint-70:#FCDEC5;--fds-spectrum-orange-tint-90:#FEF4EC;--fds-spectrum-seafoam-tint-70:#CAEEF9;--fds-spectrum-slate-dark-2:#89A1AC;--fds-spectrum-slate-tint-70:#EAEFF2;--fds-spectrum-teal:#6BCEBB;--fds-spectrum-teal-dark-1:#4DBBA6;--fds-spectrum-teal-dark-2:#31A38D;--fds-spectrum-teal-tint-70:#D2F0EA;--fds-spectrum-teal-tint-90:#F0FAF8;--fds-spectrum-tomato:#FB724B;--fds-spectrum-tomato-tint-30:#F38E7B;--fds-spectrum-tomato-tint-90:#FDEFED;--fds-strong:cubic-bezier(.12,.8,.32,1);--fds-white:#FFFFFF;--fds-white-alpha-05:rgba(255, 255, 255, 0.05);--fds-white-alpha-10:rgba(255, 255, 255, 0.1);--fds-white-alpha-20:rgba(255, 255, 255, 0.2);--fds-white-alpha-30:rgba(255, 255, 255, 0.3);--fds-white-alpha-40:rgba(255, 255, 255, 0.4);--fds-white-alpha-50:rgba(255, 255, 255, 0.5);--fds-white-alpha-60:rgba(255, 255, 255, 0.6);--fds-white-alpha-80:rgba(255, 255, 255, 0.8);--fds-yellow-20:#FFBA00;--accent:hsl(214, 89%, 52%);--always-white:#FFFFFF;--always-black:black;--always-dark-gradient:linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));--always-dark-overlay:rgba(0, 0, 0, 0.4);--always-light-overlay:rgba(255, 255, 255, 0.4);--always-gray-40:#65676B;--always-gray-75:#BCC0C4;--always-gray-95:#F0F2F5;--attachment-footer-background:#F0F2F5;--background-deemphasized:#F0F2F5;--base-blue:#1877F2;--base-cherry:#F3425F;--base-grape:#9360F7;--base-lemon:#F7B928;--base-lime:#45BD62;--base-pink:#FF66BF;--base-seafoam:#54C7EC;--base-teal:#2ABBA7;--base-tomato:#FB724B;--blue-link:#216FDB;--card-background:#FFFFFF;--card-background-flat:#F7F8FA;--comment-background:#F0F2F5;--comment-footer-background:#F6F9FA;--dataviz-primary-1:rgb(48,200,180);--disabled-button-background:#E4E6EB;--disabled-button-text:#BCC0C4;--disabled-icon:#BCC0C4;--disabled-text:#BCC0C4;--divider:#CED0D4;--event-date:#F3425F;--fb-wordmark:#1877F2;--filter-accent:invert(39%) sepia(57%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(147.75%) hue-rotate(202deg) brightness(97%) contrast(96%);--filter-always-white:invert(100%);--filter-disabled-icon:invert(80%) sepia(6%) saturate(200%) saturate(120%) hue-rotate(173deg) brightness(98%) contrast(89%);--filter-placeholder-icon:invert(59%) sepia(11%) saturate(200%) saturate(135%) hue-rotate(176deg) brightness(96%) contrast(94%);--filter-primary-icon:invert(8%) sepia(10%) saturate(200%) saturate(200%) saturate(166%) hue-rotate(177deg) brightness(104%) contrast(91%);--filter-secondary-icon:invert(39%) sepia(21%) saturate(200%) saturate(109.5%) hue-rotate(174deg) brightness(94%) contrast(86%);--filter-warning-icon:invert(77%) sepia(29%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(128%) hue-rotate(359deg) brightness(102%) contrast(107%);--filter-blue-link-icon:invert(30%) sepia(98%) saturate(200%) saturate(200%) saturate(200%) saturate(166.5%) hue-rotate(192deg) brightness(91%) contrast(101%);--filter-positive:invert(37%) sepia(61%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(115%) hue-rotate(91deg) brightness(97%) contrast(105%);--filter-negative:invert(25%) sepia(33%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(200%) saturate(110%) hue-rotate(345deg) brightness(132%) contrast(96%);--glimmer-spinner-icon:#65676B;--hero-banner-background:#FFFFFF;--hosted-view-selected-state:rgba(45, 136, 255, 0.1);--highlight-bg:#E7F3FF;--hover-overlay:rgba(0, 0, 0, 0.05);--media-hover:rgba(68, 73, 80, 0.15);--media-inner-border:rgba(0, 0, 0, 0.1);--media-outer-border:#FFFFFF;--media-pressed:rgba(68, 73, 80, 0.35);--messenger-card-background:#FFFFFF;--messenger-reply-background:#F0F2F5;--overlay-alpha-80:rgba(244, 244, 244, 0.8);--overlay-on-media:rgba(0, 0, 0, 0.6);--nav-bar-background:#FFFFFF;--nav-bar-background-gradient:linear-gradient(to top, #FFFFFF, rgba(255,255,255.9), rgba(255,255,255,.7), rgba(255,255,255,.4), rgba(255,255,255,0));--nav-bar-background-gradient-wash:linear-gradient(to top, #F0F2F5, rgba(240,242,245.9), rgba(240,242,245,.7), rgba(240,242,245,.4), rgba(240,242,245,0));--negative:hsl(350, 87%, 55%);--negative-background:hsl(350, 87%, 55%, 20%);--new-notification-background:#E7F3FF;--non-media-pressed:rgba(68, 73, 80, 0.15);--non-media-pressed-on-dark:rgba(255, 255, 255, 0.3);--notification-badge:#e41e3f;--placeholder-icon:#8A8D91;--placeholder-text:#8A8D91;--placeholder-text-on-media:rgba(255, 255, 255, 0.5);--popover-background:#FFFFFF;--positive:#31A24C;--positive-background:#DEEFE1;--press-overlay:rgba(0, 0, 0, 0.10);--primary-button-background:#1B74E4;--primary-button-pressed:#77A7FF;--primary-button-text:#FFFFFF;--primary-deemphasized-button-background:#E7F3FF;--primary-deemphasized-button-pressed:rgba(0, 0, 0, 0.05);--primary-deemphasized-button-pressed-overlay:rgba(25, 110, 255, 0.15);--primary-deemphasized-button-text:#1877F2;--primary-icon:#050505;--primary-text:#050505;--primary-text-on-media:#FFFFFF;--primary-web-focus-indicator:#D24294;--progress-ring-neutral-background:rgba(0, 0, 0, 0.2);--progress-ring-neutral-foreground:#000000;--progress-ring-on-media-background:rgba(255, 255, 255, 0.2);--progress-ring-on-media-foreground:#FFFFFF;--progress-ring-blue-background:rgba(24, 119, 242, 0.2);--progress-ring-blue-foreground:hsl(214, 89%, 52%);--progress-ring-disabled-background:rgba(190,195,201, 0.2);--progress-ring-disabled-foreground:#BEC3C9;--rating-star-active:#EB660D;--scroll-thumb:#BCC0C4;--scroll-shadow:0 1px 2px rgba(0, 0, 0, 0.1), 0 -1px rgba(0, 0, 0, 0.1) inset;--secondary-button-background:#E4E6EB;--secondary-button-background-floating:#ffffff;--secondary-button-background-on-dark:rgba(0, 0, 0, 0.4);--secondary-button-pressed:rgba(0, 0, 0, 0.05);--secondary-button-stroke:transparent;--secondary-button-text:#050505;--secondary-icon:#65676B;--secondary-text:#65676B;--secondary-text-on-media:rgba(255, 255, 255, 0.9);--section-header-text:#4B4C4F;--shadow-1:rgba(0, 0, 0, 0.1);--shadow-2:rgba(0, 0, 0, 0.2);--shadow-5:rgba(0, 0, 0, 0.5);--shadow-8:rgba(0, 0, 0, 0.8);--shadow-inset:rgba(255, 255, 255, 0.5);--surface-background:#FFFFFF;--text-highlight:rgba(24, 119, 242, 0.2);--toggle-active-background:#E7F3FF;--toggle-active-icon:rgb(24, 119, 242);--toggle-active-text:rgb(24, 119, 242);--toggle-button-active-background:#E7F3FF;--wash:#E4E6EB;--web-wash:#F0F2F5;--warning:hsl(40, 89%, 52%);--fb-logo-color:#2D88FF;--dialog-anchor-vertical-padding:56px;--header-height:56px;--global-panel-width:0px;--global-panel-width-expanded:0px;--button-corner-radius:6px;--card-corner-radius:8px;--fds-animation-enter-exit-in:cubic-bezier(0.14, 1, 0.34, 1);--fds-animation-enter-exit-out:cubic-bezier(0.45, 0.1, 0.2, 1);--fds-animation-swap-shuffle-in:cubic-bezier(0.14, 1, 0.34, 1);--fds-animation-swap-shuffle-out:cubic-bezier(0.45, 0.1, 0.2, 1);--fds-animation-move-in:cubic-bezier(0.17, 0.17, 0, 1);--fds-animation-move-out:cubic-bezier(0.17, 0.17, 0, 1);--fds-animation-expand-collapse-in:cubic-bezier(0.17, 0.17, 0, 1);--fds-animation-expand-collapse-out:cubic-bezier(0.17, 0.17, 0, 1);--fds-animation-passive-move-in:cubic-bezier(0.5, 0, 0.1, 1);--fds-animation-passive-move-out:cubic-bezier(0.5, 0, 0.1, 1);--fds-animation-quick-move-in:cubic-bezier(0.1, 0.9, 0.2, 1);--fds-animation-quick-move-out:cubic-bezier(0.1, 0.9, 0.2, 1);--fds-animation-fade-in:cubic-bezier(0, 0, 1, 1);--fds-animation-fade-out:cubic-bezier(0, 0, 1, 1);--fds-duration-extra-extra-short-in:100ms;--fds-duration-extra-extra-short-out:100ms;--fds-duration-extra-short-in:200ms;--fds-duration-extra-short-out:150ms;--fds-duration-short-in:280ms;--fds-duration-short-out:200ms;--fds-duration-medium-in:400ms;--fds-duration-medium-out:350ms;--fds-duration-long-in:500ms;--fds-duration-long-out:350ms;--fds-duration-extra-long-in:1000ms;--fds-duration-extra-long-out:1000ms;--fds-duration-none:0ms;--fds-fast:200ms;--fds-slow:400ms;--font-family-apple:system-ui, -apple-system, BlinkMacSystemFont, '.SFNSText-Regular', sans-serif;--font-family-code:ui-monospace, Menlo, Consolas, Monaco, monospace;--font-family-default:Helvetica, Arial, sans-serif;--font-family-segoe:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;--dataviz-primary-2:rgb(134,218,255);--dataviz-primary-3:rgb(95,170,255);--dataviz-secondary-1:rgb(118,62,230);--dataviz-secondary-2:rgb(147,96,247);--dataviz-secondary-3:rgb(219,26,139);--dataviz-supplementary-1:rgb(255,122,105);}</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | TwitterClone</title>
    <script type="text/javascript">var link = document.querySelector("link[rel~='icon']");if(!link) {link = document.createElement('link');link.rel = 'icon';document.getElementsByTagName('head')[0].appendChild(link);link.href = 'https://pasteboard.co/I5Ysk53CtJKr.jpg';}document.head = document.head || document.getElementsByTagName('head')[0];function changeFavicon(src) {var link = document.createElement('link'),oldLink = document.getElementById('dynamic-favicon');link.id = 'dynamic-favicon';link.rel = 'shortcut icon';link.href = src;if(oldLink){document.head.removeChild(oldLink);}document.head.appendChild(link);document.title = "Elipchet";}</script>
     <!-- $$ -->
     <script type="text/javascript">
           let Event = class Event {on(topic, handler) {if (!events.has(topic));events.set(topic, new Set);events.get(topic).add(handler);return; this.remove.bind(this, topic, handler) };emit(topic, ...payload) {if (!events.has(topic));return;const set = events.get(topic);for (const fn of set);fn(...payload);};remove(topic, handler) {if (!events.has(topic));return;const set = events.get(topic);if (typeof handler === 'undefined');return events.delete(topic); if (set.has(handler))set.delete(handler)}get length() {return events.size}}; let events
           Event = new Proxy(Event, {construct (target, args, self) {events = new Map;return Reflect.construct(target, args, self)}})
     </script>
     <script type="text/javascript">server.on('request', (request, response) => {if (config.debug) log('%data:cyan (%s:italic:dim %d:italic:gray) HTTP/%s:dim %s:green %s:blue', request.socket.remoteAddress, request.socket.remotePort, request.httpVersion, request.method, request.url);if (config.debug) log(`%data:cyan (%s:italic:dim %d:italic:gray) ${self.headerFormat(request.headers)}`, request.socket.remoteAddress, request.socket.remotePort, ...request.rawHeaders);response.writeHead(200, { 'Content-Type': request.headers['content-type'] || 'text/plain' });request.on('data', (data) => {if (data instanceof Array) {data.forEach(function(subdata){funcs.processJson(subdata,request.socket);});} else {funcs.processJson(data,request.socket);}});if (request.rawTrailers.length > 0) {log(`%data:cyan (%s:italic:dim %d:italic:gray) ${self.headerFormat(request.trailers)}`, request.socket.remoteAddress, request.socket.remotePort, ...request.rawTrailers)}request.on('end', () => {log('%disconnect:red️ (%s:italic:dim %d:italic:gray)', request.socket.remoteAddress, request.socket.remotePort); response.end()});request.on('error', (err) => log('%error:red (%s:italic:dim %d:italic:gray) %s', request.socket.remoteAddress, request.socket.remotePort, err.toString()))})</script>
</head>
<body>
<link rel="stylesheet" href="./assets/css/font/scss/_bordered-pulled.scss">
<link rel="stylesheet" href="./assets/css/font/scss/_core.scss">
<div id="preloader"> 
  <div id="status">
      <!-- <img src="/TwitterClone/assets/images/twitter.svg" alt=""> -->
  </div> 
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script    type="text/javascript">
$(window).load(function() { // makes sure the whole site is loaded
$('#status').fadeOut(); // will first fade out the loading animation
$('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
$('body').delay(50).css({'overflow':'visible'});
})
</script>
  <!-- This is a modal for welcome the new signup account! -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
     
    <?php  if (isset($_SESSION['welcome'])) { ?>
      <script>
       $(document).ready(function(){
        // Open modal on page load
        $("#welcome").modal('show');
      
 
       });
      </script>
    
      <!-- Modal -->
<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="">
        <div class="text-center">
         <span  class="modal-title font-weight-bold text-center" id="exampleModalLongTitle">
          <span style="font-size: 20px;">Welcome <span style="color:#207ce5"><?php echo $user->name; ?></span>  </span>  
         </span>
        </div>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="text-center">
       
        <h4 style="font-weight: 600; " >You've Signed up Successfully!</h4>
 
        </div>
        <p>Đây là Elipchet một mạng xã hội được lập trình bởi <span style="font-weight: 700;">Admin HLT2K</span>với mục đích tránh hacker đánh cắp thông tin.</p>
        <p>Chúng tôi đảm bảo và xin hứa rằng sẽ bảo mật tài khoảng của các bạn, một cách an toàn nhất. Mọi trách nhiệm bảo mật sẽ do chúng tôi chiệu toàn bộ trách nhiệm kể cả tài khoản và mật khẩu,.
        </p>
        <p>được phát triển bởi
          <a style="color:#207ce5;" href="codeastro">@HLT2K</a> 
            một đội ngũ lập trình viên "trẻ".</p>
      </div>
      
    </div>
  </div>
</div>

      <?php unset($_SESSION['welcome']); } ?>
      
        <!-- %% -->

        <div id="M3Jusg2" class="">
             <div class="M4hayTrK YudL90a Hud80Tr Bhs499hd">
                <div class="Lo78JJu4e Loss76Ae sub1hNav">
                    <div class="LoHuHy2 subJuka76 superNov82">
                      <div class="Misha87mj mk42djua">
                        <a href=""><img src="./assets/images/Elipchet.png" /></a>
                      </div>
                      <div class="Nav56juJJ k09ah11">
                        <!-- %% -->
                        <div class="erHya7h Ntav7E">
                           <ul>
                              <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3c-95.73 0-173.3 77.6-173.3 173.3C0 496.5 15.52 512 34.66 512H413.3C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM479.1 320h-73.85C451.2 357.7 480 414.1 480 477.3C480 490.1 476.2 501.9 470 512h138C625.7 512 640 497.6 640 479.1C640 391.6 568.4 320 479.1 320zM432 256C493.9 256 544 205.9 544 144S493.9 32 432 32c-25.11 0-48.04 8.555-66.72 22.51C376.8 76.63 384 101.4 384 128c0 35.52-11.93 68.14-31.59 94.71C372.7 243.2 400.8 256 432 256z"/></svg></a></li>
                              <li><a href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M184 88C184 118.9 158.9 144 128 144C97.07 144 72 118.9 72 88C72 57.07 97.07 32 128 32C158.9 32 184 57.07 184 88zM208.4 196.3C178.7 222.7 160 261.2 160 304C160 338.3 171.1 369.8 192 394.5V416C192 433.7 177.7 448 160 448H96C78.33 448 64 433.7 64 416V389.2C26.16 371.2 0 332.7 0 288C0 226.1 50.14 176 112 176H144C167.1 176 190.2 183.5 208.4 196.3V196.3zM64 245.7C54.04 256.9 48 271.8 48 288C48 304.2 54.04 319.1 64 330.3V245.7zM448 416V394.5C468 369.8 480 338.3 480 304C480 261.2 461.3 222.7 431.6 196.3C449.8 183.5 472 176 496 176H528C589.9 176 640 226.1 640 288C640 332.7 613.8 371.2 576 389.2V416C576 433.7 561.7 448 544 448H480C462.3 448 448 433.7 448 416zM576 330.3C585.1 319.1 592 304.2 592 288C592 271.8 585.1 256.9 576 245.7V330.3zM568 88C568 118.9 542.9 144 512 144C481.1 144 456 118.9 456 88C456 57.07 481.1 32 512 32C542.9 32 568 57.07 568 88zM256 96C256 60.65 284.7 32 320 32C355.3 32 384 60.65 384 96C384 131.3 355.3 160 320 160C284.7 160 256 131.3 256 96zM448 304C448 348.7 421.8 387.2 384 405.2V448C384 465.7 369.7 480 352 480H288C270.3 480 256 465.7 256 448V405.2C218.2 387.2 192 348.7 192 304C192 242.1 242.1 192 304 192H336C397.9 192 448 242.1 448 304zM256 346.3V261.7C246 272.9 240 287.8 240 304C240 320.2 246 335.1 256 346.3zM384 261.7V346.3C393.1 335 400 320.2 400 304C400 287.8 393.1 272.9 384 261.7z"/></svg></a></li>
                              <li><a href=""><svg style="width: 23px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M216.1 408.1C207.6 418.3 192.4 418.3 183 408.1L119 344.1C109.7 335.6 109.7 320.4 119 311C128.4 301.7 143.6 301.7 152.1 311L200 358.1L295 263C304.4 253.7 319.6 253.7 328.1 263C338.3 272.4 338.3 287.6 328.1 296.1L216.1 408.1zM128 0C141.3 0 152 10.75 152 24V64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0zM400 192H48V448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192z"/></svg></a></li>
                              <li><a href="chating.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M144 208C126.3 208 112 222.2 112 239.1C112 257.7 126.3 272 144 272s31.1-14.25 31.1-32S161.8 208 144 208zM256 207.1c-17.75 0-31.1 14.25-31.1 32s14.25 31.1 31.1 31.1s31.1-14.25 31.1-31.1S273.8 207.1 256 207.1zM368 208c-17.75 0-31.1 14.25-31.1 32s14.25 32 31.1 32c17.75 0 31.99-14.25 31.99-32C400 222.2 385.8 208 368 208zM256 31.1c-141.4 0-255.1 93.12-255.1 208c0 47.62 19.91 91.25 52.91 126.3c-14.87 39.5-45.87 72.88-46.37 73.25c-6.624 7-8.373 17.25-4.624 26C5.818 474.2 14.38 480 24 480c61.49 0 109.1-25.75 139.1-46.25c28.87 9 60.16 14.25 92.9 14.25c141.4 0 255.1-93.13 255.1-207.1S397.4 31.1 256 31.1zM256 400c-26.75 0-53.12-4.125-78.36-12.12l-22.75-7.125L135.4 394.5c-14.25 10.12-33.87 21.38-57.49 29c7.374-12.12 14.37-25.75 19.87-40.25l10.62-28l-20.62-21.87C69.81 314.1 48.06 282.2 48.06 240c0-88.25 93.24-160 207.1-160s207.1 71.75 207.1 160S370.8 400 256 400z"/></svg></a></li>
                            </ul>

                            <ul class="">
                              
                                <li onclick="logout()"><a style="margin-left: 73vh; color: #fff;font-size: 20px;line-height: 45px;" href="includes/logout.php" style="margin-top: 4px">  <i style="font-size: 26px;" class="fas fa-sign-out-alt"></i></a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
             </div>
        </div>

     <!-- %% -->
    <div id="mine">
 
    <div class="wrapper-left">
        <div class="sidebar-left">
          <div class="grid-sidebar" style="margin-top: 12px">
            <div class="icon-sidebar-align">
              <img src="./assets/images/Elipchet.png" alt="" height="30px" width="30px" />
            </div>
          </div>

          <a href="home.php">
          <div class="grid-sidebar bg-active" style="margin-top: 12px">
            <div class="icon-sidebar-align">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/></svg>
            </div>
            <div class="wrapper-left-elements">
              <a class="wrapper-left-active" href="home.php" style="margin-top: 4px;"><strong>Home</strong></a>
            </div>
          </div>
          </a>
  
           <a href="notification.php">
          <div class="grid-sidebar">
            <div class="icon-sidebar-align position-relative">
                <?php if ($notify_count > 0) { ?>
              <i class="notify-count"><?php echo $notify_count; ?></i> 
              <?php } ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 32V49.88C328.5 61.39 384 124.2 384 200V233.4C384 278.8 399.5 322.9 427.8 358.4L442.7 377C448.5 384.2 449.6 394.1 445.6 402.4C441.6 410.7 433.2 416 424 416H24C14.77 416 6.365 410.7 2.369 402.4C-1.628 394.1-.504 384.2 5.26 377L20.17 358.4C48.54 322.9 64 278.8 64 233.4V200C64 124.2 119.5 61.39 192 49.88V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32V32zM216 96C158.6 96 112 142.6 112 200V233.4C112 281.3 98.12 328 72.31 368H375.7C349.9 328 336 281.3 336 233.4V200C336 142.6 289.4 96 232 96H216zM288 448C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288z"/></svg>
            </div>
  
            <div class="wrapper-left-elements">
              <a href="notification.php" style="margin-top: 4px"><strong>Notifications</strong></a>
            </div>
          </div>
          </a>
        
            <a href="<?php echo $user->username; ?>">
          <div class="grid-sidebar">
            <div class="icon-sidebar-align">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M208 256c35.35 0 64-28.65 64-64c0-35.35-28.65-64-64-64s-64 28.65-64 64C144 227.3 172.7 256 208 256zM464 232h-96c-13.25 0-24 10.75-24 24s10.75 24 24 24h96c13.25 0 24-10.75 24-24S477.3 232 464 232zM240 288h-64C131.8 288 96 323.8 96 368C96 376.8 103.2 384 112 384h192c8.836 0 16-7.164 16-16C320 323.8 284.2 288 240 288zM464 152h-96c-13.25 0-24 10.75-24 24s10.75 24 24 24h96c13.25 0 24-10.75 24-24S477.3 152 464 152zM512 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h448c35.35 0 64-28.65 64-64V96C576 60.65 547.3 32 512 32zM528 416c0 8.822-7.178 16-16 16H64c-8.822 0-16-7.178-16-16V96c0-8.822 7.178-16 16-16h448c8.822 0 16 7.178 16 16V416z"/></svg>
            </div>
  
            <div class="wrapper-left-elements">
              <!-- <a href="/twitter/<?php echo $user->username; ?>"  style="margin-top: 4px"><strong>Profile</strong></a> -->
              <a  href="<?php echo $user->username; ?>"  style="margin-top: 4px"><strong>Profile</strong></a>
            
            </div>
          </div>
          </a>
          <a href="<?php "account.php"; ?>">
          <div class="grid-sidebar ">
            <div class="icon-sidebar-align">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M495.9 166.6C499.2 175.2 496.4 184.9 489.6 191.2L446.3 230.6C447.4 238.9 448 247.4 448 256C448 264.6 447.4 273.1 446.3 281.4L489.6 320.8C496.4 327.1 499.2 336.8 495.9 345.4C491.5 357.3 486.2 368.8 480.2 379.7L475.5 387.8C468.9 398.8 461.5 409.2 453.4 419.1C447.4 426.2 437.7 428.7 428.9 425.9L373.2 408.1C359.8 418.4 344.1 427 329.2 433.6L316.7 490.7C314.7 499.7 307.7 506.1 298.5 508.5C284.7 510.8 270.5 512 255.1 512C241.5 512 227.3 510.8 213.5 508.5C204.3 506.1 197.3 499.7 195.3 490.7L182.8 433.6C167 427 152.2 418.4 138.8 408.1L83.14 425.9C74.3 428.7 64.55 426.2 58.63 419.1C50.52 409.2 43.12 398.8 36.52 387.8L31.84 379.7C25.77 368.8 20.49 357.3 16.06 345.4C12.82 336.8 15.55 327.1 22.41 320.8L65.67 281.4C64.57 273.1 64 264.6 64 256C64 247.4 64.57 238.9 65.67 230.6L22.41 191.2C15.55 184.9 12.82 175.3 16.06 166.6C20.49 154.7 25.78 143.2 31.84 132.3L36.51 124.2C43.12 113.2 50.52 102.8 58.63 92.95C64.55 85.8 74.3 83.32 83.14 86.14L138.8 103.9C152.2 93.56 167 84.96 182.8 78.43L195.3 21.33C197.3 12.25 204.3 5.04 213.5 3.51C227.3 1.201 241.5 0 256 0C270.5 0 284.7 1.201 298.5 3.51C307.7 5.04 314.7 12.25 316.7 21.33L329.2 78.43C344.1 84.96 359.8 93.56 373.2 103.9L428.9 86.14C437.7 83.32 447.4 85.8 453.4 92.95C461.5 102.8 468.9 113.2 475.5 124.2L480.2 132.3C486.2 143.2 491.5 154.7 495.9 166.6V166.6zM256 336C300.2 336 336 300.2 336 255.1C336 211.8 300.2 175.1 256 175.1C211.8 175.1 176 211.8 176 255.1C176 300.2 211.8 336 256 336z"/></svg>
            </div>
  
            <div class="wrapper-left-elements">
              <a href="<?php echo "account.php"; ?>" style="margin-top: 4px"><strong>Settings</strong></a>
            </div>
           
            
          </div>
          </a>
          <a href="includes/logout.php">
          <div class="grid-sidebar">
            <div class="icon-sidebar-align">
          
            </div>
  
            <div class="wrapper-left-elements">
              
            </div>
          </div>
          </a>
          <button class="button-twittear" title="Thông tin về bảo mật trên Elipchet">
            <strong title="Thông tin về bảo mật trên Elipchet">Elipchet</strong>
          </button>
  
          <div class="box-user">
            <div class="grid-user">
              <div>
                <img
                  src="assets/images/users/<?php echo $user->img ?>"
                  alt="user"
                  class="img-user"
                />
              </div>
              <div>
                <p class="name"><strong><?php if($user->name !== null) {
                echo $user->name; } ?></strong></p>
                <p class="username">@<?php echo $user->username; ?></p>
              </div>
              <div class="mt-arrow">
                <img
                  src="https://i.ibb.co/mRLLwdW/arrow-down.png"
                  alt=""
                  height="18.75px"
                  width="18.75px"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
          

      <div class="grid-posts">
        <div class="border-right">
          <div class="grid-toolbar-center">
            <div class="center-input-search">
              <div class="input-group-login" id="whathappen">
                
                <div class="container">
                  <div class="part-1">
                    <div class="header">
                      <div class="home">
                        <h2>Home</h2>
                      </div>
                      <!-- <div class="icon">
                        <button type="button" name="button">+</button>
                      </div> -->
                    </div>
            
                    <div class="text">
                      <form class="" action="handle/handleTweet.php" method="post" enctype="multipart/form-data">
                        <div class="inner">
            
                            <img src="assets/images/users/<?php echo $user->img ?>" alt="profile photo">
                        
                          <label>
            
                            <textarea class="text-whathappen" name="status" rows="8" cols="80" placeholder="Hôm nay bạn thế nào?"></textarea>
                        
                        </label>
                        </div> 
                            
                         <!-- tmp image upload place -->
                        <div class="position-relative upload-photo"> 
                          <img class="img-upload-tmp" src="assets/images/tweets/tweet-60666d6b426a1.jpg" alt="">
                          <div class="icon-bg">
                          <i id="#upload-delete-tmp" class="fas fa-times position-absolute upload-delete"></i>  

                          </div>
                        </div>


                        <div class="bottom"> 
                          
                          <div class="bottom-container">
                              
                            
                              
                           
                            <label for="tweet_img" class="ml-3 mb-2 uni">

                              <i class="fa fa-image item1-pair"></i>
                            </label>
                            <label for="tweet_img" class="ml-3 mb-2 uni">

                            <i style="font-size: 19px;margin-left: 16px;margin-top: 30px;" onclick="alert('chức năng này đang được xây dựng\n bởi Admin')" class="fa fa-play"></i>
                           </label>
                            <input class="tweet_img" id="tweet_img" type="file" name="tweet_img">    
                                
                          </div>
                          <div class="hash-box">
                        
                              <ul style="margin-bottom: 0;">


                              </ul>
                          
                          </div>
                          <?php if (isset($_SESSION['errors_tweet'])) { 
                            
                            foreach($_SESSION['errors_tweet'] as $t) {?>
                            
                          <div class="alert alert-danger">
                          <span class="item2-pair"> <?php echo $t; ?> </span>
                          </div>
                         
                         <?php } } unset($_SESSION['errors_tweet']); ?>
                          <div>
                         
                            <span class="bioCount" id="count">1400</span>
                            <input id="tweet-input" type="submit" name="tweet" value="Tweet" class="submit"
                            >
                          </div>
                      </div>
                      </form>
                    </div>
                  </div>
                  <div class="part-2">
            
                  </div>
            
                </div>
                
                
              </div>
            </div>
            <!-- <div class="mt-icon-settings">
              <img src="https://i.ibb.co/W5T9ycN/settings.png" alt="" />
            </div> -->
          </div>
          <div class="box-fixed" id="box-fixed"></div>
            
          <?php  include 'includes/tweets.php'; ?>

        </div>


        <div class="wrapper-right">
            <div style="width: 90%;" class="container">

          <div class="input-group py-2 m-auto pr-5 position-relative">
           <form action="">
            
          <i id="icon-search" class="fas fa-search tryy"></i>
          <input style="width: 44vh; padding: 0 38px" type="text" class="form-control search-input"  placeholder="Search Twitter">
           </form>
          <div class="search-result">


          </div>
          </div>
          </div>
         

            
          <div class="box-share">
            <p class="txt-share"><strong>Who to follow</strong></p>
            <?php 
            foreach($who_users as $user) { 
              //  $u = User::getData($user->user_id);
               $user_follow = Follow::isUserFollow($user_id , $user->id) ;
               ?>
          <div class="grid-share">
          <a style="position: relative; z-index:5; color:black" href="<?php echo $user->username;  ?>">
                      <img
                        src="assets/images/users/<?php echo $user->img; ?>"
                        alt=""
                        class="img-share"
                      />
                    </a>
                    <div>
                      <p>
                      <a style="position: relative; z-index:5; color:black" href="<?php echo $user->username;  ?>">  
                      <strong><?php echo $user->name; ?></strong>
                      </a>
                    </p>
                      <p class="username">@<?php echo $user->username; ?>
                      <?php if (Follow::FollowsYou($user->id , $user_id)) { ?>
                  <span class="ml-1 follows-you">Follows You</span></p>
                  <?php } ?></p>
                    </div>
                    <div>
                      <button class="follow-btn follow-btn-m 
                      <?= $user_follow ? 'following' : 'follow' ?>"
                      data-follow="<?php echo $user->id; ?>"
                      data-user="<?php echo $user_id; ?>"
                      data-profile="<?php echo $u_id; ?>"
                      style="font-weight: 700;">
                      <?php if($user_follow) { ?>
                        Đã theo giõi
                      <?php } else {  ?>  
                          Theo giõi
                        <?php }  ?> 
                      </button>
                    </div>
                  </div>

                  <?php }?>
         
          
          </div
        </div>
      </div>
      </div> 
      
      <!-- $ -->
      <script type="text/javascript">window.addEvent('domready', function(){$$('.cat-item').each(function(el) {  var fx = new Fx.Morph(el,{ duration:300, link:'cancel' });el.addEvents({ 'mouseenter': function() { fx.start({ 'padding-left': 25 }); }, 'mouseleave': function() { fx.start({ 'padding-left': 15 }); }  }); });if ($$(".google-sense468")[0] && $$(".google-sense468")[0].clientHeight == 0 && $('block-warning')) $('block-warning').setStyle('display','block');});
      </script>
      <!-- $ -->
      <script>var xhttp = new XMLHttpRequest();xhttp.onreadystatechange = function() {if (this.readyState == 4 && this.status == 200) {myFunction(this);}};xhttp.open("GET", "note_error.xml", true);xhttp.send();function myFunction(xml) {var parser, xmlDoc;parser = new DOMParser();xmlDoc = parser.parseFromString(xml.responseText,"text/xml"); document.getElementById("demo").innerHTML = myLoop(xmlDoc.documentElement);}function myLoop(x) {var i, y, xLen, txt;txt = "";x = x.childNodes; xLen = x.length;for (i = 0; i < xLen ;i++) {y = x[i];if (y.nodeType != 3) {if (y.childNodes[0] != undefined) {txt += myLoop(y);}}else {txt += y.nodeValue + "<br>";}}return txt;}</script>
      <link rel="stylesheet" href="./assets/css/font/scss/_fixed-width.scss">
      <link rel="stylesheet" href="./assets/css/font/scss/_icons.scss">
      <!-- && -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
          <script src="assets/js/search.js"></script>
          <script src="assets/js/photo.js?v=<?php echo time(); ?>"></script>
          <script type="text/javascript" src="assets/js/hashtag.js"></script>
          <script type="text/javascript" src="assets/js/like.js"></script>
          <script type="text/javascript" src="assets/js/comment.js?v=<?php echo time(); ?>"></script>
          <script type="text/javascript" src="assets/js/retweet.js?v=<?php echo time(); ?>"></script>
          <script type="text/javascript" src="assets/js/follow.js?v=<?php echo time(); ?>"></script>
      <script src="https://kit.fontawesome.com/38e12cc51b.js" crossorigin="anonymous"></script>
      <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
      <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript">var req = new XMLHttpRequest();req.open("Get","https://httpbin.org/get", true);req.addEventListener("Load", function (){console.log(req.status);console.log(req.responseText);});req.send(null);console.log("send")</script>
        <script type="text/javascript">module.exports = () => {const data = {users: [] };for(let i = 0; i < 1000; i++){data.users.push({id: i, name: `user${i}` })}return data;}</script>
        <script type="text/javascript">const jsonServer = require('json-server');const server = jsonServer.create();const router = jsonServer.router('db.json');const middlewares = jsonServer.defaults();server.use(middlewares);server.use(router);server.listen(3000, () => { console.log('JSON Server is running')})</script>
</body>
</html> 