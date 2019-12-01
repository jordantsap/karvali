<section id="about" style="background-color:#ffffff;">
  <div class="container">
    <div class="row"> <br>
      <div class="col-xs-12">
        <h1 class="text-center">{{__('about.head')}}</h1>
        <div class="divider"></div>
        <div class="col-xs-12 text-center">
          <h2>{{__('about.1')}}</h2>
          <h2>{{__('about.2')}}</h2>
            <h2>{{__('about.3')}}</h2>
            <h2>{{__('about.4')}}</h2>
            <h2>{{__('about.5')}}</h2>
        </div>
        <div class="col-xs-10 col-xs-offset-1" style="padding:10px 0;">
          <a id="btn" title="{{ __('page.showmoreinfoabout') }}" href="{{route('about')}}" class="btn btn-info btn-block">{{ __('page.showmoreabout') }}</a>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="col-xs-12 col-sm-4 text-center">
          <h1>{{ __('page.privacy') }}</h1>
          <i class="fas fa-5x fa-lock"></i>
          <h3>Η ιδιωτική ζωή του χρήστη και η ολοκληρωμένη ασφάλεια του επαγγελματικού οδηγού είναι το πρώτο μας μέριμα.</h3>
          <h3>Στην ιστοσελίδα του οδηγού nea-karvali.gr χρησημοποιούμε πάντα αποδεκτά μέσα για την προστασία των Προσωπικών σας Πληροφοριών και δοκιμασμένες μεθόδους και τρόπους ασφάλειας.</h3>
          <a id="btn" title="{{ __('page.showmoreprivacytitle') }}" href="{{route('privacy')}}" class="btn btn-info btn-block">{{ __('page.showmoreprivacy') }}</a>
        </div>
        <div class="col-xs-12 col-sm-4 text-center">
          <h1>{{ __('page.personaldata') }}</h1>
          <i class="fas fa-5x fa-users"></i>
          <h3>Στον επαγγελματικό οδηγό nea-karvali.gr Χρησιμοποιούμε τα δεδομένα σας για την παροχή και τη βελτίωση της Υπηρεσίας.</h3>
          <h3>Συλλέγουμε πληροφορίες για να προσφέρουμε την καλύτερη δυνατή βελτίωση της υπηρεσίας και επιφυλλάσουμε τα δεδομένα που ανήκουν στους χρήστες.</h3>
          <a id="btn" title="{{ __('page.showmorepersonaldatatitle') }}" href="{{route('personaldata')}}" class="btn btn-info btn-block">{{ __('page.showmorepersonaldata') }}</a>
        </div>
        <div class="col-xs-12 col-sm-4 text-center">
          <h1>{{ __('page.services') }}</h1>
          <i class="fas fa-5x fa-handshake"></i>
          <h3>Η υπηρεσίες του nea-karvali.gr γίνεται για τη βελτίωση της Υπηρεσίας και τη καλύτερη δυνατότητα χρήσης της πλατφόρμας του www.nea-karvali.gr.</h3>
          <h3>Η παροχή των υπηρεσιών του Nea Karvali γίνεται μετά απο συμφωνία του χρήστη με το γενικό διαχειριστή ή του υπεύθυνου διαχειριστή παροχής υπηρεσιών.</h3>
          <a id="btn" title="{{ __('page.showmoreservicestitle') }}" href="{{route('services')}}" class="btn btn-info btn-block">{{ __('page.showmoreservices') }}</a>
        </div>
      </div>
    </div>
  </div>
</section>
