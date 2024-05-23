@if($games->isEmpty())
    <p>No games available</p>
@else
    <div class="row">
        @foreach($games as $game)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="{{ asset('img/' . $game->img) }}" alt="{{ $game->game_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{ $game->game_name }}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif