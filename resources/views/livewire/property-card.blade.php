<div class="property-card">

    {{-- Time --}}
    {{ $property->created_at->diffForHumans() }}
    {{ $property->created_at }}

    <figure class="card-banner">

        {{-- Link to property --}}
        <a href="ViewProperty/{{ $property->id }}">
            <img src="{{ asset('Properties/'.$property->Property_Image) }}"
                 alt="Property Image"
                 class="w-100"
                 style="height: 200px; object-fit: cover;">
        </a>

        <div class="card-badge green">For Sale</div>

        <div class="banner-actions">

            <button class="banner-actions-btn">
                <ion-icon name="location"></ion-icon>
                <address>{{ $property->Location }}</address>
            </button>

            <button class="banner-actions-btn">
                <ion-icon name="camera"></ion-icon>
                <span>4</span>
            </button>

            <button class="banner-actions-btn">
                <ion-icon name="film"></ion-icon>
                <span>2</span>
            </button>

        </div>
    </figure>

    <div class="card-content">

        <div class="card-price">
            <strong>{{ $property->Price }} $</strong>
        </div>

        <h3 class="h3 card-title">
            <a href="ViewProperty/{{ $property->id }}">
                {{ $property->PropertyType->Type_name }}
            </a>
        </h3>

        <p class="card-text">
            {{ $property->Description }}

            {{-- Edit / Delete --}}
            @if (session('UserId') == $property->Publisher_id || session('Admin'))

                <form action="Update" method="get">
                    @csrf
                    <input type="hidden" name="PropertyId" value="{{ $property->id }}">
                    <button type="submit">Edit</button>
                </form>

                <form action="DeleteProperty/{{ $property->id }}" method="post">
                    @csrf
                    <button type="submit">Delete</button>
                </form>

            @endif
        </p>

        <ul class="card-list">

            <li class="card-item">
                <strong>{{ $property->Bedrooms }}</strong>
                <ion-icon name="bed-outline"></ion-icon>
                <span>Bedrooms</span>
            </li>

            <li class="card-item">
                <strong>{{ $property->Bathrooms }}</strong>
                <ion-icon name="man-outline"></ion-icon>
                <span>Bathrooms</span>
            </li>

            <li class="card-item">
                <strong>{{ $property->Area }}</strong>
                <ion-icon name="square-outline"></ion-icon>
                <span>Square Ft</span>
            </li>

        </ul>

    </div>

    <div class="card-footer">

        <div class="card-author">

            <figure class="author-avatar">
                <img
                    @if ($property->PropertyPublisher->UserProfileInfo->ProfileImg ?? '')
                        src="{{ asset('ProfileImages/'.$property->PropertyPublisher->UserProfileInfo->ProfileImg) }}"
                    @else
                        src="{{ asset('AltPhotos/Person.jpg') }}"
                    @endif
                    class="w-100">
            </figure>

            <div>
                <p class="author-name">
                    <a href="#">{{ $property->PropertyPublisher->User_Name }}</a>
                </p>

                <p class="author-title">{{ $property->PublisherType }}</p>
            </div>

        </div>

        <div class="card-footer-actions">

            <button class="card-footer-actions-btn">
                <ion-icon name="resize-outline"></ion-icon>
            </button>

            {{-- Favorites --}}
            <form action="AddtoFavs">
                @csrf
                <input type="hidden" name="PropertyID" value="{{ $property->id }}">
                <button class="card-footer-actions-btn">
                    <ion-icon name="heart-outline"></ion-icon>
                </button>
            </form>

            {{-- Buy --}}
            @if(!IsPurshased($property->id))
                <button class="card-footer-actions-btn"
                    @if(session('UserId') && session('UserId') != $property->Publisher_id)
                        onclick="location.href='Pay/{{ $property->id }}'"
                    @endif
                >
                    <ion-icon name="add-circle-outline"></ion-icon>
                </button>
            @else
                <b style="background-color: red">Sold Out</b>
            @endif

        </div>

    </div>

</div>