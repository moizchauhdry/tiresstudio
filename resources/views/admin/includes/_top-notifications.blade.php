<a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell" ></i>
    <span class="badge badge-warning navbar-badge" id="navAdminNotifications">{{ $adminNotifications->count() > 0 ? $adminNotifications->count()  : '' }}</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="adminNotifications">
    <span class="dropdown-item dropdown-header">{{ $adminNotifications->count() > 0 ? $adminNotifications->count()  : 'No ' }} Notifications</span>

    @if(isset($adminNotifications))
        <div  style="max-height: 300px;overflow-y: auto">
            @foreach($adminNotifications as $item)
                <a href="javascript:void(0)" class="dropdown-item read-notification" data-id="{{$item->id}}"  data-target="{{ $item->data['url'] != null ? $item->data['url'] :'null'  }}">
                    <div class="media" >
                        <div class="media-body">
                            <h3 class="dropdown-item-title">{{  $item->data['name'] }}</h3>
                            <p class="text-sm">{{ $item->data['message'] }}</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
                @if(!$loop->last) <div class="dropdown-divider"></div> @endif
            @endforeach
        </div>
        <a href="#" class="dropdown-item dropdown-footer" id="mark-as-read">Mark all as read</a>

    @endif

</div>
