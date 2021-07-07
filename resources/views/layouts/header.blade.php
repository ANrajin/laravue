<header id="header">
	<div data-uk-sticky="animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent ; top: #header">
	  <nav class="uk-navbar-container uk-letter-spacing-small uk-text-bold">
	    <div class="uk-container">
	      <div class="uk-position-z-index" data-uk-navbar>
	        <div class="uk-navbar-left">
	          	<a class="uk-navbar-item uk-logo uk-text-primary" href="{{route('laravue')}}">
					<img src="{{asset('img/logo.png')}}" alt="logo" width="50">&nbsp;
					Lara<span class="uk-text-warning">vue</span>
				</a>
	        </div>
	        <div class="uk-navbar-right">
	          <ul class="uk-navbar-nav uk-visible@m" data-uk-scrollspy-nav="closest: li; scroll: true; offset: 80">
	            <li class="{{(Route::currentRouteName() == 'laravue') ? 'uk-active' : ''}}"><a href="{{route('laravue')}}">Home</a></li>
	            <li class="{{(Route::currentRouteName() == 'courses') ? 'uk-active' : ''}}"><a href="">Courses</a></li>
	          </ul>
	          <div>
	            <a class="uk-navbar-toggle" data-uk-search-icon href="#"></a>
	            <div class="uk-drop uk-background-default" data-uk-drop="mode: click; pos: left-center; offset: 0">
	              <form class="uk-search uk-search-navbar uk-width-1-1">
	                <input class="uk-search-input uk-text-demi-bold" type="search" placeholder="Search..." autofocus>
	              </form>
	            </div>
	          </div>
	          <div class="uk-navbar-item">
				  @auth
					  	<div class="dropdown">
							<button class="uk-button uk-button-primary-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{auth()->user()->name}}
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
								<a class="dropdown-item" href="#">Profile</a>
								<a class="dropdown-item" href="#">My Courses</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('sessionDestroy').submit();">
									Logout
								</a>
								<form action="{{route('session.logout')}}" method="post" id="sessionDestroy">@csrf @method('delete')</form>
							</div>
						</div>
				  @endauth

				  @guest
					<div>
						<a class="uk-button uk-button-primary-light" href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">
							Sign In
						</a>
					</div>
				  @endguest
	          </div>          
	          <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle><span
	            data-uk-navbar-toggle-icon></span></a>
	        </div>
	      </div>
	    </div>
	  </nav>
	</div>

	@auth
		@if (is_null(auth()->user()->email_verified_at))
			<div class="uk-container uk-container-large py-3">
				<div class="alert alert-warning">
					A confirmation mail has beed sent to your email. Please confirm your email address.
				</div>
			</div>
		@endif
	@endauth

	@if (Route::currentRouteName() == 'laravue')
		<div class="uk-container uk-container-large">
			<div class="uk-position-relative uk-visible-toggle uk-light uk-box-shadow-small uk-overflow-hidden uk-border-rounded"
			tabindex="-1" data-uk-slider="autoplay: true">
				<ul class="uk-slider-items uk-child-width-1-1">
					<li>
						<img src="img/2.jpg" alt="Slide">
						<div class="uk-position-cover uk-overlay-light uk-flex uk-flex-middle uk-padding-slide">
							<div class="uk-width-3-4@m">
								<h2 class="uk-heading-medium uk-letter-spacing-medium">Start a New Career Begin Today</h2>
								<p>
									<a class="hvr-forward" href="course.html" data-uk-icon="icon: arrow-right">UX Design with Josh Alkin</a>
								</p>
							</div>
						</div>
					</li>
					<li>
						<img src="img/1.jpg" alt="Slide">
						<div class="uk-position-cover uk-overlay-xlight uk-flex uk-flex-middle uk-padding-slide">
							<div class="uk-width-1-2@m">
								<h1 class="uk-heading-medium uk-letter-spacing-medium">Learn New Skills & Hobbies</h1>
								<p>
									<a class="hvr-forward" href="course.html" data-uk-icon="icon: arrow-right">Outdoor Photography with Josh Alkin</a>
								</p>
							</div>
						</div>
					</li>
				</ul>
				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous
					data-uk-slider-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next
					data-uk-slider-item="next"></a>
			</div>
		</div>
	@endif
</header>