<div class="col-md-3">
    <div class="list-group">
        @if(auth()->user()->username !== 'Administrator')
        <a href="#" class="list-group-item list-group-item-action {{ request()->route()->uri === 'myaccount' ? 'active' : '' }}">
            My Post
        </a>
        <a href="#" class="list-group-item list-group-item-action">Profile</a>
        @else
        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
        <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
        @endif
    </div>
</div>