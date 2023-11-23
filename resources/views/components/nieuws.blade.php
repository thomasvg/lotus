<div class="news" id="kalender">
    <div class="title">
        <div class='title-icon-fa'><i class="fa-solid fa-envelope title-icon"></i></div>
        <h1> </h1>
        <div class="title">
            <h1>Nieuws</h1>
            <h3>{{ $posts->sortByDesc('created_at')->take(3)->count() }} nieuwe berichten</h3>
        </div>
    </div>
    @foreach ($posts->sortByDesc('created_at')->take(3) as $post)
        <div class="post">
            <div class="title-date">
                <h3>{{ $post->title }}</h3>
                <h3>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}
                </h3>
            </div>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
    <h3 style=" text-align: center ;margin-top:1rem;cursor:pointer;">
        << Toon alle berichten>>
    </h3>
</div>
