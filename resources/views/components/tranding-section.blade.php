
<div class="row">
    <div class="col-lg-12">
        <div class="trending-tittle">
            <strong>Trending now</strong>
            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            <div class="trending-animated">
                <ul id="js-news" class="js-hidden">
                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                </ul>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        // TRANDING
        $.get("{{ route('datas.post.tranding') }}", (trandings) => {
            let item = "";
            trandings.forEach(tranding => {
                item += `<li class="news-item"><a href="/${tranding.url}">${tranding.title}</a></li>`
            });

            $('#js-news').html(item).ticker();
        })
    })

</script>
