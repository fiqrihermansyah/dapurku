@extends('template')

@section('title','Dashboard DapurKu')

@section('content')

    <div style="width: 1027px; height: 2032px; left: 207px; top: 180px; position: absolute; background: #FFFFFF; border-radius: 50px; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
    <a href="/reseps/create" class="btn btn-primary" style="margin: 20px; align-self: center;">Tambah Resep</a>
      @foreach($reseps as $resep)
        <div style="width: 1027px; height: 375px; position: relative; background: #827A7A; border-radius: 50px; overflow: hidden; margin-bottom: 20px;">
          <img style="width: 472px; height: 375px; left: 0px; top: 0px; position: absolute" src="/storage/images/{{ $resep->image }}" />
          <div style="width: 594px; height: 377px; left: 433px; top: -2px; position: absolute">
            <div style="width: 594px; height: 377px; left: 0px; top: 0px; position: absolute; background: #827A7A; border-radius: 50px"></div>
            <div style="width: 504px; height: 239px; left: 45px; top: 80px; position: absolute; color: white; font-size: 20px; font-family: Laila; font-weight: 700; word-wrap: break-word">{{ Str::limit($resep->description, 100) }}</div>
            <div style="width: 228px; height: 63px; left: 183px; top: 10px; position: absolute; color: white; font-size: 40px; font-family: Laila; font-weight: 700; word-wrap: break-word">{{ $resep->title }}</div>
            <div style="position: absolute; bottom: 20px; left: 45px;">
              <a href="/reseps/{{ $resep->id }}" class="btn btn-primary">Lihat Resep</a>
              <button class="btn btn-secondary shareButton" data-link="{{ url('/reseps/' . $resep->id) }}">Share Resep</button>
              <button class="btn btn-warning bookmark-button" data-title="{{ $resep->title }}">Bookmark</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const shareButtons = document.querySelectorAll('.shareButton');
    shareButtons.forEach(button => {
        button.addEventListener('click', function () {
            const link = this.getAttribute('data-link');
            if (navigator.share) {
                navigator.share({
                    title: 'Lihat Resep',
                    text: 'Saya menemukan resep yang menarik!',
                    url: link
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(console.error);
            } else {
                alert('Share tidak didukung di browser ini');
            }
        });
    });

    const bookmarkButtons = document.querySelectorAll('.bookmark-button');
    bookmarkButtons.forEach(button => {
        button.addEventListener('click', function () {
            const title = this.getAttribute('data-title');
            alert(`Bookmark: ${title}`);
        });
    });
});
</script>
@endsection
