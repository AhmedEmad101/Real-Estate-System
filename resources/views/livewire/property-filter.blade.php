<div>
<form id="header-bottom-bottom" wire:submit.prevent>
    <div class="filter-group">
        <label>
            Property Type
            <select wire:model="PropertyType" class="property-type-class">
                <option value="">All</option>

                @foreach ($types as $type)
                    <option value="{{ $type->Type_ID }}">
                        {{ $type->Type_name }}
                    </option>
                @endforeach
            </select>
        </label>
    </div>

    <label class="bedrooms-label">Bedrooms</label>
    <select wire:model="Bedrooms" class="bedrooms-select-class">
        <option value="">Any</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7-or-more">7+</option>
    </select>

    <label class="bathrooms-label">Bathrooms</label>
    <select wire:model="Bathrooms" class="bathrooms-select-class">
        <option value="">Any</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4-or-more">4+</option>
    </select>

    <div class="amenities-filter">
        <select wire:model="SortFilter">
            <option value="">SortBy</option>
            <option value="created_at-asc">From Oldest to latest</option>
            <option value="Price-desc">From Highest Price to lowest</option>
            <option value="Bedrooms-asc">Low number of rooms to highest</option>
            <option value="Bedrooms-desc">Largest number of rooms to lowest</option>
        </select>
    </div>

    <label class="min-price-label">Min Price</label>
    <select wire:model="MinPrice" class="min-price-select-class">
        <option value="">Any</option>
        <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="1500">1500</option>
        <option value="2000">2000</option>
    </select>

    <label class="max-price-label">Max Price</label>
    <select wire:model="MaxPrice" class="max-price-select-class">
        <option value="">Any</option>
        <option value="1500">1500</option>
        <option value="2000">2000</option>
        <option value="3000">3000</option>
        <option value="10000">10000</option>
    </select>

    <div>
       
</form>
</div>
      <section class="property" id="property">
        <div class="container">
          <p class="section-subtitle">For {{$status}}</p>
          <h2 class="h2 section-title">Properties For {{$status}}</h2>
          <h3 class="h3 section-title">{{count($properties)}}</h3>
        
            @if (session('Successful Payment'))
                  {{session('Successful Payment')}}
              @endif
              @if (session('Failed Payment'))
              {{session('Failed Payment')}}
             @endif
            @if(session('AddedtoFavourites'))
            {{session('AddedtoFavourites')}}
            @endif
            @if(session('NotAddedtoFavourites'))
            {{session('NotAddedtoFavourites')}}
            @endif
          <!-- Properties will be inserted here -->
      
           <div class="row">
    @forelse ($properties as $property)
        @livewire('property-card', ['property' => $property], key($property->id))
</div>
  @empty
            <div class="col-12 text-center">
                <h4>No properties found </h4>
            </div>
        @endforelse


        </div>
        {{$properties->links()}}
      </section>
    <!--