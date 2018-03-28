<div class="navbar navbar-default navbar-fixed-top header-highlight">
  <div class="navbar-header">
    <a class="navbar-brand" href="#"><img src="{{ asset('/backend/assets/images/logo_light.png') }}" alt=""></a>

    <ul class="nav navbar-nav pull-right visible-xs-block">
      <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
  </div>

  <div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
      <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ asset('/backend/assets/images/placeholder.jpg') }}" alt="">
          <span>{{ Auth::user()->name }}</span>
          <i class="caret"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="javascript:form({{Auth::user()->id}})"><i class="icon-user-plus"></i> My Profile</a></li>
          {{--  <li><a href="#"><i class="icon-cog5"></i> Change Password</a></li>  --}}
          <li class="divider"></li>
          <li>
              <a href="{{ url('/logout') }}">
                 <i class="icon-switch2"></i> Logout
              </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>
<script>
function form(id)
{
	$('#modal-confirm').modal('show');
	$('div#modal-loader-confirm').css({'display':'inline'});
	$('div#dynamic-content-confirm').load(APP_URL+'/user-form/'+id,function(){
		$('div#modal-loader-confirm').css({'display':'none'});
		  $('.select2').select2({
				minimumResultsForSearch: Infinity
			});
	});
}
</script>