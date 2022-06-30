<div class="m1">
    <form action="/search" id="search-form" method="GET" class="d-flex justify-content-center">
        <div class="w-50 mt-3">
            <input type="text" class="form-control text-center" placeholder="Search here.." aria-label="Search here.." aria-describedby="button-addon2" name="searchbox" value="{{ request('searchbox') }}">
        </div>
    </form>
</div>