@layout('home/home_gebruiker')

@section('selectedContent')

	<div class="hero-unit">
      	
        <h1>{{Lang::line('contact.hello')->get(Session::get('language', 'nl'))}}</h1>
        
        <h2>{{Lang::line('contact.messsagesucces')->get(Session::get('language', 'nl'))}}</h2>
        <figure>

          {{ HTML::image('img/kmi_web144_light.png', 'alt. KMI_IRM-image') }}
					
		</figure>
        
        <h3>{{Lang::line('contact.reply')->get(Session::get('language', 'nl'))}}</h3>
        
        
      </div>

      

      <hr>
@endsection