<div class="">
    <div class="input-group search-form py-3">
        <input wire:model="search" type="text" class="form-control border-dark c-green" autocomplete="off" name="search_field" placeholder="Search In HalalGhor">
        <div class="input-group-append">
            <button class="btn bg-blue text-white" type="submit"> <i class="fas fa-search"></i> </button>
        </div>
    </div>
    @if(strlen($search) >= 2)
    <div class="position-absolute serach-overlay w-75">
        @if($searchResults->count() > 0)
            <ul class="list-group">
                @foreach($searchResults as $result)
                    <a href="{{ route("product-details", ['slug'   =>  $result->slug]) }}">
                        <li class="list-group-item bg-dark text-white border flex">
                            <img src="{{asset($result->image)}}" width="30" alt="Photo">
                            <span class="pl-3">{{ $result->name }}</span>
                        </li>
                    </a>
                @endforeach
            </ul>
        @else
            <div class="list-group-item w-100 bg-dark text-white">No Results Found </div>
        @endif
    </div>
    @endif
</div>
