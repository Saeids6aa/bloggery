   <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <ul class="social-icons">
                   @if (!empty($setting->url_facebook))
                       <li>
                           <a href="{{ $setting->url_facebook }}">
                               Facebook
                           </a>
                       </li>
                   @endif

                   @if (!empty($setting->url_twitter))
                       <li>
                           <a href="{{ $setting->url_twitter }}">
                               Twitter
                           </a>
                       </li>
                   @endif

                   @if (!empty($setting->url_whatsapp))
                       <li>
                           <a href="{{ $setting->url_whatsapp }}">
                               WhatsApp
                           </a>
                       </li>
                   @endif
               </ul>
           </div>
           <div class="col-lg-12">
               <div class="copyright-text" style="color: white">
                   <strong>Copyright
                       &copy;{{ date('Y') }} .
                       <a>Bloger_System</a>.</strong> All rights reserved.
                   <div class="float-right d-none d-sm-inline-block">
                   </div>
               </div>
           </div>
       </div>
