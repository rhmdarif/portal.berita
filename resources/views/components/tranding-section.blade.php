
<div class="row">
    <div class="col-lg-12">
        <div class="trending-tittle">
            <strong>Trending now</strong>
            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            <div class="trending-animated">
                <ul id="js-news" class="js-hidden">
                    @foreach ($posts as $post)
                        <li class="news-item"><a href="/{{ $post->url }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $('#js-news').ticker();
    })
</script>
