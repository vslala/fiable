			<div class="left-panel">
				<ul class="nav nav-pills nav-stacked">
					<li class="{{ $setUserProfileActive or '' }}">
					    <a href="{{ route('userProfile') }}">Profile</a>
					</li>
					<li class="{{ $setUserHomeActive or ''}}">
					    <a href="{{ route("userHome") }}">Home </a>
					</li>
					<li>
					    <a href="{{ route("signOut") }}">Logout</a>
					</li>
				</ul>
			</div>
